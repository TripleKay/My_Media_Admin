<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //post list
    public function postList(){
        $data = Post::get();
        return response()->json([
            'status' => 'success',
            'post' => $data
        ]);
    }

    //search post
    public function searchPost(Request $request){
        $data = Post::where('title','like','%'.$request->key.'%')->get();
        return response()->json([
            'post' => $data,
        ]);
    }

    //post detail
    public function postDetail(Request $request){
        $postId = $request->postId;
        $data = Post::where('post_id',$postId)->first();
        return response()->json([
            'post' => $data,
        ]);
    }

    //related post
    public function relatedPost(Request $request){
        $post = Post::where('post_id',$request->postId)->first();
        $categoryId = $post->category_id;
        $data = Post::where('post_id','!=',$request->postId)->where('category_id',$categoryId)->get();
        return response()->json([
            'post'=> $data
        ]);
    }
}