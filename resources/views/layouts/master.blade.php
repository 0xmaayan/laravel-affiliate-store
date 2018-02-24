<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114448833-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-114448833-1');
    </script>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('title', 'Lost In Space')
    <meta name="description" content="{{$settings['seo_description']}}">
    <meta name="keywords" content="{{$settings['seo_keywords']}}">
    <title>{{env('APP_NAME')}}</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}"/>
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('css/costume.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors/blue.css')}}" id="colors">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @stack('styles')
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

@include('includes.header')

@include('includes.topnav')

@include('includes.navbar')
<div style="margin-top: 30px;">
@yield('content')
</div>


<div id="footer">

    <!-- Container -->
    <div class="container">

            <div class="col-md-4 col-sm-12">
                <img src="{{asset('images/footer-logo.png')}}" alt="" class="margin-top-10 footer-logo"/>
                <p class="margin-top-15">Curated items from all over the Web,
                    Discover the best decorate products. All the Space Products are being chosen
                    by a real professional people from the industry.
                </p>
            </div>

            {{--<div class="col-md-3">

                <!-- Headline -->
                <h3 class="headline footer">Customer Service</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">Order Status</a></li>
                    <li><a href="#">Payment Methods</a></li>
                    <li><a href="#">Delivery & Returns</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>

            </div>--}}

            <div class="col-md-4 col-sm-12">
            @if(isset($account->id))
                <!-- Headline -->
                <h3 class="headline footer">My Account</h3>
                <span class="line"></span>
                <div class="clearfix"></div>

                <ul class="footer-links">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">Wish List</a></li>
                </ul>
            @endif
            </div>

            <div class="col-md-4 col-sm-12">

                <!-- Headline -->
                <h3 class="headline footer">Newsletter</h3>
                <span class="line"></span>
                <div class="clearfix"></div>
                <p class="newsletter_text">Sign up to receive email updates on new product announcements, gift ideas, special promotions, sales and more.</p>

                {!! Form::open(['id'=>'subscribe_form'])!!}
                    <input class="newsletter" name="email" type="email" placeholder="mail@example.com" value=""/>
                    {!! Form::submit('Join',['class'=>'newsletter-btn'])!!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <!-- Container / End -->

<div id="footer-bottom">

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 col-md-6">
                    <div>
                        © Copyright {{date("Y")}} by <a href="{{url('/')}}">lost in space</a>. All Rights Reserved.
                    </div>
                    <div>
                        <a target="_blank" href="terms-of-use">Terms Of Use</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="payment-icons">
                        <li><a href="{{$settings['pinterest']}}"><i class="fa fa-2x fa-pinterest"></i></a></li>
                        <li><a href="{{$settings['instagram']}}"><i class="fa fa-2x fa-instagram"></i></a></li>
                        <li><a href="mailto:{{$settings['email']}}"><i class="fa fa-2x fa-envelope-o"></i></a></li>
                    </ul>
                </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-12 text-left">--}}
                    {{--<a href="#">Privacy Policy</a> |--}}
                    {{--<a href="#">Terms & Conditions</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        </div>
    </div>
    <!-- Container / End -->

<div id="backtotop"><a href="#"></a></div>
</div>
<!-- Java Script
================================================== -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="{{asset('scripts/jquery.jpanelmenu.js')}}"></script>
<script src="{{asset('scripts/jquery.themepunch.plugins.min.js')}}"></script>
<script src="{{asset('scripts/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('scripts/jquery.themepunch.showbizpro.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/1.9.0/jquery.hoverIntent.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/js/superfish.min.js"></script>
<script src="{{asset('scripts/jquery.pureparallax.js')}}"></script>
{{--<script src="{{asset('scripts/jquery.pricefilter.js')}}"></script>--}}
{{--<script src="{{asset('scripts/jquery.selectric.min.js')}}"></script>--}}
{{--<script src="{{asset('scripts/jquery.royalslider.min.js')}}"></script>--}}
{{--<script src="{{asset('scripts/SelectBox.js')}}"></script>--}}
{{--<script src="{{asset('scripts/modernizr.custom.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.4/jquery.flexslider-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
{{--<script src="{{asset('scripts/jquery.tooltips.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.4/isotope.pkgd.min.js"></script>
{{--<script src="{{asset('scripts/puregrid.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/stacktable.js/1.0.3/stacktable.min.js"></script>
<script src="{{asset('scripts/custom.js')}}"></script>
<script src="{{asset('scripts/script.js')}}"></script>