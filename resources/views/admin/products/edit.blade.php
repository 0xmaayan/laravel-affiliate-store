@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
<div id="page-wrapper" style="min-height: 902px;">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div style="padding-top:25px;"></div>
    <div class="row">

        <div class="col-md-12">
            <h1>
                Edit {{$product->name}}
            </h1>
        </div>

        <div class="col-md-12">
            {!! Form::open(['route' => ['products.update',$product->id ],'files' => true ,'method' => 'PUT']) !!}
            <div class="form-group col-md-4">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('link') !!}</label>
                {!! Form::text('link',$product->link,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('price') !!}</label>
                {!! Form::text('price',$product->price,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <label>{!! Form::label('main image') !!}</label>
                {!! Form::file('main_image') !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('second image') !!}</label>
                {!! Form::file('second_image') !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('category') !!}</label>
                {!! Form::select('category_id', $categories_list,['class' => 'form-control']); !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <img width="150" height="150" src="{{asset('images/products/'.$product->main_image)}}" alt="main product image">
            </div>
            <div class="form-group col-md-4">
                <img width="150" height="150" src="{{asset('images/products/'.$product->second_image)}}" alt="second product image">
            </div>
            {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
