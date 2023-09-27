<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

class CommentController extends Controller
{
    //以下のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['store', 'delete', 'like', 'unlike']);
    }
    
    //コメント投稿
    public function store(CommentRequest $request)
    {
        $post = Post::find($request->post_id);

        $comment = new Comment;

        $comment->title = $request->title;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;

        $comment -> save();

        return redirect()->route('show', ['post' => $request['post_id']]);
    }
    
    //コメント削除機能
    public function delete($id)
    {
        $comment = Comment::findorFail($id);
        $comment->delete();
        
        return redirect()->back();
    }
    
    
    //いいね機能
    // LikeController.php
    public function like(Request $request)
    {
        $user = auth()->user();
        $commentId = $request->input('comment_id');
    
        // いいねが存在しない場合、いいねを追加
        if (!$user->likes->contains('comment_id', $commentId)) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->comment_id = $commentId;
            $like->save();
        } else {
            // いいねが存在する場合、いいねを削除
            $user->likes()->where('comment_id', $commentId)->delete();
        }
    
        return redirect()->back();
    }

    
}
