<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //direct trend post page
    public function index(){
        $data = ActionLog::select('action_logs.*','posts.*',DB::raw('COUNT(action_logs.post_id) as post_count'))
                ->leftJoin('posts','posts.post_id','action_logs.post_id')
                ->groupBy('action_logs.post_id')
                ->orderBy('post_count','desc')
                ->get();
        return view('admin.trend_post.index')->with(['data'=>$data]);
    }

    //view detial post
    public function trendPostDetail($id){
        $data = Post::where('post_id',$id)->first();
        return view('admin.trend_post.detail')->with(['data'=>$data]);
    }
}