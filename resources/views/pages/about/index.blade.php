@extends('layouts.master')
@section('title', 'About Us')
@section('ogurl', config('app.url').'/about-us')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 style="margin: 52px auto 42px;max-width: 880px;">
                        Curated items from all over the Web, <Br>
                        Discover the best decorate products.
                    </h1>
                </div>

                <!-- Container -->
                <div class="container">
                    <div class="col-md-12">
                        @foreach($recommends as $recommend)
                            <div class="card col-xs-6 col-md-4 col-sm-4 text-center product" style="margin-bottom: 20px;" onclick="trackingClick({{$recommend->id}})">
                                <a href="{{$recommend->link}}" target="_blank">
                                    <img src="{{$recommend->main_image}}" alt="{{$recommend->name}}" style="width: 220px;height: 220px;margin: 0 auto;"/>
                                </a>
                                <section style="padding-bottom: 0">
                                    <p class="card-text" style="margin:0;font-size:20px !important;">${{$recommend->price}}</p>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin: 52px 0px;">
                            <a href="{{route('products')}}" class="button adc" style="background-color:#bfc4ec">Show More</a>
                        </div>
                    </div>
                </div>
                <!-- Container / End -->

                <div class="col-md-12">
                    <div class="counter-box">
                        <h1 style="margin: 52px auto 42px;max-width: 880px;">
                            Linking to Amazon Products. <Br>
                            Amazon has a massive catalog, great shipping service, best costumer service and fantastic prices.
                        </h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <h1 style="margin: 52px auto 42px;max-width: 880px;">
                            Our Space Products are being selected and maintains <br>
                            by the Professionals in the decorated field.
                        </h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        @foreach($lastProducts as $lastProduct)
                            <div class="card col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center product" style="margin-bottom: 20px;" onclick="trackingClick({{$lastProduct->id}})">
                                <a href="{{$lastProduct->link}}" target="_blank">
                                    <img src="{{$lastProduct->main_image}}" alt="{{$lastProduct->name}}" style="width: 220px;height: 220px;margin: 0 auto;"/>
                                </a>
                                <section style="padding-bottom: 0">
                                    <p class="card-text" style="margin:0;font-size:20px !important;">${{$lastProduct->price}}</p>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="text-center">
                            <h1 style="margin: 52px auto 42px;max-width: 880px;">
                                Have a custom decorate <br>
                                With one of our decorates styling team
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin: 52px 0px;">
                    <div class="col-md-10 col-md-offset-1">
                        <div id="decorate_form_text"></div>
                        <fieldset>
                            {!! Form::open(['id'=>'customDecorate_form']) !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! Form::label('name') !!}</label>
                                    {!! Form::text('name','',['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{!! Form::label('Email *') !!}</label>
                                    {!! Form::text('email','',['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! Form::label('Message: *') !!}</label>
                                    {!! Form::textarea('message','',['size' => '80x4', 'required']) !!}
                                </div>
                            </div>
                            <div class="text-center">
                                {!! Form::submit('Send Message',['class' => 'submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection