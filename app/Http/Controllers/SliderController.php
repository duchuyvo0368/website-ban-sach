<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class SliderController extends Controller
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

    public function add_slider()
    {
        $this->AdminCheck();
        return view('admin.add_slider');
    }

    public function all_slider()
    {
        $this->AdminCheck();
        $all_slider = DB::table('table_slider')->orderby('slider_id', 'asc')->get();
        return view('admin.all_slider')->with('all_slider', $all_slider);
    }

    //thêm slider
    public function save_slider(Request $request)
    {
        $this->AdminCheck();
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['slider_status'] = $request->slider_status;
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();//lay ra ten anh
            $name_image = current(explode('.', $get_name_image));//phan tach chuoi khi bawng dau cham
            $slider_format = $get_image->getClientOriginalExtension();
            $new_image = $name_image . rand(0, 99) . '.' . $slider_format;//lay ra đôi jpg...
            if ($slider_format == 'jpg') {
                $get_image->move('public/uploads/product', $new_image);
                $data['slider_image'] = $new_image;
                DB::table('table_slider')->insert($data);
                Session::put('message', 'Thêm sider thành công');
                return Redirect::to('/all-slider');
            } else {
                Session::put('message', 'Thêm slider không thành công');
                return Redirect::to('/add-slider');
            }
        }
    }

    public function unactive_slider($slider_id)
    {
        $this->AdminCheck();
        DB::table('table_slider')->where('slider_id', $slider_id)->update(['slider_status' => 1]);
        Session::put('message', 'Không kích hoạt slider thành công');
        return Redirect::to('all-slider');

    }

    public function active_slider($slider_id)
    {
        $this->AdminCheck();
        DB::table('table_slider')->where('slider_id', $slider_id)->update(['slider_status' => 0]);
        Session::put('message', 'Kích hoạt slider thành công');
        return Redirect::to('all-slider');

    }

    public function edit_slider($slider_id)
    {
        $this->AdminCheck();
        $product=DB::table('table_product')->where('product_status',0)->orderby('product_id','asc')->get();
        $edit_slider = DB::table('table_slider')->where('slider_id', $slider_id)->get();
        return view('admin.edit_slider')->with('edit_slider', $edit_slider)->with('product', $product);
    }
    public function update_slider(Request $request,$slider_id)
    {
        $this->AdminCheck();
        $data=array();
        $data['product_id'] =$request->product_id;
        $data['slider_status'] = $request->slider_status;
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();//lay ra ten anh
            $name_image = current(explode('.', $get_name_image));//phan tach chuoi khi bawng dau cham
            $slider_format = $get_image->getClientOriginalExtension();
            $new_image = $name_image . rand(0, 99) . '.' . $slider_format;//lay ra đôi jpg...
            if ($slider_format == 'jpg') {
                $get_image->move('public/uploads/product', $new_image);
                $data['slider_image'] = $new_image;
                DB::table('table_slider')->where('slider_id', $slider_id)->update($data);
                Session::put('message', 'Cập nhật sider thành công');
                return Redirect::to('/all-slider');
            }else {
                Session::put('message', 'Cập nhật slider không thành công');
                return Redirect::to('/edit-slider/'.$slider_id);
            }
        }
    }
    public function delete_slider($slider_id){
        $this->AdminCheck();
        DB::table('table_slider')->where('slider_id', $slider_id)->delete();
        Session::put('message', 'Xoá sản slider thành công');
        return Redirect::to('all-slider');
    }

}
