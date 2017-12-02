<div class="container">
    <!-- Logo -->
    <div class="col-md-12">
        <div id="logo" class="col-md-12">
            <h1><a href="{{env('APP_URL')}}">
                    @foreach($settings as $setting)
                    <img src="{{asset('images/logo/'.$setting->logo)}}" alt="lostInSpace_logo" />
                    @endforeach
                </a>
            </h1>
        </div>
    </div>
</div>