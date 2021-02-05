<footer class="footer">
    <div class="top">
        <div class="wrapper">
            {{--            <p style="tr">Partners</p>--}}
            <div class="content">
                <div class="col2">
                    <a href="{{route('/',app()->getLocale())}}" class="logo">
                        <img style="width: 270px" src="/frontend-assets/gsbc/img/logo/gsbc_logo.png">
                    </a>
                    <div class="flexes">
                        @foreach($contacts as $contact)
                            @if(count($contact->availableLanguage)>0)
                                @if($contact->key==='phone')
                                    <div class="flex">
                                        <img src="/frontend-assets/gsbc/img/icons/footer/call.svg">
                                        <p>{{$contact->availableLanguage[0]->value}}</p>
                                    </div>
                                @endif
                                @if($contact->key==='contact_email')
                                    <div class="flex">
                                        <img src="/frontend-assets/gsbc/img/icons/footer/email.svg">
                                        <p>{{$contact->availableLanguage[0]->value}}</p>
                                    </div>
                                @endif
                                @if($contact->key==='time')
                                    <div class="flex">
                                        <img src="/frontend-assets/gsbc/img/icons/footer/clock.svg">
                                        <p>{{$contact->availableLanguage[0]->value}}</p>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="social-media">
                        @if($facebook && count($facebook->availableLanguage)>0)
                            <a href="{{$facebook->availableLanguage[0]->value}}">
                                <img src="/frontend-assets/gsbc/img/icons/footer/fb.svg">
                            </a>
                        @endif

                        @if($twitter && count($twitter->availableLanguage)>0)
                            <a href="{{$twitter->availableLanguage[0]->value}}">
                                <img src="/frontend-assets/gsbc/img/icons/footer/twitter.svg">
                            </a>
                        @endif

                        @if($behance && count($behance->availableLanguage)>0)

                            <a href="{{$behance->availableLanguage[0]->value}}">
                                Bё
                            </a>
                        @endif

                        @if($instagram && count($instagram->availableLanguage)>0)

                            <a href="{{$instagram->availableLanguage[0]->value}}">
                                <img src="/frontend-assets/gsbc/img/icons/footer/in.svg">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col1">
                    <a href="https://www.gcci.ge" class="logo">
                        @if(app()->getLocale()=="en" ||app()->getLocale()=="ru")
                            <img src="/frontend-assets/gsbc/img/logo/gcci-en.png">
                        @endif
                        @if(app()->getLocale()=="ge")
                            <img style="height:140px;margin-top:-35px;"
                                 src="/frontend-assets/gsbc/img/logo/gcci-ge.png">
                        @endif
                    </a>
                    <p class="head">{{__('admin.council_text1')}}<br>
                        {{__('admin.council_text2')}} <br>
                        {{__('admin.council_text3')}} <br>
                        {{__('admin.council_text4')}}<br>
                        {{__('admin.council_text5')}}<br> {{__('admin.council_text6')}}</p>
                </div>
                <div class="col3">
                    <p class="head">{{__('frontend.links')}}</p>
                    <div class="link-grid">
                        <a class="link" href="{{route('/',app()->getLocale())}}">{{__('frontend.home')}}</a>
                        <a class="link" href="{{route('about-us',app()->getLocale())}}">{{__('frontend.about-us')}}</a>
                        <a class="link"
                           href="{{route('membership',app()->getLocale())}}">{{__('frontend.membership')}}</a>
                        <a class="link" href="{{route('events',app()->getLocale())}}">{{__('frontend.events')}}</a>
                        <a class="link" href="{{route('projects',app()->getLocale())}}">{{__('frontend.projects')}}</a>
                        <a class="link" href="{{route('media',app()->getLocale())}}">{{__('frontend.press_media')}}</a>
                    </div>
                </div>
                <div id="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14951045.121910123!2d36.02896031735017!3d23.812997755360815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2sge!4v1608011908206!5m2!1sen!2sge"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>
    </div>
    <div class="bottom">
        <div class="wrapper">
            <div class="content">
                <div class="navbar">
                    <a href="{{route('/',app()->getLocale())}}">{{__('frontend.home')}}</a>
                    <a href="{{route('about-us',app()->getLocale())}}">{{__('frontend.about-us')}}</a>
                    <a href="{{route('contact',app()->getLocale())}}">{{__('frontend.contact')}}</a>
                </div>
                <p class="copy">{{__('frontend.created_by')}}</p>
            </div>
        </div>
    </div>
</footer>
