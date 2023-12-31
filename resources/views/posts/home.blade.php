<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム</title>
        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
        <x-app-layout>
            <x-slot name="header">
                ホーム
            </x-slot>
        <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <div class="flex space-x-4">
                <!-- Left Block -->
                <div class="w-1/4 bg-blue-300 text-white p-4">
                    <h3 class="text-lg">国別（空港数）</h3>
                    <div>
                        @foreach ($nationsWithPostCount as $nation)
                        <div>
                            @if (!empty($nation->post_count))
                            <a href="/nations/{{ $nation->id }}">{{ $nation->nation }}（{{ $nation->post_count }}）</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Center Block -->
                <div class="w-1/2 bg-red-300 text-white p-4 items-center text-center">
                    <h2 class="text-lg">空港を探す</h2>
                    
                    <!-- 国名のプルダウン -->
                    
                    
                    <!-- 検索する空港名 -->
                    <div>
                        <form action="/posts/result" method="GET">
                            @csrf
                            <input type="text" name="keyword" class="text-black" placeholder="空港名"/>
                            
                            <!-- 絞り込み機能
                            <div>
                                <br><p>絞り込み</p>
                                
                                <input type="checkbox" id="arrive" name="arrive"/>
                                <label for="arrive">入国検査</label>
                                <input type="checkbox" id="depature" name="depature"/>
                                <label for="depature">出国検査</label>
                                <input type="checkbox" id="luggage" name="luggage"/>
                                <label for="luggage">手荷物検査</label><br>
                                <input type="checkbox" id="store" name="store"/>
                                <label for="store">空港内ショップ</label>
                                <input type="checkbox" id="wifi" name="wifi"/>
                                <label for="wifi">Wi-Fi</label>
                                <input type="checkbox" id="toilet" name="toilet"/>
                                <label for="toilet">トイレ</label>
                                <input type="checkbox" id="access" name="access"/>
                                <label for="access">アクセス</label><br>
                            </div>
                            -->
                            
                            <br><input type="submit" value="検索" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    </div>
                </div>
                
                <!-- Right Block -->
                <div class="w-1/4 bg-green-300 text-white p-4">
                    <h3 class="text-lg">最近の更新</h3>
                    <div class="container border border-black-500">
                        <!-- 最新のブログ編集5件を表示 -->
                        <p class="font-bold">空港情報</p>
                            <div>
                                @foreach ($posts as $post)
                                    <div class='post'>
                                        <a href='/posts/{{ $post->id }}' class="underline">{{ $post->airport }}({{ $post->updated_at }})</a>
                                    </div>
                                @endforeach
                            </div>
                        <!-- 最新のコメント10件を表示 -->
                        <br><p class="font-bold">コメント</p>
                            <div>
                                @foreach ($comments as $comment)
                                    <div class='post'>
                                        <a href='/posts/{{ $post->id }}' class="underline">{{ $comment->comment }}({{ $comment->updated_at }})</a>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </x-app-layout>
</html>
