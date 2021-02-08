@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="contact-body">
        <div class="wrapper">
            <div class="content">
                <div class="left">
                    <h2 class="title">{{__('frontend.contact-us')}}</h2>
{{--                    <p class="para">{{__('frontend.our_award_wining')}}</p>--}}
                    @foreach($contacts as $contact)
                        @if(count($contact->availableLanguage)>0)
                            @if($contact->key==='phone')
                                <a href="#" class="contact-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512"
                                         x="0"
                                         y="0" viewBox="0 0 405.333 405.333" style="enable-background:new 0 0 512 512"
                                         xml:space="preserve"><g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"
                                                        data-original="#000000" style=""/>
                                                </g>
                                            </g></svg>
                                    <p>{{$contact->availableLanguage[0]->value}}</p>
                                </a>
                            @endif

                            @if($contact->key==='contact_email')
                                <a href="#" class="contact-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512"
                                         x="0"
                                         y="0" viewBox="0 0 230.17 230.17" style="enable-background:new 0 0 512 512"
                                         xml:space="preserve"><g>
                                            <g xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M230,49.585c0-0.263,0.181-0.519,0.169-0.779l-70.24,67.68l70.156,65.518c0.041-0.468-0.085-0.94-0.085-1.418V49.585z"
                                                    data-original="#000000" style=""/>
                                                <path
                                                    d="M149.207,126.901l-28.674,27.588c-1.451,1.396-3.325,2.096-5.2,2.096c-1.836,0-3.672-0.67-5.113-2.013l-28.596-26.647   L11.01,195.989c1.717,0.617,3.56,1.096,5.49,1.096h197.667c2.866,0,5.554-0.873,7.891-2.175L149.207,126.901z"
                                                    data-original="#000000" style=""/>
                                                <path
                                                    d="M115.251,138.757L222.447,35.496c-2.427-1.443-5.252-2.411-8.28-2.411H16.5c-3.943,0-7.556,1.531-10.37,3.866   L115.251,138.757z"
                                                    data-original="#000000" style=""/>
                                                <path
                                                    d="M0,52.1v128.484c0,1.475,0.339,2.897,0.707,4.256l69.738-67.156L0,52.1z"
                                                    data-original="#000000" style=""/>
                                            </g></svg>
                                    <p>{{$contact->availableLanguage[0]->value}}</p>
                                </a>
                            @endif

                            @if($contact->key==='time')
                                <a href="#" class="contact-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512"
                                         x="0"
                                         y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512"
                                         xml:space="preserve" class=""><g>
                                            <path xmlns="http://www.w3.org/2000/svg"
                                                  d="m221.647 0c-122.214 0-221.647 99.433-221.647 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647-99.433-221.647-221.647-221.647zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z"
                                                  data-original="#000000" style="" class=""/>
                                            <path xmlns="http://www.w3.org/2000/svg"
                                                  d="m235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z"
                                                  data-original="#000000" style="" class=""/>
                                        </g></svg>

                                    <p>{{$contact->availableLanguage[0]->value}}</p>
                                </a>
                            @endif
                        @endif

                    @endforeach

                    <div class="social-media">
                        @if($facebook && count($facebook->availableLanguage)>0)
                            <a href="{{$facebook->availableLanguage[0]->value}}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512"
                                     height="512"
                                     x="0" y="0" viewBox="0 0 155.139 155.139"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve"
                                     class=""><g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <path id="f_1_" style=""
                                                  d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184   c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452   v20.341H37.29v27.585h23.814v70.761H89.584z"
                                                  data-original="#010002" class=""/>
                                        </g></svg>
                            </a>
                        @endif

                        @if($twitter && count($twitter->availableLanguage)>0)
                            <a href="{{$twitter->availableLanguage[0]->value}}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512"
                                     height="512"
                                     x="0" y="0" viewBox="0 0 512 512"
                                     style="enable-background:new 0 0 512 512"
                                     xml:space="preserve" class=""><g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"
                                                    data-original="#000000" style="" class=""/>
                                            </g>
                                        </g></svg>

                            </a>
                        @endif

                        @if($behance && count($behance->availableLanguage)>0)
                            <a href="{{$behance->availableLanguage[0]->value}}">
                                Bё
                            </a>
                        @endif

                        @if($instagram && count($instagram->availableLanguage)>0)
                            <a href="{{$instagram->availableLanguage[0]->value}}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512"
                                     height="512"
                                     x="0" y="0" viewBox="0 0 552.77 552.77"
                                     style="enable-background:new 0 0 512 512" xml:space="preserve"
                                     class=""><g>
                                        <g xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M17.95,528.854h71.861c9.914,0,17.95-8.037,17.95-17.951V196.8c0-9.915-8.036-17.95-17.95-17.95H17.95    C8.035,178.85,0,186.885,0,196.8v314.103C0,520.816,8.035,528.854,17.95,528.854z"
                                                    data-original="#000000" style="" class=""/>
                                                <path
                                                    d="M17.95,123.629h71.861c9.914,0,17.95-8.036,17.95-17.95V41.866c0-9.914-8.036-17.95-17.95-17.95H17.95    C8.035,23.916,0,31.952,0,41.866v63.813C0,115.593,8.035,123.629,17.95,123.629z"
                                                    data-original="#000000" style="" class=""/>
                                                <path
                                                    d="M525.732,215.282c-10.098-13.292-24.988-24.223-44.676-32.791c-19.688-8.562-41.42-12.846-65.197-12.846    c-48.268,0-89.168,18.421-122.699,55.27c-6.672,7.332-11.523,5.729-11.523-4.186V196.8c0-9.915-8.037-17.95-17.951-17.95h-64.192    c-9.915,0-17.95,8.035-17.95,17.95v314.103c0,9.914,8.036,17.951,17.95,17.951h71.861c9.915,0,17.95-8.037,17.95-17.951V401.666    c0-45.508,2.748-76.701,8.244-93.574c5.494-16.873,15.66-30.422,30.488-40.649c14.83-10.227,31.574-15.343,50.24-15.343    c14.572,0,27.037,3.58,37.393,10.741c10.355,7.16,17.834,17.19,22.436,30.104c4.604,12.912,6.904,41.354,6.904,85.33v132.627    c0,9.914,8.035,17.951,17.949,17.951h71.861c9.914,0,17.949-8.037,17.949-17.951V333.02c0-31.445-1.982-55.607-5.941-72.48    S535.836,228.581,525.732,215.282z"
                                                    data-original="#000000" style="" class=""/>
                                            </g>
                                        </g></svg>

                            </a>
                        @endif

                    </div>
                </div>
                <div class="form">
                    <div class="input-grid">
                        <input type="text" name="" placeholder="{{__('frontend.email_form_name')}}">
                        <input type="text" name="" placeholder="{{__('frontend.email_form_email')}}">
                        <input type="tel" name="" placeholder="{{__('frontend.email_form_phone')}}">
                        <input type="text" name="" placeholder="Lorem Ipsum">
                    </div>
                    <textarea placeholder="{{__('frontend.email_form_message')}}"></textarea>
                    <div class="button">
                        <button class="send">{{__('frontend.send_message_button')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
