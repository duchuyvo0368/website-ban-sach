<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Recaller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

session_start();

class ControllerCart extends Controller
{
    public function save_cart(Request $request)
    {
        $product_number=$request->soluongsp1;
        $product_id = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('table_product')->where('product_id', $product_id)->first();
        $quantity2=$product_info->product_number;
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        if($quantity <= $product_number) {
            DB::table('table_product')->where('product_id', $product_id)->get();
            Cart::add($data);
            return Redirect::to('/cart');
        }else{
            Session::put('message','Số sản phẩm tối đa là:'.$product_number);
            return Redirect::to("/product-details/".$product_id);
        }

    }

    public function delete_to_Cart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/cart');
    }

    public function cart()
    {
        $cate_product = DB::table('table_category_product')->where('category_status', 0)->orderby('category_id', 'asc')->get();
        return view('pages.cart')->with('cate_product', $cate_product);
    }

    public function check_login()
    {
        $email = Session::get('email');
        if ($email) {
            return Redirect::to('/cart');
        } else {
            return Redirect::to('/show-login');
        }
    }

    //dat hang

}
