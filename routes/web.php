<?php
/*
 * @Author: your name
 * @Date: 2021-10-27 01:41:42
 * @LastEditTime: 2021-11-05 14:53:58
 * @LastEditors: your name
 * @Description: 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 * @FilePath: /practiceProject/routes/web.php
 */

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
// 例如访问/home地址则路由可以写成
// Route::get('/home', function() {
// echo "hello";
// });

// 必选参数
// Route::get('/test3/{id}', function ($id) {
//    echo "当前用户id为" . $id ;
// });

//Admin测试文件路由
// Route::get('/admin/index/index', 'Admin\IndexController@index');
//根路由
// Route::get('/', function () {
//     return view('welcome');
// });


//homepage
Route::group(['middleware'=>['web']], function () {
    Route::get('/', 'Admin\IndexController@index');
});


//group route for login
Route::group(['prefix'=>'admin'], function () {
    Route::get('/login', 'Admin\LoginController@login')->name('login');
    Route::resource('user', 'Admin\UserController');
    Route::resource('/user/{user}', 'Admin\UserController');
});
//
// Route::group(['prefix' =>'users','namespace' => 'Admin'], function(){
//     Route::post('/home', '\LoginController@code');
//     Route::any('/crypt', '\LoginController@crypt');
//     Route::get('/register', '\LoginController@register');
// });

Route::group(['middleware' => ['web', 'login.check'],'prefix'=>'admin', 'namespace'=> 'Admin'], function () {
    Route::any('/homepage', 'LoginController@receive')->name('homepage');
    Route::any('/exit', 'LoginController@exit');
});



// Route::get('/admin/index/loop', 'Admin\IndexController@loop')->name('loop');

//if there is no such directory or route, fallback to /
Route::fallback(function () {
    return redirect('/');
});

//thisaosfoiad
