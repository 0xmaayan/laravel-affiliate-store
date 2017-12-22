<div class="form-group col-md-4">
    <label>{!! Form::label('main image') !!}</label>
    {!! Form::file('main_image') !!}
    <div class="form-group">
        <img width="150" height="150" src="{{asset('uploads/products/'.$product->id.'/'.$product->main_image)}}" alt="main product image">
    </div>
</div>
<div class="form-group col-md-4">
    <label>{!! Form::label('link') !!}</label>
    {!! Form::text('link',$product->link,['class' => 'form-control']) !!}
</div>