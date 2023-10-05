<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Exception;
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
        try{
            $categoriesGlobal = Category::select('id','name','slug','status')->get();
            $locationsCity = Location::where('parent_id', 0)->select('id', 'name')->get();


        }catch(Exception $e){

        }
        Paginator::useBootstrap();
        View::share('categoriesGlobal',$categoriesGlobal ?? []); 
        View::share('locationsCity', $locationsCity ?? []);
    }
}
