
<div class="container">
    <div class="">

        <!-- Headline -->
        <div class="col-md-11">
            <h3 class="headline">New Arrivals</h3>
            <span class="line margin-bottom-0"></span>
        </div>

        <!-- Navigation -->
        <div class="showbiz-navigation col-md-1 pull-right">
            <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
            <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="clearfix"></div>


        <!-- Carousel -->
        <div id="new-arrivals" class="showbiz-container col-md-12">



            <!-- Products -->
            <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
                <div class="overflowholder">

                    <ul>
                        @foreach($products as $product)
                            <li>
                                <figure class="product">
                                    <div class="mediaholder">
                                        <a href="variable-product-page.html">
                                            <img alt="" src="{{asset('images/products/'.$product->main_image)}}"/>
                                            <div class="cover">
                                                <img alt="" src="{{asset('images/products/'.$product->second_image)}}"/>
                                            </div>
                                        </a>
                                        <a href="{{$product->link}}" class="product-button"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>

                                    <a href="variable-product-page.html">
                                        <section>
                                            <span class="product-category">{{$product->category_id}}</span>
                                            <h5>{{$product->name}}</h5>
                                            <span class="product-price">${{$product->price}}</span>
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
