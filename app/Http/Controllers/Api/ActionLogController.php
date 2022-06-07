<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    //actin
    public function setActionLog(Request $request){
        $data = [
            'user_id'=>$request->user_id,
            'post_id'=>$request->post_id,
        ];
        //insert data
        ActionLog::create($data);

        //view data
        $post = ActionLog::where('post_id',$request->post_id)->get();
        return response()->json([
            'post' => $post,
        ]);
    }
}