<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;

use Auth;
use Session;
use Hash;
use Gate;


class UsersController extends Controller
{

public function __construct()
{
$this->middleware('auth');

}



public function index( $lang = null )
{
if ( Gate::denies('list_users')  ) { abort(403); }
$lang = LangUser($lang);
$data = User::orderby('id','desc')->paginate(20);
return view('backend.pages.users.index' , compact('data') );
}




public function create($lang = null)
{
if ( Gate::denies('create_users')  ) { abort(403); }
$lang = LangUser($lang);
$roles = Role::where('status' , 1)->get();
return view('backend.pages.users.create' , compact('roles'));
}


public function store(Request $request )
{
if ( Gate::denies('create_users')  ) { abort(403); }

$user = new User;
$user-> name = $request->name;
$user-> email = $request->email;
$user-> phone = $request->phone;
$user-> password = Hash::make($request->password);
$user-> role = 'admin';
$user-> save();


foreach ($request->role_id as $new_role) {
$role = Role::findOrFail($new_role);
$user->assign($role);
}

ResponseCache::clear();
Session::flash('msg', ' Created! ' );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/users');
}

public function edit($id , $lang = null)
{
if ( Gate::denies(['edit_users'])  ) { abort(403); }
$lang = LangUser($lang);
$data = User::find($id);
$roles = Role::where('status' , 1)->get();
return view('backend.pages.users.edit', compact('roles','data')  );
}



public function update(Request $request, $id)
{
if ( Gate::denies(['edit_users'])  ) { abort(403); }
$user= User::find($id);
$user-> name = $request->name;
$user-> email = $request->email;
if($request->password){
$user-> password = Hash::make($request->password);
}
$user-> phone = $request->phone;
$user-> role = 'admin';
$user->save();


if($request->role_id){
$user->roles()->detach();
foreach ($request->role_id as $new_role) {
$role = Role::findOrFail($new_role);
$user->assign($role);
}
}
ResponseCache::clear();
Session::flash('msg', ' Updated! ' );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/users');
}




public function status($id , $action)
{
if ( Gate::denies(['publish_users'])  ) { abort(403); }
$user= User::find($id);
$user->status = $action;
$user->save();

ResponseCache::clear();
if($action == 1) {
Session::flash('msg', ' Approved! ' );
Session::flash('alert', 'success');
} else {
Session::flash('msg', ' Blocked! ' );
Session::flash('alert', 'danger');
}
return redirect()->back();
}



public function destroy($id)
{
if ( Gate::denies(['delete_users'])  ) { abort(403); }
$user = User::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function login_as($id)
{
if ( Gate::denies(['create_users'])  ) { abort(403); }
$user = User::find($id);
\Auth::login($user);
return Redirect(config('settings.BackendPath'));
}


public function switch_language($language)
{
$user = User::find(\Auth::user()->id)->update(['language'=>$language]);
return back();
}


public function switch_data_view_type($type)
{
$user = User::find(\Auth::user()->id)->update(['data_view_type'=>$type]);
return back();
}


}
