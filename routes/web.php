<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Frontend\AccreditationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();
Route::group( ['middleware' => ['doNotCacheResponse'] ], function () {
Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/cities/order/test', 'App\Http\Controllers\Backend\CitiesController@showTest');

Route::post('/cities/order/add', 'App\Http\Controllers\Backend\CitiesController@createShipment');
//'middleware' => ['admin','doNotCacheResponse']

Route::group( ['prefix' => config('settings.BackendPath') , 'middleware' => ['admin','doNotCacheResponse'] , 'namespace' => 'App\Http\Controllers\Backend' , ], function () {
Route::get('/', 'HomeController@index');

//Users
Route::resource('/users', 'UsersController');
Route::get('/users/status/{id}/{status}', 'UsersController@status');
Route::get('/users/delete/{id}', 'UsersController@destroy');
Route::get('/users/login_as/{id}', 'UsersController@login_as');
Route::get('switch-language/{language}', 'UsersController@switch_language');
Route::get('switch-data-view/{type}', 'UsersController@switch_data_view_type');
//Roles
Route::resource('roles', 'RolesController');
Route::get('/roles/status/{id}/{status}', 'RolesController@status');
Route::get('/roles/delete/{id}', 'RolesController@destroy');
//translate
Route::get('/translate', 'TranslateController@index');
Route::get('/translate/{lang}', 'TranslateController@edit');
Route::post('/translate/{lang}', 'TranslateController@update');
//clear cache & settings
Route::get('/clear-cache', 'SettingsController@clear_cache');
Route::get('/general-settings', 'SettingsController@index');
Route::post('/general_settings', 'SettingsController@update');

//reports
Route::get('/reports', 'ReportsController@reports');
Route::get('/reports/sample_report/sample_report_print', 'ReportsController@sample_report_print');
Route::get('/reports/sample_report', 'ReportsController@sample_report');



//projects
Route::resource('projects', 'ProjectsController');
Route::get('/projects/status/{id}/{status}', 'ProjectsController@status');
Route::get('/projects/delete/{id}', 'ProjectsController@destroy');
Route::get('/projects/order/{id}/{order}', 'ProjectsController@order_list');
Route::get('/projects/update_stage/{id}/{stage}', 'ProjectsController@update_stage');

//project vendor products
Route::get('/projects/vendors-products/{id}', 'ProjectsController@vendors_products');
Route::post('/projects/add_product_to_project', 'ProjectsController@add_product_to_project')->name('add_product_to_project');
Route::post('/projects/delete_product_from_project', 'ProjectsController@delete_product_from_project')->name('delete_product_from_project');


//buildings
Route::resource('buildings', 'BuildingsController');
Route::get('/buildings/status/{id}/{status}', 'BuildingsController@status');
Route::get('/buildings/delete/{id}', 'BuildingsController@destroy');
Route::get('/buildings/order/{id}/{order}', 'BuildingsController@order_list');
Route::get('/buildings/update_stage/{id}/{stage}', 'BuildingsController@update_stage');

Route::get('/buildings/floor_tasks/{id}', 'BuildingsController@floor_tasks');
Route::post('/buildings/set_floor_progress', 'BuildingsController@set_floor_progress')->name('set_floor_progress');

//uploads building xls
Route::post('/buildings/upload_xls/{id}', 'BuildingsController@upload_xls');
Route::get('/buildings/report/{id}', 'BuildingsController@xls_report');
Route::get('/buildings/print-report/{id}', 'BuildingsController@print_report');

//job orders
Route::resource('job-orders', 'JobOrdersController');
Route::get('/job-orders/status/{id}/{status}', 'JobOrdersController@status');
Route::get('/job-orders/delete/{id}', 'JobOrdersController@destroy');
Route::get('/job-orders/order/{id}/{order}', 'JobOrdersController@order_list');
Route::get('/job-orders/update_stage/{id}/{stage}', 'JobOrdersController@update_stage');
Route::get('/job-orders/products/{id}', 'JobOrdersController@products');
Route::post('/job-orders/add_product_to_job_order', 'JobOrdersController@add_product_to_job_order')->name('add_product_to_job_order');
Route::post('/job-orders/delete_product_from_job_order', 'JobOrdersController@delete_product_from_job_order')->name('delete_product_from_job_order');
Route::post('/job_orders/add_file', 'JobOrdersController@add_file')->name('job_orders.add_file');
Route::get('/job_orders/list_files/{id}', 'JobOrdersController@list_files');

//tasks
Route::get('/job-orders/tasks/{id}', 'JobOrdersController@tasks');
Route::get('/tasks/{id}', 'JobOrdersController@sub_tasks');
Route::get('/task/{id}/edit', 'JobOrdersController@sub_tasks_edit');
Route::post('/update_task/{id}', 'JobOrdersController@sub_tasks_update');
Route::get('/task_update_stage/{id}/{stage}', 'JobOrdersController@task_update_stage');



//warehouses
Route::get('/warehouses/{project_id?}', 'WarehousesController@index');
Route::get('/warehouses/create/{project_id?}', 'WarehousesController@create');
Route::post('/warehouses/store', 'WarehousesController@store')->name('warehouse_store');
Route::get('/warehouses/{id}/edit', 'WarehousesController@edit');
Route::post('/warehouses/update/{id}', 'WarehousesController@update')->name('warehouse_update');
Route::get('/warehouses/status/{id}/{status}', 'WarehousesController@status');
Route::get('/warehouses/delete/{id}', 'WarehousesController@destroy');
Route::get('/warehouses/order/{id}/{order}', 'WarehousesController@order_list');
Route::get('/warehouses/products/{warehouse_id}', 'WarehousesController@warehouse_products');


//warehouses products
Route::get('/products/warehouses/{id}', 'WarehousesController@warehouses');
Route::post('/products/warehouses/update/{id}', 'WarehousesController@warehouses_update')->name('product_warehouses_update');


//warehouses transaction
Route::get('/warehouses/transactions/{id}', 'WarehousesController@transactions');
Route::post('/warehouses/add_product_to_transaction', 'WarehousesController@add_product_to_transactions')->name('add_product_to_transactions');
Route::post('/warehouses/delete_product_from_project', 'WarehousesController@delete_product_from_transactions')->name('delete_product_from_transactions');

//products
Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products/store', 'ProductsController@store')->name('product_store');
Route::get('/products/{id}/edit', 'ProductsController@edit');
Route::post('/products/update/{id}', 'ProductsController@update')->name('product_update');
Route::get('/products/status/{id}/{status}', 'ProductsController@status');
Route::get('/products/delete/{id}', 'ProductsController@destroy');
Route::get('/products/auto_search', 'ProductsController@auto_search')->name('products.auto_search');

//vendors
Route::resource('vendors', 'VendorsController');
Route::get('/vendors/status/{id}/{status}', 'VendorsController@status');
Route::get('/vendors/delete/{id}', 'VendorsController@destroy');

//contractors
Route::resource('contractors', 'ContractorsController');
Route::get('/contractors/status/{id}/{status}', 'ContractorsController@status');
Route::get('/contractors/delete/{id}', 'ContractorsController@destroy');
Route::post('/contractors/add_rating', 'ContractorsController@add_rating')->name('contractors.add_rating');
Route::get('/contractors/list_comments/{id}', 'ContractorsController@list_comments');
Route::post('/contractors/add_file', 'ContractorsController@add_file')->name('contractors.add_file');
Route::get('/contractors/list_files/{id}', 'ContractorsController@list_files');



//categories
Route::resource('categories', 'CategoriesController');
Route::get('/categories/status/{id}/{status}', 'CategoriesController@status');
Route::get('/categories/delete/{id}', 'CategoriesController@destroy');
Route::get('/categories/sub_categories/{id}', 'CategoriesController@sub_categories');


//categories
Route::resource('units', 'UnitsController');
Route::get('/units/status/{id}/{status}', 'UnitsController@status');
Route::get('/units/delete/{id}', 'UnitsController@destroy');

//xls 
Route::get('/products/download_xls', 'ProductsController@download_template_excel')->name('download_template_excel');
Route::get('/products/download_products_xls', 'ProductsController@download_products_excel')->name('download_products_excel');
Route::post('/products/update_products_from_xls', 'ProductsController@update_products_from_xls')->name('update_products_from_xls');

//project_stages
Route::resource('project_stages', 'ProjectStagesController');
Route::get('/project_stages/status/{id}/{status}', 'ProjectStagesController@status');
Route::get('/project_stages/delete/{id}', 'ProjectStagesController@destroy');
Route::get('/project_stages/order/{id}/{order}', 'ProjectStagesController@order_list');

//building tasks
Route::resource('building_tasks', 'BuildingTasksController');
Route::get('/building_tasks/status/{id}/{status}', 'BuildingTasksController@status');
Route::get('/building_tasks/delete/{id}', 'BuildingTasksController@destroy');
Route::get('/building_tasks/order/{id}/{order}', 'BuildingTasksController@order_list');


//building floors
Route::resource('building_floors', 'BuildingFloorsController');
Route::get('/building_floors/status/{id}/{status}', 'BuildingFloorsController@status');
Route::get('/building_floors/delete/{id}', 'BuildingFloorsController@destroy');
Route::get('/building_floors/order/{id}/{order}', 'BuildingFloorsController@order_list');

//activity log 
Route::get('/activity', 'HomeController@activity_log')->name('activity_log');

//cities
Route::resource('cities', 'CitiesController');
Route::get('/cities/status/{id}/{status}', 'CitiesController@status');
Route::get('/cities/delete/{id}', 'CitiesController@destroy');
Route::get('/cities/order/{id}/{order}', 'CitiesController@order_list');

//samplings
Route::resource('samplings', 'SamplingController');
Route::get('/samplings/status/{id}/{status}', 'SamplingController@status');
Route::get('/samplings/delete/{id}', 'SamplingController@destroy');
Route::get('/samplings/order/{id}/{order}', 'SamplingController@order_list');

Route::get('/samplings/closed/{id}/{closed}', 'SamplingController@updateClosed');
Route::get('/samplings/status_order/{id}/{status}', 'SamplingController@updateStatusOrder');


Route::get('/samplings/get-cities/{sector_id}', 'SamplingController@getCities')->name('get-cities');
Route::get('/samplings/get-workplaces/{city_id}', 'SamplingController@getWorkplaces')->name('get-workplaces');

//workplaces
Route::resource('workplaces', 'WorkplacesController');
Route::get('/workplaces/status/{id}/{status}', 'WorkplacesController@status');
Route::get('/workplaces/delete/{id}', 'WorkplacesController@destroy');
Route::get('/workplaces/order/{id}/{order}', 'WorkplacesController@order_list');
});

