@extends('frontend.layouts.layout')
@section('content')
    <section class="showcase-short">
        <div class="overlay"></div>
    </section>

    <section class="membership-body">
        <div class="wrapper">
            <div class="heading">
                <p class="small">{{__('frontend.member_membership')}}</p>
                <h5 class="large">{{__('frontend.members')}}</h5>
            </div>
            <div class="members-grid">
                @if($members)
                    @foreach($members as $member)
                        @if(count($member->availableLanguage)>0)
                            <div class="each-member">
                                <div class="img">
                                    @if(isset($member->files[0]))
                                        <img src="{{$member->files[0]->path.'/'.$member->files[0]->name}}">
                                    @endif
                                </div>
                                <div class="context">
                                    <div class="blurred"></div>
                                    <div class="text">
                                        <div class="fx">
                                            <h6 class="name">{{(count($member->availableLanguage) > 0) ?  $member->availableLanguage[0]->title : ''}}</h6>
                                            <a class="story btn-view" href="#">Full Story</a>
                                        </div>
                                        <span class="body-text"
                                              hidden>
                                        {!!(count($member->availableLanguage) > 0) ? $member->availableLanguage[0]->body : ''!!}</span>
                                        <p class="para">{{(count($member->availableLanguage) > 0) ?  $member->availableLanguage[0]->description : ''}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @endif

            </div>
        </div>
    </section>
    <div class="mask"></div>
    <div id="quick-view-pop-up">
        <div class="quick-view-panel">
            <div class="quick-view-close"></div>
            <div class="quick-view-loading">
                Quick View Loading...
            </div>

            <div class="content">
                <img src="/frontend-assets/gsbc/img/biography/1.png">
                <div class="text">
                    <h2 class="name">opkpo</h2>
                    <span class="">    </span>
                </div>
            </div>
        </div>
    </div>

@endsection
