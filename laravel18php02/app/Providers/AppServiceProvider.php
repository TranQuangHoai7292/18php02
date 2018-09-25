<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use Illuminate\Support\Facades\View;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('common.index.include.header_index',function($view){
            $category = Category::all();
            $content = Cart::content()->toArray();
            $total = Cart::subtotal();
            $view->with(['category'=>$category,'content'=>$content,'total'=>$total]);
        });
        View::composer('common.index.include.footer_index',function($view){
            $category = Category::all();
            $view->with('category',$category);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
