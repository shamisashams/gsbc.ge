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
                    @if(count($council->files) > 0)
                        <img src="{{url('storage/council/'.$council->id.'/'.$council->files[0]->name)}}">
                    @else
                        <img src="{{url('noimage.png')}}">
                    @endif
s                    <div class="personal-info">
                        <h6 class="name">{{count($council->availableLanguage) > 0 ? $council->availableLanguage[0]->full_name: '' }}</h6>
                        <p class="pos">{{count($council->availableLanguage) > 0 ? $council->availableLanguage[0]->position: '' }}</p>
                        <p class="p"><strong>{{__('frontend.email')}}</strong> {{$council->email }}</p>
                        <p class="p"><strong>{{__('frontend.phone')}}</strong> {{$council->phone }}</p>
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
                            @if(count($council->practicalAreas) > 0)
                                @foreach($council->practicalAreas as $practicalArea)
                                    @if(count($practicalArea->availableLanguage) > 0)
                                    <div class="area">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>
                                            {{$practicalArea->availableLanguage[0]->title}}
                                        </p>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
