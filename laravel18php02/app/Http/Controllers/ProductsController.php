<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use Hash;
use App\Products;
use App\type_products;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Myquery\Myquery;

class ProductsController extends Controller
{
    public function getProductType(){
    	return view('page.products_type');
    }

        //Thêm Sản Phẩm
    public function getSignupProduct(){
        $data = Category::all();
        $type = Type_Products::all();
        return view('admin.signup-product',compact('data','type'));
    }
    public function postSignupProduct(Request $req){
        $this->validate($req, [
            'name'              =>  'required',
            'color'             =>  'required',
            'unit_price'        =>  'required',
            'promotion_price'   =>  'required',
            'file'              =>  'required|mimes:jpeg,jpg,png,gif|max:10240'
        ],
        [
            'name.required'             =>  'Bạn Chưa Nhập Tên Sản Phẩm',
            'color.required'            =>  'Bạn Chưa Nhập Màu Sắc',
            'unit_price.required'       =>  'Bạn Chưa Nhập Đơn Giá',
            'promotion_price.required'  =>  'Bạn Chưa Nhập Giá Khuyến Mãi',
            'file.required'             =>  'Bạn Chưa Chọn Hình Ảnh Cho Sản Phẩm',
            'file.mimes'                =>  'Bạn Chọn File Không Đúng Định Dạng',
            'file.max'                  =>  'Dung Lượng Hình Ảnh Quá Lớn'
        ]);
        $product = new Products();
        $product->name              =   $req->name;
        $product->alisa             =   changeTitle($req->name);
        $product->id_category       =   $req->id_category;
        $product->id_typeproducts   =   $req->product_type;
        $product->color             =   $req->color;
        $product->size              =   $req->size;
        $product->unit_price        =   $req->unit_price;
        $product->promotion_price   =   $req->promotion_price;
        $product->status            =   $req->status;
        $file = $req->file('file');
        $filename = time().'.'.$file->getClientOriginalExtension('file');
        $product->image             =   $filename;
        $file->move('styleAdmin/images',$filename);
        $product->save();
        return redirect()->back()->with('success','Thêm Sản Phẩm Thành Công');
    }
    //End Thêm Sản Phẩm



    //Quản Lý Sản Phẩm
    public function getManagerProduct(){
        $stt=1;
        $data = Category::with('type_products')->get();
        return view('admin.manager-product',compact('data','stt','test'));
    }
    //End Quản Lý Sản Phẩm




    //Thêm Danh Mục Sản Phẩm
    public function getSignupTypeProducts(){
        return view('admin.signup-type-products');
    }
    public function postSignupTypeProducts(Request $req){        
        $typeproduct = new Type_Products();
        $cate 	= new Category;
        if (isset($req->category)){
        	$this->validate($req,[
        		'category'	=>  'unique:category,category|max:20'
        	],
        	[
        		'category.unique'	=>	'Tên Danh Mục Bạn Nhập Đã Có Xin Kiểm Tra Lại',
        		'category.max'		=>	'Tên Danh Mục Bạn Nhập Quá Dài'
        	]);
        	$cate->category 	=  $req->category;
            $cate->alisa        =  changeTitle($req->category);
        	$cate->save();
            return redirect()->back()->with('success','Bạn Đã Thêm Mục Sản Phẩm Mới Thành Công');
        }
        if (isset($req->type_products)){
        	$this->validate($req,[
        		'type_products' =>  'unique:type_products,type_products|max:20'
        	],
        	[
        		'type_products.unique'	=>	'Tên Loại Sản Phẩm Bạn Nhập Đã Có Xin Kiểm Tra Lại',
        		'type_products.max'		=>	'Tên Loại Sả Phẩm Bạn Nhập Quá Dài'
        	]);
        	$typeproduct->type_products 	= $req->type_products;
            $typeproduct->alisa             = changeTitle($req->type_products);
        	$typeproduct->save();
            return redirect()->back()->with('success','Bạn Đã Thêm Mục Sản Phẩm Mới Thành Công');
        }
        return redirect()->back()->with('fail','Bạn Chưa Nhập Thông Tin Danh Mục Và Loại Sản Phẩm');
    }
    //End Thêm Danh Mục Sản Phẩm


    //Quản Lý Danh Mục Sản Phẩm
    public function getManagerTypeProducts(){
    	$category 		= 	Category::all();
    	$typeproduct 	=	Type_Products::all();
    	$sttcate 		=	1;
    	$stttype		=	1;
    	return view('admin.manager-type-products',compact('category','typeproduct','sttcate','stttype'));
    }
    //End Quản Lý Danh Mục Sản Phẩm

    //Chỉnh Sửa Danh Muc Sản Phẩm
    public function getEditCategory($id){
    	$data = Category::find($id);
    	return view('admin.edit-category',compact('data'));
    }
    public function postEditCategory(Request $req,$id){
    	$cate = Category::find($id);
    	$this->validate($req,[
    		'category'	=>	'required|'.Rule::unique('category')->ignore($cate->id),
    	],
    	[
    		'category.required'	=>	'Bạn Chưa Nhập Tên Danh Mục Mới'	
    	]);
    	$cate->category 	=	$req->category;
        $cate->alisa        =   changeTitle($req->category);
    	$cate->save();
    	return redirect('admin/manager-type-products')->with('edit','Thay Đổi Danh Mục Thành Công');
    }
    public function getDelete($id){
    	$data = Category::find($id);
    	$data->delete();
    	return redirect('admin/manager-type-products')->with('delete','Xóa Danh Mục Thành Công');
    }
    //End Chỉnh Sửa Danh Mục Sản Phẩm


    //Chỉnh Sửa Loại Sản Phẩm
    public function getEditType($id){
        $data = Type_Products::find($id);
        return view('admin.edit-type',compact('data'));
    }
    public function postEditType(Request $req,$id){
        $cate = Type_Products::find($id);
        $this->validate($req,[
            'type_products'  =>  'required|'.Rule::unique('type_products')->ignore($cate->id),
        ],
        [
            'type_products.required' =>  'Bạn Chưa Nhập Tên Danh Mục Mới'    
        ]);
        $cate->type_products     =   $req->type_products;
        $cate->alisa             =   changeTitle($req->type_products);
        $cate->save();
        return redirect('admin/manager-type-products')->with('edit','Thay Đổi Danh Mục Thành Công');
    }
    public function getDeleteType($id){
        $data = Type_Products::find($id);
        $data->delete();
        return redirect('admin/manager-type-products')->with('delete','Xóa Loại Snar Phẩm Thành Công');
    }
    //End Chỉnh Sửa Loại Sản Phẩm


    //Chỉnh Sửa Sản Phẩm
    public function getEditProduct($id){
        $data = Products::find($id);
        $category   =   Category::all();
        $type       =   Type_Products::all();
        return view('admin.edit-product',compact('data','category','type'));
    }
    public function postEditProduct(Request $req,$id){
        $product   =    Products::find($id);
        $this->validate($req, [
            'name'              =>  'required',
            'color'             =>  'required',
            'unit_price'        =>  'required',
            'promotion_price'   =>  'required',
            'file'              =>  'mimes:jpeg,jpg,png,gif|max:10240'
        ],
        [
            'name.required'             =>  'Bạn Chưa Nhập Tên Sản Phẩm',
            'color.required'            =>  'Bạn Chưa Nhập Màu Sắc',
            'unit_price.required'       =>  'Bạn Chưa Nhập Đơn Giá',
            'promotion_price.required'  =>  'Bạn Chưa Nhập Giá Khuyến Mãi',
            'file.mimes'                =>  'Bạn Chọn File Không Đúng Định Dạng',
            'file.max'                  =>  'Dung Lượng Hình Ảnh Quá Lớn'
        ]);
        $product->name              =   $req->name;
        $product->alisa             =   changeTitle($req->name);
        $product->id_category       =   $req->id_category;
        $product->id_typeproducts   =   $req->product_type;
        $product->color             =   $req->color;
        $product->size              =   $req->size;
        $product->unit_price        =   $req->unit_price;
        $product->promotion_price   =   $req->promotion_price;
        $product->status            =   $req->status;
        if ($req->hasFile('file')){
        $file = $req->file('file');
        $filename = time().'.'.$file->getClientOriginalExtension('file');
        $product->image             =   $filename;
        $file->move('styleAdmin/images',$filename);
        }
        $product->save();
        return redirect('admin/manager-product')->with('edit','Sửa Sản Phẩm Thành Công');
    }
    //End Chỉnh Sủa Sản Phẩm


    //Xóa Sản Phẩm
    public function getDeleteProduct($id){
        $data = Products::find($id);
        $data->delete();
        return redirect('admin/manager-product')->with('delete','Xóa Sản Phẩm Thành Công');
    }
    //End Xóa Sản Phẩm
}
