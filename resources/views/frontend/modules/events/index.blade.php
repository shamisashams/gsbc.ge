@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="events-body">
        <div class="wrapper">
            <div class="heading">
                <p class="small">ABOUT GSBC</p>
                <h5 class="large">Events</h5>
            </div>
            <div class="event-calendar">
                <!-- Git Repo: https://github.com/Russian60/flex-calendar -->
                <div ng-app="app">
                    <div ng-controller="MainController">

                        <div class="wrapp">
                            <flex-calendar options="options" events="events"></flex-calendar>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
