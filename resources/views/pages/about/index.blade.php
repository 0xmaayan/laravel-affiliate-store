@extends('layouts.master')

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
                                    <img src="{{$recommend->main_image}}" alt="{{$recommend->name}}" style="max-width: 220px;max-height: 220px;margin: 0 auto;"/>
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
                    <div class="parallax-banner fullwidth-element"  data-background="#000" data-opacity="0.45" data-height="200">
                        <img src="" alt="" />
                        <div class="parallax-overlay"></div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <h1 style="margin: 52px auto 42px;max-width: 880px;">
                            Have a custom decorate <br>
                            With one of our decorates styling team
                        </h1>
                    </div>
                </div>

                <div class="col-md-12" style="margin: 52px 0px;">
                    <div class="col-md-10 col-md-offset-1">
                        <fieldset>
                            {!! Form::open(['route' => 'admin.products.store','files' => true]) !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! Form::label('name') !!}</label>
                                    {!! Form::text('name','',['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>{!! Form::label('Email *') !!}</label>
                                    {!! Form::text('email','example@gmail.com',['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! Form::label('Message: *') !!}</label>
                                    {!! Form::textarea('comment','',['size' => '80x4']) !!}
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