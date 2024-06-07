<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\UpcomingProduct;

session_start();

class HomeController extends Controller
{
    public function index()
    {
        //$this->Check_login();
        $cate_product = DB::table('table_category_product')->where('category_id','>','4')->where('category_status', 0)->orderby('category_id', 'asc')->get();
        $all_product = DB::table('table_product')->where('product_status', 0)->orderby('product_id', 'desc')->get();
        $cate_product1 = DB::table('table_category_product')->where('category_id', 1)->get();//orderby sắp xếp theo id
        $cate_product2 = DB::table('table_category_product')->where('category_id', 2)->get();
        $cate_product3 = DB::table('table_category_product')->where('category_id', 3)->get();
        $cate_product4 = DB::table('table_category_product')->where('category_id',4)->get();
        $slider = DB::table('table_slider')->where('slider_id','<','4')->get();
        $all_product1 = DB::table('table_product')->where('product_status', 0)->where('category_id', 1)->orderby('product_id', 'desc')->limit(7)->get();
        $all_product2 = DB::table('table_product')->where('product_status', 0)->where('category_id', 2)->orderby('product_id', 'desc')->limit(7)->get();
        $all_product3 = DB::table('table_product')->where('product_status', 0)->where('category_id', 3)->limit(7)->where('product_status', 0)->orderby('product_id', 'desc')->get();
        $all_product4 = DB::table('table_product')->where('product_status', 0)->where('category_id', 4)->limit(4)->where('product_status', 0)->orderby('product_id', 'desc')->get();

        return view('pages.home')->with('category', $cate_product)->with('all_product', $all_product)->with('category1', $cate_product1)->with('category2', $cate_product2)->with('category3', $cate_product3)->with('category4', $cate_product4)->with('all_product1', $all_product1)->with('all_product2', $all_product2)->with('all_product3', $all_product3)->with('all_product4', $all_product4)->with('slider',$slider);
    }

    public function show($category_id)
    {
        $product_portfolio = DB::table('table_product')->where('category_id', $category_id)->where('product_status', 0)->orderby('product_id', 'desc')->paginate(12);
        return view('pages.product_portfolio')->with('product_portfolio', $product_portfolio);
    }

    public function show_login()
    {
        return view('pages.form_login');
    }

    public function show_signup()
    {
        return view('pages.form_signup');
    }

    public function form_signup(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['password'] = md5($request->password);
        $enter_the_pass = md5($request->enter_the_password);
        if (blank($data) && $data['password'] == $enter_the_pass) {
                DB::table('tbl_login')->insert($data);
                Session::put('message', 'Đăng kí thành công');
                return Redirect::to('/show-login');
        } else {
            Session::put('message', 'Đăng kí không thành công');
            return Redirect::to('/show-signup');
        }
    }

    public function form_login(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        //lấy dữ liêu từ database và kiểm tra
        $result = DB::table('tbl_login')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('email', $result->email);
            Session::put('customer_id', $result->customer_id);
            Session::put('name', $result->name);
            return Redirect::to('/trangchu');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không chính xác');
            return Redirect::to('/show-login');
        }
    }

    //check đăng nhập
    public function Check_login()
    {
        $email = Session::get('email');
        if ($email) {
            return Redirect::to('/trangchu');
        } else {
            return Redirect::to('/show-login');
        }
    }
    //slider

    //tim kiếm sản phẩm theo tên và theo giá
    public function product_search(Request $request)
    {
        $keywords = $request->keywords;
        if(!empty($keywords)) {
            $product_search = Product::where('product_name', 'like', '%' . $keywords . '%')->orWhere('product_price', $keywords)->where('product_status', 0)->paginate(12);
            return view('pages.product_search')->with('product_search', $product_search);
        }else{
            return Redirect::to('trangchu');
        }
    }

    //đăng xuất
    public function log_out()
    {
        $this->Check_login();
        Session::put('email', null);
        Session::put('customer_id', null);
        Session::put('name', null);
        return Redirect::to('/trangchu');
    }

}
