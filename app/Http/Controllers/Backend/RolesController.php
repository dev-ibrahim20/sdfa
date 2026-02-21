<?php
namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Project;

use Session;
use Auth;
use Gate;

class RolesController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}


/**
 * Display a listing of the resource.
 *
 * @return Response
 */
public function index()
{
if ( Gate::denies('list_roles') ) { abort(403); }
$data = Role::paginate(10);
return view('backend.pages.roles.index',compact('data') );
}

public function create()
{
if ( Gate::denies('create_roles') ) { abort(403); }
$permissions = Permission::get();
$projects = Project::orderBy('order_list')->get();
return view('backend.pages.roles.create' , compact('permissions','projects') );
}

public function store(Request $request)
{
if ( Gate::denies('create_roles') ) { abort(403); }
//Store New Role
$Role = new Role;
$Role-> title = $request->title;
$Role ->save();


//Store New permissions
if (isset($request->permissions)){
foreach ($request->permissions as $k=>$permission) {
$permission_id = Permission::firstOrCreate(['name'=>$permission]);
$prev_prem = PermissionRole::whereRoleId($Role->id)->wherePermissionId($permission_id->id)->first();
if (empty($prev_prem->role_id)) {
$permissions = new PermissionRole;
$permissions->role_id = $Role->id;
$permissions->permission_id = $permission_id->id;
$permissions-> save();
}
}
}
ResponseCache::clear();
Session::flash('msg', 'Updated! ' . $Role->title);
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/roles');
}

public function edit($id , )
{
if ( Gate::denies('edit_roles') ) { abort(403); }
$data= Role::find($id);
$permissions = Permission::get();
$projects = Project::orderBy('order_list')->get();
return view('backend.pages.roles.edit' , compact('data','permissions','projects') );
}


public function update(Request $request, $id)
{
if ( Gate::denies('edit_roles') ) { abort(403); }
$Role = Role::find($id);
$Role->title = $request->title;
$Role->save();

//Delete old Permissions that not included in array $request->permissions
$DeletePermission = Permission::whereNotIn('name',$request->permissions)->pluck('id');
$PermissionRole = PermissionRole::whereIn('permission_id',$DeletePermission)->whereRoleId($Role->id)->delete();

//Store New permissions
if (isset($request->permissions)){
foreach ($request->permissions as $k=>$permission) {
$permission_id = Permission::firstOrCreate(['name'=>$permission]);
$prev_prem = PermissionRole::whereRoleId($Role->id)->wherePermissionId($permission_id->id)->first();
if (empty($prev_prem->role_id)) {
$permissions = new PermissionRole;
$permissions->role_id = $Role->id;
$permissions->permission_id = $permission_id->id;
$permissions-> save();
}

}
}
ResponseCache::clear();
Session::flash('msg', 'Updated! ' . $Role->title);
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/roles');
}






public function status($id , $action)
{
if ( Gate::denies('publish_roles') ) { abort(403); }
$user= Role::find($id);
$user->status = $action;
$user->save();

if($action == 1) {
Session::flash('msg', ' Approved! ' );
Session::flash('alert', 'success');
} else {
Session::flash('msg', ' Blocked! ' );
Session::flash('alert', 'danger');
}
ResponseCache::clear();
return redirect()->back();

}



public function destroy($id)
{

if ( Gate::denies('delete_roles')  ) { abort(403); }
$user = Role::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();

}






}
