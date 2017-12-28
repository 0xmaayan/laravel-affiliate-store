@extends('layouts.admin')

@section('content')
    <div id="page-wrapper" style="min-height: 902px;">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div style="padding-top:25px;"></div>
        <div class="row">
            <h1>
                Brands
                <a
                        class="btn btn-outline btn-info pull-right"
                        href="{{route('admin.brands.create')}}">Add Brand
                </a>
            </h1>

            @foreach($brands as $brand)
                <div class="col-md-4" style="">
                    <div class="card text-center">
                        <a href="{{route('admin.brands.edit',['id' => $brand->id ])}}">
                            <img class="card-img-top" style="width: 200px;height:200px;object-fit: contain;" src="{{asset('uploads/brands/'.$brand->id.'/'.$brand->image)}}" alt="category image">
                            <div class="card-block">
                                <h4 class="card-title">{{$brand->name}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
