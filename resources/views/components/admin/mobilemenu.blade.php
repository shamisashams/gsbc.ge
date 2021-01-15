<div>
    <div class="menu-mobile menu-activated-on-click color-scheme-dark">
        <div class="mm-logo-buttons-w">
            <a class="mm-logo" href="index.html"><img src="img/logo.png"><span>Clean Admin</span></a>
            <div class="mm-buttons">
                <div class="content-panel-open">
                    <div class="os-icon os-icon-grid-circles"></div>
                </div>
                <div class="mobile-menu-trigger">
                    <div class="os-icon os-icon-hamburger-menu-1"></div>
                </div>
            </div>
        </div>
        <div class="menu-and-user">
            <div class="logged-user-w">
                <div class="avatar-w">
                    <img alt="" src="img/avatar1.jpg">
                </div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">
                        {{auth()->user()->name}}
                    </div>
                    <div class="logged-user-role">
                        {{auth()->user()->userRoles[0]->role->name}}
                    </div>
                </div>
            </div>
            <!--------------------
            START - Mobile Menu List
            -------------------->
            <ul class="main-menu">
                <li class="">
                    <a href="{{route('news',app()->getLocale() )}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>{{__('admin.news')}}</span></a>
                </li>

                <li class="">
                    <a href="{{route('adminHome',[app()->getLocale()])}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>{{__('admin.home_page')}}</span></a>
                </li>

                <li class="">
                    <a href="{{route('member',[app()->getLocale()])}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>{{__('admin.members')}}</span></a>
                </li>
                <li class="">
                    <a href="{{route('adminEvent',[app()->getLocale()])}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>{{__('admin.events')}}</span></a>
                </li>
                <li class="">
                    <a href="{{route('banner',[app()->getLocale()])}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>{{__('admin.banner')}}</span></a>
                </li>


                {{--                <li class="has-sub-menu">--}}
                {{--                    <a href="apps_bank.html">--}}
                {{--                        <div class="icon-w">--}}
                {{--                            <div class="os-icon os-icon-package"></div>--}}
                {{--                        </div>--}}
                {{--                        <span>Applications</span></a>--}}
                {{--                    <ul class="sub-menu">--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_email.html">Email Application</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_support_dashboard.html">Support Dashboard</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_support_index.html">Tickets Index</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_projects.html">Projects List</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_full_chat.html">Chat Application</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_todo.html">To Do Application <strong--}}
                {{--                                    class="badge badge-danger">New</strong></a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="misc_chat.html">Popup Chat</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="apps_pipeline.html">CRM Pipeline</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="rentals_index_grid.html">Property Listing <strong--}}
                {{--                                    class="badge badge-danger">New</strong></a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <a href="misc_calendar.html">Calendar</a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

            </ul>
            <!--------------------
            END - Mobile Menu List
            -------------------->
            {{--            <div class="mobile-menu-magic">--}}
            {{--                <h4>--}}
            {{--                    Light Admin--}}
            {{--                </h4>--}}
            {{--                <p>--}}
            {{--                    Clean Bootstrap 4 Template--}}
            {{--                </p>--}}
            {{--                <div class="btn-w">--}}
            {{--                    <a class="btn btn-white btn-rounded"--}}
            {{--                       href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin"--}}
            {{--                       target="_blank">Purchase Now</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
