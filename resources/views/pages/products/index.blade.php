@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($products as $product)
                    <div class="card col-md-3 col-sm-4 text-center product" style="margin-bottom: 20px;" onclick="trackingClick({{$product->id}})">
                        <a href="{{$product->link}}" target="_blank">
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
@endsection