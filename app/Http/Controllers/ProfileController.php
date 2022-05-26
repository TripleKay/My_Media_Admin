<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //redirect to dashboard
    public function index(){
        return view('admin.profile.index');
    }
}