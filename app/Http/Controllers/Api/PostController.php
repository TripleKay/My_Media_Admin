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
}