@extends('frontend.layouts.layout')
@section('content')
    <style>

        .fc .fc-col-header-cell-cushion { /* needs to be same precedence */
            padding-top: 5px; /* an override! */
            padding-bottom: 5px; /* an override! */
        }
    </style>
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
                <p class="small">{{__('frontend.about_gsbc')}}</p>
                <h5 class="large">{{__('frontend.events')}}</h5>
            </div>
            <div class="event-grid">
                @if($events)
                    @foreach($events as $event)
                        <div class="event-info">
                            <div class="imgs">
                                <div class="">
                                    @if(isset($event->files[0]))
                                        <img src="{{$event->files[0]->path.'/'.$event->files[0]->name}}">
                                    @endif
                                </div>
                                <div class="over">
                                    <div class="each">
                                        <img src="/frontend-assets/gsbc/img/events/1.svg">
                                        <div class="txt">
                                            <p>{{(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->location : ''}}</p>
                                        </div>
                                    </div>
                                    <div class="each sec">
                                        <img src="/frontend-assets/gsbc/img/events/2.svg">
                                        <div class="txt">
                                            <p><strong>Starts At</strong></p>
                                            <p>{{date('H:i:s',strtotime($event->start_date))}}</p>
                                        </div>
                                    </div>
                                    <div class="each thir">
                                        <img src="/frontend-assets/gsbc/img/events/2.svg">
                                        <div class="txt">
                                            <p><strong>Ends At</strong></p>
                                            <p>{{date('H:i:s',strtotime($event->end_date))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <div class="date">
                                    <p class="s">{{date('M',strtotime($event->start_date))}}</p>
                                    <p class="l">{{date('d',strtotime($event->start_date))}}</p>
                                </div>
                                <div class="dec">
                                    <h6 class="title">{{(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->title : ''}}</h6>
                                    <p class="par">{{(count($event->availableLanguage) > 0) ? $event->availableLanguage[0]->description : ''}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{$events->links('frontend.vendor.pagination.events')}}

        </div>
    </section>



@endsection
