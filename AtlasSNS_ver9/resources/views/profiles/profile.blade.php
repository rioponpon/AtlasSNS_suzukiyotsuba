<x-login-layout>




    {{-- ユーザー情報 --}}

    <div class="profile">

       <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="myIcon">
     <div class="profile-info">
        <p><span class="mi">ユーザー名</span><span class="value">{{ $user->username }}</span></p>
        <p><span class="mi">自己紹介</span><span class="value">{{ $user->bio }}</span></P>
        </div>


          @csrf
    <input type="hidden" name="user_id" value="{{ $user->username }}">
        @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',[$user->id]) }}" class="btn unfollow_btn">
@csrf
        <button type="submit" class="btn-unfollow">フォロー解除</button>
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
    <div class="card-body">

    <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="MyIcon">
     <div class="post-name">{{ $post->user->username }}</div>

                <div class="post">{{ $post->post }}</div>
                <small class="text-muted">
                    投稿日: {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
    @endforeach



</x-login-layout>
