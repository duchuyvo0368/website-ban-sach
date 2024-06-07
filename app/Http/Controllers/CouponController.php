<?php


namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class CouponController extends Controller
{
    public function coupon(){
        $coupon=Coupon::where('coupon_id','asc');
        return view('admin.all_coupon')->with('all_coupon',$coupon);
    }
}
