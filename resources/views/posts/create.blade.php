<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>新規作成</title>
</head>
<x-app-layout>
    <x-slot name="header" class="font-bold">
        新規作成
    </x-slot>
<body class="bg-gray-300 p-4">
    <form action="{{ route('posts.confirm') }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf
        <!-- postsテーブルに格納 -->
        <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}">
        
        <p>空港名　<span class="bg-red-400 text-white px-1 rounded">必須</span></p>
        <input class="ml-4 rounded-md" type="text" name="post[airport]" placeholder="例：羽田空港" value="{{ old('post.airport') }}"/>
        
        <p>空港略称（英語大文字3字）　<span class="bg-red-400 text-white px-1 rounded">必須</span></p>
        <input class="ml-4 rounded-md" type="text" name="post[airport_sf]" placeholder="例：HND" value="{{ old('post.airport_sf') }}"/>
        
        <p>国名　<span class="bg-red-400 text-white px-1 rounded">必須</span></p>
            <div class="form-group ml-4 rounded-md">
                <select class="form-control" id="nation_id" name="post[nation_id]" value="{{ old('post.nation_id') }}">
                @foreach ($nations as $nation)
                    <option value="{{ $nation->id }}">{{ $nation->nation }}</option>
                @endforeach
                </select>
            </div>
        
        <p>地域名　<span class="bg-red-400 text-white px-1 rounded">必須</span></p>
        <input class="ml-4 rounded-md" type="text" name="post[region]" placeholder="例：東京" value="{{ old('post.region') }}"/>
        
        <p>空港についての基本情報　<span class="bg-red-400 text-white px-1 rounded">必須</span></p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="post[basic_content]" placeholder="利用者数や空港の規模などを記述してください。必要に応じて、公式HPのリンクを貼付してください。" value="{{ old('post.basic_content') }}"></textarea>
        
        <!-- border_controlsテーブルに格納 -->
        <h2 class="font-bold mt-2">出入国検査</h2>
        
        <p>入国検査の難易度</p>
            <label class="ml-4">
                <input type="radio" name="border_control[arrive_level]" value="1">簡単
            </label>
            <label>
                <input type="radio" name="border_control[arrive_level]" value="2">普通
            </label>
            <label>
                <input type="radio" name="border_control[arrive_level]" value="3">難しい
            </label>
            <label>
                <input type="radio" name="border_control[arrive_level]" value="0" checked="checked">未選択
            </label>
        
        <p>入国検査について</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="border_control[arrive_content]"></textarea>
        
        <p>出国検査の難易度</p>
            <div>
                <label class="ml-4">
                    <input type="radio" name="border_control[depature_level]" value="1">簡単
                </label>
                <label>
                    <input type="radio" name="border_control[depature_level]" value="2">普通
                </label>
                <label>
                    <input type="radio" name="border_control[depature_level]" value="3">難しい
                </label>
                <label>
                    <input type="radio" name="border_control[depature_level]" value="0" checked="checked">未選択
                </label>
            </div>
        
        <p>出国検査について</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="border_control[depature_content]"></textarea>
        
        <p>手荷物検査 所要時間</p>
        <input class="ml-4 rounded-md"  type="text" name="border_control[luggage_time]" placeholder="例：15~20分"/>
        
        <p>手荷物検査について</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="border_control[luggage_content]"></textarea>
        
        <!-- facilitiesテーブルに格納 -->
        <h2 class="font-bold">空港内施設</h2>
        
        <p>空港内ショップについて</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="facility[store_content]"></textarea>
        
        <p>Wi-Fiについて</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="facility[wifi_content]" placeholder="例：繋がりやすさ・持続時間など"></textarea>
        
        <p>トイレについて</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="facility[toilet_content]" placeholder="例：綺麗さ・浄水器の有無など"></textarea>
        
        <!-- transportationsテーブルに格納 -->
        <h2 class="font-bold">交通アクセス（空港～市街地）</h2>
        
        <p>電車での所要時間</p>
        <input type="text" class="ml-4 rounded-md" name="transportation[train_time]" placeholder="例：約20～30分">
        <p>電車での費用</p>
        <input type="text" class="ml-4 rounded-md" name="transportation[train_cost]" placeholder="例：約5ユーロ">
        <p>電車について</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="transportation[train_content]" placeholder="例：チケットの買い方や治安など"></textarea>
        
        <p>バスでの所要時間</p>
        <input type="text" class="ml-4 rounded-md" name="transportation[bus_time]" placeholder="例：約20～30分">
        <p>バスでの費用</p>
        <input type="text" class="ml-4 rounded-md" name="transportation[bus_cost]" placeholder="例：約5ユーロ">
        <p>バスについて</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="transportation[bus_content]" placeholder="例：チケットの買い方や治安など"></textarea>
        
        <p>その他の交通手段</p>
        <textarea class="ml-4 rounded-md sm:w-1/2 sm:h-24" name="transportation[other_transportation_content]" placeholder="例：タクシーや路線バスなど"></textarea>
        
        <!--
        <p class="mt-2">参考画像の挿入</p>
        <input type="file" name="image">
        -->
        
        <br><input class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="確認する">
    </form>
    <!-- フッター
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    -->
</body>
</x-app-layout>
</html>