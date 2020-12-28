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
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/main-bg.png">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/main-bg.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/handshake.png">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/handshake.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/why-us/1.png">
                            <img src="/frontend-assets/gsbc/img/why-us/1.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/main-bg.png">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/main-bg.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/handshake.png">
                            <img src="/frontend-assets/gsbc/img/icons/showcase/handshake.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
                <div class="event-info">
                    <div class="imgs">
                        <div class="img-slide">
                            <img src="/frontend-assets/gsbc/img/why-us/1.png">
                            <img src="/frontend-assets/gsbc/img/why-us/1.png">
                        </div>
                        <div class="over">
                                <div class="each">
                                    <img src="/frontend-assets/gsbc/img/events/1.svg">
                                    <div class="txt">
                                        <p><strong>Lorem Ipsum Street</strong></p>
                                        <p>Tbilisi, Georgia</p>
                                    </div>
                                </div>
                                <div class="each sec">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Starts At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                                <div class="each thir">
                                    <img src="/frontend-assets/gsbc/img/events/2.svg">
                                    <div class="txt">
                                        <p><strong>Ends At</strong></p>
                                        <p>21:00</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="caption">
                        <div class="date">
                            <p class="s">SEP</p>
                            <p class="l">18</p>
                        </div>
                        <div class="dec">
                            <h6 class="title">Georgia - Saudi Arabia Conference</h6>
                            <p class="par">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem dolor</p>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="page-nums">
                <button class="arr">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1"  x="0" y="0" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 512 512" xml:space="preserve"><g transform="matrix(-1,1.2246467991473532e-16,-1.2246467991473532e-16,-1,492.00405883789074,492.0039672851562)">
<g xmlns="http://www.w3.org/2000/svg">
    <g>
        <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12    c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028    c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265    c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z" fill="#000000" data-original="#000000" style=""/>
    </g>
</g></svg>

                </button>
                <div class="nums">
                    <button class="n active">1</button>
                    <button class="n">2</button>
                    <button class="n">3</button>
                    <button class="n">4</button>
                </div>
                <button class="arr">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;" xml:space="preserve">
<g>
    <g>
        <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
            c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
            c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
            c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
    </g>
</g>
</svg>
                </button>
            </div>  
        </div>
    </section>



<script>
  $(document).ready(function () {

        var SITEURL = "{{route('/',app()->getLocale())}}";

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var calendar = $('#calendar').fullCalendar({
            editable: false,
            events: SITEURL + "/getEvents",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: false,
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
