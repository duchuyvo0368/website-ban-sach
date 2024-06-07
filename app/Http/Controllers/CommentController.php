<?php


namespace App\Http\Controllers;


use App\Comment;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class CommentController extends Controller
{
    public function comment(){
        $comment1=Comment::orderby('comment_id','asc')->where('comment_admin',null)->paginate(6);
        return view('admin.reply_to_comment')->with('comment1',$comment1);
    }
    //tra loi bình luận
    public function reply_comment(Request $request){
        $comment_id=$request->comment_id;
        $comment_product_id=$request->comment_product_id;
        $comment=$request->comment;
        $comment2=new Comment();
        $comment2->comment_admin =$comment_id;
        $comment2->comment =$comment;
        $comment2->comment_name = 'Admin';
        $comment2->comment_product_id =$comment_product_id;
        $comment2->save();
    }
    //xoá bình luận
    public function delete_comment($comment_id){
        Comment::where('comment_id',$comment_id)->delete();
        return Redirect::to('/comment');
    }

}
