@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="press-media">
        <div class="wrapper">
            <div class="heading">
                <p class="small">{{__('frontend.media_press_media')}}</p>
                <h5 class="large">{{__('frontend.blog')}}</h5>
            </div>
            <div class="media-grid">
                @if($news)
                    @foreach($news as $singleNews)
                        <div class="each-blog">
                            <div class="img">
                                <img src="{{$singleNews->files[0]->path.'/'.$singleNews->files[0]->name}}">
                            </div>
                            <div class="context">
                                <h6 class="title">{{(count($singleNews->availableLanguage) > 0) ?  $singleNews->availableLanguage[0]->title : ''}}</h6>
                                <p class="para">{{(count($singleNews->availableLanguage) > 0) ?  $singleNews->availableLanguage[0]->description : ''}}</p>
                                <a href="{{route('single-blog',[app()->getLocale(),$singleNews->slug])}}" class="more">Read more</a>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
            {{$news->links('frontend.vendor.pagination.custom')}}

        </div>
    </section>

@endsection
