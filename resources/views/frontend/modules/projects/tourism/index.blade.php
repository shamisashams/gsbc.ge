@extends('frontend.layouts.layout')
@section('content')
    <section class="about-showcase">
        <div class="overlay">
            <p class="title">{{__('frontend.tourism')}}</p>
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
                        <a href="{{route('agriculture',app()->getLocale())}}" class="each">
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
                        <a href="{{route('projects',app()->getLocale())}}" class="each active">
                            <span class="line"></span>
                            <p>{{__('frontend.tourism')}}</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                    </div>
                </div>
                <div class="projects-info">
                    <div class="first-img">
                        <img src="/frontend-assets/gsbc/img/projects/tourism.png">
                    </div>
                    <p class="blue">Choosing Right Advisor Can Save Million Dollars</p>
                    <p class="para">Continuous Increase of International Visitors – 23% average annual growth of international visitors for last five years</p>
                    <div class="why-invest">
                        <!-- <div class="img">
                            <img src="/frontend-assets/gsbc/img/projects/5.png">
                        </div> -->
                        <div class="reasons">
                            <h6 class="title"> Why to Invest?</h6>
                            <div class="flex">
                                <div class="left">
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Unique Nature and Culture</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Various Type of Resorts and Investment Opportunities</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>No Real Estate Ownership Restriction</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Governmental Incentives Available</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>16th most secured country in the world <br>(Source: Global Competitiveness Index -2015/2016)</p>
                                    </div><div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Georgia has proved to be a highly desirable location for the hospitality and real estate sector</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Average duration of stay - 5 nights, average spend - USD 650</p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Home to more than 12,000 historical and cultural monuments including several UNESCO World Heritage Sites</p>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>8 national parks and 84 different categories of protected areas </p>
                                    </div>
                                    <div class="each">
                                        <div class="cir">
                                            <span class="cle"></span>
                                        </div>
                                        <p>Number of international tourists’ arrivals isexpected to grow by 8-10% during the next five years (Source: Colliers international) www.investingeorgia.org 22 HOSPITALITY & REAL ESTATE INVESTMENT OPPORTUNITIES</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resorts">
                        <div class="sorts">
                            <h6 class="title">SUMMER RESORTS</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Batumi</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Gonio</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Anaklia</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Kobuleti</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Other Black Sea locations</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">WINTER SKI RESORTS</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Mestia</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Bakuriani</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Gudauri</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Goderdzi</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">FOUR SEASON RESORTS</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Mestia</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Bakuriani</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Gudauri</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Kazbegi and etc </p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">MEDICAL & WELLNESS RESORTS</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Tskaltubo</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Akhtala</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Borjomi</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Abastumani and etc</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">MANUFACTURING:</h6>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Growing regional market - Companies operating in Georgia can benefit from the growing regional market and various regional import substitution opportunities</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Access to 900 million markets without Customs Duty - Georgia has Free Trade Agreements (FTA) with Turkey and post-soviet countries, and Deep and Comprehensive Free Trade Agreement (DCFTA) with EU</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Competitive labor costs - the average monthly salary in manufacturing industry was 355 USD (2015) including white and blue-collar workers</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>Low utility costs - currently up to 80% of power is generated via hydropower plants, leading to cheaper energy cost. Standard cost for 1 kwh is 6 USD cents for 30-110 kV high voltage electricity</p>
                            </div>
                            <div class="lines">
                                <div class="cir">
                                    <span class="cle"></span>
                                </div>
                                <p>4 Free Industrial Zones (FIZ) - In FIZ, businesses are exempt from all taxes except Personal Income Tax (20%), which is paid from employees’ salaries</p>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">Sectors of Manufacturing: </h6>
                            <div class="sectors">
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Chemical</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Plastics</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Construction Materials</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Ceramic products - tiles, sanitary ware, refractory bricks</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Glass</p>
                                </div>
                                <div class="sec">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Furniture and etc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
