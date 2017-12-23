

<div class="container fullwidth-element home-slider">

    <div class="tp-banner-container col-md-12">
        <div class="tp-banner">
            <ul>
                @if($contents[0]['files'])
                <!-- Slide 1  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
                    <img src="{{asset('uploads/home_slider/'.$contents[0]['files'][0])}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    {{--<div class="caption dark sfb fadeout" data-x="850" data-y="200" data-speed="400" data-start="800"  data-easing="Power4.easeOut">--}}
                        {{--<h2>Urban Style</h2>--}}
                        {{--<h3>Every cut and colour</h3>--}}
                        {{--<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>--}}
                    {{--</div>--}}
                </li>


                <!-- Slide 2  -->
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500" >
                    <img src="{{asset('uploads/home_slider/'.$contents[0]['files'][1])}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    {{--<div class="caption sfb fadeout" data-x="500" data-y="400" data-speed="400" data-start="800"  data-easing="Power4.easeOut">--}}
                        {{--<h2>Dress Sharp</h2>--}}
                        {{--<h3>Learn from the classics</h3>--}}
                        {{--<a href="shop-with-sidebar.html" class="caption-btn">Shop The Collection</a>--}}
                    {{--</div>--}}
                </li>


                <!-- Slide 3  -->
                <li data-transition="fadetotopfadefrombottom" data-slotamount="7" data-masterspeed="1000">
                    <img src="{{asset('uploads/home_slider/'.$contents[0]['files'][2])}}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    <div class="caption dark sfb fadeout" data-x="970" data-y="250" data-speed="400" data-start="800"  data-easing="Power4.easeOut">
                        {{--<h2>New In</h2>--}}
                        {{--<h3>Pants and T-Shirts</h3>--}}
                        <a href="shop-with-sidebar.html" class="caption-btn">JOIN NOW!</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
