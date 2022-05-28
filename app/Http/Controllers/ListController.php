<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //redirct index page
    public function index(){
        $data = User::get();
        return view('admin.list.index')->with(['data'=>$data]);
    }

    //delete
    public function deleteAccount($id){
        User::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>'User has been deleted...']);
    }

    //search
    public function searchAccount(Request $request){
        $data = User::where('name','like','%'.$request->search.'%')
                        ->orWhere('email','like','%'.$request->search.'%')
                        ->orWhere('phone','like','%'.$request->search.'%')
                        ->orWhere('address','like','%'.$request->search.'%')
                        ->orWhere('gender','like','%'.$request->search.'%')
                        ->get();
        return view('admin.list.index')->with(['data'=>$data]);
    }
}
