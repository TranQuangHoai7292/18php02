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
//Route Admin
Route::group(['prefix' => 'admin'], function(){
	Route::get('/',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@getAdmin'
	]);
	Route::post('/',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@postRegisterAdmin'
	]);
	Route::group(['prefix'=> 'manager-user'],function(){
		Route::get('/',[
			'as' => 'manager-user',
			'uses' => 'Pagecontroller@getManagerUser'
		]);
		Route::get('/edit/id={id}',[
			'as'	=>	'edit',
			'uses'	=>	'Pagecontroller@getEdit'
		]);
		Route::post('/edit/{id}',[
			'as'	=>	'edit',
			'uses'	=>	'Pagecontroller@postEdit'
		]);
		Route::get('/delete/id={id}',[
			'as'	=>	'delete',
			'uses'	=>	'Pagecontroller@getDelete'
		]);	
	});
	
	Route::get('/signup-product',[
		'as' 	=> 	'signup-product',
		'uses'	=>	'Pagecontroller@getSignupProduct'
	]);
	Route::post('/signup-product',[
		'as'	=>	'signup-product',
		'uses'	=>	'Pagecontroller@postSignupProduct'
	]);
	Route::get('/manager-products',[
		'as'	=>	'manager-products',
		'uses'	=>	'Pagecontroller@getManagerProduct'
	]);
	Route::get('/signup-type-products',[
		'as' => 'signup-type-products',
		'uses' => 'Pagecontroller@getSignupTypeProducts'
	]);
	Route::post('/signup-type-products',[
		'as'	=>	'signup-type-products',
		'uses'	=>	'Pagecontroller@postSignupTypeProducts'
	]);
});
Route::get('login',[
	'as' => 'login',
	'uses' => 'Pagecontroller@getLogin'
	]);
Route::post('login',[
	'as'	=>	'login',
	'uses'	=>	'Pagecontroller@postLogin'
]);
//Route Index
Route::group(['prefix' => 'index'],function (){
	Route::get('/',[
		'as' 	=> 	'index',
		'uses' 	=>	'Pagecontroller@getIndex'
	]);
	//Route register
	Route::get('/register',[
	'as' => 'register',
	'uses' => 'Pagecontroller@getRegister'
	]);
	Route::post('/register',[
	'as' => 'register',
	'uses' => 'Pagecontroller@postRegister'
	]);		
});
Route::get('test',function(){
	$data = App\Category::find(1)->Type_Products()->product()->get()->toArray();
	print($data);
});
