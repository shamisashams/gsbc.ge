@extends('frontend.layouts.layout')
@section('content')
    <section class="main-showcase">
        <div class="overlay">
            <div class="wrapper">
                <div class="content">
                    @if($welcome)
                        <p class="title">{{(count($welcome->availableLanguage) > 0) ?  $welcome->availableLanguage[0]->title : ''}}</p>
                        <p class="para">{!!(count($welcome->availableLanguage) > 0) ?  $welcome->availableLanguage[0]->body : ''!!}</p>
                    @endif
                    <a href="{{route('contact',app()->getLocale())}}" class="contact">
                        {{__('frontend.contact_now')}}
                        <img class="arrow" src="frontend-assets/gsbc/img/icons/showcase/right-arrow.svg">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="intro">
        <div class="wrapper">
            <div class="content">
                <div class="text">
                    @if($about)
                        <p class="title">{{(count($about->availableLanguage) > 0) ?  $about->availableLanguage[0]->title : ''}}</p>
                        <p class="para">{{(count($about->availableLanguage) > 0) ?  $about->availableLanguage[0]->body : ''}}</p>
                    @endif
{{--                    <img src="frontend-assets/gsbc/img/icons/showcase/just-signature.png">--}}
{{--                    <p class="geo-gs">CEO, GSBC</p>--}}
                </div>
                <div class="image">
                    @if(isset($about->files[0]))
                        <img src="{{$about->files[0]->path.'/'.$about->files[0]->name}}">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="legal-practice">
        <div class="wrapper">
            <div class="heading">
                <p class="expert">{{__('frontend.what_we_are_expert_at')}}</p>
                <h5 class="title">{{__('frontend.legal_practices_area')}}</h5>
            </div>
            <div class="legal-practice-grid">
                <a href="{{route('realestate',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/1.svg">
                    <p class="p">{{__('frontend.real_estate')}}</p>
                    <span></span>
                </a>
                <a href="{{route('agriculture',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/2.svg">
                    <p class="p">{{__('frontend.agriculture')}}</p>
                    <span></span>
                </a>
                <a href="{{route('construction',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/3.svg">
                    <p class="p">{{__('frontend.construction')}}</p>
                    <span></span>
                </a>
                <a href="{{route('renewableenergy',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/4.svg">
                    <p class="p">{{__('frontend.renewable_energy')}}</p>
                    <span></span>
                </a>
                <a href="{{route('logistics',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/5.svg">
                    <p class="p">{{__('frontend.logistics')}}</p>
                    <span></span>
                </a>
                <a href="{{route('projects',app()->getLocale())}}" class="legal-links">
                    <img src="frontend-assets/gsbc/img/icons/legal-practice/6.svg">
                    <p class="p">{{__('frontend.tourism')}}</p>
                    <span></span>
                </a>
            </div>
        </div>
    </section>
    <section class="news-section">
        <div class="heading">
            <p class="expert">{{__('frontend.what_we_are_expert_at')}}</p>
            <h5 class="title">{{__('frontend.news')}}</h5>
        </div>
        <div class="news-slide">
            @if($news)
                @foreach($news as $singleNews)
                    <div class="each-news">
                        <div class="img">
                            @if(isset($singleNews->files[0]))
                                <img src="{{$singleNews->files[0]->path.'/'.$singleNews->files[0]->name}}">
                            @endif
                        </div>
                        <div class="cont">
                            <a style="outline:none"
                               href="{{route('single-blog',[app()->getLocale(),$singleNews->slug])}}">
                                <h6 class="h">{{(count($singleNews->availableLanguage) > 0) ? $singleNews->availableLanguage[0]->title : ''}}
                                </h6>
                            </a>
                            <p class="p">{{(count($singleNews->availableLanguage) > 0) ? $singleNews->availableLanguage[0]->description : ''}}</p>
                        </div>
                        <div class="date">
                            <img src="frontend-assets/gsbc/img/icons/news/calendar.svg">
                            <p>{!! $singleNews->created_at !!}</p>
                        </div>
                        <span class="span one"></span>
                        <span class="span two"></span>
                    </div>

                @endforeach
            @endif

        </div>
        <div class="arrows">
            <button id="prevar-news">
                <img src="frontend-assets/gsbc/img/icons/arrows/left-arrow.svg">
            </button>
            <button id="nextar-news">
                <img src="frontend-assets/gsbc/img/icons/arrows/right-arrow.svg">
            </button>
        </div>
    </section>

    <section id="banner-pros" class="pros">
        <div class="overlay">
            <div class="wrapper">
                <div class="content">
                    @if($banner)
                        <div class="each-pro">
                            <h1 class="h counting" data-count="{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header : ''}}"> {{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header : ''}}</h1>
                            <p class="p">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text : ''}}</p>
                        </div>
                        <div class="each-pro">
                            <h1 class="h counting" data-count="{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_1 : ''}}">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_1 : ''}}</h1>
                            <p class="p">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_1 : ''}}</p>
                        </div>
                        <div class="each-pro">
                            <h1 class="h counting" data-count="{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_2 : ''}}"> {{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_2 : ''}}</h1>
                            <p class="p">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_2 : ''}}</p>
                        </div>
                        <div class="each-pro">
                            <h1 class="h counting" data-count="{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_3 : ''}}">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->header_3 : ''}}</h1>
                            <p class="p">{{(count($banner->availableLanguage) > 0) ? $banner->availableLanguage[0]->text_3 : ''}}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="why-us-section">
        <div class="wrapper">
            <div class="content">
                <div class="img">
                    @if(isset($chooseUs->files[0]))
                        <img src="{{$chooseUs->files[0]->path.'/'.$chooseUs->files[0]->name}}">
                    @endif
                    <div class="abs-img">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="context">
                    <div class="heading">
                        <p class="expert">{{__('frontend.what_we_are_expert_at')}}</p>
                        @if($chooseUs)
                            <h5 class="title">{{(count($chooseUs->availableLanguage) > 0) ? $chooseUs->availableLanguage[0]->title : ''}}</h5>
                        @endif
                    </div>
                    @if($chooseUs)
                        <p class="blue"> {{ (count($chooseUs->availableLanguage) > 0) ? $chooseUs->availableLanguage[0]->body : '' }}</p>
                        <p class="p">{{ (count($chooseUs->availableLanguage) > 0) ? $chooseUs->availableLanguage[0]->body_2 : '' }}</p>
                    @endif
                    <a href="{{route('about-us',app()->getLocale())}}" class="learn">
                        <p>{{__('frontend.learn_more')}}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                             class=""><g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M508.875,248.458l-160-160c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l141.792,141.792    H10.667C4.771,245.333,0,250.104,0,256s4.771,10.667,10.667,10.667h464.917L333.792,408.458c-4.167,4.167-4.167,10.917,0,15.083    c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125l160-160C513.042,259.375,513.042,252.625,508.875,248.458z"
                                            data-original="#000000" style=""/>
                                    </g>
                                </g></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- <section class="contact-article">
        <div class="left">
            <div class="content">
                <h5 class="head">Contact Info</h5>
                <p class="call-now">Call Now : (995) 555 555 555</p>
                <div class="calls">
                    <a href="#" class="flex">
                        <img src="frontend-assets/gsbc/img/icons/contact/envelope.svg">
                        <p>Call Now : (995) 555 555 555</p>
                    </a >
                    <a href="#" class="flex">
                        <img src="frontend-assets/gsbc/img/icons/contact/envelope.svg">
                        <p>Call Now : (995) 555 555 555</p>
                    </a>
                    <a href="#" class="flex">
                        <img src="frontend-assets/gsbc/img/icons/contact/envelope.svg">
                        <p>Call Now : (995) 555 555 555</p>
                    </a>
                </div>
                <p class="para">Far far away, behind the word mountains, far from thte countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="subscribe">
                    <input type="text">
                    <button class="sub">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="overlay">
                <h5 class="head">Recent Articles</h5>
                <div class="articles">
                    <a href="#" class="each-article">
                        <img src="frontend-assets/gsbc/img/articles/1.png">
                        <div class="text">
                            <h6 class="h">Domestic Violence in California – How a Lawyer Can Help</h6>
                            <p class="p">February 28, 2020 / John Smith / Antristut, Family, GSBC.</p>
                        </div>
                    </a>
                    <a href="#" class="each-article">
                        <img src="frontend-assets/gsbc/img/articles/2.png">
                        <div class="text">
                            <h6 class="h">Domestic Violence in California – How a Lawyer Can Help</h6>
                            <p class="p">February 28, 2020 / John Smith / Antristut, Family, GSBC.</p>
                        </div>
                    </a>
                    <a href="#" class="each-article last-child">
                        <img src="frontend-assets/gsbc/img/articles/3.png">
                        <div class="text">
                            <h6 class="h">Domestic Violence in California – How a Lawyer Can Help</h6>
                            <p class="p">February 28, 2020 / John Smith / Antristut, Family, GSBC.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section> -->

@endsection
