<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use App\Models\Project;
use App\Models\Product;
use App\Models\WarehouseProduct;
use App\Models\WarehouseTransactions;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\ProjectVendorProduct;
use App\Models\JobOrderProduct;

use Session;
use Gate;

class WarehousesController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index($project_id = null)
{
if ( Gate::denies('list_warehouses') ) { abort(403); }

$projects = Project::query();

if($project_id){
    $projects = $projects->where('id',$project_id);
}

$projects = $projects->get();

return view('backend.pages.warehouses.index',compact('projects','project_id') );
}

public function create($project_id = null)
{
if ( Gate::denies('create_warehouses') ) { abort(403); }
$project = Project::find($project_id);
return view('backend.pages.warehouses.create',compact('project') );
}

public function store(Request $request)
{
if ( Gate::denies('create_warehouses') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$warehouse = Warehouse::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/warehouses/' . $warehouse->project_id );
}

public function edit($id)
{
if ( Gate::denies('edit_warehouses') ) { abort(403); }
$warehouse  = Warehouse::where('id',$id)->first();
return view('backend.pages.warehouses.edit', compact('warehouse')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_warehouses') ) { abort(403); }
Warehouse::find($id)->update($request->all());
$warehouse = Warehouse::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/warehouses/' . $warehouse->project_id );
}



public function status($id,$status)
{
if ( Gate::denies('publish_warehouses')  ) { abort(403); }
$user = Warehouse::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_warehouses')  ) { abort(403); }
$user = Warehouse::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function order_list( $id , $order )
{
if ( Gate::denies('order_warehouses')  ) { abort(403); }
$data = Warehouse::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}



public function warehouses($id)
{
if ( Gate::denies('edit_products') ) { abort(403); }
$projects  = Project::where('status',1)->orderBy('order_list')->get();
$product  = Product::where('id',$id)->first();
return view('backend.pages.products.warehouses', compact('product','projects')  );
}



public function warehouses_update(Request $request, $id)
{
if ( Gate::denies('edit_products') ) { abort(403); }

if($request->warehouse_id){
    foreach( $request->warehouse_id as $k=>$warehouse_id ){
        if( isset($request->qty[$k]) ){
        WarehouseProduct::updateOrCreate(
            ['product_id' => $id , 'warehouse_id' => $warehouse_id],
            ['qty' => $request->qty[$k] , 'min_limit' => $request->min_limit[$k] ?? 0] );
    }
}
}

ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/products' );
}





public function transactions($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$warehouse  = Warehouse::where('id',$id)->first();
$vendors  = Vendor::get();
return view('backend.pages.warehouses.transactions', compact('warehouse','vendors')  );
}


public function add_product_to_transactions(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }

//add transaction in , out or return qty from vendors or job_order
WarehouseTransactions::create(['vendor_id'=>$request->vendor_id,'job_order_id'=>$request->job_order_id,'product_id'=>$request->product_id,'warehouse_id'=>$request->warehouse_id,'user_id'=>\Auth::user()->id,'qty'=>$request->qty,'type'=>$request->type,'inspection_qty'=>$request->inspection]);

//get job order product details to close is_completed_out flag
if( $request->type == 'out_qty'){
    $job_order_product = JobOrderProduct::where('job_order_id',$request->job_order_id)->where('product_id',$request->product_id)->first();
     if( $job_order_product->transactions->sum('qty') >= $job_order_product->qty ){
        $job_order_product->is_completed_out = 1;
     }else{
        $job_order_product->is_completed_out = 0;
     }
     $job_order_product->save();

}




// get product qty in store
$current_qty = WarehouseProduct::where('product_id',$request->product_id)->where('warehouse_id',$request->warehouse_id)->sum('qty');

// update product qty in store
WarehouseProduct::updateOrCreate(['product_id'=>$request->product_id,'warehouse_id'=>$request->warehouse_id]
,['qty'=> $current_qty + $request->qty]);

ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');

return response()->json([
    'execute' => false,
]);

}


public function delete_product_from_transactions(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
WarehouseTransactions::find($request->row_id)->delete();
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
}




public function warehouse_products($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$categories = Category::where('project_id',0)->get();
$warehouse  = Warehouse::where('id',$id)->first();
return view('backend.pages.warehouses.warehouse_products', compact('categories','warehouse')  );
}





}
