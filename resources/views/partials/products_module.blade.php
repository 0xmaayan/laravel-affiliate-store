<div class="card col-xs-6 col-md-3 col-sm-4 text-center product" style="margin-bottom: 20px;" onclick="trackingClick({{$product->id}})">
    <a href="{{$product->link}}" target="_blank">
        <img src="{{$product->main_image}}" alt="{{$product->name}}" style="max-width: 220px;max-height: 220px;margin: 0 auto;"/>
    </a>
    <section style="padding-bottom: 0">
        {{--<h4 class="card-title">{{$product->name}}</h4>--}}
        <p class="card-text" style="margin:0;font-size:20px !important;">${{$product->price}}</p>
        {{--<a href="{{$product->link}}" class="btn-block shopNow" target="_blank">
            <i class="fa fa-shopping-cart"></i> Shop Now
        </a>--}}
    </section>
</div>