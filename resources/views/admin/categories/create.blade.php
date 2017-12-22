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
                Add Category
            </h1>
        </div>

        <div class="col-md-6">
            {!! Form::open(['route' => 'admin.categories.store','files' => true]) !!}
            <div class="form-group">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name','name',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('image') !!}</label>
                {!! Form::file('image') !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('second image') !!}</label>
                {!! Form::file('second_image') !!}
            </div>
            {!! Form::submit('Save',['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>


    </div>
</div>
@endsection
