<?php

namespace App\Http\Controllers;

use App\Comment;
use http\Url;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductDetails extends Controller
{

    public function product_details($product_id)
    {
        $product_details = DB::table('table_product')->where('product_id', $product_id)->where('product_status', 0)->get();
        foreach ($product_details as $key => $value) {
            $category_id = $value->category_id;
        }
        $related_details = DB::table('table_product')->where('category_id', $category_id)->where('product_status', 0)->limit(7)->get();
        return view('pages.product_details')->with('product_details', $product_details)->with('related', $related_details);
    }

    public function send_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->save();
    }

    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id', $product_id)->get();
        $output = '';
        foreach ($comment as $key => $comm) {
            //if(isset($comm->comment_admin))
            if ($comm->comment_admin==null) {
                $output .= '<div style="margin-top: 10px">
                           <div class="col-md-5" style="display: inline-flex">
                             <img style="width: 40px;height: 30px;" src="' . url('/public/frontend/images/icon.png ') . '" class="img img-responsive">
                             <h5 style="color: red;margin-top: 2px">' . $comm->comment_name . '</h5>
                           </div>
                           <div class="col-md-7">
                                <p style="font-style: italic;margin-left: 10px;">' . $comm->comment_date . '</p>
                                <p style="color: black;margin-left: 35px;margin-top: -10px">-' . $comm->comment . '</p>
                           </div>

                        </div><p></p>';
            } else {
                $output .= '<div style="margin-top: 10px">
                           <div class="col-md-5" style="display: inline-flex">
                             <img style="width: 40px;height: 30px;margin-left: 70px" src="' . url('/public/frontend/images/icon-admin.png ') . '" class="img img-responsive">
                             <h5 style="color: red;margin-left: 10px">' . $comm->comment_name . '</h5>
                           </div>
                           <div class="col-md-7">
                                <p style="font-style: italic;margin-left: 80px;">' . $comm->comment_date . '</p>
                                <p style="color: black;margin-left: 100px;margin-top: -10px">-' . $comm->comment . '</p>
                           </div>

                        </div><p></p>';
            }
        }
        echo $output;
    }
}
