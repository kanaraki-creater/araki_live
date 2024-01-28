<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ライブ情報 | ライブマップ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>詳細</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集する</a>
        </div>
        <div class="comment">
            <h3>コメントタイトル</h3>
            <p>コメント本文</p>
            <div "comment_post">
                <p>コメントする</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>