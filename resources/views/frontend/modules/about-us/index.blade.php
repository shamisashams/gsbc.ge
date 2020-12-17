@extends('frontend.layouts.layout')
@section('content')
    <section class="about-showcase">
        <div class="overlay">
            <p class="title">About Us</p>
            <p class="under">STORY ABOUT GSBC</p>
        </div>
    </section>

    <section class="why-us-section in-about">
        <div class="wrapper">
            <div class="content">
                <div class="img">
                    <img src="/frontend-assets/gsbc/img/why-us/1.png">
                    <div class="abs-img">
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="context">
                    <div class="heading">
                        <p class="expert">ABOUT GSBC</p>
                        <h5 class="title">Our Gorgeous History</h5>
                    </div>
                    <p class="blue">Georgia Saudi Business Council was founded in Tbilisi to promote Saudi-Georgian business relationships and support the realization of investment opportunities between our two countries, and is committed to supporting the development of Investment opportunities between Georgia and Saudi Arabia.</p>
                    <p class="p">The main aim of the charter is to support investors and stakeholders simplify Investment in each country, provide full package of services in Georgia and Saudi Arabia.</p>
                    <p class="p">GSBC, based in Tbilisi and linking in frequently with our members in Riyadh, Jeddah and other parts of Saudi Arabia, will be made up of representatives from both the public and private sectors in the Republic of Georgia and the Kingdom of Saudi Arabia.</p>
                    <img class="sign" src="/frontend-assets/gsbc/img/icons/showcase/just-signature.png">
                </div>
            </div>
        </div>
    </section>

    <div class="in-nothing">
        <p class="small">WHAT WE ARE EXPERT AT</p>
        <h3 class="large">Why Clients Choose US</h3>
    </div>

    <section class="pros">
        <div class="overlay">
            <div class="wrapper">
                <div class="content">
                    <div class="each-pro">
                        <h1 class="h">1000+</h1>
                        <p class="p">Client Consultations</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">95%</h1>
                        <p class="p">Successful Cases</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">10mlns</h1>
                        <p class="p">Recovered cost for clients</p>
                    </div>
                    <div class="each-pro">
                        <h1 class="h">30+</h1>
                        <p class="p">Professional Attorneys</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gsbc-board">
        <div class="wrapper">
            <div class="heading">
                <p class="expert">WHAT WE ARE EXPERT AT</p>
                <h3 class="large">GSBC BOARD</h3>
            </div>
            <div class="board-slide">
                <div class="each-board">
                    <div class="img">
                        <img src="/frontend-assets/gsbc/img/board/1.png">
                    </div>
                    <div class="context">
                        <h6 class="name">GEORGE SVANIDZE</h6>
                        <p class="pos">PRESIDENT</p>
                        <a href="/frontend-assets/gsbc/en/biography/index.php" class="story" class="story">Full Story</a>
                    </div>
                </div>
                <div class="each-board">
                    <div class="img">
                        <img src="/frontend-assets/gsbc/img/board/2.png">
                    </div>
                    <div class="context">
                        <h6 class="name">MARK HEYNESS DANIELL</h6>
                        <p class="pos">INTERNATIONAL CHAIRMAN</p>
                        <a href="/frontend-assets/gsbc/en/biography/index.php" class="story">Full Story</a>
                    </div>
                </div>
                <div class="each-board">
                    <div class="img">
                        <img src="/frontend-assets/gsbc/img/board/3.png">
                    </div>
                    <div class="context">
                        <h6 class="name">TIKA SVANIDZE VANCKO</h6>
                        <p class="pos">HEAD OF TOURISM DEVELOPMENT DEPARTMENT</p>
                        <a href="/frontend-assets/gsbc/en/biography/index.php" class="story" class="story">Full Story</a>
                    </div>
                </div>
                <div class="each-board">
                    <div class="img">
                        <img src="/frontend-assets/gsbc/img/board/2.png">
                    </div>
                    <div class="context">
                        <h6 class="name">MARK HEYNESS DANIELL</h6>
                        <p class="pos">INTERNATIONAL CHAIRMAN</p>
                        <a href="/frontend-assets/gsbc/en/biography/index.php" class="story" class="story">Full Story</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prevar-board">
                <img src="/frontend-assets/gsbc/img/icons/arrows/left-arrow.svg">
            </button>
            <button id="nextar-board">
                <img src="/frontend-assets/gsbc/img/icons/arrows/right-arrow.svg">
            </button>
        </div>
    </section>

@endsection
