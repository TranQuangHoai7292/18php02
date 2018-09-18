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

class UserController extends Controller
{
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
}
