<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Project;
use App\Models\Building;
use App\Models\ProjectStages;
use App\Models\ProjectVendorProduct;
use App\Models\ReportBuilding;
use App\Models\BuildingTasks;
use App\Models\BuildingTasksProgress;
use App\Models\BuildingFloors;
use PDF;
use Session;
use Gate;
use Spatie\Browsershot\Browsershot;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BuildingReportImports;

class BuildingsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index(Request $request)
{
if ( Gate::denies('list_projects') ) { abort(403); }
$project_id = $request->get('project');
$project = Project::find($project_id);
$buildings = Building::query();
if($project_id){
    $buildings = $buildings->where('project_id',$project_id);
}
$buildings = $buildings->orderBy('order_list')->get();

$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.buildings.index',compact('buildings','project_stages','project_id','project') );
}

public function create(Request $request)
{
if ( Gate::denies('create_projects') ) { abort(403); }
$project_id = $request->get('project');
return view('backend.pages.buildings.create' ,compact('project_id') );
}

public function store(Request $request)
{
if ( Gate::denies('create_projects') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
\Arr::set($request,'stage_id',project_first_stage());
$building = Building::create($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/buildings?project='.$request->project_id);
}

public function edit($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$building  = Building::find($id);
return view('backend.pages.buildings.edit', compact('building','floors')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$building = Building::find($id);
Building::find($id)->update($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/buildings?project='.$building->project_id);
}


public function status($id,$status)
{
if ( Gate::denies('publish_projects')  ) { abort(403); }
$user = Building::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_projects')  ) { abort(403); }
$user = Building::find($id);
$user->delete();
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function order_list( $id , $order )
{
if ( Gate::denies('order_projects')  ) { abort(403); }
$data = Building::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}



public function update_stage( $id , $stage )
{
if ( Gate::denies('order_projects')  ) { abort(403); }
$data = Building::find($id);
$data->stage_id = $stage ;
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
$data ->save();
return back();
}


public function upload_xls( Request $request, $id )
{


$file = $request->xls_file;    
$report_type = $request->report_type;
Excel::import(new BuildingReportImports($id,$report_type), $file->store('temp'));
$coDoc = $request->file('xls_file');
$filename = $id . '.' . $coDoc->getClientOriginalExtension();
$location = public_path('uploads/xls/');
$request->file('xls_file')->move($location, $filename);


ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');

return back();
}


public function xls_report( Request $request, $id )
{

$tasks = BuildingTasks::where('building_id',$id)->where('report_type','pull')->whereHas('progress')->get();
$building = Building::find($id);
return view('backend.pages.buildings.xls_report', compact('tasks','building')  );
}



public function print_report( Request $request, $id )
{

$tasks = BuildingTasks::where('building_id',$id)->where('report_type','pull')->whereHas('progress')->get();
$building = Building::find($id);


if( $request->get('pdf') ){


            $file_name = $building->title_.'_'.date('d-m-Y_h:i').'.pdf';
           
        

$format = 'A4-L';
$pdf = PDF::loadView('backend.pages.buildings.print.pdf_report', compact('tasks','building'), [], ['format' => $format]);    
return $pdf->stream($file_name);





}


return view('backend.pages.buildings.print.print_report', compact('tasks','building')  );
}



public function floor_tasks( Request $request, $id )
{
$tasks = BuildingTasks::whereHas('progress')->where('report_type','pull')->whereHas('progress')->get();
$building = Building::find($id);
return view('backend.pages.buildings.floor_tasks', compact('tasks','building')  );
}


public function set_floor_progress( Request $request )
{
    $add = BuildingTasksProgress::where('building_id',$request->building_id)->where('floor_id',$request->floor_id)->where('task_id',$request->task_id)->first();
    if(!isset($add)){
   $add = new BuildingTasksProgress;
}
   $add->building_id = $request->building_id;
   $add->floor_id = $request->floor_id;
   $add->task_id = $request->task_id;
   $add[$request->col] = $request->val;
   $add->save();
}





}
