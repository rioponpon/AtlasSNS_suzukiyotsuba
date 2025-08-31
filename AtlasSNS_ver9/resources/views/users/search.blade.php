<x-login-layout>

<form action="{{ route('users.search') }}" method="post">
            <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{ $search }} @endif">

            <img class="search" src="./images/AtlasSNS_ver9/public/images/search.png." alt="検索" />
        </form>
        <!-- 検索ワードを表示 -->
         @if (!empty($keyword))
         <p>検索ワード:{{$keyword}}</p>
         @endif

         @section('content')
         {!! From::open(['method' => 'GET'])!!}
         {!! From::text('search' null,['placeholder' => 'ユーザー名'])!!}
         {!! From::submit('検索') !!}
         @if(isset($search))

         <td>検索したワード : {{ $request->input('search') }}</td>
         @else
         <td></td>
         @endif
         {!! From::close() !!}

         @foreach($users as $user)
         <tr>

        <td>({{ $user->image }})<td></td>{{{ $user->username }}}
         </tr>
         @endsection
</x-login-layout>
