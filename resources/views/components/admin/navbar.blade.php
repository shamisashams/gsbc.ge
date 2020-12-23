<style>

    .languages {
        position: relative;
        width: 40px;
        background-color: #fff;
        border-radius: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
        transition: all ease-in-out .3s;
        z-index: 200;
    }

    languages.mobile {
        display: none;
    }

    .languages .lg-dd {
        position: absolute;
        width: 100%;
        left: 0;
        top: 22px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        border-bottom-left-radius: 40px;
        border-bottom-right-radius: 40px;
        padding-top: 0px;
        z-index: 100;
        height: 0;
        transition: all ease-in-out .3s;
        overflow: hidden;
    }

    .languages:hover .lg-dd {
        height: 121px;
        padding-top: 24px;
    }

    .languages .lg-dd .lang img {
        width: 26px;
        height: 26px;
        overflow: hidden;
        margin: auto;
    }

    .languages .lang.selected {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 200;
    }

    .languages .lang.selected img {
        width: 100%;
        height: 100%;
    }

</style>

<div>
    <div class="top-bar color-scheme-light">
        <!--------------------
        START - Top Menu Controls
        -------------------->
        <div class="top-menu-controls">
            @if(isset($languages['current']))
                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                    <img class="flag" src="/adm/img/flags-icons/{{$languages['current']['img']}}">
                    @if(count($languages['data']) > 0)
                        <div class="os-dropdown">
                            <div class="icon-w">
                                <i class="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                                @foreach($languages['data'] as $data)
                                <li>
                                    <a href="{{$data['url']}}" class="d-flex"><img class="flag" src="/adm/img/flags-icons/{{$data['img']}}"><span>{{$data['title']}}</span></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                </div>
            @endif
          <!--------------------
          END - Messages Link in secondary top menu
          --------------------><!--------------------
          START - Settings Link in secondary top menu
          -------------------->
                <div class="languages main" style="float: right">
                    <a href="#" class="lang selected">
                        <img style="width:50px"
                             src="/frontend-assets/gsbc/img/flags/{{app()->getLocale() == 'ge' ? 'ge.svg' : (app()->getLocale()=='en'?'uk.svg':(app()->getLocale()=='ru'?'ru.svg':(app()->getLocale()=='sa'?'sa.svg':"")))}}">
                    </a>
                    <div class="lg-dd">
                        @if(app()->getLocale()!=="en")
                            <a href="{{route('changeLocalization',['locale'=>'en','path'=>Request::path()])}}" class="lang">
                                <img style="width:50px" src="/frontend-assets/gsbc/img/flags/uk.svg">
                            </a>
                        @endif

                        @if(app()->getLocale()!=="ge")
                            <a href="{{route('changeLocalization',['locale'=>'ge','path'=>Request::path()])}}" class="lang">
                                <img style="width:50px" src="/frontend-assets/gsbc/img/flags/ge.svg">
                            </a>
                        @endif
                        @if(app()->getLocale()!=='sa')
                            <a href="{{route('changeLocalization',['locale'=>'sa','path'=>Request::path()])}}" class="lang">
                                <img style="width:50px" src="/frontend-assets/gsbc/img/flags/sa.svg">
                            </a>
                        @endif
                        @if(app()->getLocale()!=="ru")
                            <a href="{{route('changeLocalization',['locale'=>'ru','path'=>Request::path()])}}" class="lang">
                                <img style="width:50px" src="/frontend-assets/gsbc/img/flags/ru.svg">
                            </a>
                        @endif
                    </div>
                </div>

                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">

            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
              <div class="icon-w">
                <i class="os-icon os-icon-ui-46"></i>
              </div>

              <ul>

                <li>

                <a href="{{route('logout',app()->getLocale() )}}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                </li>
              </ul>
            </div>
          </div>
          <!--------------------
          END - Settings Link in secondary top menu
          -------------------->
        </div>
        <!--------------------
        END - Top Menu Controls
        -------------------->
      </div>
</div>
