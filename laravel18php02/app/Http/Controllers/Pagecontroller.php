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
use App\Banner;
use File;


class Pagecontroller extends Controller
{    
    public function getAdmin(){        
        return view('admin.user.singup-user');
    }
    public function postRegisterAdmin(Request $req){
        //Kiểm Tra dữ liệu nhập vào
        $this->validate($req,[
            'username'              => 'required|unique:users,username|max:20',
            'email'                 =>'required|email|unique:users,email',
            'password'              =>'required|min:6|max:20',
            're_password'           =>'required|same:password'
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
            'username'          =>  'required',
            'password'          =>  'required'
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
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
    public function getRegister(){
        return view('register');
    }
    public function postRegister(Request $req){
        $this->validate($req, [
            'email'                 =>  'required|email|unique:users,email',
            'username'              =>  'required|unique:users,username',
            'password'              =>  'required|min:6|max:20',
            're_password'           =>  'required|same:password'
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
    public function getSignupbanner(){
        return view('admin.Banner.signup-baner');
    }
    public function postSignupBanner(Request $req){
        $this->validate($req,[
            'file_slide'            =>  'required|mimes:jpeg,jpg,png,gif|max:10240'
        ],
        [
            'file_slide.required'   =>  'Bạn Chưa Nhập Hình Ảnh Banner',
            'file_slide.mimes'      =>  'Bạn Nhập Không Đúng Định Dạng',
            'file_slide.max'        =>  'Hình Ảnh Bạn Nhập Có Kích Thước Quá Lớn'
        ]);
        $banner     = new Banner();
        $file       = $req->file('file_slide');
        $filename   = time().'.'.$file->getClientOriginalExtension('file_slide');
        $banner->image             =   $filename;
        $file->move('styleAdmin/images',$filename);
        $banner->save();
        return redirect()->back()->with('success','Bạn Đã Thêm Banner Thành Công');
    }
    public function getManagerBanner(){
        $banner = banner::orderByDesc('id')->get();
        $stt    = 1;
        return view('admin.Banner.manager-banner',compact('banner','stt'));
    }
    public function getEditBanner($id){
        $banner = Banner::find($id);
        return view('admin.Banner.edit-banner',compact('banner'));
    }
    public function postEditBanner(Request $req,$id){
        $this->validate($req,[
            'file_banner'           =>  'required|mimes:jpeg,jpg,png,gif|max:10240'
        ],
        [
            'file_slide.required'   =>  'Bạn Chưa Nhập Hình Ảnh Banner',
            'file_slide.mimes'      =>  'Bạn Nhập Không Đúng Định Dạng',
            'file_slide.max'        =>  'Hình Ảnh Bạn Nhập Có Kích Thước Quá Lớn'
        ]);
        $banner         = Banner::find($id);
        $banner->image  = $req->file_banner;
        $banner->save();
        return redirect()->route('manager-banner')->with('success','Bạn Đã Thay Đổi Banner Thành Công');

    }
    public function getDeleteBanner($id){
        $banner = Banner::find($id);
        File::delete('styleAdmin/images/'.$banner->image);
        $banner->delete();        
        return redirect('admin/banner/manager-banner')->with('delete','Xóa Sản Phẩm Thành Công');

    }
}

