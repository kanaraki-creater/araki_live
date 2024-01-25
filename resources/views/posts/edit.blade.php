<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ライブを投稿する | ライブマップ</title>
    </head>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>ライブ名・イベント名</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>ライブ詳細</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>