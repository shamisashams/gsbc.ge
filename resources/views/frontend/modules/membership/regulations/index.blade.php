@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="regulation">
        <div class="wrapper">
            <div class="heading">
                <p class="small">{{__('frontend.membership')}}</p>
                <h5 class="large">{{__('frontend.rules_regulations')}}</h5>
            </div>
            <div class="content">
                <p class="para">{{__('frontend.rules_text1')}}</p>
                <ul>
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text2')}}
                    </li>
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text3')}}
                    </li>
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text4')}}
                </ul>
                <p class="para">{{__('frontend.rules_text5')}}</p>
                <ul>
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text6')}}
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text7')}}
                    </li>
                    <li><span class="blue-dot"></span>{{__('frontend.rules_text8')}}
                    </li>
                </ul>
                <p class="para">{{__('frontend.rules_text9')}}</p>
                <p class="para">{{__('frontend.rules_text10')}} </p>
            </div>
        </div>
    </section>

@endsection
