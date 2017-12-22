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
            {!! Form::open(['route' => ['admin.products.update',$product->id ],'files' => true ,'method' => 'PUT']) !!}
            <div class="form-group col-md-4">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('price') !!}</label>
                {!! Form::text('price',$product->price,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label style="width:100%;">{!! Form::label('brand') !!}</label>
                {!! Form::select('brand_id', $brands_list,$product->brands->id,['class' => 'form-control col-md-12']); !!}
            </div>
        </div>
        <div class="col-md-12">
            @if($product->brands->name == 'Amazon')
                @include('admin.products.linkaffiliate')
            @else
                @include('admin.products.image')
            @endif
            <div class="form-group col-md-4">
                <label style="width:100%;">{!! Form::label('category') !!}</label>
                {!! Form::select('category_id', $categories_list,$product->category->id,['class' => 'form-control']); !!}
            </div>
        </div>
        <div class="col-md-12">
            {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
