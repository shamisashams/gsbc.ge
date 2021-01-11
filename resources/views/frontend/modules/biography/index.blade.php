@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay">
        </div>
    </section>
    <section class="biography-body">
        <div class="wrapper">
            <div class="content">
                <div class="left">
                    <img src="/frontend-assets/gsbc/img/biography/1.png">
                    <div class="personal-info">
                        <h6 class="name">{{__('frontend.svanidze_name')}}</h6>
                        <p class="pos">{{__('frontend.president')}}</p>
                        <p class="p"><strong>{{__('frontend.email')}}</strong> GS@GSBC.COM</p>
                        <p class="p"><strong>{{__('frontend.phone')}}</strong> +995 555 555 555</p>
                        <a href="#" class="vc">{{__('frontend.download')}} VCARD</a>
                    </div>
                </div>
                <div class="right">
                    <div class="bio">
                        <h6 class="title">{{__('frontend.biography')}}</h6>
                        <p class="para line">{{__('frontend.svanidze_text')}} </p>
                        <p class="para line">{{__('frontend.svanidze_text1')}}</p>
                        <p class="para">{{__('frontend.svanidze_text2')}}</p>
                    </div>
                    <div class="practice-areas">
                        <h6 class="title">{{__('frontend.practice_areas')}}</h6>
                        <div class="grid">
                            <div class="area">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>{{__('frontend.estate_planing')}}</p>
                            </div>
                            <div class="area">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>{{__('frontend.estate_planing')}}</p>
                            </div>
                            <div class="area">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>{{__('frontend.estate_planing')}}</p>
                            </div>
                            <div class="area">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>{{__('frontend.estate_planing')}}</p>
                            </div>
                            <div class="area">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>{{__('frontend.estate_planing')}}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
