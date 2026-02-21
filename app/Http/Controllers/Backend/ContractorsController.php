<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contractor;
use App\Models\ContractorRatings;
use App\Models\ContractorFiles;
use Session;
use Gate;

class ContractorsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_contractors') ) { abort(403); }
$contractors = Contractor::get();
return view('backend.pages.contractors.index',compact('contractors') );
}

public function create()
{
if ( Gate::denies('create_contractors') ) { abort(403); }
return view('backend.pages.contractors.create' );
}

public function store(Request $request)
{
if ( Gate::denies('create_contractors') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$contractor = Contractor::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/contractors' );
}

public function edit($id)
{
if ( Gate::denies('edit_contractors') ) { abort(403); }
$contractor  = Contractor::where('id',$id)->first();
return view('backend.pages.contractors.edit', compact('contractor')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_contractors') ) { abort(403); }
Contractor::find($id)->update($request->all());
$contractor = Contractor::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/contractors');
}



public function status($id,$status)
{
if ( Gate::denies('publish_contractors')  ) { abort(403); }
$user = Contractor::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_contractors')  ) { abort(403); }
$user = Contractor::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}




public function add_rating(Request $request)
{
if ( Gate::denies('create_contractors') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$contractor = ContractorRatings::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return back();
}



public function list_comments(Request $request , $id)
{
if ( Gate::denies('create_contractors') ) { abort(403); }
$contractor = Contractor::find($id);
$comments = ContractorRatings::where('contractor_id',$id)->whereNotNull('comment')->get();
return view('backend.pages.contractors.comments', compact('comments','contractor')  );
}



public function add_file(Request $request)
{
if ( Gate::denies('edit_projects') ) { abort(403); }
    //upload
    $file = $request->file;
    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/contractors_files/'.date('Y').'/'.date('m');
    $filename = date('Y').'/'.date('m')."/".uniqid() . '_' . time() . '.'.$extension;
    $file->move($destinationPath , $filename);

    //add
    $data['contractor_id'] = $request->contractor_id;
    $data['title'] = $request->title;
    $data['file_name'] = $filename;
    $data['user_id'] = \Auth::user()->id;
    ContractorFiles::create($data);

ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return back();
}


public function list_files($id)
{
    $files = ContractorFiles::where('contractor_id',$id)->get();
    return view('backend.pages.contractors.files', compact('files')  );
}


}
