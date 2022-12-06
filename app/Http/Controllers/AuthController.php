<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Roles;
use Auth;
class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.custom_auth.register');
    }

    public function login_auth(){
        return view('admin.custom_auth.login_auth');
    }

    public function logout_auth(){
        Auth::logout();

        return redirect('/login-auth')->with('message', 'Đăng xuất authetication thành công');
    }

    public function login(Request $request){
     
        $data = $request->validate([
        'admin_email' => 'required|email|max:255',
        
        'admin_password' => 'required',
       
       
        
    ],[ 
        'admin_email.required' => 'Vui lòng điền địa chỉ Email',
        'admin_email.email' => 'Địa chỉ Email không hợp lệ',

        'admin_password.required' => 'Vui lòng điền mật khẩu',

        
     
        
       
      
    ]
);

        if (Auth::attempt(['admin_email' => $request->admin_email,'admin_password' => $request->admin_password])){

            return redirect('/dashboard');
        } else {
            return redirect('/login-auth')->with('message', 'Đia chỉ Email hoặc Mật khẩu không đúng, vui lòng thử lại');

        }
    }
    
    public function register(Request $request){
         $this->validation($request);
         $data = $request->all();

         $admin = new Admin();
         $admin->admin_name = $data['admin_name'];
         $admin->admin_phone = $data['admin_phone'];
         $admin->admin_email = $data['admin_email'];
         $admin->admin_password = md5($data['admin_password']);
         $admin->save();

         return redirect('/register-auth')->with('message','Đăng ký tài khoản thành công');
    }

    public function validation($request){

        return $this->validate($request,[
            'admin_name' => 'required|max:255',
            'admin_phone' =>'required|max:255',
            'admin_email' =>'required|unique:tbl_admin,admin_email|max:255',
            'admin_password' =>'required|max:255',
            ]);
    }
}