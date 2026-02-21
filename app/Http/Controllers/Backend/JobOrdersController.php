<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contractor;
use App\Models\Vendor;
use App\Models\Project;
use App\Models\Building;
use App\Models\JobOrder;
use App\Models\ProjectStages;
use App\Models\ProjectVendorProduct;
use App\Models\JobOrderProduct;
use App\Models\JobOrderFiles;
use App\Models\JobOrderTasks;
use App\Models\Category;
use App\Models\BuildingFloors;
use App\Models\BuildingFloorsLcr;
use App\Models\BuildingTasks;
use App\Models\BuildingTasksProgress;

use Session;
use Gate;

class JobOrdersController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index(Request $request)
{
if ( Gate::denies('list_projects') ) { abort(403); }

$projects =  Project::get();
$buildings =  Building::get();

$project_id = $request->get('project');
$building_id = $request->get('building');

$project = Project::find($building_id);
$building = Building::find($project_id);

$contractors = Contractor::get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();

$job_orders = JobOrder::query();

if($project_id){
$job_orders = $job_orders->whereHas('building',function($q)use($project_id){
    $q->where('project_id',$project_id);
});
}else{
$job_orders = $job_orders->whereHas('building');
}

if($building_id){
$job_orders = $job_orders->where('building_id',$building_id);
}

if($request->contractor_id){
$job_orders =  $job_orders->where('contractor_id',$request->contractor_id);
}

if($request->planned_start_from){
$job_orders =  $job_orders->where('planned_start_date','>=',$request->planned_start_from);
}

if($request->planned_start_to){
$job_orders =  $job_orders->where('planned_start_date','<=',$request->planned_start_to);
}

if($request->stage_id){
$job_orders =  $job_orders->where('stage_id',$request->stage_id);
}

if($request->keyword){
$job_orders =  $job_orders->where('activity_description','LIKE','%'.$request->keyword.'%');
}


if($request->category_id){
    $job_orders =  $job_orders->where('category_id',$request->category_id);
    }

if($request->number){
$job_orders =  $job_orders->where('title_ar',$request->number);
}

$job_orders = $job_orders->get();

$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
$categories = Category::get();
return view('backend.pages.job_orders.index',compact('categories','projects','buildings','job_orders','project_stages','building_id','building','contractors','request','project') );
}



public function show($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$job_order  = JobOrder::find($id);
return view('backend.pages.job_orders.show', compact('job_order')  );
}


public function create(Request $request)
{
if ( Gate::denies('create_projects') ) { abort(403); }
$building_id = $request->get('building');
$contractors = Contractor::get();
$categories = Category::get();
$floors  = BuildingFloors::where('building_id' ,$building_id)->orderBy('id')->get();
$lcrs  = BuildingFloorsLcr::where('building_id' ,$building_id)->orderBy('id')->get();
$lcrs  = BuildingFloorsLcr::where('building_id' ,$building_id)->orderBy('id')->get();
$tasks  = BuildingTasks::where('building_id' ,$building_id)->orderBy('id')->get();


return view('backend.pages.job_orders.create' ,compact('building_id','contractors','categories','floors','lcrs','tasks') );
}

public function store(Request $request)
{
if ( Gate::denies('create_projects') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
\Arr::set($request,'stage_id',project_first_stage());
$job_order = JobOrder::create($request->all());

ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/job-orders?building='.$request->building_id);
}

public function edit($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$job_order  = JobOrder::find($id);
$contractors = Contractor::get();
$categories = Category::get();
$floors  = BuildingFloors::where('building_id' ,$id)->orderBy('id')->get();
$lcrs  = BuildingFloorsLcr::where('building_id' ,$id)->orderBy('id')->get();
$lcrs  = BuildingFloorsLcr::where('building_id' ,$id)->orderBy('id')->get();
$tasks  = BuildingTasks::where('building_id' ,$id)->orderBy('id')->get();

return view('backend.pages.job_orders.edit', compact('job_order','contractors','categories','floors','lcrs','tasks')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$job_order = JobOrder::find($id);
JobOrder::find($id)->update($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/job-orders?building='.$job_order->building_id);
}


public function status($id,$status)
{
if ( Gate::denies('publish_projects')  ) { abort(403); }
$user = JobOrder::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_projects')  ) { abort(403); }
$user = JobOrder::find($id);
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
$data = JobOrder::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}



public function update_stage( $id , $stage )
{
if ( Gate::denies('order_projects')  ) { abort(403); }
$data = JobOrder::find($id);
$data->stage_id = $stage ;
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
$data ->save();
return back();
}



public function products($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$job_order  = JobOrder::find($id);
return view('backend.pages.job_orders.products', compact('job_order')  );
}

 

public function add_product_to_job_order(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
JobOrderProduct::updateOrCreate(['product_id'=>$request->product_id,'job_order_id'=>$request->job_order_id,'user_id'=>\Auth::user()->id],['qty'=>$request->qty]);
ResponseCache::clear();
}


public function delete_product_from_job_order(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
JobOrderProduct::find($request->row_id)->delete();
ResponseCache::clear();
}



public function add_file(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
    //upload
    $file = $request->file;
    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/job_orders_files/'.date('Y').'/'.date('m');
    $filename = date('Y').'/'.date('m')."/".uniqid() . '_' . time() . '.'.$extension;
    $file->move($destinationPath , $filename);

    //add
    $data['job_order_id'] = $request->job_order_id;
    $data['title'] = $request->title;
    $data['file_name'] = $filename;
    $data['user_id'] = \Auth::user()->id;
    JobOrderFiles::create($data);

ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return back();
}


public function list_files($id)
{
    $files = JobOrderFiles::where('job_order_id',$id)->get();
    return view('backend.pages.job_orders.files', compact('files')  );
}


public function tasks($id)
{
    $job_order = JobOrder::find($id);
    $project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
    return view('backend.pages.job_orders.tasks', compact('job_order','project_stages')  );
}

public function sub_tasks($id)
{
    $task = JobOrderTasks::find($id);
    $project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
    return view('backend.pages.job_orders.sub_tasks', compact('task','project_stages')  );
}


public function sub_tasks_edit($id)
{
    $task = JobOrderTasks::find($id);
    return view('backend.pages.job_orders.sub_tasks_edit', compact('task')  );
}

public function sub_tasks_update(Request $request, $id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$task = JobOrderTasks::find($id);
JobOrderTasks::find($id)->update($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
if($task->parent_id == 0){
    return Redirect(config('settings.BackendPath').'/job-orders/tasks/'.$task->job_order_id);
}else{
    return Redirect(config('settings.BackendPath').'/tasks/'.$task->parent_id);
}


}


public function task_update_stage( $id , $stage )
{
if ( Gate::denies('order_projects')  ) { abort(403); }
$data = JobOrderTasks::find($id);
$data->stage_id = $stage ;
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
$data ->save();
return back();
}



}
