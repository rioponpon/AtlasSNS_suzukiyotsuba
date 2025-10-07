<x-login-layout>

<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="list">
    <h1> フォロワーリスト </h1>


        @foreach ($followers as $follower)
    <div class="follow_icon">
      <a href="{{route('users.show', $follower->id) }}">
<img class="follow_icon" src="{{ asset('images/' .$follower->icon_image) }}"></a>
        <!-- <a><img src="{{ asset('storage/' .$follower->images) }}" alt="フォロワーアイコン"></a> -->
        @endforeach

    </div>
</div>

@foreach ($posts as $post)
<div class="card-body">
<a href="{{route('users.show', $post->user->id) }}">
<img src="{{ asset('images/' . $post->user->icon_image) }}"
     alt="{{ $post->user->username }}"
     class="MyIcon"></a>
    <div class="post-name">{{ $post->user->username }}</div>

                <div class="post">{{ $post->post }}</div>
                <small class="text-muted">
                     {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
@endforeach


</x-login-layout>
