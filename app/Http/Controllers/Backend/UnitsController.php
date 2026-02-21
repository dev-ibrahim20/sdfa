<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;

use Session;
use Gate;

class UnitsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_units') ) { abort(403); }
$units = Unit::get();
return view('backend.pages.units.index',compact('units') );
}

public function create()
{
if ( Gate::denies('create_units') ) { abort(403); }
return view('backend.pages.units.create' );
}

public function store(Request $request)
{
if ( Gate::denies('create_units') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$unit = Unit::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/units' );
}

public function edit($id)
{
if ( Gate::denies('edit_units') ) { abort(403); }
$unit  = Unit::where('id',$id)->first();
return view('backend.pages.units.edit', compact('unit')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_units') ) { abort(403); }
Unit::find($id)->update($request->all());
$unit = Unit::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/units');
}



public function status($id,$status)
{
if ( Gate::denies('publish_units')  ) { abort(403); }
$user = Unit::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_units')  ) { abort(403); }
$user = Unit::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}






}
