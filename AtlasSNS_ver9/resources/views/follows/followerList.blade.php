<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
<div class="list">
    <h1>[ フォロワーリスト ]</h1>
    <div class="follow_icon">
        @foreach ($followers as $follower)
        <!-- <a><img src="{{ asset('storage/' .$follower->images) }}" alt="フォロワーアイコン"></a> -->
        @endforeach
    </div>
</div>

@foreach ($posts as $post)
<a href="{{route('profile',$post->user->id) }}">
<img src="{{ asset('images/' . $post->user->icon_image) }}"
     alt="{{ $post->user->username }}"
     class="MyIcon"></a>
    <p>名前:{{ $post->user->username }}</p>
    <div class="card-body">
                <p>{{ $post->post }}</p>
                <small class="text-muted">
                    投稿日: {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
@endforeach


</x-login-layout>
