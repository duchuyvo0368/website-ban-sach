<?php


namespace App\Http\Controllers;


use App\Order;
use App\OrderDetails;
use App\Shipping;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function shipping(){
        $shipping=Shipping::orderby('shipping_id','asc')->paginate(6);
        return view('admin.shipping')->with('shipping',$shipping);
    }
    public function delete_shipping($shipping_id){
        Shipping::where('shipping_id',$shipping_id)->delete();
        return Redirect::to('/shipping');
    }
    public function order_details(){
        $order=Order::join('table_order_details','table_order_details.order_code','=','table_order.order_code')->get();
        $order_details=OrderDetails::orderby('order_details_id','asc')->paginate(6);
        return view('admin.order_details')->with('order_code',$order)->with('order_details',$order_details);
    }
    public function order(){
        $order1=Order::orderby('order_id','asc')->paginate(6);
        return view('admin.order')->with('order',$order1);
    }
}
