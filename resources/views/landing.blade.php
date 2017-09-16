<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="asset('frontend/img/favicon.ico')" type="image/x-icon">
        <link rel="icon" href="asset('frontend/img/favicon.ico')" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">        

        <title>{{ settings('app_title') }} - @stack('title')</title>
        <link href="{{ mix('css/public.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack("extracss")
    </head>
    <body>

actually had 

<script src="{{ mix('js/public.js') }}">
</script>
@stack("extrajs")
@include('cookieConsent::index')
</body>
</html>
