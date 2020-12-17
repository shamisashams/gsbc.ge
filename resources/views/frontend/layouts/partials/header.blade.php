<header class="header">
        <div class="wrapper">
            <div class="top">
                <a href="{{route('/',app()->getLocale())}}" class="logo">
                    <img src="/frontend-assets/gsbc/img/logo/logo.png">
                </a>
                <div class="right">
                    <div class="pro">
                        <img src="/frontend-assets/gsbc/img/icons/header/concentric-circle.svg">
                        <div class="text">
                            <h6 class="h">Number 1</h6>
                            <p class="p">Council in GE</p>
                        </div>
                    </div>
                    <div class="pro">
                        <img src="/frontend-assets/gsbc/img/icons/header/star.svg">
                        <div class="text">
                            <h6 class="h">Have Won Over</h6>
                            <p class="p">Council in GE</p>
                        </div>
                    </div>
                    <div class="pro">
                        <img src="/frontend-assets/gsbc/img/icons/header/concentric-circle.svg">
                        <div class="text">
                            <h6 class="h">Number 1</h6>
                            <p class="p">Council in GE</p>
                        </div>
                    </div>
                    <a href="#" class="member">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 19.738 19.738" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                            <g xmlns="http://www.w3.org/2000/svg">
                                <path style="" d="M18.18,19.738h-2c0-3.374-2.83-6.118-6.311-6.118s-6.31,2.745-6.31,6.118h-2   c0-4.478,3.729-8.118,8.311-8.118C14.451,11.62,18.18,15.26,18.18,19.738z"  data-original="#010002"/>
                                <path style="" d="M9.87,10.97c-3.023,0-5.484-2.462-5.484-5.485C4.385,2.461,6.846,0,9.87,0   c3.025,0,5.486,2.46,5.486,5.485S12.895,10.97,9.87,10.97z M9.87,2C7.948,2,6.385,3.563,6.385,5.485S7.948,8.97,9.87,8.97   c1.923,0,3.486-1.563,3.486-3.485S11.791,2,9.87,2z"  data-original="#010002"/>
                            </g>
                        </svg>
                        <p>Become a Member</p>
                    </a>
                    <div class="navbar-mobile">

                        <div class="nav-mo">
                            <a href="/gsbc/en" class="nav">Home</a>
                            <a href="{{route('about-us',app()->getLocale())}}" class="nav">About us</a>
                            <div class="drop">
                                <a href="/gsbc/en/membership" class="nav member">Membership</a>
                            </div>
                            <a href="/gsbc/en/events/index.php" class="nav">Events</a>
                            <a href="/gsbc/en/projects/tourism" class="nav">Projects</a>
                            <a href="/gsbc/en/media" class="nav">Press & Media</a>
                            <a href="/gsbc/en/contact" class="nav">Contact us</a>
                        </div>
                        <a href="#" class="member-mo">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 19.738 19.738" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path style="" d="M18.18,19.738h-2c0-3.374-2.83-6.118-6.311-6.118s-6.31,2.745-6.31,6.118h-2   c0-4.478,3.729-8.118,8.311-8.118C14.451,11.62,18.18,15.26,18.18,19.738z"  data-original="#010002"/>
                                    <path style="" d="M9.87,10.97c-3.023,0-5.484-2.462-5.484-5.485C4.385,2.461,6.846,0,9.87,0   c3.025,0,5.486,2.46,5.486,5.485S12.895,10.97,9.87,10.97z M9.87,2C7.948,2,6.385,3.563,6.385,5.485S7.948,8.97,9.87,8.97   c1.923,0,3.486-1.563,3.486-3.485S11.791,2,9.87,2z"  data-original="#010002"/>
                                </g>
                            </svg>
                            <p>Become a Member</p>
                        </a>
                    </div>
                    <button  class="menu menu-icon "><span></span></button>
                </div>
            </div>
            <div class="navbar">
                <a href="/gsbc/en" class="nav">Home</a>
                <a href="{{route('about-us',app()->getLocale())}}" class="nav">About us</a>
                <div class="drop">
                    <a href="{{route('membership',app()->getLocale())}}" class="nav member">Membership</a>
                    <div class="member-drop-down">
                        <a href="{{route('membership',app()->getLocale())}}" class="dd">Members</a>
                        <a href="{{route('regulations',app()->getLocale())}}" class="dd">Rules & Regulations</a>
                    </div>
                </div>
                <a href="{{route('events',app()->getLocale())}}" class="nav">Events</a>
                <a href="{{route('projects',app()->getLocale())}}" class="nav">Projects</a>
                <a href="{{route('media',app()->getLocale())}}" class="nav">Press & Media</a>
                <a href="{{route('contact',app()->getLocale())}}" class="nav">Contact us</a>
            </div>
        </div>
    </header>
