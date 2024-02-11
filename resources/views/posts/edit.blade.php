<x-app-layout>
    <meta charset="utf-8">
    <title>ライブを投稿する | ライブマップ</title>
    
    <div class="w-2/3 m-auto">    
        <h1 class="title">投稿を編集する</h1>
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
                <a href='/posts/{{ $post->id }}'>戻る</a>
            </form>
        </div>
    </div>
</x-app-layout>