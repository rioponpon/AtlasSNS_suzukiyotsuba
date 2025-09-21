<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="list">
    <h1> フォロワーリスト </h1>
    <div class="follow_icon">
        @foreach ($followers as $follower)

        <!-- <a><img src="{{ asset('storage/' .$follower->images) }}" alt="フォロワーアイコン"></a> -->
        @endforeach

    </div>
</div>

@foreach ($posts as $post)
<a href="{{route('users.show', $post->user->id) }}">
<img src="{{ asset('images/' . $post->user->icon_image) }}"
     alt="{{ $post->user->username }}"
     class="MyIcon"></a>
    <p>{{ $post->user->username }}</p>
    <div class="card-body">
                <div class="post">{{ $post->post }}</div>
                <small class="text-muted">
                     {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
@endforeach


</x-login-layout>
