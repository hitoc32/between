<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Nation;
use App\Models\Comment;
use App\Models\User;
use App\Models\Border_control;
use App\Models\Facility;
use App\Models\Transportation;

class PostController extends Controller
{
    public function __construct()
    {
        $this->nation = new Nation();
    }
    
    public function home(Post $post, Comment $comment)
    {
        // 検索時の国の絞り込みに使っていた
        $nations = $this->nation->get();
        
        //国ごとの件数を多い順で20か国表示
        $nationsWithPostCount = Nation::select('nations.id', 'nations.nation', DB::raw('count(posts.id) as post_count'))
            ->Join('posts', 'nations.id', '=', 'posts.nation_id')
            ->groupBy('nations.id', 'nations.nation')
            ->orderByDesc('post_count')
            ->limit(20)
            ->get();
        
        return view('posts.home', compact('nations', 'nationsWithPostCount'))->with([
            'posts' => $post->getByLimit(),
            'comments' => $comment->getByLimit(),
        ]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    //国ごとの一覧ページを作成
    public function nation(Nation $nation){
        
        return view('posts.nation')->with(['nations' => $nation]);
    }
    
    
    public function create()
    {
        $nations = $this->nation->get();
        return view('posts.create',compact('nations'));
    }
    
    public function confirm(Request $request)
    {
        $inputs = $request->all();
        //dd($inputs);
        return view('posts.confirm', ['inputs' => $inputs]);
    }
    
    public function store(Request $request, Post $post, Border_control $border_control, Facility $facility, Transportation $transportation)
    {
        // リクエストからデータを取得
        $input = $request['post'];
        $post->fill($input)->save();
    
        $input_bordercontrol = $request['border_control'];
        $input_facility = $request['facility'];
        $input_transportation = $request['transportation'];
        dd($input_bordercontrol);
    
        
    
        $border_control->fill($input_bordercontrol)->save();
        $facility->fill($input_facility)->save();
        $transportation->fill($input_transportation)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    //投稿を削除する
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }

}
