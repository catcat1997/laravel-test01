<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo 'hello cat';
});

Route::match(['get','post'],'/homes',function(){
    echo 'hello cats';
});

Route::any('/homess',function(){
    echo 'here is homess';
});

// 路由參數(必選) {xxx}
Route::any("/user/{name}",function($name){
    echo "user's name: " .$name;
});

// 可選參數 {xxx?}
Route::any("/user/{name}/said/{comment?}",function($name,$comment = 'hi'){
    echo "user's name: " .$name . " said: " . $comment;
});

// 原生php 傳url參數   // 輸入laravel80.com/geturl?id=xxx
Route::get('/getquery',function(){
    echo "url params is: " . $_GET['id'];
    
});

// 正則表達式約束
Route::get('/user/{id}/{name}', function ($id, $name) {
    echo $id . " " .$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

// 路由命名 ->name('路由命名');
Route::get('/user/profile/{page}', function ($page) {
    echo 'user profile page' . $page;
    // 生成鏈接... $url的使用
    // $url = route('user_profile',['page' => 100]);
    // echo $url;
})->name('user_profile');

// 生成鏈接...
// $url = route('user_profile');


// 如果有定義參數的命名路由，可以把參數作為 route 函數的第二個參數傳入，
// 指定的參數將會自動插入到 URL 中對應的位置：

// 生成重定向...  return redirect()->route('profile');
Route::get('/redirect',function(){
    return redirect()->route('user_profile',['page' => 100]);
});

// 如果在數組中傳遞額外的參數，這些鍵或值將自動添加到生成的 URL 的查詢字符串中：
Route::get('/redirect2',function(){
    return redirect()->route('user_profile',['page' => 100 , 'photo' => 'yes']);
});
// http://laravel80.com/user/profile/100?photo=yes

// 路由前綴 路由群組
Route::prefix('/admin')->group(function(){
    Route::get('/',function(){ echo 'main admin page';})->name('admin');
    Route::get('/users',function(){ echo 'admin/users page';});
    Route::get('/players',function(){ echo 'admin/players page';});
});

// 路由名稱前綴
// name 方法可以為路由組中每一個路由名稱添加一個指定的字符串作為前綴。例如，
// 您可以給已經分組的路徑添加 admin 的前綴。給定的字符串與指定的路由名稱前綴完全相同，
// 因此我們將確保在前綴中提 供尾部的 . 字符：
// http://laravel80.com/user  路由名是 admin.user
Route::name('admin.')->group(function () {
    Route::get('user', function () {
        // Route assigned name "admin.users"...
        echo 'admin user page';
    })->name('user');
});

// 控制器路由寫法
// use App\Http\Controllers\TestController; 一早在最上面就有了
Route::get('/home/test/test1/{id}',[TestController::class, 'test1']);
Route::get('/home/test/test1',[TestController::class, 'test1']);

// 控制器路由渲染
use App\Http\Controllers\Test3Controller;
Route::get('/test3',function(){
    echo 'test3 page';
})->name('test3');
Route::get('/home/test/test3',[Test3Controller::class, 'test3']);

// 分目錄同名控制器
use App\Http\Controllers\Home\IndexController as homeIndexController;
Route::get('home/index/index',[homeIndexController::class,'index']);
// use App\Http\Controllers\Admin\IndexController as adminIndexController;
// Route::get('admin/index/index',[adminIndexController::class,'index']);

// 另一種書寫路由控制器的方法
// 路徑@方法
Route::get('/admin/index/index', 'App\Http\Controllers\Admin\IndexController@index');

// http請求控制器
use App\Http\Controllers\httpController;
Route::get('/http/user/{id}/{page}', [httpController::class,'store']);

// 增刪查改 laravel80 數據庫
use App\Http\Controllers\CrudController;

Route::prefix('/home/test')->group(function(){
    Route::get('/add',[CrudController::class,'add']);
    Route::get('/delete/{id?}',[CrudController::class,'delete']);
    Route::get('/update',[CrudController::class,'update']);
    Route::get('/select/{id?}',[CrudController::class,'select']);
    Route::get('/selectAll',[CrudController::class,'selectAll']);
});

// views 視圖
use App\Http\Controllers\viewsExistsController;
Route::prefix('/views')->group(function(){
    Route::get('/greeting/{name1?}/{name2?}',[viewsExistsController::class,'greeting_func']);
    Route::get('/exists/{viewfile?}',[viewsExistsController::class,'views_exists']);
    // laravel的@foreach @endeach 視圖渲染
    Route::get('/foreach',[viewsExistsController::class,'laravel_foreach']);
    // laravel的@if @endif 視圖渲染
    Route::get('/if',[viewsExistsController::class,'if_else']);
    // 模板繼承/包含
    Route::get('/template',[viewsExistsController::class,'templatePage']);
    Route::get('/son',[viewsExistsController::class,'sonPage']);
});

Route::get('/home/csrf_postToReceive',[TestController::class,'csrf_postToReceive']);
Route::post('/home/csrf_receive',[TestController::class,'csrf_receive'])->name('csrf_receive');

// myModel模型的crud
use App\http\Controllers\myModelController;
Route::prefix('/home/myModel')->group(function(){
    Route::get('/add',[myModelController::class,'myModel_add']);
    Route::get('/delete',[myModelController::class,'myModel_delete']);
    Route::get('/update',[myModelController::class,'myModel_update']);

    Route::get('/update_multi',[myModelController::class,'myModel_update_multi']);
    Route::get('/select/{id?}',[myModelController::class,'myModel_select']);
    Route::get('/selectAll',[myModelController::class,'myModel_selectAll']);
    Route::get('/temp',[myModelController::class,'myModel_temp']);
});

// 自動驗證  用Route::any  (二合一方法, 自己提交給自己)
Route::any('/home/test/verify_form',[TestController::class,'verify_form']);

// 文件上傳操作 (avatar)
Route::any('/home/test/upload_avatar',[TestController::class,'upload_avatar']);

// 分頁member數據表
Route::get('/home/test/pagination',[TestController::class,'pagination']);

// 響應方法
Route::get('home/test/ajax1',[TestController::class,'ajax1']);
Route::get('home/test/ajax2',[TestController::class,'ajax2']);

// session會話控制
Route::get('home/test/session',[TestController::class,'session']);

// 緩存操作 cache
Route::get('home/test/cache',[TestController::class,'cache']);

// 聯表查詢 (left_join)
Route::get('home/test/left_join',[TestController::class,'left_join']);

// 關聯模型
// 一對一
Route::get('home/test/relationships/OneToOne',[TestController::class,'OneToOne']);
// 一對多
Route::get('home/test/relationships/OneToMany',[TestController::class,'OneToMany']);
// 多對多
Route::get('home/test/relationships/ManyToMany',[TestController::class,'ManyToMany']);