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
                Edit <i>{{$brand->name}}</i> Brand
            </h1>
        </div>

        <div class="col-md-12">
            <div class="col-md-9">
                {!! Form::open(['route' => ['admin.brands.update',$brand->id ],'files' => true ,'method' => 'PUT']) !!}
                <div class="form-group col-md-4">
                    <label>{!! Form::label('name') !!}</label>
                    {!! Form::text('name',$brand->name,['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label>{!! Form::label('image') !!}</label>
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group col-md-4">
                    <img width="150" height="150" src="{{asset('uploads/brands/'.$brand->id.'/'.$brand->image)}}" alt="category image">
                </div>
                {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
                {!! Form::close() !!}

            </div>
            <div class="col-md-3">
                {!! Form::open(['route' => ['admin.brands.destroy',$brand->id ],'method' => 'DELETE']) !!}
                <div class="form-group col-md-12">
                    {!! Form::submit('Delete Brand',['class' => 'btn btn-danger col-md-12']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
