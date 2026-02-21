<?php
namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Auth;
use Session;
use Hash;
use Gate;
class LanguagesController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_languages')  ) { abort(403); }
$data = Language::get();
return view('backend.pages.languages.index' , compact('data') );
}

public function create()
{
if ( Gate::denies('create_languages')  ) { abort(403); }
return view('backend.pages.languages.create');
}


public function store(Request $request )
{
if ( Gate::denies('create_languages')  ) { abort(403); }
$request['code'] = strtolower($request->code);
Language::create($request->all());
ResponseCache::clear();
Session::flash('msg', ' Created! ' );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/languages');
}

public function edit($id)
{
if ( Gate::denies('edit_languages')  ) { abort(403); }
$data = Language::find($id);
return view('backend.pages.languages.edit', compact('data')  );
}


public function update(Request $request, $id)
{
if ( Gate::denies('edit_languages')  ) { abort(403); }
$request['code'] = strtolower($request->code);
Language::find($id)->update($request->all());
ResponseCache::clear();
Session::flash('msg', ' Updated! ' );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/languages');
}




public function status($id , $action)
{
if ( Gate::denies('publish_languages')  ) { abort(403); }
Language::find($id)->update(['status'=>$action]);
ResponseCache::clear();
Session::flash('msg', ' Approved! ' );
Session::flash('alert', 'success');
return redirect()->back();
}

public function order_list($id , $order)
{
if ( Gate::denies('order_languages')  ) { abort(403); }
Language::find($id)->update(['order_list'=>$order]);
ResponseCache::clear();
Session::flash('msg', ' Approved! ' );
Session::flash('alert', 'success');
return redirect()->back();
}


public function destroy($id)
{
if ( Gate::denies('delete_languages')  ) { abort(403); }
Language::find($id)->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

}
