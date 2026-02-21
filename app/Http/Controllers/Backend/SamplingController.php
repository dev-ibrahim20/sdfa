<?php

namespace App\Http\Controllers\backend;

use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Sampling;
use App\Models\Sector;
use App\Models\Workplace;
use Session;
use Gate;
use Arr;
use Illuminate\Support\Facades\Log;
use App\Mail\SamplingCreated;
use Illuminate\Support\Facades\Mail;

class SamplingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(Request $request)
    {
        // if (Gate::denies('list_samplings')) {
        //     abort(403);
        // }
        $filter = $request->all();
        $sectors = Sector::pluck('name', 'id');
        $workplaces = Workplace::pluck('name', 'id');
        $warehouse = Arr::get($filter, 'sector');
        $workplace_id = Arr::get($filter, 'workplace_id');
        $status = Arr::get($filter, 'status');
        $commercial_registration_number = Arr::get($filter, 'commercial_registration_number');
        $order_number = Arr::get($filter, 'order_number');
        $sample_collection_location = Arr::get($filter, 'sample_collection_location');
        $request_sender_name    = Arr::get($filter, 'request_sender_name');
        $collection_staff_name  = Arr::get($filter, 'collection_staff_name');

        $cities = City::pluck('name', 'id');
    $city_id = Arr::get($filter, 'city_id'); 
    
        $data = Sampling::query();

        // Filter by sector
        if ($warehouse) {
            $data->where('sector_id', $warehouse);
        }
        // Filter by workplace_id
        if ($workplace_id) {
            $data->where('workplace_id', $workplace_id);
        }
        
       if ($order_number) {
            $data->where('id', $order_number);
        }
        
        if ($status) {
            $data->where('status', $status);
        }
        
        if ($commercial_registration_number) {
            $data->where('commercial_registration_number', $commercial_registration_number);
        }
        
        if ($sample_collection_location) {
    $data->where('sample_collection_location', 'LIKE', '%' . $sample_collection_location . '%');
}
           if ($city_id) {
        $data->where('city_id', $city_id);
    }
        
            if ($request_sender_name) {
        $data->where('request_sender_name', 'LIKE', '%'.$request_sender_name.'%');
    }

  
    if ($collection_staff_name) {
        $data->where('collection_staff_name', 'LIKE', '%'.$collection_staff_name.'%');
    }
        // Filter by date range
        if (!empty($filter['from']) && !empty($filter['to'])) {
            $from = $filter['from'];
            $to = $filter['to'];

            $data->whereBetween(\DB::raw('DATE(created_at)'), [$from, $to]);
        }
        // Determine pagination limit based on user role
        $limit = 20;
        if (auth()->user()->hasRole([11, 12, 13])) {
            $limit = 100;
        }

        // dd($data->paginate(20));
        if (empty($data))
            $data = Sampling::orderBy('status_order','DESC')->orderBy('id', 'DESC')->paginate($limit);
        else
            $data = $data->orderBy('status_order','DESC')->orderBy('id', 'DESC')->paginate($limit)->withQueryString();
        
        return view('backend.pages.samplings.index', compact('data', 'filter','workplaces', 'sectors','commercial_registration_number','cities','sample_collection_location'));
    }
    public function show($id)
    {
        $data  = Sampling::find($id);
        return view('backend.pages.samplings.show', compact('data'));
    }
    public function create()
    {
        if (Gate::denies('create_samplings')) {
            abort(403);
        }
        $cities = City::pluck('name', 'id');
        $sectors = Sector::pluck('name', 'id');
        $workplaces = Workplace::pluck('name', 'id');
        return view('backend.pages.samplings.create', compact('cities', 'workplaces', 'sectors'));
    }

   public function store(Request $request)
    {
        if (Gate::denies('create_samplings')) {
            abort(403);
        }
    
        // التحقق من عدم وجود عينة مكررة بنفس البيانات في آخر 5 دقائق
        $recentSampling = Sampling::where('commercial_registration_number', $request->commercial_registration_number)
            ->where('workplace_id', $request->workplace_id)
            ->where('sector_id', $request->sector_id)
            ->where('created_at', '>=', now()->subMinutes(5))
            ->first();
    
        if ($recentSampling) {
            Session::flash('msg', 'تم إنشاء عينة بنفس البيانات مؤخراً. يرجى المراجعة.');
            Session::flash('alert', 'warning');
            return redirect()->back()->withInput();
        }
    
        // استخدام Database Transaction لضمان عدم حدوث مشاكل
        try {
            \DB::beginTransaction();
    
            // Prepare the data to be saved
            $data = $request->except(
                '_token',
                'repate',
                'product_name',
                'product_type',
                'manufacturer_company',
                'batch_numbers',
                'number_of_samples',
                'type_of_samples',
                'expiry_date',
                'production_date',
                'weight',
                'sample_delivery_date',
                'sample_delivery_time',
                'image1',
                'image2',
                'image3',
                'sampling_item_id'
            );
    
            // Check if 'status' is present and not empty, then add the delivery date and time
            if ($request->has('status') && !is_null($request->input('status')) && $request->input('status') !== '') {
                $data['sample_delivery_date'] = $request->input('sample_delivery_date');
                $data['sample_delivery_time'] = $request->input('sample_delivery_time');
            }
    
            // Create the main sampling record
            $sampling = Sampling::create($data);
            
            // Update images
            if ($request->hasFile('image1')) {
                $sampling->update(['image1' => $this->uploadImage($request->file('image1'))]);
            }
            if ($request->hasFile('image2')) {
                $sampling->update(['image2' => $this->uploadImage($request->file('image2'))]);
            }
            if ($request->hasFile('image3')) {
                $sampling->update(['image3' => $this->uploadImage($request->file('image3'))]);
            }
    
            // Get the arrays from the request
            $productNames = $request->input('product_name', []);
            $productTypes = $request->input('product_type', []);
            $manufacturerCompanies = $request->input('manufacturer_company', []);
            $batchNumbers = $request->input('batch_numbers', []);
            $numberOfSamples = $request->input('number_of_samples', []);
            $weights = $request->input('weight', []);
            $typeOfSamples = $request->input('type_of_samples', []);
            $productionDates = $request->input('production_date', []);
            $expiryDates = $request->input('expiry_date', []);
    
            // Loop through the arrays and create sampling items
            for ($i = 0; $i < count($productNames); $i++) {
                $sampling->samplingItems()->create([
                    'product_name' => $productNames[$i],
                    'product_type' => $productTypes[$i] ?? null,
                    'manufacturer_company' => $manufacturerCompanies[$i] ?? null,
                    'batch_numbers' => $batchNumbers[$i] ?? null,
                    'number_of_samples' => $numberOfSamples[$i] ?? null,
                    'weight' => $weights[$i] ?? null,
                    'type_of_samples' => $typeOfSamples[$i] ?? null,
                    'production_date' => $productionDates[$i] ?? null,
                    'expiry_date' => $expiryDates[$i] ?? null,
                ]);
            }
    
            // إرسال الإيميل
            $workplace = $sampling->workplace;
            if ($workplace && $workplace->email) {
                Mail::to($workplace->email)->send(new SamplingCreated($sampling));
            }
    
            \DB::commit();
            
            ResponseCache::clear();
            Session::flash('msg', trans('lang.success_created'));
            Session::flash('alert', 'success');
            return redirect(config('settings.BackendPath') . '/samplings');
    
        } catch (\Exception $e) {
            \DB::rollback();
            
            $errorId = uniqid('sampling_store_', true);
            Log::error('Sampling store failed', [
                'error_id' => $errorId,
                'user_id' => auth()->id(),
                'has_image1' => $request->hasFile('image1'),
                'has_image2' => $request->hasFile('image2'),
                'has_image3' => $request->hasFile('image3'),
                'items_count' => count($request->input('product_name', [])),
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            Session::flash('msg', 'حدث خطأ أثناء إنشاء العينة. رقم الخطأ: ' . $errorId);
            Session::flash('alert', 'danger');
            return redirect()->back()->withInput();
        }
    }



    public function edit($id)
    {
        if (Gate::denies('edit_samplings')) {
            abort(403);
        }

        $data  = Sampling::find($id);
        $cities = City::pluck('name', 'id');
        $sectors = Sector::pluck('name', 'id');
        $workplaces = Workplace::pluck('name', 'id');

        return view('backend.pages.samplings.edit', compact('data', 'cities', 'sectors', 'workplaces'));
    }

   public function update(Request $request, $id)
    {
        if (Gate::denies('edit_samplings')) {
            abort(403);
        }
        $requestData = $request->except('_token', 'repate', 'product_name', 'product_type', 'manufacturer_company', 'batch_numbers', 'number_of_samples', 'type_of_samples', 'weight', 'sample_delivery_date', 'sample_delivery_time', 'sampling_item_id', 'production_date', 'expiry_date', 'image1', 'image2', 'image3', 'created_at', 'updated_at');
        // Get the arrays from the request
  
        $samplingItemIds = $request->input('sampling_item_id', []);
        $productNames = $request->input('product_name', []);
        $productTypes = $request->input('product_type', []);
        $manufacturerCompanies = $request->input('manufacturer_company', []);
        $batchNumbers = $request->input('batch_numbers', []);
        $numberOfSamples = $request->input('number_of_samples', []);
        $weights = $request->input('weight', []);
        $typeOfSamples = $request->input('type_of_samples', []);
        $productionDates = $request->input('production_date', []);
        $expiryDates = $request->input('expiry_date', []);

        if ($request->has('status') && !is_null($request->input('status')) && $request->input('status') !== '') {
            $requestData['sample_delivery_date'] = $request->input('sample_delivery_date');
            $requestData['sample_delivery_time'] = $request->input('sample_delivery_time');
        }

        if ($request->repate == 1) {
            $sample = new Sampling();
            $sample->fill($requestData);

            if (isset($request->image1)) {
                $sample->image1 = $this->uploadImage($request->file('image1'));
            }
            if (isset($request->image2)) {
                $sample->image2 = $this->uploadImage($request->file('image2'));
            }
            if (isset($request->image3)) {
                $sample->image3 = $this->uploadImage($request->file('image3'));
            }
            $sample->save();
            
            // For repeat, we treat all items as new, so we ignore sampling_item_id
             for ($i = 0; $i < count($productNames); $i++) {
                $sample->samplingItems()->create([
                    'product_name' => $productNames[$i],
                    'product_type' => $productTypes[$i],
                    'manufacturer_company' => $manufacturerCompanies[$i],
                    'batch_numbers' => $batchNumbers[$i],
                    'number_of_samples' => $numberOfSamples[$i],
                    'weight' => $weights[$i],
                    'type_of_samples' => $typeOfSamples[$i] ?? null,
                    'production_date' => $productionDates[$i] ?? null,
                    'expiry_date' => $expiryDates[$i] ?? null,
                ]);
            }
            
        } else {
            $sample = Sampling::find($id);
            
            // تحديث البيانات مع الحفاظ على إدارة الوقت بشكل تلقائي
            $sample->update($requestData);

            $updatedItemIds = [];

            // Update existing items and create new ones if needed
            for ($i = 0; $i < count($productNames); $i++) {
                $itemData = [
                    'product_name' => $productNames[$i],
                    'product_type' => $productTypes[$i],
                    'manufacturer_company' => $manufacturerCompanies[$i],
                    'batch_numbers' => $batchNumbers[$i],
                    'number_of_samples' => $numberOfSamples[$i],
                    'weight' => $weights[$i],
                    'type_of_samples' => $typeOfSamples[$i] ?? null,
                    'production_date' => $productionDates[$i] ?? null,
                    'expiry_date' => $expiryDates[$i] ?? null,
                ];

                $itemId = $samplingItemIds[$i] ?? null;

                if ($itemId) {
                     // Try to find the item belonging to this sample
                    $item = $sample->samplingItems()->find($itemId);
                    if ($item) {
                        $item->update($itemData);
                        $updatedItemIds[] = $itemId;
                    } else {
                         // ID exists but not found (maybe manipulated), create new
                        $newItem = $sample->samplingItems()->create($itemData);
                        $updatedItemIds[] = $newItem->id;
                    }
                } else {
                    // Create new item
                    $newItem = $sample->samplingItems()->create($itemData);
                    $updatedItemIds[] = $newItem->id;
                }
            }

            // Remove items that were not in the submitted list
            $sample->samplingItems()->whereNotIn('id', $updatedItemIds)->delete();

            // Handle image uploads without calling save() on the main sample
            if ($request->hasFile('image1')) {
                $sample->update(['image1' => $this->uploadImage($request->file('image1'))]);
            }
            if ($request->hasFile('image2')) {
                $sample->update(['image2' => $this->uploadImage($request->file('image2'))]);
            }
            if ($request->hasFile('image3')) {
                $sample->update(['image3' => $this->uploadImage($request->file('image3'))]);
            }
        }
        ResponseCache::clear();
        Session::flash('msg',  trans('lang.success_updated'));
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/samplings');
    }

    public function status($id, $status)
    {
        if (Gate::denies('publish_samplings')) {
            abort(403);
        }
        $user = Sampling::find($id);
        $user->status = $status;
        $user->save();
        ResponseCache::clear();
        return back();
    }

    public function destroy($id)
    {
        if (Gate::denies('delete_samplings')) {
            abort(403);
        }
        $sample = Sampling::find($id);
        $sample->delete();
        $sample->samplingItems()->delete();
        ResponseCache::clear();
        Session::flash('msg', ' Deleted! ');
        Session::flash('alert', 'danger');
        return back();
    }

    public function order_list($id, $order)
    {
        if (Gate::denies('order_samplings')) {
            abort(403);
        }
        $data = Sampling::find($id);
        $data->order_list = $order;
        ResponseCache::clear();
        $data->save();
        return back();
    }
    public function getCities($sector_id)
    {
        $cities = City::where('sector_id', $sector_id)->pluck('name', 'id');
        return response()->json($cities);
    }

    public function getWorkplaces($city_id)
    {
        $workplaces = Workplace::where('city_id', $city_id)->pluck('name', 'id');
        return response()->json($workplaces);
    }

    public function updateClosed($id, $closed)
    {


        // Find the sampling record
        $sampling = Sampling::findOrFail($id);

        // Update the 'closed' column based on the request input
        $sampling->update([
            'closed' => $closed, // assuming default is 0
            'status_order'=> 0
        ]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Closed status updated successfully.');
    }
    public function updateStatusOrder($id, $status_order)
    {


        // Find the sampling record
        $sampling = Sampling::findOrFail($id);

        // Update the  column based on the request input
        $sampling->update([
            'status_order' => $status_order, 
         
        ]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Closed status updated successfully.');
    }
    private function uploadImage($file)
{
    $extension = $file->getClientOriginalExtension();
    $monthDir = date('Y-m'); // إنشاء مجلد باسم الشهر الحالي
    $dir = 'assets/web/theme_1/' . ($extension === 'pdf' ? 'pdf' : 'img') . '/' . $monthDir;

    // تأكد من وجود المجلد إذا لم يكن موجودًا
    if (!file_exists(public_path($dir))) {
        mkdir(public_path($dir), 0777, true);
    }

    // توليد اسم ملف فريد
    $filename = ($extension === 'pdf' ? 'file_' : 'logo_') . time() . '_' . uniqid() . '.' . $extension;

    Log::info('Uploading file', ['dir' => $dir, 'filename' => $filename]);

    $file->move(public_path($dir), $filename);
    return $monthDir . '/' . $filename; //
 

}

}
