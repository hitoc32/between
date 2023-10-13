<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>空港一覧</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
    <x-slot name="header">
        空港一覧
    </x-slot>
    
<body>
    <p class="p-4">国別空港一覧は<a href='/posts/nation' class="underline">こちら</a></p>
    <div class="p-4">
        <div>
            <form action="{{ route('posts.sort') }}" method="GET">
                <select name="sort_option" onchange="this.form.submit()">
                    <option value="default">並び替え</option>
                    <option value="comment_desc">コメントが多い順</option>
                    <option value="updated_desc">新しい順</option>
                </select>
            </form><br>
        </div>
        
        @php
            $displayedAirport = null;
        @endphp
        
        @foreach ($posts as $post)
            @if ($post->airport !== $displayedAirport)
                <div>
                    <a href="/posts/{{ $post->id }}" class="text-lg underline">{{ $post->airport }}</a>
                    <p class="ml-2">
                        @if (!empty($post->border_control->arrive_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#入国検査</span>
                        @endif
                        @if (!empty($post->border_control->depature_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#出国検査</span>
                        @endif
                        @if (!empty($post->border_control->luggage_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#手荷物検査</span>
                        @endif
                        @if (!empty($post->facility->store_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#空港内ショップ</span>
                        @endif
                        @if (!empty($post->facility->wifi_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#Wi-Fi</span>
                        @endif
                        @if (!empty($post->facility->toilet_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#トイレ</span>
                        @endif
                        @if (!empty($post->transportation->train_content) || !empty($post->transportation->bus_content) || !empty($post->transportation->other_transportation_content))
                        <span class="bg-gray-400 text-white px-1 rounded">#アクセス</span>
                        @endif
                    </p>
                    <p class="ml-2">コメント {{ $post->comments->count() }}件</p>
                    <p class="ml-2">更新日 {{ $post->updated_at }}</p>
                </div>
                @php
                    $displayedAirport = $post->airport;
                @endphp
            @endif
        @endforeach
    </div>
    
</body>
</x-app-layout>
</html>