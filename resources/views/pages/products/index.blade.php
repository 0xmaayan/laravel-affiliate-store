@extends('layouts.master')
@section('title', 'Products')
@section('content')
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