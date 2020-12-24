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
           {{-- <div class="event-calendar">--}}
{{--                <!-- Git Repo: https://github.com/Russian60/flex-calendar -->--}}
{{--                <div ng-app="app">--}}
{{--                    <div ng-controller="MainController">--}}

{{--                        <div class="wrapp">--}}
{{--                            <flex-calendar options="options" events="events"></flex-calendar>--}}
{{--                        </div>--}}
{{--                        <br/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div> --}}

            <div class="container">
                <div class="response"></div>
                <div id='calendar'></div>
            </div>
        </div>
    </section>



<script>
  $(document).ready(function () {

        var SITEURL = "{{url('/')}}";

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/getEvents",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {

                // var title = prompt('Event Title:');

                // if (title) {
                //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                //     $.ajax({
                //         url: SITEURL + "booking/create",
                //         data: 'title=' + title + '&amp;start=' + start + '&amp;end=' + end,
                //         type: "POST",
                //         success: function (data) {
                //             displayMessage("Added Successfully");
                //         }
                //     });
                //     calendar.fullCalendar('renderEvent',
                //             {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //                 allDay: allDay
                //             },
                //     true
                //             );
                // }
                // calendar.fullCalendar('unselect');
            },

            eventDrop: function (event, delta) {
                        // var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        // var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        // $.ajax({
                        //     url: SITEURL + 'booking/update',
                        //     data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
                        //     type: "POST",
                        //     success: function (response) {
                        //         displayMessage("Updated Successfully");
                        //     }
                        // });
                    },
            eventClick: function (event) {
                // var deleteMsg = confirm("Do you really want to delete?");
                // if (deleteMsg) {
                //     $.ajax({
                //         type: "POST",
                //         url: SITEURL + 'booking/delete',
                //         data: "&amp;id=" + event.id,
                //         success: function (response) {
                //             if(parseInt(response) > 0) {
                //                 $('#calendar').fullCalendar('removeEvents', event.id);
                //                 displayMessage("Deleted Successfully");
                //             }
                //         }
                //     });
                // }
            }

        });
  });

  function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }
</script>


@endsection
