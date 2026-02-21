<?php
namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Post;
use App\Source;
use App\City;
use App\PostSource;
use Cache;
use DB;
use Carbon\Carbon;


class CategoriesController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */

/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Http\Response
 */


public function load_category_posts(Request $request)
{


$page_number = $request->get('page', 1);
$rows = $page_number * 10;
$id = $request->get('category' , 0);




$xid = '';

if( $id == 'now') {
$id = 'egypt';
}

if($id == 'caricature-section'){
$id = 'caricature';
$xid = 'caricature-section';
}

$category = Cache::remember('category_'.$id , 120 , function () use($id) {
return Permission::whereName($id)->firstOrFail();
});


if($category->parent_id ==  1 ){
$category_tags = Cache::remember('category_tagsparent_id'.$id , 120 , function () use($category) {
return Permission::where('parent_id',$category->id)
->where('drop_menu',1)
->get();

});
}else{
$category_tags = Cache::remember('category_tags'.$id , 120 , function () use($category) {
return Permission::where('parent_id',$category->parent_id)
->where('drop_menu',1)
->get();
});
}

$sub_category = array();


$sub_category = Cache::remember('sub_category_'.$id , 120 , function () use($category) {
return Permission::where('parent_id',$category->id)
->where('drop_menu',1)
->pluck('id');
});

if($xid == 'caricature-section'){
$sub_category = array(18,113);
}

if(count($sub_category)){
$category_id = $sub_category;

} else {
$category_id = array($category->id);

}



$currentPage = $page_number;
$page = $page_number;

\Illuminate\Pagination\Paginator::currentPageResolver(function() use ($currentPage) {
return $currentPage;
});



$QueryPosts = Post::query();

$QueryPosts = $QueryPosts->whereIn('category_id',  $category_id );

if( in_array( $category->id , [152 , 157] ) ){
$QueryPosts = $QueryPosts->where('story_id', '=', 0 );
}


$posts = Cache::remember('posts_'.$id.'_page_'.$page , 1 , function () use($QueryPosts) {
return $QueryPosts
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(10)
->paginate(10);
});



if( in_array($category->id , [18,113] ) ){
return view('frontend.pages.caricature' , compact('posts','page_number','category','category_tags'));
}

if( in_array($category->id , [ 152 , 157 ] ) ) {


$LatestPosts = Post::query();
$LatestPosts = $LatestPosts->whereIn('category_id',$category_id );
if( in_array($category->id , [152 , 157] ) ){
$LatestPosts = $LatestPosts->where('story_id', '!=', 0 );
}


$latest_programes = Cache::remember('latest_programes'.$id.'_page_'.$page , 1 , function () use($LatestPosts) {
return $LatestPosts
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(6)
->get();

});

$most_visit = Cache::remember('podcast_most_visit' , config('settings.DetailsCacheMinutes') , function () use($category) {
return Post::whereStatus(1)
->orderby('publish_at','desc')
->take(2)
->where('category_id',  $category->id )
->where('story_id', '!=' , 0 )
->with(['image:id,title,image','category:id,title,name','tags'])
->get();
});

$latest_file = Cache::remember('podcast_latest_file' , config('settings.DetailsCacheMinutes') , function () use($category) {
return Post::whereStatus(1)
->orderby('publish_at','desc')
->where('category_id',  $category->id )
->where('story_id', '!=' , 0 )
->with(['image:id,title,image','category:id,title,name','tags'])
->first();
});

return view('frontend.pages.podcast' , compact('category_tags','posts','page_number','category','latest_programes','most_visit','latest_file'));


}

$data =  view('frontend.pages.category_posts_div',compact('posts','page_number','category','category_tags') )->render();
return response()->json($data);

}

public function index(Request $request , $id , $page_number = 1 )
{

$category = Cache::remember('category_'.$id , 120 , function () use($id) {
return Permission::whereName($id)->firstOrFail();
});

$currentPage = $page_number;
$page = $page_number;

\Illuminate\Pagination\Paginator::currentPageResolver(function() use ($currentPage) {
return $currentPage;
});

//sub sections
$page_sub_categories  = Permission::where('parent_id', $category->id)->whereNotNull('web_name')->where('status',1)->get();

$QueryPosts = Post::query();

if( count( $page_sub_categories  ) ) {
    $QueryPosts = $QueryPosts->whereIn('category_id',  $page_sub_categories->pluck('id') );
}else{
    $QueryPosts = $QueryPosts->where('category_id',  $category->id );
}


$posts = Cache::remember('posts_'.$id.'_page_'.$page.$category->id , 1 , function () use($QueryPosts) {
return $QueryPosts
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(10)
->paginate(10);
});

return view('frontend.pages.category' , compact('posts','page_number','category','page_sub_categories'));

}



public function writer(Request $request , $id , $page_number = 1)
{

$writer = Source::whereId($id)->firstOrFail();
$source_posts = PostSource::where('source_id',$id)->pluck('post_id');
$page = $page_number;
$QueryPosts = Post::query();
$posts = Cache::remember('posts_'.$id.'_page_'.$page , 1 , function () use($QueryPosts,$source_posts) {
return $QueryPosts
->whereIn('id',$source_posts)
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(10)
->paginate(10);
});

return view('frontend.pages.writer' , compact('posts','writer','page_number'));
}





public function egypt_news(Request $request , $id , $page_number = 1 )
{
$id = 'posts';
$category = Cache::remember('category_'.$id , 120 , function () use($id) {
return Permission::whereName($id)->firstOrFail();
});

$main_sub_categories = Cache::remember('main_sub_categories'.$id , 120 , function () use($category) {
return Permission::whereParentId($category->id)->pluck('id');
});

$sub_categories = Cache::remember('sub_categories'.$id , 120 , function () use($main_sub_categories) {
return Permission::whereIn('parent_id',$main_sub_categories)->pluck('id');
});


$page_sub_categories = Cache::remember('page_sub_categories'.$id , 120 , function () use($category) {
return Permission::where('parent_id',$category->id)->whereNotNull('web_name')->where('status',1)->get();
});

$sub_categories = $sub_categories->union($main_sub_categories);

$currentPage = $page_number;
$page = $page_number;

\Illuminate\Pagination\Paginator::currentPageResolver(function() use ($currentPage) {
return $currentPage;
});

$QueryPosts = Post::query();
$QueryPosts = $QueryPosts->whereIn('category_id',  $sub_categories );
$posts = Cache::remember('section_posts_'.$id.'_page_'.$page.$id , 1 , function () use($QueryPosts) {
return $QueryPosts
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(10)
->paginate(10);
});

//egypt posts
$egypt_posts = Cache::remember('section_page_egypt_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  168 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(5)
->get();
});


//arab and world posts
$arab_world_posts = Cache::remember('section_page_arab_world_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  181 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(6)
->get();
});

//economy posts
$economy_posts = Cache::remember('section_page_economy_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  182 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(2)
->get();
});

//sports_posts
$sports_posts = Cache::remember('section_page_sports_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  183 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(5)
->get();
});

//entertainment posts
$entertainment_posts = Cache::remember('section_page_entertainment_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  184 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(6)
->get();
});

//culture_posts
$culture_posts = Cache::remember('section_page_culture_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  185 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(5)
->get();
});

//crime posts
$crime_posts = Cache::remember('section_page_crime_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  181 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(6)
->get();
});


//technology_posts
$technology_posts = Cache::remember('section_page_technology_posts_'.$id.'_page_'.$page.$id , 1 , function ()  {
return Post::where('category_id',  188 )
->whereStatus(1)
->orderby('publish_at' , 'desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','publish_at','image_id','intro','category_id','image_from_live_site','created_at','updated_at')
->with(['image:id,image'])
->take(2)
->get();
});


$reports_latest_posts = Cache::rememberForever('latest_posts_190', function () {
return Post::whereStatus(1)
->take(6)
->where('category_id',190)
->orderby('publish_at','desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','image_id','publish_at','category_id','image_from_live_site')
->with(['image:id,image','category'])
->get();
});
  

$articles_latest_posts = Cache::rememberForever('latest_posts_192', function () {
return Post::whereStatus(1)
->take(6)
->where('category_id',192)
->orderby('publish_at','desc')
->where('publish_at' , '<=' , Carbon::now() )
->select('id','title','image_id','publish_at','category_id','image_from_live_site')
->with(['image:id,image','category'])
->get();
});


return view('frontend.pages.egypt_news' , compact('page_sub_categories','category','posts','egypt_posts','arab_world_posts','economy_posts','sports_posts','entertainment_posts','culture_posts','crime_posts','technology_posts','reports_latest_posts','articles_latest_posts'));

}






}
