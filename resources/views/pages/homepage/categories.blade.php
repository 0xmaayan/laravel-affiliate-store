
<div class="container">
    <div class="">

        <!-- Headline -->
        <div class="col-md-11">
            <h3 class="headline">Categories</h3>
            <span class="line margin-bottom-0"></span>
        </div>

        <!-- Navigation -->
        <div class="showbiz-navigation pull-right col-md-1">
            <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
            <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clearfix"></div>


        <!-- Carousel -->
        <div id="new-arrivals" class="showbiz-container col-md-12">



            <!-- Categories -->
            <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                <div class="overflowholder">

                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <figure class="product">
                                    <div class="mediaholder">
                                        <a href="{{$category->slug}}">
                                            @if(isset($category->files->image))
                                            <img alt="" src="{{asset('uploads/categories/'.$category->id.'/'.$category->files->image)}}"/>
                                            @endif
                                            <div class="cover">
                                            @if(isset($category->files->second_image))
                                            <img alt="" src="{{asset('uploads/categories/'.$category->id.'/'.$category->files->second_image)}}"/>
                                            @endif
                                            </div>
                                        </a>
                                        {{--<a href="{{$category->link}}" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>--}}
                                    </div>

                                    <a href="variable-product-page.html">
                                        <section>
                                            <h5>{{$category->name}}</h5>
                                        </section>
                                    </a>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
