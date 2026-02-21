<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Project;
use App\Models\ProjectStages;
use App\Models\ProjectVendorProduct;
use Session;
use Gate;

class ProjectsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_projects') ) { abort(403); }
$projects = Project::orderBy('order_list')->get();
$project_stages = ProjectStages::where('status',1)->orderBy('order_list')->get();
return view('backend.pages.projects.index',compact('projects','project_stages') );
}

public function create()
{
if ( Gate::denies('create_projects') ) { abort(403); }
return view('backend.pages.projects.create' );
}

public function store(Request $request)
{
if ( Gate::denies('create_projects') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
\Arr::set($request,'stage_id',project_first_stage());
$project = Project::create($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.project_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/projects');
}

public function edit($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$project  = Project::where('id',$id)->first();
return view('backend.pages.projects.edit', compact('project')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
Project::find($id)->update($request->all());
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.project_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/projects');
}



public function status($id,$status)
{
if ( Gate::denies('publish_projects')  ) { abort(403); }
$user = Project::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_projects')  ) { abort(403); }
$user = Project::find($id);
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
$data = Project::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}



public function update_stage( $id , $stage )
{
if ( Gate::denies('order_projects')  ) { abort(403); }
$data = Project::find($id);
$data->stage_id = $stage ;
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
$data ->save();
return back();
}





public function vendors_products($id)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
$project  = Project::where('id',$id)->first();
$vendors  = Vendor::get();
return view('backend.pages.projects.vendors_products', compact('project','vendors')  );
}

 

public function add_product_to_project(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
ProjectVendorProduct::updateOrCreate(['vendor_id'=>$request->vendor_id,'warehouse_id'=>$request->warehouse_id,'product_id'=>$request->product_id,'project_id'=>$request->project_id,'user_id'=>\Auth::user()->id],['qty'=>$request->qty]);
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
}


public function delete_product_from_project(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
ProjectVendorProduct::find($request->row_id)->delete();
ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
}


}
