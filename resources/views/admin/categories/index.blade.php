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
            Categories
            <a
                    class="btn btn-outline btn-info pull-right"
                    href="{{route('admin.categories.create')}}">Add Category
            </a>
        </h1>

        @foreach($categories as $category)
            <div class="col-md-4" style="">
                <div class="card text-center">
                    <a href="{{route('admin.categories.edit',['id' => $category->id ])}}">
                        @if(isset($category->image))
                        <img class="card-img-top" src="{{asset('uploads/categories/'.$category->id.'/'.$category->image)}}" alt="category image">
                        @endif
                        <div class="card-block">
                            <h4 class="card-title">{{$category->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
