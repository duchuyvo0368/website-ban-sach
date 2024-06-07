<?php

namespace App\Http\Controllers;


use App\Order;
use App\OrderDetails;
use App\Product;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

session_start();

class ControllerCheckout extends Controller
{
    public function confirm_order(Request $request)
    {
        $this->check_login();
        $data = $request->all();


        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $customer_id = Session::get('customer_id');
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->save();


        if (Cart::content() != null) {
            foreach (Cart::content() as $key => $value) {
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $value->id;
                $order_details->product_name = $value->name;
                $order_details->product_price = number_format($value->price, 3, ".", ".");
                $order_details->product_sales_quantity = $value->qty;
                $order_details->save();
                $quantity1 = $order_details->product_sales_quantity;
                $product_id = $order_details->product_id;
               Product::where('product_id', $product_id)->update(['product_number' => 10 - $quantity1]);
            }
            Cart::destroy();
        }
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
}
