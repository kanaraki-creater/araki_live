<x-app-layout class="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ライブ情報 | ライブマップ</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <div class="w-2/3 m-auto">
        <h1 class="title text-4xl place-content-center">
            {{ $post->title }}
        </h1>
        <div>グループ名：{{ $post->name }}</div>
        @if(!$post->isPast())
        <p class="text-red-600">予定前</p>
        @else
        <p class="text-green-500">予定終了</p>
        @endif
        <div>
            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
        </div>
        <span>
            <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
            @if($like)
            <!-- 「いいね」取消用ボタンを表示 -->
            	<a href="{{ route('dislike', $post) }}" class="btn btn-success btn-sm">
            	    <i class="fas fa-heart text-red-600"></i>
            		いいね
            		<!-- 「いいね」の数を表示 -->
            		<span class="badge">
            			{{ $post->likes->count() }}
            		</span>
            	</a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
            	<a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
            	    <i class="fas fa-heart"></i>
            		いいね
            		<!-- 「いいね」の数を表示 -->
            		<span class="badge">
            			{{ $post->likes->count() }}
            		</span>
            	</a>
            @endif
        </span>
        <div class="content">
            <div class="content__post">
                <h3>詳細</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        @if(auth()->id() == $post->user_id)
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集する</a>
        </div>
        @endif

        <div class="comment">
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
                    <input type="submit" value="コメントを投稿する"/>
                </form>
            </div>
        </div>
        <div>
            @foreach ($post->comments as $comment)
            <p>{{ $comment->title }}</p>
            <p>{{ $comment->body }}</p>
            @if(auth()->id() == $comment->user_id)
            <div class="edit">
                <a href="/comments/{{ $comment->id }}/edit">編集する</a>
            </div>
            <form action="/comments/{{ $comment->id }}?postId={{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button　type="button"  onclick="deleteComment({{ $comment->id }})">削除する</button> 
            </form>
            @endif
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
        </div>
</x-app-layout>