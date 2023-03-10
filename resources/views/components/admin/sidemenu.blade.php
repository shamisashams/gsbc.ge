<div >
    <div style="position: relative; height:100%" class="menu-w color-scheme-light color-style-default menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link" style="height: 100%">
        <div class="logo-w">
          <a class="logo" href="{{route('cleanAdminHome',app()->getLocale())}}">
            <div class="logo-element"></div>
            <div class="logo-label">
              Clean Admin
            </div>
          </a>
        </div>

        <div class="element-search autosuggest-search-activator">
          <input placeholder="Start typing to search..." type="text">
        </div>
        <h1 class="menu-page-header">
          Page Header
        </h1>
        <ul class="main-menu">

          <li class="sub-header">
            <span>Options</span>
          </li>

            <li class="">
              <a href="{{route('news',app()->getLocale() )}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.news')}}</span></a>
            </li>


            <li class="">
                <a href="{{route('adminHome',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.home_page')}}</span></a>
            </li>

            <li class="">
                <a href="{{route('member',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.members')}}</span></a>
            </li>


            <li class="">
                <a href="{{route('adminEvent',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.events')}}</span></a>
            </li>

            <li class="">
                <a href="{{route('banner',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.banner')}}</span></a>
            </li>
            <li class="">
                <a href="{{route('settingIndex',app()->getLocale() )}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.settings')}}</span></a>
            </li>

            <li class="">
                <a href="{{route('practicalAreaIndex',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.practical_area')}}</span></a>
            </li>
            <li class="">
                <a href="{{route('councilIndex',[app()->getLocale()])}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-life-buoy"></div>
                    </div>
                    <span>{{__('admin.council')}}</span></a>
            </li>

            <li>




        </ul>
      </div>
</div>
