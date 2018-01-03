<div class="form-group col-md-4">
    <label>{!! Form::label('Affiliate link') !!}</label>
    {!! Form::textarea('affiliate_link',$product->link,['class' => 'form-control']) !!}
</div>
<div class="form-group col-md-4">
    <label>{!! Form::label('main image') !!}</label>
    {!! Form::file('main_image') !!}
    <img class="img-responsive" src="{{$product->main_image}}" alt="main product image">
</div>
