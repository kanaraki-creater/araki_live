<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ライブ情報一覧 | ライブマップ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ライブ情報一覧</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除する</button>
                    </form>
                    <div class='comments'>
                        @foreach ($post->comments as $comment)
                            <div class='comment'>
                                <h3 class='title'>
                                    <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a>
                                </h3>
                                <p class='body'>{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <a href='/posts/create'>投稿する</a>
        <p class='user_name'>{{ Auth::user()->name }}</p>
        <div class="paginate">
            {{ $posts->links()}}
        </div>
        <script>
            function deletePost(id) {
                `use strict`
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>