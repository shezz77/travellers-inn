<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 9/27/2017
 * Time: 6:14 PM
 */

namespace App\Http\Controllers\Api;



use Illuminate\Routing\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function getcomment($id)
    {
        $comment= Comment::where('post_id', $id)->get();
        $status = false;
        if($status = true) {
            return response(['TotalComment' => $comment->count(),'status'=>true, 'error'=>true, 'message'=>"Comment fetched successfully !", 'categoryDataSet' => $comment,], 200);

        }
        else
            return response(['error'=>false , 'status'=>$status,'message'=>"Comment not found"]);
    }
}