<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class Pagecontroller extends Controller
{
    public function getIndex(){
    	return view('page.trangchu');
    }

    public function getAdmin(){
    	return view('admin.singup-user');
    }
    public function getProductType(){
    	return view('page.products_type');
    }
    public function getManagerUser(){
    	return view('admin.manager-user');
    }
    public function postRegisterAdmin(Request $req){
        //Kiểm Tra dữ liệu nhập vào
        $this->validate($req,[
            'email'       =>'required|email|unique:users,email',
            'password'    =>'required|min:6|max:20',
            'username'    =>'required|unique:users,username',
            're_password' =>'required|same:password'
        ],
        [
            'email.required'        => "Vui Lòng Nhập Đầy Đủ Thông Tin",
            'email.email'           => "Email Bạn Nhập Không Đúng, Xin Kiểm Tra Lại",
            'email.unique'          => "Email đã có người sử dụng",
            'password.required'     =>  "Bạn Chưa Nhập Mật Khẩu",
            'password.min'          =>  "Mật Khẩu có ít nhất 6 kí tự",
            'password.max'          =>  "Mật Khẩu có nhiều nhất 20 kí tự",
            'username.required'     =>  "Vui Lòng Nhập Tên Đăng Nhập",
            'username.unique'       =>  "Tên Đăng Nhập Đã Được Sử Dụng",
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
        $users->save();
        return redirect()->back()->with('success','Tài Khoản Tạo Thành Công');
    }
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $req){

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
}

