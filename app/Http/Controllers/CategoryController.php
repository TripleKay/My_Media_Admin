<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //redirect index page
    public function index(){
        $data = Category::get();
        return view('admin.category.index')->with(['data'=>$data]);
    }

    //create category
    public function createCategory(Request $request){
        $validation = $this->categoryValidation($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->back()->with(['success'=>'Category added successfully...']);
    }

    //edit category
    public function editCategory($id){
        $data = Category::get();
        $category = Category::where('category_id',$id)->first();
        return view('admin.category.edit')->with(['category'=>$category,'data'=>$data]);
    }

     //update category
     public function updateCategory(Request $request,$id){
        $validation = $this->categoryValidation($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }
        $data = $this->requestCategoryData($request);
        Category::where('category_id',$id)->update($data);
        return redirect()->route('admin#category')->with(['success'=>'Category updated successfully...']);
    }

    //validate check
    private function categoryValidation($request){
        return Validator::make($request->all(),[
            'categoryName' => 'required',
            'description' => 'required'
        ]);
    }

    //get request category data
    private function requestCategoryData($request){
        return [
          'title' => $request->categoryName,
          'description' => $request->description
        ];

   }
}