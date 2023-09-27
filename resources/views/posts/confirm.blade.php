<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ表示画面</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<body>
    <form method="POST" action="/posts">
        @csrf
        <input type="hidden" name="post[user_id]" value="{{ Auth::user()->id }}">

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-left font-medium">
                            <th class="px-6 py-3 text-gray-600 bg-gray-100 border-b border-gray-300 w-1/4">質問項目</th>
                            <th class="px-6 py-3 text-gray-600 bg-gray-100 border-b border-gray-300">あなたの回答</th>
                            <!-- 他のヘッダーセルを追加 -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">空港名</td>
                            <td>
                                <input name="post[airport]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['post']['airport'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">空港略称（英語大文字3字）</td>
                            <td>
                                <input name="post[airport_sf]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['post']['airport_sf'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">国名</td>
                            <td><input name="post[nation_id]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['post']['nation_id'] }}"></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">地域名</td>
                            <td>
                                <input name="post[region]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['post']['region'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">空港についての基本情報</td>
                            <td><input name="post[basic_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['post']['basic_content'] }}"></td>
                        </tr>
                        
                        <!-- 出入国検査 -->
                        <tr>
                            <td class="font-bold border px-4 py-2" colspan="2">出入国検査</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">入国検査の難易度</td>
                            <td>
                                @if ($inputs['border_control']['arrive_level'] === 0)
                                    <input name="border_control[arrive_level]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['arrive_level'] }}">（未選択）
                                @else
                                    <input name="border_control[arrive_level]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['arrive_level'] }}">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">入国検査について</td>
                            <td>
                                <input name="border_control[arrive_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['arrive_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">出国検査の難易度</td>
                            <td>
                                @if ($inputs['border_control']['depature_level'] === 0)
                                    <input name="border_control[depature_level]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['depature_level'] }}">（未選択）
                                @else
                                    <input name="border_control[depature_level]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['depature_level'] }}">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">出国検査について</td>
                            <td>
                                <input name="border_control[depature_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['depature_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">手荷物検査　所要時間</td>
                            <td>
                                <input name="border_control[luggage_time]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['luggage_time'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">手荷物検査について</td>
                            <td>
                                <input name="border_control[luggage_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['border_control']['luggage_content'] }}">
                            </td>
                        </tr>
                        
                        <!-- 空港内施設 -->
                        <tr>
                            <td class="font-bold border px-4 py-2" colspan="2">空港内施設</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">空港内ショップについて</td>
                            <td>
                                <input name="facility[store_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['facility']['store_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Wi-Fiについて</td>
                            <td>
                                <input name="facility[wifi_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['facility']['wifi_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">トイレについて</td>
                            <td>
                                <input name="facility[toilet_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['facility']['toilet_content'] }}">
                            </td>
                        </tr>
                        
                        <!-- 交通アクセス -->
                        <tr>
                            <td class="font-bold border px-4 py-2" colspan="2">交通アクセス（空港～市街地）</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">電車での所要時間</td>
                            <td>
                                <input name="transportation[train_time]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['train_time'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">電車での費用</td>
                            <td>
                                <input name="transportation[train_cost]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['train_cost'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">電車について</td>
                            <td>
                                <input name="transportation[train_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['train_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">バスでの所要時間</td>
                            <td>
                                <input name="transportation[bus_time]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['bus_time'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">バスでの費用</td>
                            <td>
                                <input name="transportation[bus_cost]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['bus_cost'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">バスについて</td>
                            <td>
                                <input name="transportation[bus_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['bus_content'] }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">その他の交通手段</td>
                            <td>
                                <input name="transportation[other_transportation_content]" class="px-6 py-4 whitespace-nowrap" value="{{ $inputs['transportation']['other_transportation_content'] }}">
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>

  
        
        <button type="submit" name="action" value="back">入力内容修正</button>
        <button type="submit" onclick="successPost()" name="action" value="submit">投稿する</button>
    </form>
    <script>
        function successPost() {
            'use strict'

            alert('正常に投稿されました');
    }
</script>
</body>
</x-app-layout>
