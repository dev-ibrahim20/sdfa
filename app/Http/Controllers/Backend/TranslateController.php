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
use File;
class TranslateController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}

public function index()
{
if ( Gate::denies('list_translate')  ) { abort(403); }
$data = Language::get();
return view('backend.pages.translate.index' , compact('data') );
}



public function edit($lang)
{
if ( Gate::denies('edit_translate')  ) { abort(403); }
$data = \File::getRequire(base_path().'/resources/lang/'.$lang.'/lang.php');
return view('backend.pages.translate.edit', compact('data','lang')  );
}

public function update(Request $request, $lang)
{
if ( Gate::denies('edit_translate')  ) { abort(403); }
$array = [];
$i = 0;
foreach (\File::getRequire(base_path().'/resources/lang/'.$lang.'/lang.php') as $k=>$row) {
$array[$k] = $request[$i];
$i++;
}
$data = var_export($array, 1);
if(File::put(base_path() . "/resources/lang/".$lang."/lang.php", "<?php\n return $data ;")) {
}

ResponseCache::clear();
Session::flash('msg', ' Updated! ' );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/translate');
}



}
