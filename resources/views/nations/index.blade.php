<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>国別空港一覧</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<body>
    <div class="p-4">
        <div>
        <h1 class="text-xl font-bold">{{ $nation->nation }}の空港</h1>
            @foreach ($posts as $post) 
            <p class="text-lg">
                <span><a href="/posts/{{ $post->id }}" class="underline">{{ $post->airport }}</a></span>（{{ $post->region }}）
            </p>
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
            @endforeach
        </div>
    </div>
    
</body>
</x-app-layout>
</html>