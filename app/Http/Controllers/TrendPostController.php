<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //direct trend post page
    public function index(){
        $data = ActionLog::select('action_logs.*','posts.*')
                ->leftJoin('posts','posts.post_id','action_logs.post_id')
                ->paginate(7);
        return view('admin.trend_post.index')->with(['data'=>$data]);
    }
}