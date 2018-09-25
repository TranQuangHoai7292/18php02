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
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function(){
	Route::get('/',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@getAdmin'
	]);
	Route::post('/',[
	'as'   => 'signin',
	'uses' => 'Pagecontroller@postRegisterAdmin'
	]);
	Route::group(['prefix' => 'manager-category'],function (){
		Route::get('/',[
			'as'	=>	'manager-category',
			'uses'	=>	'ProductsController@getManagerCategory'
		]);
	});
	Route::group(['prefix'=>'banner'],function(){
		Route::get('/signup-banner',[
			'as'	=>	'signup-banner',
			'uses'	=>	'Pagecontroller@getSignupbanner'
		]);
		Route::post('/signup-banner',[
			'as'	=>	'signup-banner',
			'uses'	=>	'Pagecontroller@postSignupBanner'
		]);
		Route::get('manager-banner',[
			'as'	=>	'manager-banner',
			'uses'	=>	'Pagecontroller@getManagerBanner'
		]);
		Route::get('/edit/id={id}',[
			'as'	=>	'edit-banner',
			'uses'	=>	'Pagecontroller@getEditBanner'
		]);
		Route::post('edit/id={id}',[
			'as'	=>	'edit-banner',
			'uses'	=>	'Pagecontroller@postEditBanner'
		]);
		Route::get('delete/id={id}',[
			'as'	=>	'delete-banner',
			'uses'	=>	'Pagecontroller@getDeleteBanner'
		]);
	});
	Route::group(['prefix'	=>	'manager-type-products'],function(){
		Route::get('/',[
		'as'	=>	'manager-type-products',
		'uses'	=>	'ProductsController@getManagerTypeProducts'
		]);
		Route::get('/category/edit/id={id}',[
			'as'	=>	'edit-category',
			'uses'	=>	'ProductsController@getEditCategory'
		]);
		Route::post('/category/edit/id={id}',[
			'as'	=>	'edit-category',
			'uses'	=>	'ProductsController@postEditCategory'
		]);
		Route::get('/category/delete/id={id}',[
			'as'	=>	'delete',
			'uses'	=>	'ProductsController@getDelete'
		]);
		Route::get('/type/edit/id={id}',[
			'as'	=> 'edit-type',
			'uses'	=>	'ProductsController@getEditType'
		]);
		Route::post('/type/edit/id={id}',[
			'as'	=> 'edit-type',
			'uses'	=>	'ProductsController@postEditType'
		]);
		Route::get('/type/delete/id={id}',[
			'as' => 'delete-type',
			'uses' 	=>	'ProductsController@getDeleteType'
		]);
	});
	Route::group(['prefix'=> 'manager-user'],function(){
		Route::get('/',[
			'as' => 'manager-user',
			'uses' => 'UserController@getManagerUser'
		]);
		Route::get('/edit/id={id}',[
			'as'	=>	'edit',
			'uses'	=>	'UserController@getEdit'
		]);
		Route::post('/edit/id={id}',[
			'as'	=>	'edit',
			'uses'	=>	'UserController@postEdit'
		]);
		Route::get('/delete/id={id}',[
			'as'	=>	'delete',
			'uses'	=>	'UserController@getDelete'
		]);	
	});	
	Route::get('/signup-product',[
		'as' 	=> 	'signup-product',
		'uses'	=>	'ProductsController@getSignupProduct'
	]);
	Route::post('/signup-product',[
		'as'	=>	'signup-product',
		'uses'	=>	'ProductsController@postSignupProduct'
	]);

	//Quản Lý Sản Phẩm
	Route::group(['prefix'	=>	'manager-product'],function(){
		Route::get('/',[
			'as'	=>	'manager-product',
			'uses'	=>	'ProductsController@getManagerProduct'
		]);
		Route::get('/edit/id={id}',[
			'as'	=>	'edit-product',
			'uses'	=>	'ProductsController@getEditProduct'
		]);
		Route::post('/edit/id={id}',[
			'as' 	=>	'edit-product',
			'uses'	=>	'ProductsController@postEditProduct'
		]);
		Route::get('/delete/id={id}',[
			'as'	=> 	'delete-product',
			'uses'	=>	'ProductsController@getDeleteProduct'	
		]);	
	});

	//Thêm Loại Sản Phẩm
	Route::get('/signup-type-products',[
		'as' => 'signup-type-products',
		'uses' => 'ProductsController@getSignupTypeProducts'
	]);


	Route::post('/signup-type-products',[
		'as'	=>	'signup-type-products',
		'uses'	=>	'ProductsController@postSignupTypeProducts'
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
Route::get('logout',[
	'as'	=>	'logout',
	'uses'	=>	'Pagecontroller@getLogout'
]);



//Route Index
Route::group(['prefix' => 'index'],function (){
	Route::get('/',[
		'as' 	=> 	'index',
		'uses' 	=>	'IndexController@getIndex'
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
	Route::get('/{category}',[
		'as'	=>	'category',
		'uses'	=>	'IndexController@getCategory'
	]);	
	Route::get('/{category}/{type}',[
		'as'	=>	'category_type',
		'uses'	=>	'IndexController@getProductByType'
	]);		
});
Route::get('chi-tiet-san-pham/id={id}',[
		'as' => 'product',
		'uses' =>	'IndexController@getProduct'
]);
Route::get('buy/{id}',[
	'as'	=>	'buy-product',
	'uses'	=>	'IndexController@getBuyProduct'
]);
Route::get('shopping-cart',[
	'as'	=>	'shopping-cart',
	'uses'	=>	'IndexController@getShopping'
]);
Route::get('delete-shopping/{id}',[
	'as' 	=>	'delete-shopping',
	'uses'	=>	'IndexController@getDeleteShopping'
]);
Route::get('edit-shopping/{id}',[
	'as'	=>	'edit-shopping',
	'uses'	=>	'IndexController@getEditShopping'
]);
Route::get('search',[
	'as' => 'search',
	'uses' => 'IndexController@getSearch'
]);
Route::get('checkout',[
	'as'	=>	'checkout',
	'uses'	=>	'IndexController@getCheckOut'
]);
Route::post('checkout',[
	'as'	=>	'checkout',
	'uses'	=>	'IndexController@postOrder'
]);
Route::get('product',[
		'as'	=>	'product-index',
		'uses'	=>	'IndexController@getProductIndex'
]);
