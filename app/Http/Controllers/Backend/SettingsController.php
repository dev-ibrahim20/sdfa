<?php
namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate,Session,File;
use App\Models\Settings;
class SettingsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}



public function clear_cache()
{
if ( Gate::denies('list_clear_cache')  ) { abort(403); }
ResponseCache::clear();
Session::flash('msg',  trans('lang.cache_cleared') );
Session::flash('alert', 'success');
return back();
}

public function index()
{
if ( Gate::denies('list_general_settings')  ) { abort(403); }
$settings = Settings::find(1);
return view('backend.pages.settings.index' , compact('settings') );
}

public function update(Request $request)
{
if ( Gate::denies('edit_general_settings')  ) { abort(403); }
$settings = Settings::find(1);

if( isset($request->website_header_logo) ){
$extension = $request->file('website_header_logo')->getClientOriginalExtension();
$dir = 'assets/web/theme_1/img';
$filename = 'logo_' . time() . '.' . $extension;
$request->file('website_header_logo')->move($dir, $filename);
$settings->website_header_logo = $filename;
}

$settings->save();

$array['ProjectName'] = $request->project_name;
$array['BackendPath'] = $request->backend_path;
$array['PowerdBy'] = $request->powerd_by;
$array['DefaultLanguage'] = $request->default_language;
$data = var_export($array, 1);
if(File::put(base_path() . '/config/settings.php', "<?php\n return $data ;")) {
}



ResponseCache::clear();
\App::setLocale(LangUser());
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return back();
}


}
