<x-login-layout>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="followList">
    <h1> フォローリスト </h1>
    <div class="follow_icon">
        @foreach ($follows as $following)
        <img class="follow_icon" src="{{ asset('images/' .$following->icon_image) }}">
        <!-- <a><img src="{{ asset('storage/' .$following->images) }}" ></a> -->
        @endforeach
    </div>
</div>



@foreach($posts as $post)
<div class="card-body">
<a href="{{route('users.show' ,$post->user->id) }}">
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
