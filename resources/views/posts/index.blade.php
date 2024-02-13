<x-app-layout>
    <meta charset="utf-8">
    <title>ライブ情報一覧 | ライブマップ</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <div class="w-2/3 m-auto">
        <div class="text-4xl">ライブ情報一覧</div>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='mx-4 ml-2'>
                    <h2 class='mt-6'>
                        <a class="text-decoration-line: underline" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <div>グループ名：{{ $post->name }}</div>
                    @if(!$post->isPast())
                    <div class="text-red-600">予定前</div>
                    @else
                    <div class="text-green-500">予定終了</div>
                    @endif
                    <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    </div>
                    @if(auth()->id() == $post->user_id)
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">削除する</button>
                    </form>
                    @endif
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
    </div>
</x-app-layout>