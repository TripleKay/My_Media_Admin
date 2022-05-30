<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class PostController extends Controller
{
    //direct index page
    public function index(){
        $data = Post::get();
        $category = Category::get();
        return view('admin.post.index')->with(['data'=>$data,'category'=>$category]);
    }

    //create post
    public function createPost(Request $request){
        //validation
        $validation = $this->postValidation($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        };


        if(!empty($request->postImage)){
            //get image
            $file = $request->file('postImage');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            //store image
            $file->move(public_path().'/postImage',$fileName);
            //get data
            $data = $this->requestPostData($request,$fileName);
        }else{
            $data = $this->requestPostData($request,NULL);
        }

        Post::create($data);
        return back();
    }

    //validation check
    private function postValidation($request){
        return Validator::make($request->all(),[
            'postTitle' => 'required',
            'categoryId' => 'required',
            'description' => 'required',
        ]);
    }

    //get request post data
    private function requestPostData($request,$fileName){
       return [
        'title' => $request->postTitle,
        'category_id' => $request->categoryId,
        'image' => $fileName,
        'description' => $request->description
       ];
    }
}