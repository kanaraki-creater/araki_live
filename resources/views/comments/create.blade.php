<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>コメントを投稿する | ライブマップ</title>
    </head>
    <body>
        <h1>ライブマップ</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>コメントタイトル</h2>
                <input type="text" name="post[title]" placeholder="最高でした！"/>
                <p class="title_error">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>コメント本文</h2>
                <textarea name="post[body]" placeholder="ダンスのレベルが高くてびっくりしました。"></textarea>
                <p class="body_error">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>