<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ライブを投稿する | ライブマップ</title>
    </head>
    <body>
        <h1>ライブマップ</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>出演ライブ名・イベント名</h2>
                <input type="text" name="post[title]" placeholder="ライブ名・イベント名" value="{{ old('post.title') }}">
                <p class="title_error">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="name">
                <h2>グループ名</h2>
                <input type="text" name="post[name]" placeholder="MMK47" value="{{ old('post.name') }}">
            </div>
            <div class="body">
                <h2>ライブ詳細</h2>
                <textarea name="post[body]" placeholder="2024年１月１日に渋谷でワンマンライブをやります！">{{ old('post.body') }}</textarea>
                <p class="body_error">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="date">
                <h2>日程</h2>
                <input type="date" name="post[date]"/>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>