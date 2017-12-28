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
                Add Product
            </h1>
        </div>

        {!! Form::open(['route' => 'admin.products.store','files' => true]) !!}
        <div class="col-md-6">
            <div class="form-group">
                <label>{!! Form::label('name') !!}</label>
                {!! Form::text('name','',['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>{!! Form::label('price') !!}</label>
                {!! Form::text('price','',['class' => 'form-control']) !!}
            </div>
            <hr>
            {{--<div class="form-group">
                <label>{!! Form::label('link') !!}</label>
                {!! Form::text('link','',['class' => 'form-control']) !!}
            </div>--}}
            <div class="form-group">
                <label>{!! Form::label('main image') !!}</label>
                {!! Form::file('main_image',['class' => 'form-control col-md-12']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="width:100%;">{!! Form::label('category') !!}</label>
                {!! Form::select('category_id', $categories_list,null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label style="width:100%;">{!! Form::label('brand') !!}</label>
                {!! Form::select('brands_id', $brands_list,null,['class' => 'form-control']) !!}
            </div>
            <hr>
            <div class="form-group">
                <label>{!! Form::label('Affiliate link') !!}</label>
                {!! Form::textarea('affiliate_link','',['class' => 'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Save',['class' => 'btn btn-default btn-block']) !!}
        {!! Form::close() !!}

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
@endsection
