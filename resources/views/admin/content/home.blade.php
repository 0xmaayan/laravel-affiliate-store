<div class="col-md-12">
    <h1>
        Edit <i>{{$content->name}}</i> Page
    </h1>
</div>

{!! Form::open(['route' => ['admin.content.update',$content->id ],'files' => true ,'method' => 'PUT']) !!}
{{-- <div class="form-group col-md-4">
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
 </div>--}}
<div class="form-group col-md-4">
    <img style="width:100%" src="{{asset('images/home_slider/slider0.png')}}" alt="image 1">
</div>
<div class="form-group col-md-4">
    <img style="width:100%" src="{{asset('images/home_slider/slider11.png')}}" alt="image 2">
</div>
<div class="form-group col-md-4">
    <img style="width:100%" src="{{asset('images/home_slider/slider2.png')}}" alt="image 3">
</div>
{{--{!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}--}}
{!! Form::close() !!}