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
                Edit {{$product->name}}
            </h1>
        </div>

        <div class="col-md-12">
            {!! Form::open(['route' => ['admin.products.update',$product->id ],'files' => true ,'method' => 'PUT']) !!}
            <div class="form-group col-md-4">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name',$product->name,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label>{!! Form::label('price') !!}</label>
                {!! Form::text('price',$product->price,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                <label style="width:100%;">{!! Form::label('brand') !!}</label>
                {!! Form::select('brand_id', $brands_list,$product->brands->id,['class' => 'form-control col-md-12']); !!}
            </div>
        </div>
        <div class="col-md-12">
                @include('admin.products.linkaffiliate')
            <div class="form-group col-md-4">
                <label style="width:100%;">{!! Form::label('category') !!}</label>
                    {{--make array of all category product relation to know which checkbox to check--}}
                  @foreach($product->category as $categoryProduct)
                    <?php  $all_data[] =  $categoryProduct->id ?>
                  @endforeach

                @foreach($categories_list as $key => $category)
                <div class="form-control">
                    {!! Form::checkbox('category_id[]',
                     $key,
                     in_array($key, isset($all_data) ? $all_data : []),
                      []); !!}
                    {{$category}}
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            {!! Form::submit('Update',['class' => 'btn btn-default col-md-12']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
