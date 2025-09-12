<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
<div class="list">
    <h1>[ フォロワーリスト ]</h1>
    <div class="follow_icon">
        @foreach ($followers as $follower)
        <a><img src="{{ asset('storage/' .$follower->images) }}" alt="フォロワーアイコン"></a>
        @endforeach
    </div>
</div>

@foreach ($posts as $post)
    <p>名前:{{ $post->user->username }}</p>
    <p>投稿内容:{{ $post->post }}</p>
@endforeach


</x-login-layout>
