<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="International licensed brokerage company">
    <meta name="keywords" content="forex, Trading, viptrade, international">
    <meta name="author" content="Viptrade">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>VIPTRADE</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/frontend-assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style.css')}}">
</head>
<body>

@include('frontend.layouts.partials.header')
<div class="container">
    @yield('content')
</div>
@include('frontend.includes.facebook.fb-chat-en')
@include('frontend.layouts.partials.footer')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="{{asset('frontend-assets/js/affiliate.js')}}"></script>
<script src="{{asset('frontend-assets/js/slide.js')}}"></script>
<script src="{{asset('frontend-assets/js/first.js')}}"></script>
<script src="{{asset('frontend-assets/js/lang.js')}}"></script>
<script src="{{asset('frontend-assets/js/general.js')}}"></script>
<script src="{{asset('frontend-assets/js/login.js')}}"></script>
<script src="{{asset('frontend-assets/js/windows.js')}}"></script>

</body>
</html>
