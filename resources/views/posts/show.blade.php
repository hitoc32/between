<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->airport }}</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<body class="bg-blue-300">
    <!-- タイトル -->
    <h1 class="text-xl font-bold p-4">{{ $post->airport }}</h1>
    <div class="text-right text-sm">
        <p>作成者　{{ $post->user->name }}</p>
        <P>最終更新日　{{ $post->updated_at }}</P>
    </div>
    <!-- 目次 -->
    <div class="ml-4 border w-1/4 border-2 text-blue-500 underline">
        <ul>
            <li><a href="#basic-content">基本情報</a></li>
            <li><a href="#border-control">出入国検査</a></li>
                <li><a href="#arrive-control" class="ml-2">入国検査</a></li>
                <li><a href="#depature-control" class="ml-2">出国検査</a></li>
                <li><a href="#luggage-control" class="ml-2">手荷物検査</a></li>
            <li><a href="#facility">空港内施設情報</a></li>
                <li><a href="#store" class="ml-2">空港内ショップ</a></li>
                <li><a href="#wifi" class="ml-2">Wi-Fi</a></li>
                <li><a href="#toilet" class="ml-2">トイレ</a></li>
            <li><a href="#access">空港⇔市街地のアクセス</a></li>
                <li><a href="#table" class="ml-2">比較表</a></li>
                <li><a href="#train" class="ml-2">電車</a></li>
                <li><a href="#bus" class="ml-2">バス</a></li>
                <li><a href="#other-transportation" class="ml-2">その他の交通機関</a>
        </ul>
    </div>
    
    <!-- 空港基本情報 -->
    <div class="p-4">
        <a id="basic_content" class="text-xl underline">基本情報</a>
        
        <p class="font-bold">{{ $post->airport }}（{{ $post->airport_sf }}）</p>
        <p class="ml-4">国：{{ $post->nation->nation }}</p>
        <p class="ml-4">地域：{{ $post->region }}</p>
        <p class="mt-2">{{ $post->basic_content }}</p>
    </div>
    
    <!-- 出入国検査 -->
    <div class="p-4">
        <a id="borde-control" class="text-xl underline">出入国検査</a>
        @if (empty($post->border_control->arrive_level)
            && empty($post->boder_control->arrive_content)
            && empty($post->border_control->depature_level)
            && empty($post->border_control->depature_content)
            && empty($post->border_control->luggage_time)
            && empty($post->border_control->luggage_content)
            )
            <p>情報なし</p>
        @else
        <div>
            <a id="arrive-control" class="text-lg font-bold">入国検査</a>
            @if (empty($post->border_control->arrive_level) && empty($post->boder_control->arrive_content))
                <p>情報なし</p>
            @else
                <div>
                    難易度：@if ($post->border_control->arrive_level === 1 )
                                簡単
                            @elseif ($post->border_control->arrive_level === 2)
                                普通
                            @else ($post->border_control->arrive_level === 3)
                                難しい
                            @endif
                </div>
                
                <p>{{ $post->border_control->arrive_content }}</p>
            @endif
        </div>
        
        <div>
            <a id="depature-control" class="text-lg font-bold mt-2">出国検査</a>
            @if (empty($post->border_control->depature_level) && empty($post->border_control->depature_content))
                <p>情報なし</p>
            @else
            <div>
                <div>
                    難易度：@if ($post->border_control->depature_level === 1 )
                            簡単
                        @elseif ($post->border_control->depature_level === 2)
                            普通
                        @else ($post->border_control->depature_level === 3)
                            難しい
                        @endif
                </div>
            
                <p>{{ $post->border_control->depature_content }}</p>
            </div>
            @endif
        </div>
        
        <div>
            <a id="luggage-control" class="text-lg font-bold mt-2">手荷物検査</a>
            @if (empty($post->border_control->luggage_time) && empty($post->border_control->luggage_content))
                <p>情報なし</p>
            @else
                <p>所要時間：{{ $post->border_control->luggage_time }}</p>
                <p>{{ $post->border_control->luggage_content }}</p>
            @endif
        </div>
        @endif
    </div>
    
    <!-- 空港内施設 -->
    <div class="p-4">
        <a id="facility" class="text-xl underline">空港内施設情報</a>
        @if (empty($post->facility->store_content) && empty($post->facility->wifi_content) && empty($post->facility->toilet_content))
            <p>情報なし</p>
        @else
        <div>
            <a id="store" class="text-lg font-bold">空港内ショップ</a>
            @if (empty($post->facility->store_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->facility->store_content }}</p>
            @endif
            
            <a id="wifi" class="text-lg font-bold">Wi-Fi</a>
            @if (empty($post->facility->wifi_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->facility->wifi_content }}</p>
            @endif
            
            <a id="toilet" class="text-lg font-bold">トイレ</a>
            @if (empty($post->facility->toilet_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->facility->toilet_content }}</p>
            @endif
        </div>
        @endif
    </div>
    
    <!-- 交通アクセス -->
    <div class="p-4">
        <a id="access" class="text-xl underline">空港↔市街地のアクセス</a>
        @if (empty($post->transportation->train_time)
            && empty($post->transportation->train_cost)
            && empty($post->transportation->bus_time)
            && empty($post->transportation->bus_cost)
            && empty($post->transportation->train_content)
            && empty($post->transportation->bus_content)
            && empty($post->transportation->other_transportation_content)
            )
            <p>情報なし</p>
        @else
        <div class="mt-2">
            <table class="table-auto"><a id="table"></a>
                <thead class="text-center border border-gray-800">
                    <tr>
                        <th>交通機関</th>
                        <th>所要時間</th>
                        <th>運賃</th>
                    </tr>
                </thead>
                <tbody class="text-center border border-gray-800">
                    <tr>
                        <td>電車</td>
                        @if (empty($post->transportation->train_time))
                            <td>情報なし</td>
                        @else
                            <td>{{ $post->transportation->train_time }}</td>
                        @endif
                        
                        @if (empty($post->transportation->train_cost))
                            <td>情報なし</td>
                        @else
                            <td>{{ $post->transportation->train_cost }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>バス</td>
                        @if (empty($post->transportation->bus_time))
                            <td>情報なし</td>
                        @else
                            <td>{{ $post->transportation->bus_time }}</td>
                        @endif
                        
                        @if (empty($post->transportation->bus_cost))
                            <td>情報なし</td>
                        @else
                            <td>{{ $post->transportation->bus_cost }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <a id="train" class="text-lg font-bold mt-2">電車</a>
            @if (empty($post->transportation->train_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->transportation->train_content }}</p>
            @endif
            
            <a id="bus" class="text-lg font-bold mt-2">バス</a>
            @if (empty($post->transportation->bus_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->transportation->bus_content }}</p>
            @endif
            
            <a id="other-transportation" class="text-lg font-bold mt-2">その他の交通機関</a>
            @if (empty($post->transportation->other_transportation_content))
                <p>情報なし</p>
            @else
                <p>{{ $post->transportation->other_transportation_content }}</p>
            @endif
        </div>
        @endif
    </div>
    
    <!-- 画像挿入 -->
    <!--
    <div class="p-4">
        <a id="image" class="text-lg">参考画像</a>
        <img src="{{ $post->image_path }}" alt="画像がありません。"/>
    </div>
    -->
    
    <!-- 投稿の削除 -->
    <div>
        @if ($post->user_id == Auth::user()->id)
        <div class="flex">
            <a href="/posts/{{ $post->id }}/edit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">投稿の編集</a>
            
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})"
                class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                投稿の削除</button> 
            </form>
            
            <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
            </script>
        </div>
        @endif
    </div>
    
    <!-- コメント機能 -->
    <h2 class="text-lg p-4">コメント</h2>
    
    <div class="bg-white rounded-lg shadow-lg w-1/3 ml-4">
        <div>
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <input type="text" class="w-3/4 ml-2 mt-2" placeholder="タイトル"
                    name="title">
                    <textarea class="w-3/4 mt-2 ml-2" placeholder="内容"
                    rows="3" name="comment"></textarea>
                    <!-- タグの選択 -->
                    
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>
    
    <div>
        @foreach ($post->comments as $comment)
        <div class="ml-8 mt-2 bg-white rounded-lg shadow-lg w-1/3">
            <div>
                <!-- 件名 -->
                <h5 class="text-xl mb-2">{{ $comment->title }}</h5>
                <!-- タグの表示 -->
                <!--
                @foreach ($post->categories as $category)
                    {{ $category->category }}
                @endforeach
                -->
                <!-- 内容表示 -->
                <div>
                    <p class="text-gray-700 border-b border-gray-300">{{ $comment->comment }}</p>
                    @if (!empty($comment->user->gender) && !empty($comment->user->age))
                    <h5 class="text-sm">投稿者：{{ $comment->user->name }}（{{ $comment->user->gender }}・{{ $comment->user->age }}）</h5>
                    @elseif (!empty($comment->user->gender) && empty($comment->user->age))
                    <h5 class="text-sm">投稿者：{{ $comment->user->name }}（{{ $comment->user->gender }}）</h5>
                    @elseif (empty($comment->user->gender) && !empty($comment->user->age))
                    <h5 class="text-sm">投稿者：{{ $comment->user->name }}（{{ $comment->user->age }}）</h5>
                    @else (empty($comment->user->gender) && empty($comment->user->age))
                    <h5 class="text-sm">投稿者：{{ $comment->user->name }}</h5>
                    @endif
                    <p class="text-sm text-gray-500">投稿日時：{{ $comment->updated_at }}</p>
                </div>
                
                
                <div class="flex">
                    <!-- いいね機能 -->
                    <div class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-1 px-1 border border-blue-700 rounded w-20 ml-2">
                        <form action="{{ route('like') }}" method="POST">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <button type="submit">いいね {{ $comment->likes->count() }}</button>
                        </form>
                    </div>
                    
                    <!-- コメント削除 -->
                    <div class="flex-grow p-1 mr-auto">
                        @if ($comment->user_id == Auth::user()->id)
                        <div>
                            <span>
                                <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-gray-500">コメントの削除</button> 
                                </form> 
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
                
                
                
            </div>
        </div>
        @endforeach
    </div>
    
    
</body>
</x-app-layout>