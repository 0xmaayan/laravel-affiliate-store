<div class="form-group col-md-4">
    <label>{!! Form::label('link') !!}</label>
    {!! Form::textarea('link',$product->link,['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-4">
    <img src="{{$product->main_image}}" alt="main product image">
</div>
