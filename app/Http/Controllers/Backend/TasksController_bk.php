<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskProduct;
use App\Models\Project;
use App\Models\ProjectStages;
use App\Models\WarehouseProduct;
use App\Models\WarehouseTransactions;
use App\Models\Contractor;

use Session;
use Gate;

class TasksController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}




public function index($project_id = null)
{
if ( Gate::denies('list_tasks') ) { abort(403); }
$project = Project::find($project_id);
$tasks = Task::query();
if($project_id){
    $tasks =  $tasks->where('project_id',$project_id);
}
$tasks = $tasks->orderBy('order_list')->get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.tasks.index',compact('tasks','project','project_stages') );
}


public function create($project_id = null)
{
if ( Gate::denies('create_tasks') ) { abort(403); }
$project = Project::find($project_id);
return view('backend.pages.tasks.create',compact('project') );
}

public function store(Request $request)
{
if ( Gate::denies('create_tasks') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$task = Task::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/tasks/' . $task->project_id );
}

public function edit($id)
{
if ( Gate::denies('edit_tasks') ) { abort(403); }
$task  = Task::where('id',$id)->first();
return view('backend.pages.tasks.edit', compact('task')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_tasks') ) { abort(403); }
Task::find($id)->update($request->all());
$task = Task::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
if( $request->task_type == 'job_order'  )
return Redirect(config('settings.BackendPath').'/tasks/' . $task->project_id .'/job-orders' );
return Redirect(config('settings.BackendPath').'/tasks/' . $task->project_id );
}



public function status($id,$status)
{
if ( Gate::denies('publish_tasks')  ) { abort(403); }
$user = Task::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_tasks')  ) { abort(403); }
$user = Task::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function order_list( $id , $order )
{
if ( Gate::denies('order_tasks')  ) { abort(403); }
$data = Task::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}



public function products($id)
{
if ( Gate::denies('edit_tasks') ) { abort(403); }
$task  = Task::where('id',$id)->first();
return view('backend.pages.tasks.products', compact('task')  );
}

 

public function add_product_to_task(Request $request)
{
if ( Gate::denies('edit_tasks') ) { abort(403); }
TaskProduct::updateOrCreate(['product_id'=>$request->product_id,'task_id'=>$request->task_id,'user_id'=>\Auth::user()->id],['qty'=>$request->qty]);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
}


public function delete_product_from_task(Request $request)
{
if ( Gate::denies('edit_tasks') ) { abort(403); }
TaskProduct::find($request->row_id)->delete();
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
}


public function update_stage( $id , $stage )
{
if ( Gate::denies('edit_tasks')  ) { abort(403); }

$data = Task::find($id);
$data->stage_id = $stage;
$data ->save();

Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
ResponseCache::clear();

return back();
}

public function job_orders(Request $request,$parent_id = null)
{
if ( Gate::denies('list_tasks') ) { abort(403); }
$building = Task::find($parent_id);
$tasks = Task::query();
if($parent_id){
    $tasks =  $tasks->where('project_id',$parent_id);
}
$tasks = $tasks->orderBy('order_list')->get();
$contractors = Contractor::get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.tasks.job_orders.index',compact('tasks','project_stages','building','contractors','request') );
}


public function contractor_job_orders(Request $request,$contractor_id = null)
{
if ( Gate::denies('list_tasks') ) { abort(403); }
$contractor = Contractor::find($contractor_id);
$contractors = Contractor::get();
$tasks = Task::query();
$tasks =  $tasks->where('contractor_id',$contractor_id);
$tasks = $tasks->orderBy('order_list')->get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.tasks.job_orders.index',compact('tasks','project_stages','contractor','contractors','request') );
}



public function all_job_orders(Request $request)
{
if ( Gate::denies('list_tasks') ) { abort(403); }
$contractors = Contractor::get();
$tasks = Task::query();

if($request->contractor_id){
$tasks =  $tasks->where('contractor_id',$request->contractor_id);
}

if($request->planned_start_from){
$tasks =  $tasks->where('planned_start_date','>=',$request->planned_start_from);
}

if($request->planned_start_to){
$tasks =  $tasks->where('planned_start_date','<=',$request->planned_start_to);
}

if($request->stage_id){
$tasks =  $tasks->where('stage_id',$request->stage_id);
}


$tasks = $tasks->orderBy('order_list')->get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.tasks.job_orders.index',compact('tasks','project_stages','request','contractors') );
}


public function create_job_order($building)
{
if ( Gate::denies('create_tasks') ) { abort(403); }
$building = Task::find($building);
$contractors = Contractor::get();
return view('backend.pages.tasks.job_orders.create',compact('building','contractors') );
}


public function edit_job_order($building)
{
if ( Gate::denies('create_tasks') ) { abort(403); }

$contractors = Contractor::get();
$task = Task::find($building);
$building = Task::find($building);
return view('backend.pages.tasks.job_orders.edit',compact('building','contractors','task') );
}




}
