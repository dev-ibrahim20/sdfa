<?php

namespace App\Http\Controllers\backend;

use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\WarehouseTransactions;
use App\Models\Vendor;
use App\Models\Building;
use App\Models\BuildingTasks;
use App\Models\BuildingTasksProgress;
use App\Models\Sampling;
use App\Models\Sector;
use App\Models\Workplace;
use Auth;
use Session;
use Hash;
use Gate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function reports(Request $request, $lang = null)
    {
        $filter = $request->all();
        $sectors = Sector::pluck('name', 'id');
        $workplaces = Workplace::pluck('name', 'id');
        $warehouse = Arr::get($filter, 'sector');
        $workplace_id = Arr::get($filter, 'workplace_id');
        $status = Arr::get($filter, 'status');
        $commercial_registration_number = Arr::get($filter, 'commercial_registration_number');
        $order_number = Arr::get($filter, 'order_number');
        $sample_collection_location = Arr::get($filter, 'sample_collection_location');
        $type_of_requests = Arr::get($filter, 'type_of_requests');
        $type_of_samples = Arr::get($filter, 'type_of_samples');

        // $data = Sampling::query();
        $data = Sampling::withTrashed()->with(['samplingItems' => function($query) {
            $query->withTrashed(); // إضافة البيانات المحذوفة
        }]); // Eager load the sampleItem relationship


        if($type_of_requests){
            $data->where('type_of_requests', $type_of_requests);
        }

        if($type_of_samples){
            $data->whereHas('samplingItems', function ($query) use ($type_of_samples) {
                $query->where('type_of_samples', $type_of_samples);
            });
        }

        // Filter by sector
        if ($warehouse) {
            $data->where('sector_id', $warehouse);
        }
        // Filter by workplace_id
        if ($workplace_id) {
            $data->where('workplace_id', $workplace_id);
        }
    // Filter by workplace_id
        if ($order_number) {
            $data->where('id', $order_number);
        }
        
        if ($status) {
            $data->where('status', $status);
        }
        
                if ($sample_collection_location) {
    $data->where('sample_collection_location', 'LIKE', '%' . $sample_collection_location . '%');
}

        // Filter by date range
if (!empty($filter['from']) && !empty($filter['to'])) {
    $from = $filter['from'];
    $to   = $filter['to'];

    $data->whereBetween(\DB::raw('DATE(created_at)'), [$from, $to]);

    $fromYear = date('Y', strtotime($from));
    $toYear   = date('Y', strtotime($to));

    // طبق الشرط فقط لو مش searching في سنة 2024
    if (!($fromYear == 2024 && $toYear == 2024)) {
        $data->whereNotBetween('collection_date', [
            '2024-01-01',
            '2024-12-30'
        ]);
    }
}

        // dd($data->paginate(20));
        // if (empty($data))
        //     $data = Sampling::orderBy('status_order', 'DESC')->orderBy('id', 'DESC')->paginate(20);
        // else
        if ($request->has('export') && $request->export == 'excel') {
            // استخدام chunking بدلاً من get() لتجنب timeout
            $query = $data->orderBy('status_order', 'DESC')->orderBy('id', 'DESC');
            
            return Excel::download(new class($query) implements \Maatwebsite\Excel\Concerns\FromQuery, \Maatwebsite\Excel\Concerns\WithHeadings, \Maatwebsite\Excel\Concerns\WithStyles, \Maatwebsite\Excel\Concerns\WithChunkReading, \Maatwebsite\Excel\Concerns\WithMapping
            {
                protected $query;

                public function __construct($query)
                {
                    $this->query = $query;
                }

                public function query()
                {
                    return $this->query;
                }

                public function chunkSize(): int
                {
                    return 1000; // معالجة 1000 سجل في كل مرة
                }

                public function map($item): array
                {
                    // تحويل البيانات لكل عنصر
                    $mappedData = [];
                    
                    foreach ($item->samplingItems as $sampleItem) {
                        $mappedData[] = [
                            'مسلسل' => $sampleItem->sampling_id,
                            ' تاريخ السحب' => $item->collection_date,
                            'اسم المنتج' => $sampleItem->product_name,
                            'عدد العينات' => $sampleItem->number_of_samples,
                            'رقم البيان الجمركي' => $item->commercial_registration_number,
                            'تصنيف العينة' => $sampleItem->type_of_samples,
                            ' الظروف التخزينية' => trans('lang.temperatures.' . $item->temperature) ?? '-',
                            'مقر العمل'=> $item->workplace->name ?? '-',
                            'بلد المنشأ' => $sampleItem->manufacturer_company?? '-' ,
                            'تاريخ الإنتاج' => $sampleItem->production_date,
                            'تاريخ الانتهاء' => $sampleItem->expiry_date,
                            'رقم التشغيلة' =>  $sampleItem->batch_numbers ?? '-',
                            'وقت السحب' => $item->collection_date,
                            ' اسم الشركة ' => $item->sample_collection_location?? '-',
                            'اسم المستورد' => $item->customs_clearance_contact_number?? '-',
                            'اسم المسؤول' => $item->request_sender_name?? '-',
                            'رقم التواصل' => $item->request_contact_number?? '-',
                            'اسم موظف السحب' => $item->collection_staff_name?? '-',
                            'الحالة' => trans('lang.statuss.' . $item->status),
                            'ملاحظات' => $item->notes,
                            'تاريخ الحذف' => $sampleItem->deleted_at ? $sampleItem->deleted_at->format('Y-m-d H:i:s') : '-',
                        ];
                    }
                    
                    return $mappedData;
                }

                public function headings(): array
                {
                    return [
                        ['بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات العينة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الشركة', 'بيانات الحذف'],
                        ['مسلسل', 'تاريخ السحب', 'اسم المنتج', 'عدد العينات', 'رقم البيان الجمركي', 'تصنيف العينة', 'الظروف التخزينية', 'مقر العمل','بلد المنشأ', 'تاريخ الإنتاج', 'تاريخ الانتهاء', 'رقم التشغيلة', 'وقت السحب', 'اسم الشركة', 'اسم المستورد', 'اسم المسؤول', 'رقم التواصل', 'اسم موظف السحب','الحالة' ,'ملاحظات', 'تاريخ الحذف']
                    ];
                }
    
                public function styles(Worksheet $sheet)
                {
                    $sheet->mergeCells('A1:M1');
                    $sheet->mergeCells('N1:T1');

                    $sheet->getStyle('A1:T1')->getAlignment()->setHorizontal('center');
                    $sheet->getStyle('A2:T2')->getAlignment()->setHorizontal('center');

                    $sheet->getStyle('A1:T1')->getFont()->setBold(true)->setSize(18); // حجم الخط 18 للصف الأول
                    $sheet->getStyle('A2:T2')->getFont()->setBold(true)->setSize(12); // حجم الخط 12 للصف الثاني

                    $sheet->getStyle('A1:T1')->getFont()->setBold(true);
                    $sheet->getStyle('A2:T2')->getFont()->setBold(true);

                    $sheet->getStyle('A1:M1')->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'ADD8E6'] // أزرق فاتح
                        ]
                    ]);

                    $sheet->getStyle('N1:T1')->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => 'FFFFE0'] // أخضر فاتح
                        ]
                    ]);

                    $sheet->getStyle('A2:M2')->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => '90EE90'] // أخضر
                        ]
                    ]);

                    $sheet->getStyle('N2:T2')->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['argb' => '90EE90'] // أخضر
                        ]
                    ]);

                    // بدء الشيت من اليمين
                    $sheet->setRightToLeft(true);
                }
            }, 'sampling_report.xlsx');
        }
        $data = $data->orderBy('status_order', 'DESC')->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.pages.reports.stock_transactions', compact('data', 'filter', 'workplaces', 'sectors', 'commercial_registration_number','sample_collection_location'));
    }




    public function sample_report(Request $request, $lang = null)
    {
        $tasks = BuildingTasks::get();

        if ($request->get('list_all') && $request->get('list_all')  == 1) {
            $buildings = Building::get();
        } else {
            $buildings = Building::whereHas('floors')->get();
        }


        return view('backend.pages.reports.sample_report', compact('tasks', 'buildings'));
    }




    public function sample_report_print(Request $request, $lang = null)
    {

        $tasks = BuildingTasks::get();

        if ($request->get('list_all') && $request->get('list_all')  == 1) {
            $buildings = Building::get();
        } else {
            $buildings = Building::whereHas('floors')->get();
        }


        if ($request->get('pdf')) {
            $file_name = 'الموقف_التنفيذي_' . date('d-m-Y_h:i') . '.pdf';
            $format = 'A4-L';
            $pdf = PDF::loadView('backend.pages.reports.print.pdf_report', compact('tasks', 'buildings'), [], ['format' => $format]);
            return $pdf->stream($file_name);
        }


        return view('backend.pages.reports.print.print_report', compact('tasks', 'buildings'));
    }
}
