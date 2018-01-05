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