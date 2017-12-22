<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}} | Not Found</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: "Open Sans", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <img src="{{asset('images/footer-logo.png')}}" style="width:250px" alt="logo">
        </div>
        <div style="font-size:40px;font-weight: 500;">
            <h1>Have you got lost?</h1>
        </div>
        <div class="m-b-md">
            <h3>We have looked everywhere for your request and couldn't find anything</h3>
        </div>
        <div class="m-b-md">
            <h3>Try look in one of those sections</h3>
        </div>

        <div class="links">
            <a href="{{url('/categories')}}">Categories</a>
            <a href="{{url('/products')}}">Products</a>
            <a href="{{url('/brands')}}">Brands</a>
        </div>
    </div>
</div>
</body>
</html>
