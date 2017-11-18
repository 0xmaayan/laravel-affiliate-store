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
            <h1>Settings</h1>
        </div>
        {!! Form::open(['route' => 'settings.store','files' => true]) !!}
        <div class="col-md-12">
            <div class="form-group text-center">
                <label>{!! Form::label('logo') !!}</label>
                {!! Form::file('logo',['style' => 'margin:0 auto']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{!! Form::label('title') !!}</label>
                {!! Form::text('title','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('SEO description') !!}</label>
                {!! Form::textarea('seo_description','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('SEO keywords') !!}</label>
                <span>- Seperated by comma</span>
                {!! Form::textarea('seo_keywords','',['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>{!! Form::label('site email') !!}</label>
                {!! Form::text('email','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('instagram') !!}</label>
                {!! Form::text('instagram','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('pinterest') !!}</label>
                {!! Form::text('pinterest','',['class' => 'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Save',['class' => 'btn btn-default btn-block']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
