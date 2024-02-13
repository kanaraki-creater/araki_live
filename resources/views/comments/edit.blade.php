<x-app-layout>
    <meta charset="utf-8">
    <title>コメントを編集する | ライブマップ</title>

    <div class="w-2/3 m-auto">
        <h1 class="text-4xl">コメントを編集する</h1>
        <div class="content">
            <form action="/comments/{{ $comment->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>コメントタイトル</h2>
                    <input type='text' name='comment[title]' value="{{ $comment->title }}">
                </div>
                <div class='content__body'>
                    <h2>コメント本文</h2>
                    <input type='text' name='comment[body]' value="{{ $comment->body }}">
                </div>
                <input type="submit" value="保存">
                <a href='/posts/{{ $comment->post_id }}'>戻る</a>
            </form>
        </div>
    </div>
</x-app-layout>