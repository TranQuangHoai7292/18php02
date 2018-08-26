<?php

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
/*Route::group('prefix' => 'schema', function(){
	//Tạo Bảng.
	Route::get('ten-bang',function (){
		Schema::create('ten-bang',function ($table){
			$table->string('name');
			$table->timestamps();
		});
	});
	//Thay Đổi Tên Bảng.
	Route::get('rename',function (){
		Schema::rename('ten-bang-hien-tai','ten-bang-thay-doi');
	});
	//Xóa Bảng.
	Route::get('drop-exists',function (){
		Schema::dropIfExists('ten-bang-muon-xoa');
	});
	//Thay Đổi Thuộc Tính Cột
	Route::get('change-col',function (){
		Schema::table('ten-bang',function ($table){
			$table->string('cot-thay-doi','thuoc-tinh-cot')->change();
		});
	});
	//Xóa 1 cột trong bảng.
	Route::get('drop-col',function (){
		Schema::table('ten-bang',function ($table){
			$table->dropColumn('cot-muon-xoa-1','cot-muon-xoa-2','...');
		});
	});
	//Tạo Khóa Ngoại xóa dữ liệu con khi xóa khóa chính.
	Route::get('create-product',function (){
		Schema::create('product',function ($table){
			$table->increments('id');
			$table->string('name');
			$table->foreign('cate_id')->reference('id')->on('category')->onDelete('cascade');
			$table->timestamps();
		});
	});
}); */
Route::get('schema/create',function (){
	Schema::create('ten-bang',function($table){
		$table->string('ten-cot');
		$table->timestamps();
	});
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('index','Pagecontroller@getIndex');

Route::get('admin',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@getAdmin'
]);
//Đăng Ký
Route::post('admin',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@postRegisterAdmin'
]);
//Đăng Nhập
Route::get('login',[
	'as' => 'login',
	'uses' => 'Pagecontroller@getLogin'
]);
Route::post('login',[
	'as'   => 'login',
	'uses' => 'Pagecontroller@postLogin'
]);
//Đăng ký
Route::get('register',[
	'as' => 'register',
	'uses' => 'Pagecontroller@getRegister'
]);
Route::post('register',[
	'as' => 'register',
	'uses' => 'Pagecontroller@postRegister'
]);


