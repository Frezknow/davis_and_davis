<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reynolds A/M</title>
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

            <div class="content">
                <div class="title m-b-md">
                    Reynolds Affiliate Marketing
                </div>

                <div class="links">
                    <a href="{{route('what')}}">A/Marketing</a>
                    <a href="{{route('about')}}">About Me</a>
                  <!--  <a href="{{route('products')}}">Products</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
