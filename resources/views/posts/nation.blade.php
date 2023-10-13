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
    <x-slot name="header">
        国別空港一覧
    </x-slot>
    
<body>
    <div class="p-4">
        @foreach ($nationsWithPostCount as $nation)
        <div>
            <li>
                <a href="/nations/{{ $nation->id }}">{{ $nation->nation }}（{{ $nation->post_count }}）</a>
            </li>
        </div>
        @endforeach
    </div>
    
</body>
</x-app-layout>
</html>