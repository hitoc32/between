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
    <div class="p-4">
        @foreach ($posts as $post)
        <div>
            <a href="/posts/{{ $post->id }}" class="text-lg underline">{{ $post->airport }}</a>
            <p>更新日：{{ $post->updated_at }}</p>
        </div>
        @endforeach
    </div>
    
</body>
</x-app-layout>
</html>