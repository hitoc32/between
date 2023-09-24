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
            <br><li><a href="/posts/{{ $post->id }}" class="underline">{{ $post->airport }}</a></li>
            @endforeach
        </div>
    </div>
    
</body>
</x-app-layout>
</html>