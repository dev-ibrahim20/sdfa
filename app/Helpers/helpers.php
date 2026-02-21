<?php
function slug($string, $separator = '-') {
if (is_null($string)) {
return "";
}
$string = trim($string);
$string = str_replace('اً','ا',$string);
$string = mb_strtolower($string, "UTF-8");;
$string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/", "", $string);
$string = preg_replace("/[\s-]+/", " ", $string);
$string = preg_replace("/[\s_]/", $separator, $string);
return $string;
}

function LangUser() {
return isset(\Auth::user()->language) ? \Auth::user()->language : config('settings.DefaultLanguage') ;
}

function DirUser() {
$AppDir = \App\Models\Language::where('code', LangUser())->first()->is_rtl;
return $AppDir ? 'rtl' : 'ltr';
}


function limit_words($text,$limit) {
return  \Illuminate\Support\Str::words($text, $limit );
}

function project_first_stage() {
$is_first = \App\Models\ProjectStages::where('is_first',1)->first();
return $is_first->id ?? \App\Models\ProjectStages::first()->id;
}


function project_last_stage() {
$is_last = \App\Models\ProjectStages::where('is_last',1)->first();
return $is_last->id ?? \App\Models\ProjectStages::orderBy('id','desc')->first()->id;
}

function project_not_editable_stages() {
return \App\Models\ProjectStages::where('is_editable',0)->pluck('id');
}

//to search in arabic names with any letter formation
function arabic_query($text)
{
$text = preg_replace('/[^\x{0600}-\x{06FF}A-Za-z !@#$%^&*()]/u','', $text);
$replace = array(
"أ",
"ا",
"إ",
"آ",
"ي",
"ى",
"ه",
"ة",
);
$with = array("(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(أ|ا|آ|إ)",
"(ي|ى)",
"(ي|ى)",
"(ه|ة)",
"(ه|ة)",
);
$new = array_combine($replace, $with);
$return = "";
$len = strlen(utf8_decode($text));
for ($i = 0; $i < $len; $i++) {
$current = mb_substr($text, $i, 1, 'utf-8');
if (isset($new[$current])) {
$return .= $new[$current];
} else {
$return .= $current;
}
}
return $return;
}


function get_key_trans($k,$val = null)
{

switch ($k) {
    case 'stage_id':
    $stage = \App\Models\ProjectStages::find($val);
    return $stage->title;
    break;
    case 'user_id':
    $user = \App\Models\User::find($val);
    return $user->name;
    break;

    case 'status':
    return __('lang.status_'.$val);
    break;

    default:
    return $val;
  } 





}