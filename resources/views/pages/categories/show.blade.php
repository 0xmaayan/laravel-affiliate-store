@extends('layouts.master')
@section('title', $category->name)
@section('content')
    <div class="col-md-12 text-center">
        <h1 style="margin: 15px 0;">{{$category->name}}</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($products as $product)
                    @include('partials.products_module')
                @endforeach
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection