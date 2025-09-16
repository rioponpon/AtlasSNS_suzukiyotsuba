<x-login-layout>



<div class="container">
    {{-- ユーザー情報 --}}
    <div class="mb-4">
       <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="MyIcon"></a>
        <h3>{{ $user->username }}</h3>

          @csrf
    <input type="hidden" name="user_id" value="{{ $user->username }}">
        @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',[$user->id]) }}" class="btn unfollow_btn">
@csrf
        <button type="submit" class="btn-primary">フォロー解除</button>
        </form>

        @else

        <form action="{{ route('follow' ,[$user->id]) }}" class="btn follow_btn">
            @csrf
             <button type="submit" class="btn-primary"> フォローする</button>
        </form>
        @endif
</td>
        </tr>

    </div>

    {{-- 投稿一覧 --}}

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $post->post }}</p>
                <small class="text-muted">
                    投稿日: {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
        </div>
    @endforeach
</div>


</x-login-layout>
