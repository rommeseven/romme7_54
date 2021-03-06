<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- //REMEMBER: Add public favicon --}}
        <link rel="shortcut icon" href="{{asset('img/seven.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('img/seven.ico')}}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">        

        <title>*Night mode* {{ settings('app_title') }} - @stack('title')</title>
        <link href="{{ mix('css/public.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
        body
        {
            background:black;
        }
        </style>
        @stack("extracss")
    </head>
    <body>


<h3>Slogan: {{ $slogen }}</h3>
<div id="container">
    <div id="navigationbar">
		    @include('frontend.partials.navigation')
    </div>
    <div id="content">
		@stack("content")
        {{ $motto }}
        <hr/>
        <div id="footer row">
        <div class="column shrink">
            ©2013. Minden jog fenntartva!
            <br/>
            A weboldalt készítette: Takács László  ➺
            <a href="mailto://laszlo.takacs.95@gmail.com">
                laszlo.takacs.95@gmail.com
            </a>
            <h1>{{$teszti}}</h1>
            </div><!-- END OF .column shrink -->
        </div>
    </div>
</div>
<script src="{{ mix('js/public.js') }}">
</script>
@stack("extrajs")
</body>
</html>
