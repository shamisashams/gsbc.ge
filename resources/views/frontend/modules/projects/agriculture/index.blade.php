@extends('frontend.layouts.layout')
@section('content')
    <section class="about-showcase">
        <div class="overlay">
            <p class="title">{{__('frontend.agriculture')}}</p>
            <p class="under">{{__('frontend.caption_placed_here')}}</p>
        </div>
    </section>

    <section class="project-bodies">
        <div class="wrapper">
            <div class="content">
                <div class="project-links">
                    <p class="title">{{__('frontend.projects')}}</p>
                    <div class="links">
                        <a href="{{route('realestate',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>{{__('frontend.real_estate')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('agriculture',app()->getLocale())}}" class="each active">
                            <span class="line"></span>
                            <p>{{__('frontend.agriculture')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('construction',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>{{__('frontend.construction')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('renewableenergy',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>{{__('frontend.renewable_energy')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('logistics',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>{{__('frontend.logistics')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('projects',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>{{__('frontend.tourism')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                    </div>
                </div>
                <div class="projects-info">
                    <div class="first-img">
                        <img src="/frontend-assets/gsbc/img/projects/agriculture.png">
                    </div>
                    <p class="blue">Choosing Right Advisor Can Save Million Dollars</p>
                    <p class="para">Continuous Increase of International Visitors – 23% average annual growth of international visitors for last five years</p>
                    <div class="why-invest">
                        <!-- <div class="img">
                            <img src="/frontend-assets/gsbc/img/projects/5.png">
                        </div> -->

                    </div>
                    <div class="resorts">
                        <div class="sorts">
                            <h6 class="title">MARKET SIZE:</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Rapidly growing local and regional demand</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Strong preference of consumers toward Georgian products</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>DCFTA (Deep and Comprehensive Free Trade Agreement) with EU</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>FTA with Turkey and CIS countries</p>
                                </div>
                            </div>
                        </div>

                        <div class="sorts">
                            <h6 class="title">ADVANTAGES:</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Ecological clean environment</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>22 microclimates varying from cool and dry to warm and humid</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Longer than normal harvesting season and a wide range of growing conditions</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Large quantity of renewable water, rich and pesticide-free soil</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Cheap labor and low utility costs</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">SUPPORT FROM THE GOVERNMENT:</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Financial support</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Technical support In</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Infrastructural support</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">INVESTMENT OPPORTUNITIES:</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>HIGH-TECH GREENHOUSE FARMING</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>WINE AND SPIRITS</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>DAIRY PRODUCTS</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>FISH FARMING, AQUACULTURE</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>FRESH AND MINERAL WATERS</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>LIVESTOCK AND POULTRY FARMING</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">LOGISTICS:</h6>
                            <h6 class="title">TRANS-CAUCASIAN ROUTE</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p> Attractive gateway between Europe and Central Asia</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Leveraging its location, Georgia’s transport economy can benefit from large addressable transit flows, growing economies and landlocked resources</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Ports are cost-competitive vs. alternative routes</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>FDI inflows in the transport and communication sector have primarily targeted transport infrastructure</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Around 60% of all types of overland international freight throughput are transits</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">TRANSPORT INFRASTRUCTURE</h6>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Rapidly developing road infrastructure</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Deep-sea port with natural drafts for PanaMax vessel</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Direct connection with European and Central Asian railway networks (Baku-Tbilisi-Kars project)</p>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">OPPORTUNITIES</h6>
                            <div class="sectors">
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Containerization and logistical centers</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Warehousing and storage facilities</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
