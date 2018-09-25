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
use File;

class ProductsController extends Controller
{
    public function getProductType(){
    	return view('page.products_type');
    }

        //Thêm Sản Phẩm
    public function getSignupProduct(){
        $data = Category::all();
        $type = Type_Products::all();
        return view('admin.products.signup-product',compact('data','type'));
    }
    public function postSignupProduct(Request $req){
        $this->validate($req, [
            'name'                  =>  'required',
            'color'                 =>  'required',
            'unit_price'            =>  'required',
            'promotion_price'       =>  'required',
            'file'                  =>  'required|mimes:jpeg,jpg,png,gif|max:10240',
            'textarea'              =>  'required'
        ],
        [
            'name.required'             =>  'Bạn Chưa Nhập Tên Sản Phẩm',
            'color.required'            =>  'Bạn Chưa Nhập Màu Sắc',
            'unit_price.required'       =>  'Bạn Chưa Nhập Đơn Giá',
            'promotion_price.required'  =>  'Bạn Chưa Nhập Giá Khuyến Mãi',
            'file.required'             =>  'Bạn Chưa Chọn Hình Ảnh Cho Sản Phẩm',
            'file.mimes'                =>  'Bạn Chọn File Không Đúng Định Dạng',
            'file.max'                  =>  'Dung Lượng Hình Ảnh Quá Lớn',
            'textarea'                  =>  'Bạn Chưa Nhập Giới Thiệu Sản Phẩm'
        ]);
        $product = new Products();
        $product->name              =   $req->name;
        $product->alias             =   changeTitle($req->name);
        $product->id_category       =   $req->id_category;
        $product->id_typeproducts   =   $req->product_type;
        $product->color             =   $req->color;
        $product->size              =   $req->size;
        $product->unit_price        =   $req->unit_price;
        $product->promotion_price   =   $req->promotion_price;
        $product->status            =   $req->status;
        $product->area              =   $req->textarea;
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
        return view('admin.products.manager-product',compact('data','stt','test'));
    }
    //End Quản Lý Sản Phẩm




    //Thêm Danh Mục Sản Phẩm
    public function getSignupTypeProducts(){
        return view('admin.type-products.signup-type-products');
    }
    public function postSignupTypeProducts(Request $req){        
        $typeproduct = new Type_Products();
        $cate 	     = new Category();
        if (isset($req->category) && isset($req->type_products)){
        	$this->validate($req,[
        		'category'	            =>  'unique:category,category|max:20',
                'type_products'         =>  'unique:type_products,type_products|max:20'
        	],
        	[
        		'category.unique'	    =>	'Tên Danh Mục Bạn Nhập Đã Có Xin Kiểm Tra Lại',
        		'category.max'		    =>	'Tên Danh Mục Bạn Nhập Quá Dài',
                'type_products.unique'  =>  'Tên Loại Sản Phẩm Bạn Nhập Đã Có Xin Kiểm Tra Lại',
                'type_products.max'     =>  'Tên Loại Sả Phẩm Bạn Nhập Quá Dài'
        	]);
        	$cate->category 	            =  $req->category;
            $cate->alias                    =  changeTitle($req->category);
            $typeproduct->type_products     = $req->type_products;
            $typeproduct->alias             = changeTitle($req->type_products);
            $typeproduct->save();            
        	$cate->save();
        }
        elseif (isset($req->type_products) && ($req->category == "")){             
                $this->validate($req,[
                'type_products'         =>  'unique:type_products,type_products|max:20'
            ],
            [
                'type_products.unique'  =>  'Tên Loại Sản Phẩm Bạn Nhập Đã Có Xin Kiểm Tra Lại',
                'type_products.max'     =>  'Tên Loại Sả Phẩm Bạn Nhập Quá Dài'
            ]);
            $typeproduct->type_products     = $req->type_products;
            $typeproduct->alias             = changeTitle($req->type_products);
            $typeproduct->save();
            }elseif (isset($req->category) && ($req->type_products == "")){
                $this->validate($req,[
                'category'          =>  'unique:category,category|max:20',
            ],
            [
                'category.unique'   =>  'Tên Danh Mục Bạn Nhập Đã Có Xin Kiểm Tra Lại',
                'category.max'      =>  'Tên Danh Mục Bạn Nhập Quá Dài',
            ]);
            $cate->category     =  $req->category;
            $cate->alias        =  changeTitle($req->category);
            $cate->save();
            }
        return redirect()->back()->with('success','Bạn Đã Thêm Mục Sản Phẩm Mới Thành Công');        
    }
    //End Thêm Danh Mục Sản Phẩm


    //Quản Lý Loại Sản Phẩm
    public function getManagerTypeProducts(){
    	$typeproduct 	=	Type_Products::orderByDesc('id')->paginate(5);
    	$stttype		=	1;
    	return view('admin.type-products.manager-type-products',compact('typeproduct','stttype'));
    }
    //End Quản Lý Danh Mục Sản Phẩm


    public function getManagerCategory(){
        $category = Category::orderByDesc('id')->paginate(5);
        $sttcate = 1;
        return view('admin.category.manager-category',compact('category','sttcate'));
    }


    //Chỉnh Sửa Danh Muc Sản Phẩm
    public function getEditCategory($id){
    	$data = Category::find($id);
    	return view('admin.category.edit-category',compact('data'));
    }
    public function postEditCategory(Request $req,$id){
    	$cate = Category::find($id);
    	$this->validate($req,[
    		'category'	           =>	'required|'.Rule::unique('category')->ignore($cate->id),
    	],
    	[
    		'category.required'	   =>	'Bạn Chưa Nhập Tên Danh Mục Mới'	
    	]);
    	$cate->category 	=	$req->category;
        $cate->alias        =   changeTitle($req->category);
    	$cate->save();
    	return redirect('admin/category/manager-category')->with('edit','Thay Đổi Danh Mục Thành Công');
    }
    public function getDelete($id){
        $product  = Products::where('id_category',$id)->count();
        if ($product == 0){
    	$data = Category::find($id);
    	$data->delete();
    	return redirect('admin/manager-category')->with('delete','Xóa Danh Mục Thành Công');
        }
        return redirect()->back()->with('fail-category','Bạn Không Thể Xóa Danh Mục Này Khi Vẫn Còn Sản Phẩm Trong Danh Mục');
    }
    //End Chỉnh Sửa Danh Mục Sản Phẩm


    //Chỉnh Sửa Loại Sản Phẩm
    public function getEditType($id){
        $data = Type_Products::find($id);
        return view('admin.type-products.edit-type',compact('data'));
    }
    public function postEditType(Request $req,$id){
        $typeproduct = Type_Products::find($id);
        $this->validate($req,[
            'type_products'  =>  'required|'.Rule::unique('type_products')->ignore($cate->id),
        ],
        [
            'type_products.required' =>  'Bạn Chưa Nhập Tên Danh Mục Mới'    
        ]);
        $typeproduct->type_products     =   $req->type_products;
        $typeproduct->alias             =   changeTitle($req->type_products);
        $typeproduct->save();
        return redirect('admin/type-products/manager-type-products')->with('edit','Thay Đổi Danh Mục Thành Công');
    }
    public function getDeleteType($id){
        $product  = Products::where('id_category',$id)->count();
        if ($product == 0){
        $data = Type_Products::find($id);
        $data->delete();    
        return redirect('admin/manager-type-products')->with('delete','Xóa Loại Sản Phẩm Thành Công');
        }
        return redirect()->back()->with('fail-type','Bạn Không Thể Xóa Loại Sản Phẩm Này Khi Vẫn Còn Sản Phẩm Trong Loại Sản Phẩm');
    }
    //End Chỉnh Sửa Loại Sản Phẩm


    //Chỉnh Sửa Sản Phẩm
    public function getEditProduct($id){
        $data = Products::find($id);
        $category   =   Category::all();
        $type       =   Type_Products::all();
        return view('admin.products.edit-product',compact('data','category','type'));
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
        $product->alias             =   changeTitle($req->name);
        $product->id_category       =   $req->id_category;
        $product->id_typeproducts   =   $req->product_type;
        $product->color             =   $req->color;
        $product->size              =   $req->size;
        $product->unit_price        =   $req->unit_price;
        $product->promotion_price   =   $req->promotion_price;
        $product->status            =   $req->status;
        if (isset($req->textarea)){
            $product->area              =   $req->textarea;  
        }        
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
        File::delete('styleAdmin/images/'.$data->image);
        $data->delete();        
        return redirect('admin/manager-product')->with('delete','Xóa Sản Phẩm Thành Công');
    }
    //End Xóa Sản Phẩm
}
