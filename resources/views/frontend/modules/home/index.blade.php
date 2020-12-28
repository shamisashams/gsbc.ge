@extends('frontend.layouts.layout')
@section('content')
    <section class="main-showcase">
        <div class="overlay">
            <div class="wrapper">
                <div class="content">
                    
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
                    
                    <img src="frontend-assets/gsbc/img/icons/showcase/just-signature.png">
                    <p class="geo-gs">CEO, GSBC</p>
                </div>
                <div class="image">
                    
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
                <a href="#" class="legal-links">
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

    <section class="pros">
        <div class="overlay">
            <div class="wrapper">
                <div class="content">
                    <div class="each-pro">
                        <h1 class="h">1000+</h1>
                        <p class="p">Client Consultations</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">95%</h1>
                        <p class="p">Successful Cases</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">10mlns</h1>
                        <p class="p">Recovered cost for clients</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">30+</h1>
                        <p class="p">Professional Attorneys</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-us-section">
        <div class="wrapper">
            <div class="content">
                <div class="img">
                    
                    <div class="abs-img">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="context">
                    <div class="heading">
                        <p class="expert">{{__('frontend.what_we_are_expert_at')}}</p>
                        
                    </div>
                    
                    <a href="{{route('about-us',app()->getLocale())}}" class="learn">
                        <p>Learn More</p>
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
