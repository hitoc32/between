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
use App\Models\Like;
use App\Models\Category;
use Cloudinary;

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
        $nationsWithPostCount = Nation::select('nations.id', 'nations.nation')
            ->selectRaw('count(CASE WHEN posts.deleted_at IS NULL THEN 1 ELSE NULL END) as post_count')
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
    
    public function show(Post $post, Comment $comment, User $user, Category $category)
    {
        //いいねを表示させる
        $like = LIke::where('comment_id', $comment->id)->where('user_id', auth()->user()->id)->first();
        
        
        return view('posts.show', compact('like', 'comment'))->with(['post' => $post, 'user' => $user, 'categories' => $category]);
    }
    
    public function sort(Request $request)
    {
        $sortOption = $request->input('sort_option');
        
        if ($sortOption === 'updated_desc') {
            $posts = Post::orderBy('updated_at', 'desc')->get();
        } elseif ($sortOption === 'comment_desc' ) {
            $posts = Post::withCount('comments')->orderByDesc('comments_count')->get();
        } else {
            $posts = Post::orderBy('airport', 'asc')->get();
        }
        
        return view('posts.index', compact('posts'));
    }
    
    public function index(Post $post)
    {
        //タグの表示
        
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    //国ごとの一覧ページを作成
    public function nation()
    {
        $nationsWithPostCount = Nation::select('nations.id', 'nations.nation')
            ->selectRaw('count(CASE WHEN posts.deleted_at IS NULL THEN 1 ELSE NULL END) as post_count')
            ->leftJoin('posts', 'nations.id', '=', 'posts.nation_id')
            ->groupBy('nations.id', 'nations.nation')
            ->orderByDesc('post_count')
            ->get();

        
        return view('posts.nation', compact('nationsWithPostCount'));
    }
    
    
    public function create()
    {
        $nations = $this->nation->get();
        return view('posts.create',compact('nations'));
    }
    
    public function confirm(Request $request)
    {
        //入力データを確認画面に表示させる
        $inputs = $request->all();

        return view('posts.confirm', ['inputs' => $inputs]);
    }
    
    public function store(Request $request, Post $post, Border_control $border_control, Facility $facility, Transportation $transportation)
    {
        // リクエストからデータを取得
        $input = $request['post'];
        /*
        $image_path = Cloudinary::upload($request['image'])->getSecurePath();
        $input += ['image_path' => $image_path];
        */
        $post->fill($input)->save();
    
        $input_bordercontrol = $request['border_control'];
        $input_facility = $request['facility'];
        $input_transportation = $request['transportation'];
        
        $input_bordercontrol['post_id'] = $post->id;
        $input_facility['post_id'] = $post->id;
        $input_transportation['post_id'] = $post->id;
    
        $border_control->fill($input_bordercontrol)->save();
        $facility->fill($input_facility)->save();
        $transportation->fill($input_transportation)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    //投稿編集
    public function edit(Post $post)
    {
        $nations = $this->nation->get();
        return view('posts.edit',compact('post', 'nations'));
    }
    
    public function confirm_edit(Request $request, Post $post)
    {
        $inputs = $request->all();
        //dd($inputs);
        return view('posts.confirm_edit', ['inputs' => $inputs, 'post' => $post]);
    }
    
    public function update(Request $request, Post $post, Border_control $border_control, Facility $facility, Transportation $transportation)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        $input_bordercontrol = $request['border_control'];
        $input_facility = $request['facility'];
        $input_transportation = $request['transportation'];
        
        $input_bordercontrol['post_id'] = $post->id;
        $input_facility['post_id'] = $post->id;
        $input_transportation['post_id'] = $post->id;
    
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
