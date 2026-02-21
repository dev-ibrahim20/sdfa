<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BuildingFloors;
use App\Models\Project;
use App\Models\Building;

use Session;
use Gate;

class BuildingFloorsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_project_stages') ) { abort(403); }
$data = BuildingFloors::orderBy('order_list')->get();
return view('backend.pages.building_floors.index',compact('data') );
}

public function create()
{
if ( Gate::denies('create_project_stages') ) { abort(403); }

$projects =  Project::get();
$buildings =  Building::get();

return view('backend.pages.building_floors.create' , compact('projects','buildings') );
}

public function store(Request $request)
{
if ( Gate::denies('create_project_stages') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
BuildingFloors::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/building_floors');
}

public function edit($id)
{
if ( Gate::denies('edit_project_stages') ) { abort(403); }

$projects =  Project::get();
$buildings =  Building::get();

$data  = BuildingFloors::where('id',$id)->first();
return view('backend.pages.building_floors.edit', compact('data','projects','buildings')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_project_stages') ) { abort(403); }
BuildingFloors::find($id)->update($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/building_floors');
}



public function status($id,$status)
{
if ( Gate::denies('publish_project_stages')  ) { abort(403); }
$user = BuildingFloors::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_project_stages')  ) { abort(403); }
$user = BuildingFloors::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function order_list( $id , $order )
{
if ( Gate::denies('order_project_stages')  ) { abort(403); }
$data = BuildingFloors::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}


}
