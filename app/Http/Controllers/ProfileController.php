<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //redirect to dashboard
    public function index(){
        $user = User::where('id',auth()->user()->id)->first();
        return view('admin.profile.index')->with(['user'=>$user]);
    }

    //admin update
    public function updateProfile(Request $request){
        //validation
        $validation = $this->updateDataValidationCheck($request);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        //get update data
        $data = $this->requestUpdateData($request);

        //data update
        User::where('id',auth()->user()->id)->update($data);

        return back()->with(['success'=>'Your Profile updated...']);

    }

    //redirect edit password page
    public function editPassword(){
        return view('admin.profile.editPassword');
    }

    //update password
    public function updatePassword(Request $request){
        //validation
        $validation = $this->updatePasswordValidationCheck($request);
        if($validation->fails()){
            return back()->withErrors($validation);
        }

        //get old db password
        $user = User::where('id',auth()->user()->id)->first();
        $dbOldPassword = $user->password;

        //check old password correct ?
        if(Hash::check($request->oldPassword, $dbOldPassword)){
            //get update data
            $updateData = [
                'password' => Hash::make($request->newPassword),
                'updated_at' => Carbon::now(),
            ];
            //data update
            User::where('id',auth()->user()->id)->update($updateData);

            return redirect()->route('dashboard');
        }else{
            return back()->with(['fail'=>'Old Password do not Match!']);
        }
    }

    //validation for password
    private function updatePasswordValidationCheck($request){
        $validationRule = [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword|min:8'
        ];
        $validationMessage = [
            'confirmPassword.same' => 'new password & confrim password must be same'
        ];
        return Validator::make($request->all(),$validationRule,$validationMessage);
    }

    //validation for update profile data
    private function updateDataValidationCheck($request){
        return Validator::make($request->all(),[
            'adminName' => 'required',
            'adminEmail' => 'required',
            'adminPhone' => 'required',
            'adminAddress' => 'required',
            'adminGender' => 'required',
        ]);

    }

    //get update profile data
    private function requestUpdateData($request){
        return [
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'phone' => $request->adminPhone,
            'address' => $request->adminAddress,
            'gender' => $request->adminGender
        ];
    }
}