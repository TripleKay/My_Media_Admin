<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //category list
    public function categoryList(){
        $data = Category::get();
        return response()->json([
            'status' => 'success',
            'category' => $data
        ]);
    }

    //search category
    public function searchCategory(Request $request){
        $data = Post::where('category_id','like','%'.$request->key.'%')->get();
        return response()->json([
            'post' => $data
        ]);
    }

}