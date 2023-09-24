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
    <div class="p-4 border w-1/4 border-2 text-blue-500 underline">
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
    
    <!-- コメント機能 -->
    
    <!-- 投稿の削除 -->
    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" class="p-4" onclick="deletePost({{ $post->id }})">投稿の削除</button> 
    </form>
    
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    
</body>
</x-app-layout>