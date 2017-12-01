@push('styles')
    <style>
        .shopNow {
            color:#fff;
            background: rgba(0, 0, 0, 0.45);
            padding: 5px 0;
            -o-transition:color .2s ease-out, background 0.2s ease-in;
            -ms-transition:color .2s ease-out, background 0.2s ease-in;
            -moz-transition:color .2s ease-out, background 0.2s ease-in;
            -webkit-transition:color .2s ease-out, background 0.2s ease-in;
            /* ...and now override with proper CSS property */
            transition:color .2s ease-out, background 0.2s ease-in;
            text-decoration: none
        }
        .shopNow:hover {
            text-decoration: none;
            background: rgba(0, 0, 0, 0.65);
            color:#fff;
        }
    </style>
@endpush

<div class="col-md-12 text-center">
    <h1 style="margin: 15px 0;">Products</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($products as $product)
                <div class="card col-md-3 col-sm-4 text-center product" style="margin-bottom: 20px;">
                    <a href="variable-product-page.html">
                        <img src="{{$product->main_image}}" alt="product image" style="width:100%"/>
                    </a>
                    <section style="padding-bottom: 0">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text" style="margin:0;">${{$product->price}}</p>
                        <a href="{{$product->link}}" class="btn-block shopNow" target="_blank">
                            <i class="fa fa-shopping-cart"></i> Shop Now
                        </a>
                    </section>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="clearfix"></div>
