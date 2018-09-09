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

class Pagecontroller extends Controller
{
    public function getIndex(){
    	$datanew = DB::table('products')->orderBy('id','DESC')->skip(0)->take(4)->get();
        $data    = DB::table('products')->orderBy('id','DESC')->get();
    	return view('page.trangchu',compact('data','datanew'));
    }    
    public function getProductType(){
    	return view('page.products_type');
    }
    public function getAdmin(){        
        return view('admin.singup-user');
    }
    public function getManagerUser(){
        $data   =   User::all();
        $stt    =   1;
        $count  =   DB::table('users')->count();
    	return view('admin.manager-user',compact('data','stt','count'));
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.edit-user',compact('user'));
    }
    public function postEdit(Request $req,$id){
        $users = User::find($id);
        $this->validate($req,[
            'email' =>  'required|email|'.Rule::unique('users')->ignore($users->id),
            'name'  =>  'required',
            'phone' =>  'required',
            'address'   =>  'required'
        ],
        [
            'email.required'    =>  'Bạn Chưa Nhập Mật Khẩu Cần Thay Đổi',
            'email.unique'      =>  'Email đã có người sử dụng',
            'name.required'     =>  'Bạn Chưa Nhập Tên Cần Thay Đổi',
            'phone.required'    =>  'Bạn Chưa Nhập Số Điện Thoại Cần Thay Đổi',
            'address.required'  =>  'Bạn Chưa Nhập Địa Chỉ Cần Chỉnh Sửa'
        ]);
        $users->name     = $req->name;
        $users->phone    = $req->phone;
        $users->address  = $req->address;
        $users->role     = $req->role;
        if(isset($req->password)){
            $this->validate($req,[
                'password'      =>  'min:6|max:20',
                're_password'   =>  'same:password'
            ],
            [
                'password.min'  =>  'Mật Khẩu Bạn Nhập Quá Ngắn',
                'password.max'  =>  'Mật Khẩu Bạn Nhập Quá Dài',
                're_password.same'  =>  'Mật Khẩu Nhập Lại Không Đúng'
            ]);
            $users->password    =   Hash::make($req->password);
        }
        $users->save();
        return redirect('admin/manager-user')->with('success','Thay Đổi Thông Tin Thành Công');
    }
    public function getDelete($id){
        $users  =   User::find($id);
        $users->delete();
        return redirect('admin/manager-user')->with('delete','Xóa Thành Viên Thành Công');
    }
    public function getSignupProduct(){
        return view('admin.signup-product');
    }
    public function getManagerProduct(){
        $data = Products::all();
        $stt=1;
        return view('admin.manager-product',compact('data','stt'));
    }
    public function postSignupProduct(Request $req){
        $this->validate($req, [
            'name'              =>  'required',
            'color'             =>  'required',
            'size'              =>  'required',
            'unit_price'        =>  'required|max:8',
            'promotion_price'   =>  'required|max:8',
            'file'              =>  'required|mimes:jpeg,jpg,png,gif|max:10240'
        ],
        [
            'name.required'             =>  'Bạn Chưa Nhập Tên Sản Phẩm',
            'color.required'            =>  'Bạn Chưa Nhập Màu Sắc',
            'size.required'             =>  'Bạn Chưa Nhập Size',
            'unit_price.required'       =>  'Bạn Chưa Nhập Đơn Giá',
            'promotion_price.required'  =>  'Bạn Chưa Nhập Giá Khuyến Mãi',
            'file.required'             =>  'Bạn Chưa Chọn Hình Ảnh Cho Sản Phẩm',
            'file.mimes'                =>  'Bạn Chọn File Không Đúng Định Dạng',
            'file.max'                  =>  'Dung Lượng Hình Ảnh Quá Lớn'
        ]);
        $product = new Products();
        $product->name              =   $req->name;
        $product->color             =   $req->color;
        $product->size              =   $req->size;
        $product->unit_price        =   $req->unit_price;
        $product->promotion_price   =   $req->promotion_price;
        $product->id_type           =   $req->product_type;
        $file = $req->file('file');
        $filename = time().'.'.$file->getClientOriginalExtension('file');
        $product->image             =   $filename;
        $file->move('styleAdmin/images',$filename);
        $product->save();
        return redirect()->back()->with('success','Dang Thong Tin San Pham Thanh Cong');
    }

    public function postRegisterAdmin(Request $req){
        //Kiểm Tra dữ liệu nhập vào
        $this->validate($req,[
            'username'    => 'required|unique:users,username|max:20',
            'email'       =>'required|email|unique:users,email',
            'password'    =>'required|min:6|max:20',
            're_password' =>'required|same:password'
        ],
        [   
            'username.required'     =>  "Vui Lòng Điền Tên Đăng Nhập",
            'username.unique'       =>  "Tên Đăng Nhập Đã Được Sử Dụng",
            'username.min'          =>  "Tên Đăng Nhập Của Bạn Quá Ngắn",
            'username.max'          =>  "Tên Đăng Nhập Của Bạn Quá Dài",
            'email.required'        =>  "Vui Lòng Nhập Đầy Đủ Thông Tin",
            'email.email'           =>  "Email Bạn Nhập Không Đúng, Xin Kiểm Tra Lại",
            'email.unique'          =>  "Email đã có người sử dụng",
            'password.required'     =>  "Bạn Chưa Nhập Mật Khẩu",
            'password.min'          =>  "Mật Khẩu có ít nhất 6 kí tự",
            'password.max'          =>  "Mật Khẩu có nhiều nhất 20 kí tự",
            're_password.required'  =>  "Bạn Chưa Nhập Lại Mật Khẩu",
            're_password.same'      =>  "Bạn Nhập Lại Mật Khẩu Không Đúng"
        ]);
        $users = new User();
        $users->username = $req->username;
        $users->email    = $req->email;
        $users->password = Hash::make($req->password);
        $users->name     = $req->name;
        $users->phone    = $req->phone;
        $users->address  = $req->address;
        $users->role     = $req->role;
        $users->save();
        return redirect()->back()->with('success','Tài Khoản Tạo Thành Công');
    }
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $req){
        $this->validate($req,[
            'username'  =>  'required',
            'password'  =>  'required'
        ],
        [
            'username.required' =>  'Bạn Chưa Nhập Tên Đăng Nhập',
            'password.required' =>  'Bạn Chưa Nhập Mật Khẩu'
        ]);
        if(Auth::attempt(['username' => $req->username,'password' => $req->password])){
            $user = User::whereraw('username = ?',[$req->username])->get();
            foreach ($user as $us) {            
                if($us->role == 1){
                return redirect()->route('signin');
                }else{            
                return redirect()->route('index');
                }
            }
        }else{
            return redirect()->back()->with('fail','Tên Đăng Nhập Hoặc Mật Khẩu Bạn Nhập Không Đúng');
        }

    }
    public function getRegister(){
        return view('register');
    }
    public function postRegister(Request $req){
        $this->validate($req, [
            'email'         =>  'required|email|unique:users,email',
            'username'      =>  'required|unique:users,username',
            'password'      =>  'required|min:6|max:20',
            're_password'   =>  'required|same:password'
        ],
        [   'email.required'        =>  'Vui Lòng Nhập Đầy Đủ Email',
            'email.email'           =>  'Bạn Nhập Không Đúng Cú Pháp',
            'email.unique'          =>  'Email Đã Có Người Sử Dụng',
            'username.required'     =>  'Vui Lòng Nhập Tên Đăng Nhập',
            'username.unique'       =>  'Tên Đăng Nhập Đã Có Người Sử Dụng',
            'password.required'     =>  'Bạn Chưa Nhập Mật Khẩu',
            'password.min'          =>  'Mật Khẩu Tối Thiểu là 6 Ký Tự',
            'password.max'          =>  'Mật Khẩu Tối Đa là 20 Ký Tự',
            're_password.required'  =>  'Nhập Lại Mật Khẩu Không Chính Xác'

        ]);
        $users = new User();
        $users->username = $req->username;
        $users->email    = $req->email;
        $users->password = Hash::make($req->password);
        $users->name     = $req->name;
        $users->phone    = $req->phone;
        $users->address  = $req->address;
        $users->save();
        return redirect()->back()->with('success','Bạn Đã Đăng Ký Thành Công');  
    }
    public function getSignupTypeProducts(){
        return view('admin.signup-type-products');
    }
    public function postSignupTypeProducts(Request $req){
        $this->validate($req, [
            'items' =>  'required|unique:type_products,items|max:20',
            'typeproducts' =>  'required|unique:type_products,type_products|max:20'
        ],
        [
            'items.required'    =>  'Bạn Chưa Nhập Mục Sản Phẩm Mới',
            'items.unique'      =>  'Mục Sản Phẩm Đã Có Xin Hãy Kiểm Tra Lại',
            'items.max'         =>  'Mục Sản Phẩm Bạn Nhập Quá Dài',
            'typeproducts.required'    =>  'Bạn Chưa Nhập Loại Sản Phẩm',
            'typeproducts.unique'      =>  'Loại Sản Phẩm Này Đã Có Xin Hãy Kiểm Tra Lại',
            'typeproducts.max'         =>  'Loại Sản Phẩm Bạn Nhập Quá Dài'
        ]);
        $typeproducts = new type_products();
        $typeproducts->items   =   $req->items;
        $typeproducts->type_products   =   $req->typeproducts;
        $typeproducts->save();
        return redirect()->back()->with('success','Bạn Đã Thêm Mục Sản Phẩm Mới Thành Công');
    }

}

