@extends('frontend.layouts.layout')
@section('content')
    <section class="about-showcase">
        <div class="overlay">
            <p class="title">Renewable Energy</p>
            <p class="under">CAPTION PLACED HERE</p>
        </div>
    </section>

    <section class="project-bodies">
        <div class="wrapper">
            <div class="content">
                <div class="project-links">
                    <p class="title">Projects</p>
                    <div class="links">
                        <a href="{{route('realestate',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>Real estate & Hospitality</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('agriculture',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>Agriculture & Food processing</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('construction',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>Construction</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('renewableenergy',app()->getLocale())}}" class="each active">
                            <span class="line"></span>
                            <p>Renewable Energy</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('logistics',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>Logistics</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                        <a href="{{route('projects',app()->getLocale())}}" class="each">
                            <span class="line"></span>
                            <p>Tourism</p>
                            <img class="arr" src="/frontend-assets/gsbc/img/icons/arrows/arrow-tailed.svg">
                        </a>
                    </div>
                </div>
                <div class="projects-info">
                    <div class="first-img">
                        <img src="/frontend-assets/gsbc/img/projects/1.png">
                    </div>
                    <p class="blue">Choosing Right Advisor Can Save Million Dollars</p>
                    <p class="para">Continuous Increase of International Visitors – 23% average annual growth of international visitors for last five years</p>
                    <div class="why-invest">
                        <!-- <div class="img">
                            <img src="/frontend-assets/gsbc/img/projects/5.png">
                        </div> -->
                        
                    <div class="resorts">
                        <div class="sorts">
                            <h6 class="title">OVERVIEW OF GEORGIA’S ENERGY SECTOR</h6>
                            <h6 class="title">CURRENT MARKET AND STRONG DEMAND GROWTH PROSPECTS</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>In 2015 electricity generation reached 10.8 TWh, of which hydropower accounted for 78% and thermal - 22%</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Domestic Demand growth , which is expected to grow in line with GDP, requires an extension of power generation by around 65% until 2025</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Georgia is surrounded by countries with a projected structural power deficit or expensive power generation, opening up attractive export opportunities</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">HUGE UNTAPPED POTENTIAL</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>75% of economically viable hydropower potential not yet exploited (Approximately 25 TWh)</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Over 60 potential HPP projects on the Pre-feasibility Study Level with Financial and Technical projection are available for investors</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>In addition to hydro, there is considerable generation potential from wind, solar and other renewable sources</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">LIBERALIZED AND DEREGULATED MARKET</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Renewable projects are based on Build-Own-Operate (BOO) principle</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>No tariff set for the newly built Renewable energy Plants - investor is free to choose the market and negotiate the price</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>New and simplified rules for development of renewable energy projects</p>
                                </div>
                            </div>
                        </div>
                        <div class="sorts">
                            <h6 class="title">INVESTMENT OPPORTUNITIES HYDRO POWER</h6>
                            <div class="cities">
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Georgia is one of the top countries in terms of water resources per capita</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Today 78% of total electricity is generated from Hydro Power Plants</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Georgia could produce additional 25 TWh annually with hydro resources alone.</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>There are over 60 potential HPP projects on the Pre-feasibility Study Level with Financial and Technical projection ready for investors</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>New HPPs have priority access to transmission line to Turkey</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Generation and Export activities are exempted from VAT</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>HPPs smaller than 13 MW don’t need generation license</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>HPPs smaller than 2 MW don’t need the Environmental Impact Permit OTHER RENEWABLE SOURCES WIND</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Wind potential of Georgia is estimated at 4 TWh</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Wind power is very important because of higher generation during winter.</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>It’s estimated that share of wind power in total generation will reach 10% by year 2025. GEOTHERMAL</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>Georgian geothermal water reserves reach 250 mln. m3 per year.</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>There are more than 250 natural and artificial water channels where the average temperature of geothermal waters ranges from 30 to 110 C SOLAR</p>
                                </div>
                                <div class="city">
                                    <div class="cir">
                                        <span class="cle"></span>
                                    </div>
                                    <p>In most regions of the country there are 250-280 sunny days in a year, which is approximately 6,000-6,780 hours per year</p>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
