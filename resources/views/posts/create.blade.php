<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>ライブマップ</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>出演ライブ名・イベント名</h2>
                <input type="text" name="post[title]" placeholder="ライブ名・イベント名"/>
            </div>
            <div class="body">
                <h2>ライブ詳細</h2>
                <textarea name="post[body]" placeholder="2024年１月１日に渋谷でワンマンライブをやります！"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>