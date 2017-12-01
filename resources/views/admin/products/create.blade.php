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

        <div class="col-md-12">
            <h1>
                Add Product
            </h1>
        </div>

        <div class="col-md-6">
            {!! Form::open(['route' => 'products.store','files' => true]) !!}
            <div class="form-group">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('price') !!}</label>
                {!! Form::text('price','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('link') !!}</label>
                {!! Form::textarea('link','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('main image') !!}</label>
                {!! Form::file('main_image') !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('second image') !!}</label>
                {!! Form::file('second_image') !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('category') !!}</label>
                {!! Form::select('category_id', $categories_list,['class' => 'form-control']); !!}
            </div>
            {!! Form::submit('Save',['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>


    </div>
</div>
@endsection
