<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
    <x-slot name="header">
        検索結果
    </x-slot>
    
<body>
    <div>
        <h2 class="text-lg p-4">「{{ $keyword }}」を含む検索結果</h2>
    </div>
    <div class="grid grid-cols-1 divide-y divide-gray-500">
        <div class="p-4">
            @foreach ($results as $result)
            <div>
                <a href="/posts/{{ $result->id }}" class="text-lg underline">{{ $result->airport }}</a>
                <p>更新日：{{ $result->updated_at }}</p>
            </div>
            @endforeach
        </div>
        
        <div class="p-4">
            <p>その他の空港</p>
            @foreach ($posts as $post)
            <div>
                <a href="/posts/{{ $post->id }}" class="text-lg underline">{{ $post->airport }}</a>
                <p>更新日：{{ $post->updated_at }}</p>
            @endforeach
            </div>
        </div>
    </div>
    
    
    
</body>
</x-app-layout>
</html>