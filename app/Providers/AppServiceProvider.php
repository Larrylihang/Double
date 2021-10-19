<?php
/*
 * @Author: your name
 * @Date: 2018-01-03 16:52:15
 * @LastEditTime: 2021-10-18 14:26:10
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /practiceProject/app/Providers/AppServiceProvider.php
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
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
