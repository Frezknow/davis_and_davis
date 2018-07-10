<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Davis & Davis</title>
        <style>
        html,body{
          background-image:url('imgs/welcome.jpg');
        }
        </style>
        <!-- Fonts -->
        <link href="{{asset('css/part1.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           @if(auth()->user()!=null)
            <a class="TOP_A" href="{{route('home')}}">Dashboard</a>
           @else
           <a class="TOP_A" href="{{route('lg')}}">Login</a>
           @endif
            <div class="content">
                <div class="title m-b-md">
                    Davis & Davis
                </div>

                <div class="links">
                    <a href="{{route('methods')}}">Methods</a>
                    <a href="{{route('contactus')}}">Contact Us</a>
                    <a href="{{route('about')}}">About Us</a>
                  <!--  <a href="{{route('products')}}">Products</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
