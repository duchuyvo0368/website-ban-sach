<?php


namespace App\Http\Controllers;


use App\Product;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use Illuminate\Support\Facades\Redirect;
use DB;

class ControllerNews extends Controller
{
    public function product_news($product_id)
    {
        $product = Product::where('product_id', $product_id)->where('product_status', 0)->get();
        return view('pages.news')->with('product', $product);
    }

    //tất cả tin sách
    public function all_news($category_id)
    {
        $product = Product::where('category_id', $category_id)->where('product_status', 0)->orderby('product_id', 'asc')->get();
        return view('pages.all_news')->with('all_news', $product);
    }
}
