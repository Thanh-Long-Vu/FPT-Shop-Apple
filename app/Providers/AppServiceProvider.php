<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        view()->composer('userPage/layouts/menu', function ($view) {
            $categories = Category::limit(6)->get();
            $view->with(['categories' => $categories]);
        });
        view()->composer('userPage/layouts/search', function ($view) {
            $categories = Category::all();
            $view->with(['categories' => $categories]);
        });
        view()->composer('userPage/layouts/footer', function ($view) {
            $productSales = Product::where([['discount','>=',30],['is_hot','=',0]])->orderby('updated_at','desc')->limit(3)->get();
            $productHots = Product::where([['discount','>=',20],['is_hot','=',1]])->orderby('updated_at','desc')->limit(3)->get();
            $productTypeRates = Product::orderBy('point','DESC')->limit(3)->get();
            $view->with(['productSales' => $productSales,'productHots' => $productHots,'productTypeRates'=> $productTypeRates]);
        });
        view()->composer('adminPage/layouts/sidebar', function ($view) {
            $auth = auth()->user() ?? null;
            $view->with(['auth' => $auth]);
        });
        Validator::extend('currentPassword', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });
    }
}
