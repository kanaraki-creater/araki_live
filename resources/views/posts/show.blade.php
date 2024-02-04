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
                <form action="/comments/{{ $post->id }}" method="POST">
                    @csrf
                    <div class="title">
                        <h2>コメントタイトル</h2>
                        <input type="text" name="comment[title]" placeholder="最高でした！" value="{{ old('comment.title') }}"/>
                        <p class="title_error">{{ $errors->first('comment.title') }}</p>
                    </div>
                    <div class="body">
                        <h2>コメント本文</h2>
                        <textarea name="comment[body]" placeholder="歌もダンスも上手で感動しました。">{{ old('comment.body') }}</textarea>
                        <p class="body_error">{{ $errors->first('comment.body') }}</p>
                    </div>
                    <input type="submit" value="投稿する"/>
                </form>
            </div>
        </div>
        <div>
            @foreach ($post->comments as $comment)
            <p>{{ $comment->title }}</p>
            <p>{{ $comment->body }}</p>
            <div class="edit">
                <a href="/comments/{{ $comment->id }}/edit">編集する</a>
            </div>
            <form action="/comments/{{ $comment->id }}?postId={{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button  onclick="deleteComment({{ $comment->id }})">削除する</button> 
            </form>
            @endforeach
        </div>
        <script>
            function deleteComment(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>