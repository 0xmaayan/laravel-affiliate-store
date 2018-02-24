<div class="container margin-bottom-25">

    <div class="col-md-12">
        <!-- Best Sellers -->
        <div class="col-md-4 col-sm-4">

            <!-- Headline -->
            <h3 class="headline">Best Sellers</h3>
            <span class="line margin-bottom-0"></span>
            <div class="clearfix"></div>


            <ul class="product-list">
                @foreach($mostClicked as $mostClick)
                <li><a href="{{$mostClick->link}}" onclick="trackingClick({{$mostClick->id}})" target="_blank">
                        <img src="{{$mostClick->main_image}}" alt="{{$mostClick->name}}" />
                        <div class="product-list-desc"><i>${{$mostClick->price}}</i></div>
                    </a>
                </li>
                @endforeach

                <li><div class="clearfix"></div></li>

            </ul>

        </div>


        <!-- Top Rated -->
        <div class="col-md-4 col-sm-4">

            <!-- Headline -->
            <h3 class="headline">Recommended</h3>
            <span class="line margin-bottom-0"></span>
            <div class="clearfix"></div>


            <ul class="product-list top-rated">
                @foreach($recommends as $recommend)
                <li>
                    <a href="{{$recommend->link}}" onclick="trackingClick({{$recommend->id}})" target="_blank">
                        <img src="{{$recommend->main_image}}" alt="{{$recommend->name}}"/>
                        <div class="product-list-desc with-rating"><i>${{$recommend->price}}</i>
                            <div class="rating five-stars">
                                <div class="star-rating"></div>
                                <div class="star-bg"></div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
                <li><div class="clearfix"></div></li>

            </ul>

        </div>


        <!-- Weekly Sales -->
        <div class="col-md-4 col-sm-4">

            <!-- Headline -->
            <h3 class="headline">New Arrival</h3>
            <span class="line margin-bottom-0"></span>
            <div class="clearfix"></div>


            <ul class="product-list">
                @foreach($newArrivals as $newArrival)
                <li><a href="{{$newArrival->link}}" onclick="trackingClick({{$newArrival->id}})" target="_blank">
                        <img src="{{$newArrival->main_image}}" alt="{{$newArrival->name}}" />
                        <div class="product-list-desc"><i>${{$newArrival->price}}</i></div>
                    </a></li>
                @endforeach
                <li><div class="clearfix"></div></li>
            </ul>

        </div>
    </div>

</div>
<div class="clearfix"></div>


