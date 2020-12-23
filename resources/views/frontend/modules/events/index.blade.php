@extends('frontend.layouts.layout')
@section('content')
    <head>
        <title>Laravel 7 Fullcalendar Ajax Example Tutorial - XpertPhp</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="events-body">
        <div class="wrapper">
            <div class="heading">
                <p class="small">ABOUT GSBC</p>
                <h5 class="large">Events</h5>
            </div>
{{--            <div class="event-calendar">--}}
{{--                <!-- Git Repo: https://github.com/Russian60/flex-calendar -->--}}
{{--                <div ng-app="app">--}}
{{--                    <div ng-controller="MainController">--}}

{{--                        <div class="wrapp">--}}
{{--                            <flex-calendar options="options" events="events"></flex-calendar>--}}
{{--                        </div>--}}
{{--                        <br/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="container">
                <div class="response"></div>
                <div id='calendar'></div>
            </div>
        </div>
    </section>


@endsection
