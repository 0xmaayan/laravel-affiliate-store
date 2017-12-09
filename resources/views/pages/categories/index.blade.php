@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Categories -->
                @foreach($categories as $category)
                    <div class="col-md-3" style="">
                        <div class="card text-center">
                            <a href="{{route('admin.categories.edit',['id' => $category->id ])}}">
                                <img class="card-img-top" style="margin:0 auto;width: 200px;height:200px;object-fit: contain;" src="{{asset('images/categories/'.$category->image)}}" alt="category image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection