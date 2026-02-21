<?php

namespace App\Http\Controllers\backend;
use Spatie\ResponseCache\Facades\ResponseCache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Category;
use App\Models\WarehouseProduct;
use Session;
use Gate;
use Arr;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsTemplateFileExport;
use App\Exports\ProductsFileExport;
use App\Imports\ProductsFileImports;

class ProductsController extends Controller
{

public function __construct()
{
$this->middleware('auth');
}

public function index(Request $request)
{
if ( Gate::denies('list_products') ) { abort(403); }
$filter = $request->all();
$warehouse = Arr::get($filter,'warehouse');
$sku = Arr::get($filter,'sku');
$name = Arr::get($filter,'name');

$products = Product::query();

if( $sku != ''){
$products =  $products->where("sku",$sku);
}

if( $name != ''){
$products =  $products->whereRaw("title_ar REGEXP '$name' ")->orwhereRaw("title_en REGEXP '$name' ");
}

if(isset($warehouse) && $warehouse != ''){
    $products =  $products->whereHas('warehouses',function($q)use($warehouse){
        $q->where('warehouse_id',$warehouse);
    });
}

$products = $products->orderBy('sku')->paginate(30);
return view('backend.pages.products.index',compact('products','filter') );
}

public function create()
{
if ( Gate::denies('create_products') ) { abort(403); }
$categories = Category::where('project_id',0)->get();
return view('backend.pages.products.create' , compact('categories') );
}

public function store(Request $request)
{
if ( Gate::denies('create_products') ) { abort(403); }
\Arr::set($request,'user_id',\Auth::user()->id);
$product = Product::create($request->all());
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_created') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/products/warehouses/' . $product->id );
}

public function edit($id)
{
if ( Gate::denies('edit_products') ) { abort(403); }
$product  = Product::where('id',$id)->first();
$categories = Category::where('project_id',0)->get();
return view('backend.pages.products.edit', compact('product','categories')  );
}

public function update(Request $request, $id)
{
if ( Gate::denies('edit_products') ) { abort(403); }
Product::find($id)->update($request->all());
$product = Product::find($id);
ResponseCache::clear();
Session::flash('msg',  trans('lang.success_updated') );
Session::flash('alert', 'success');
return Redirect(config('settings.BackendPath').'/products' );
}


public function status($id,$status)
{
if ( Gate::denies('publish_products')  ) { abort(403); }
$user = Product::find($id);
$user->status = $status;
$user->save();
ResponseCache::clear();
return back();
}

public function destroy($id)
{
if ( Gate::denies('delete_products')  ) { abort(403); }
$user = Product::find($id);
$user->delete();
ResponseCache::clear();
Session::flash('msg', ' Deleted! ' );
Session::flash('alert', 'danger');
return back();
}

public function order_list( $id , $order )
{
if ( Gate::denies('order_products')  ) { abort(403); }
$data = Product::find($id);
$data->order_list = $order ;
ResponseCache::clear();
$data ->save();
return back();
}

public function auto_search(Request $request)
{
$word = $request->get('word');
$products = Product::query();
$products =  $products->whereRaw("title_ar REGEXP '$word' ")->orwhereRaw("title_en REGEXP '$word' ");
$products = $products->take(30)->get();
return view('backend.pages.products.products_search_div',compact('products') );
}

public function download_template_excel()
{
    return Excel::download(new ProductsTemplateFileExport, 'products_template.xlsx');
}

public function download_products_excel()
{
    return Excel::download(new ProductsFileExport, 'products.xlsx');
}

public function update_products_from_xls(Request $request)
{
    ini_set('memory_limit', '-1');
    Excel::import(new ProductsFileImports(), $request->products_xls->store('temp'));
    ResponseCache::clear();
    Session::flash('msg',  trans('lang.success_updated') );
    Session::flash('alert', 'success');
    return back();

}
 


}
