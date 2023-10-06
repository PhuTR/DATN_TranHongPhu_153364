<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Location;
use App\Models\Articles;
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
            $articles = Articles::orderByDesc('id')->paginate(15);



        }catch(Exception $e){

        }
        Paginator::useBootstrap();
        View::share('categoriesGlobal',$categoriesGlobal ?? []); 
        View::share('locationsCity', $locationsCity ?? []);
        View::share('articles', $articles ?? []);
    }
}
