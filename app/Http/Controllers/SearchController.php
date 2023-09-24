<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request, Post $post){
        /* テーブルから全てのレコードを取得する */
        $airports = Post::query();

        /* キーワードから検索処理 */
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $airports->where('airport', 'LIKE', "%{$keyword}%")
            ->orWhere('region', 'LIKE', "%{$keyword}%")->get();
        }

        /* ページネーション */
        $results = $airports->paginate(3);

        return view('/posts/result', compact('results','keyword'))->with(['posts' => $post->getPaginateByLimit(10)]);

    }


}
