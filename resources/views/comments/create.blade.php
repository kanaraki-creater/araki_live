<x-app-layout>
    <meta charset="utf-8">
    <title>コメントを投稿する | ライブマップ</title>

    <div class="w-2/3 m-auto">
        <h1>ライブマップ</h1>
        <form action="/comments" method="POST">
            @csrf
            <div class="title">
                <h2>コメントタイトル</h2>
                <input type="text" name="comment[title]" placeholder="最高でした！"/>
                <p class="title_error">{{ $errors->first('comment.title') }}</p>
            </div>
            <div class="body">
                <h2>コメント本文</h2>
                <textarea name="comment[body]" placeholder="歌もダンスも上手で感動しました。"></textarea>
                <p class="body_error">{{ $errors->first('comment.body') }}</p>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</x-app-layout>