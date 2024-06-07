<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductControlller extends Controller
{
    public function AdminCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function add_product()
    {
        $this->AdminCheck();
        $cate_product = DB::table('table_category_product')->orderby('category_id', 'desc')->get();//orderby sắp xếp theo id
        return view('admin.add_product')->with('cate_product', $cate_product);
    }

    public function all_product()
    {
        $this->AdminCheck();
        $all_product = DB::table('table_product')->join('table_category_product', 'table_category_product.category_id', '=', 'table_product.category_id')->paginate(4);
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('pages.admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_number'] = $request->product_number;
        $data['product_author'] = $request->product_author;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();//lay ra ten anh
            $name_image = current(explode('.', $get_name_image));//phan tach chuoi khi bawng dau cham
            $image_format=$get_image->getClientOriginalExtension();
            $new_image = $name_image . rand(0, 99) . '.' . $image_format;
            if($image_format=='jpg') {
                $get_image->move('public/uploads/product', $new_image);
                $data['product_image'] = $new_image;
                DB::table('table_product')->insert($data);
                Session::put('message', 'Thêm sản phẩm thành công');
                return Redirect::to('add-product');
            }else{
                Session::put('message', 'Thêm sản phẩm không thành công');
                return Redirect::to('add-product');
            }
        }else{
        $data['product_image'] = '';
        DB::table('table_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
        }

    }

    public function unactive_product($product_id)
    {
        $this->AdminCheck();
        DB::table('table_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }

    public function active_product($product_id)
    {
        $this->AdminCheck();
        DB::table('table_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id)
    {
        $this->AdminCheck();
        $cate_product = DB::table('table_category_product')->orderby('category_id', 'desc')->get();
        $edit_product = DB::table('table_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        return view('pages.admin_layout')->with('admin.edit_product', $manager_product);
    }

    //cập nhat sản phẩm
    public function update_product(Request $request, $product_id)
    {
        $this->AdminCheck();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_number'] = $request->product_number;
        $data['product_author'] = $request->product_author;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();//lay ra ten anh
            $name_image = current(explode('.', $get_name_image));//phan tach chuoi khi bawng dau cham
            $image_format=$get_image->getClientOriginalExtension();
            $new_image = $name_image . rand(0, 99) . '.' . $image_format;
            if ($image_format == 'jpg') {
                $get_image->move('public/uploads/product', $new_image);
                $data['product_image'] = $new_image;
                DB::table('table_product')->where('product_id', $product_id)->update($data);
                Session::put('message', 'Cập nhật phẩm thành công');
                return Redirect::to('all-product');
            } else {
                Session::put('message', 'Cập nhật sản phẩm không thành công');
                return Redirect::to('all-product');
            }
        }else{
        $data['product_image']='';
        DB::table('table_product')->where('product_id', $product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
        }
    }

    public function delete_product($product_id)
    {
        $this->AdminCheck();
        DB::table('table_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xoá sản phẩm thành công');
        return Redirect::to('all-product');
    }


}
