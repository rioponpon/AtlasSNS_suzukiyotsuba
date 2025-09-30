<div id="head">
    <div class="atlas">
        <a href="{{ URL::to('/top') }}">
            <img src="{{asset('images/atlas.png')}}" class="atlas-png">
        </a>
    </div>

    <div class="side_user">
        <div class="name">{{Auth::user()->username}}さん</div>

        <div class="accordion-item">
            <div class="accordion-title js-accordion-title">

            </div>

            <div class="accordion-content">
            <ul class="menu">
                <li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
                <li><a class="profileUpdate" href="{{ URL::to('/profile/' . Auth::user()->id .'/update-form') }}">プロフィール編集</a></li>
                <li><a class="center" href="/logout">ログアウト</a></li>
            </ul>
            </div>
        </div>

        <img class="icon" src="{{ asset('images/' . Auth::user()->icon_image) }}">


    </div>
</div>



<!-- <div id="accordion" class="accordion_container">
    <div class="accordion-title js-accordion-title"></div>
        <div class="arrow-bottom">



<ul class="menu">
<li><a class="home" href="{{ URL::to('/top') }}">HOME</a></li>
<li><a class="profileUpdate" href="{{ URL::to('/profile/' . Auth::user()->id .'/update-form') }}">プロフィール編集</a></li>
<li><a class="center" href="/logout">ログアウト</a></li>
</ul>
</div>

    </div>
    </div>
    </div> -->
