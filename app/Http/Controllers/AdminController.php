<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function AdminCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function index(){
        return view('pages.admin_login');
    }
    public function show_dashboard(){
        $this->AdminCheck();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        //lấy dữ liêu từ database và kiểm tra
        $result = DB::table('tbl_admin')-> where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if ($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Bạn nhập sai mật khẩu hoặc tài khoản');
            return Redirect::to('/admin');
        }

    }
    public function logout(){
        $this->AdminCheck();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
