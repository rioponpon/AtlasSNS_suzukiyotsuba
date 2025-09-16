<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
<div class="followList">
    <h1>[ フォローリスト ]</h1>
    <div class="follow_icon">
        @foreach ($follows as $following)
        <a><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>
</div>

@foreach($posts as $post)
<img src="{{ asset('images/' . $post->user->icon_image) }}"
     alt="{{ $post->user->username }}"
     class="MyIcon">
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
@endforeach

</x-login-layout>
