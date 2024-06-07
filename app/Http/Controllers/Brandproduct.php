<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class Brandproduct extends Controller
{
    public function AdminCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_brand_product()
    {
        $this->AdminCheck();
        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AdminCheck();
        $all_brand_product = DB::table('table_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('pages.admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        $this->AdminCheck();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('table_brand_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-brand-product');
    }

    public function unactive_category_product($brand_product_id)
    {
        $this->AdminCheck();
        DB::table('table_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message', 'Không kích hoạt danh mục danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }

    public function active_brand_product($brand_product_id)
    {
        $this->AdminCheck();
        DB::table('table_brand_product')->where('category_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message', 'kích hoạt danh mục danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AdminCheck();
        $edit_brand_product = DB::table('table_brand_product')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('pages.admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_category_product(Request $request,$brand_product_id){
        $this->AdminCheck();
        $data=array();
        $data['brand_product_name']=$request->brand_product_name;
        $data['brand_product_desc']=$request->brand_product_desc;
        DB::table('table_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message', 'Cập nhật mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AdminCheck();
        DB::table('table_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message', 'Xoá danh mục sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }
}
