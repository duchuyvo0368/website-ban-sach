<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryProduct extends Controller
{
    public function AdminCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_category_product()
    {
        $this->AdminCheck();
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $this->AdminCheck();
        $all_category_product = DB::table('table_category_product')->paginate(6);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('pages.admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $this->AdminCheck();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('table_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->AdminCheck();
        DB::table('table_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message', 'Không kích hoạt danh mục danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }

    public function active_category_product($category_product_id)
    {
        $this->AdminCheck();
        DB::table('table_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message', 'kích hoạt danh mục danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AdminCheck();
        $edit_category_product = DB::table('table_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('pages.admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AdminCheck();
        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        DB::table('table_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message', 'Cập nhật mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AdminCheck();
        DB::table('table_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message', 'Xoá danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
}

}
