<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    //search post
    public function searchPost(Request $request){
        $category = Category::get();
        $data = Post::orWhere('title','like','%'.$request->search.'%')
                    ->orWhere('description','like','%'.$request->search.'%')
                    ->get();
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
        return back()->with(['success'=>'Post updated successfully...']);
    }

    //redirect edit page
    public function editPost($id){
        $post = Post::where('post_id',$id)->first();
        $data = Post::get();
        $category = Category::get();
        return view('admin.post.edit')->with(['post'=>$post,'data'=>$data,'category'=>$category]);
    }

    //update post
    public function updatePost($id,Request $request){
        //validation
        $validation = $this->postValidation($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $data = $this->requestUpdatePostData($request);

        if(isset($request->postImage)){
            //get image
            $file = $request->file('postImage');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            //store image
            $file->move(public_path().'/postImage',$fileName);
            $data['image'] = $fileName;

            //get old image
            $post = Post::where('post_id',$id)->first();
            $oldFileName = $post->image;
            //delete old image
            if(File::exists(public_path().'/postImage/'.$oldFileName)){
                File::delete(public_path().'/postImage/'.$oldFileName);
            }
        }

        Post::where('post_id',$id)->update($data);
        return redirect()->route('admin#post')->with(['success'=>'Post updated successfully...']);
    }

    //delete post
    public function deletePost($id){
        $post = Post::where('post_id',$id)->first();
        $fileName = $post->image;

         //delete old image
        if(File::exists(public_path().'/postImage/'.$fileName)){
            File::delete(public_path().'/postImage/'.$fileName);
        }

        //delete data form db
        Post::where('post_id',$id)->delete();
        return back()->with(['success'=>'Post deleted successfully...']);
    }

    //validation check
    private function postValidation($request){
        return Validator::make($request->all(),[
            'postTitle' => 'required',
            'categoryId' => 'required',
            'description' => 'required',
        ]);
    }

    //get request update post data
    private function requestUpdatePostData($request){
        return [
            'title' => $request->postTitle,
            'category_id' => $request->categoryId,
            'description' => $request->description
           ];
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