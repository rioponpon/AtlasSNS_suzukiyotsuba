        <div id="head">
            <div class="atlas"><a href="{{ URL::to('/top') }}"><img src="{{asset('images/atlas.png')}}" class="atlas-png"></a></div>
            <div id="">
                <div id="">
                    <div class="name">{{Auth::user()->username}}さん</div>
                    <img class="icon" src="{{ asset('images/' . Auth::user()->icon_image) }}">

                </div>

            </div>
        </div>
