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
        @if($content->id == 1)
                <div class="col-md-12">
                    <h1>
                        Edit <i>{{$content->name}}</i> Page
                    </h1>
                </div>

                {!! Form::open(['route' => ['admin.content.update',$content->id ],'files' => true ,'method' => 'PUT']) !!}
                <div class="form-group col-md-4">
                    <label>{!! Form::label('image 1') !!}</label>
                    {!! Form::file('image[]') !!}
                    {!! Form::text('image_text[]',$content['content'][0],['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label>{!! Form::label('image 2') !!}</label>
                    {!! Form::file('image[]') !!}
                    {!! Form::text('image_text[]',$content['content'][1],['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <label>{!! Form::label('image 3') !!}</label>
                    {!! Form::file('image[]') !!}
                    {!! Form::text('image_text[]',$content['content'][2],['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    <img style="width:100%" src="{{asset('images/home_slider/'.$content['files'][0])}}" alt="image 1">
                </div>
                <div class="form-group col-md-4">
                    <img style="width:100%" src="{{asset('images/home_slider/'.$content['files'][1])}}" alt="image 2">
                </div>
                <div class="form-group col-md-4">
                    <img style="width:100%" src="{{asset('images/home_slider/'.$content['files'][2])}}" alt="image 3">
                </div>
                {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
                {!! Form::close() !!}
        @elseif ($content->id == 2)
            <div class="col-md-12">
                <h1>
                    Edit <i>{{$content->name}}</i> Page
                </h1>
            </div>

            {!! Form::open(['route' => ['admin.content.update',$content->id ],'method' => 'PUT']) !!}
                <div class="form-group">
                    <label>{!! Form::label('') !!}</label>
                    {!! Form::textarea('about',$content->content,['class' => 'form-control']) !!}
                </div>
            {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
            {!! Form::close() !!}
        @endif
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@stop