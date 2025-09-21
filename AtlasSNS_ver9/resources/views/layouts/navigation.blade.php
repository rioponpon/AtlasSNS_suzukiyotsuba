        <div id="head">
            <h1><a href="{{ URL::to('/top') }}"><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <div class="name">{{Auth::user()->username}}さん</div>
                    <img class="icon">{{Auth::user()->icon_image}}</img>

                </div>

            </div>
        </div>
