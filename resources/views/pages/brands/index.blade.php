@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Categories -->
                @foreach($brands as $brand)
                    <div class="col-md-3" style="">
                        <div class="card text-center">
                            <a href="{{route('admin.categories.edit',['id' => $brand->id ])}}">
                                <img class="card-img-top" style="margin:0 auto;width: 200px;height:200px;object-fit: contain;" src="{{asset('uploads/brands/'.$brand->image)}}" alt="category image">
                                <div class="card-block">
                                    <h4 class="card-title">{{$brand->name}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection