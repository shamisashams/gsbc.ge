@extends('frontend.layouts.layout')
@section('content')
    <section class="about-showcase">
        <div class="overlay">
            <p class="title">{{__('frontend.about-us')}}</p>
            <p class="under">{{__('frontend.story_about_gsbc')}}</p>
        </div>
    </section>

    <section class="why-us-section in-about">
        <div class="wrapper">
            <div class="content">
                <div class="img">
                    <img src="/frontend-assets/gsbc/img/why-us/1.png">
                    <div class="abs-img">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="context">
                    <div class="heading">
                        <p class="expert">{{__('frontend.about_gsbc')}}</p>
                        <h5 class="title">{{__('frontend.gorgeous_history')}}</h5>
                    </div>
                    <p class="blue">{{__('frontend.history_text1')}}</p>
                    <p class="p">{{__('frontend.history_text2')}}</p>
                    <p class="p">{{__('frontend.history_text3')}}</p>
{{--                    <img class="sign" src="/frontend-assets/gsbc/img/icons/showcase/just-signature.png">--}}
                </div>
            </div>
        </div>
    </section>

    <div class="in-nothing">
        <p class="small">{{__('frontend.what_we_are_expert_at')}}</p>
        <h3 class="large">{{__('frontend.why_client_choose_us')}}</h3>
    </div>

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

    @if(count($councils) > 0)
        <section class="gsbc-board">
            <div class="wrapper">
                <div class="heading">
                    <p class="expert">{{__('frontend.what_we_are_expert_at')}}</p>
                    <h3 class="large">{{__('frontend.gsbc_board')}}</h3>
                </div>
                <div class="board-slide">
                    @foreach($councils as $council)
                        <div class="each-board">
                            <div class="img">
                                @if(count($council->files) > 0)
                                    <img src="{{url('storage/council/'.$council->id.'/'.$council->files[0]->name)}}">
                                @else
                                    <img src="{{url('noimage.png')}}">
                                @endif
                            </div>
                            <div class="context">
                                <h6 class="name">{{count($council->availableLanguage) > 0 ? $council->availableLanguage[0]->full_name: '' }} </h6>
                                <p class="pos">{{count($council->availableLanguage) > 0 ? $council->availableLanguage[0]->position : '' }}</p>
                                <a href="{{route('biography',[app()->getLocale(), $council->slug])}}" class="story"
                                   class="story">{{__('frontend.full_story')}}</a>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="arrows">
                <button id="prevar-board">
                    <img src="/frontend-assets/gsbc/img/icons/arrows/left-arrow.svg">
                </button>
                <button id="nextar-board">
                    <img src="/frontend-assets/gsbc/img/icons/arrows/right-arrow.svg">
                </button>
            </div>
        </section>

    @endif
@endsection
