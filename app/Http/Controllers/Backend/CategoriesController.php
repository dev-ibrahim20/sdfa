<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use Session;
use Gate;

class CategoriesController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_categories') ) { abort(403); }
$categories = Category::where('project_id',0)->get();
return view('backend.pages.categories.index',compact('categories') );
}


public function sub_categories($category_id)
{
if ( Gate::denies('list_categories') ) { abort(403); }
$categories = Category::where('project_id',$category_id)->get();
return view('backend.pages.categories.index',compact('categories','category_id') );
}


public function create(Request $request )
{
if ( Gate::denies('create_categories') ) { abort(403); }
$category_id = $request->get('category_id');
return view('backend.pages.categories.create' , compact('category_id'));
}

public function store(Request $request)
{
if ( Gate::denies('create_categories') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$category = Category::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
if( $category->project_id != 0 ){
    return Redirect(config('settings.BackendPath').'/categories/sub_categories/' . $category->project_id );
}else{
    return Redirect(config('settings.BackendPath').'/categories' );
}


}

public function edit($id)
{
if ( Gate::denies('edit_categories') ) { abort(403); }
$category  = Category::where('id',$id)->first();
return view('backend.pages.categories.edit', compact('category')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_categories') ) { abort(403); }
Category::find($id)->update($request->all());
$category = Category::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/categories');
}



public function status($id,$status)
{
if ( Gate::denies('publish_categories')  ) { abort(403); }
$user = Category::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_categories')  ) { abort(403); }
$user = Category::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}






}
