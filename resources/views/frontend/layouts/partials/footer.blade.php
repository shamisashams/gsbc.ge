<footer class="footer">
    <div class="top">
        <div class="wrapper">
            <div class="content">
                <div class="col1">
                    <a href="/gsbc/en" class="logo">
                        <img src="/frontend-assets/gsbc/img/logo/logo.png">
                    </a>
                    <p class="para">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                </div>
                <div class="col2">
                    <p class="head">{{__('frontend.contact_info')}}</p>
                    <div class="flexes">
                        <div class="flex">
                            <img src="/frontend-assets/gsbc/img/icons/footer/call.svg">
                            <p>1800-222-222</p>
                        </div>
                        <div class="flex">
                            <img src="/frontend-assets/gsbc/img/icons/footer/email.svg">
                            <p>contact@versatilewpthe@gmail.com</p>
                        </div>
                        <div class="flex">
                            <img src="/frontend-assets/gsbc/img/icons/footer/clock.svg">
                            <p>{{__('frontend.everyday')}} 9:00-17:00</p>
                        </div>
                    </div>
                    <div class="social-media">
                        <a href="#">
                            <img src="/frontend-assets/gsbc/img/icons/footer/fb.svg">
                        </a>
                        <a href="#">
                            <img src="/frontend-assets/gsbc/img/icons/footer/twitter.svg">
                        </a>
                        <a href="#">
                            Bё
                        </a>
                        <a href="#">
                            <img src="/frontend-assets/gsbc/img/icons/footer/in.svg">
                        </a>
                    </div>
                </div>
                <div class="col3">
                    <p class="head">{{__('frontend.links')}}</p>
                    <div class="link-grid">
                        <a class="link" href="{{route('/',app()->getLocale())}}">{{__('frontend.home')}}</a>
                        <a class="link" href="{{route('about-us',app()->getLocale())}}">{{__('frontend.about-us')}}</a>
                        <a class="link" href="{{route('membership',app()->getLocale())}}">{{__('frontend.membership')}}</a>
                        <a class="link" href="{{route('events',app()->getLocale())}}">{{__('frontend.events')}}</a>
                        <a class="link" href="{{route('projects',app()->getLocale())}}">{{__('frontend.projects')}}</a>
                        <a class="link" href="{{route('media',app()->getLocale())}}">{{__('frontend.press_media')}}</a>
                    </div>
                </div>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14951045.121910123!2d36.02896031735017!3d23.812997755360815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2sge!4v1608011908206!5m2!1sen!2sge" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
