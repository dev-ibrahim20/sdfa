<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
//
}

/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot()
{
Paginator::useBootstrap();
// Pass settings to all views
app('view')->composer('*', function ($view) {
//pass settings to all views
$settings = \App\Models\Settings::first();
//set trans to all views
\App::setLocale(LangUser());
$view->with(compact('settings'));
});





}
}
