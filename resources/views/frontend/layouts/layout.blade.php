<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
          integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="{{asset('frontend-assets/css/style.css?v=').time()}}">
    @if(app()->getLocale()!=='en')
        <link rel="stylesheet" href="{{asset('frontend-assets/css/fonts.css?v=').time()}}">
    @endif

<!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- jQueryUI -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
            charset="utf-8"></script>


{{--    <link rel="stylesheet" href="bower_components/flex-calendar.css">--}}
{{--    <script type="text/javascript" src="bower_components/angular-translate/angular-translate.min.js.js"></script>--}}
{{--    <script type="text/javascript" src="bower_components/flex-calendar.js"></script>--}}

<!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/   js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly" defer ></script> -->


    <title>GSBC</title>

</head>
<body>

@include('frontend.layouts.partials.header')
<div class="container">
    @yield('content')
</div>
@include('frontend.layouts.partials.footer')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="{{asset('frontend-assets/js/general.js')}}"></script>
<script src="{{asset('frontend-assets/js/slide.js')}}"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
        integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>


{{--<script src="{{asset('frontend-assets/js/affiliate.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/slide.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/first.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/lang.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/general.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/login.js')}}"></script>--}}
{{--<script src="{{asset('frontend-assets/js/windows.js')}}"></script>--}}

</body>
</html>
