<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

use Session;
use Gate;

class VendorsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_vendors') ) { abort(403); }
$vendors = Vendor::get();
return view('backend.pages.vendors.index',compact('vendors') );
}

public function create()
{
if ( Gate::denies('create_vendors') ) { abort(403); }
return view('backend.pages.vendors.create' );
}

public function store(Request $request)
{
if ( Gate::denies('create_vendors') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$vendor = Vendor::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/vendors' );
}

public function edit($id)
{
if ( Gate::denies('edit_vendors') ) { abort(403); }
$vendor  = Vendor::where('id',$id)->first();
return view('backend.pages.vendors.edit', compact('vendor')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_vendors') ) { abort(403); }
Vendor::find($id)->update($request->all());
$vendor = Vendor::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/vendors');
}



public function status($id,$status)
{
if ( Gate::denies('publish_vendors')  ) { abort(403); }
$user = Vendor::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_vendors')  ) { abort(403); }
$user = Vendor::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}






}
