@extends("front.main_layout")

@section("subview")


    <!-- page wrapper start -->

    <div class="page-wrapper">

        @include("front.components.pre-loader")

        @include("front.components.page-header")


        <!--hero section start-->

        <section id="home" class="fullscreen-banner banner p-0 bg-contain bg-pos-r" data-bg-img="images/bg/01.png">
            <div class="spinner-eff">
                <div class="spinner-circle circle-1"></div>
                <div class="spinner-circle circle-2"></div>
            </div>
            <div class="align-center pt-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 order-lg-1">
                            <img class="img-center wow jackInTheBox" data-wow-duration="3s" src="{{url("/")}}/public/front/images/banner/01.png" alt="">
                        </div>
                        <div class="col-lg-6 col-md-12 order-lg-1 md-mt-5">
                            <h1 class="mb-4 wow fadeInUp" data-wow-duration="1.5s">Thinking The High Quality Software</h1>
                            <p class="lead mb-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">Win-Win will help you save more than 30000 EGP. Win-Win App provides you with services in Cairo & Alexandria, in addition to large package of hotels in Sharm El-Sheikh & Hurghada.</p>
                            <a class="btn btn-theme wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.5s" href="{{url("/")}}" data-text="Start A Today"> <span>S</span><span>t</span><span>a</span><span>r</span><span>t</span>
                                <span> </span><span>A</span>  <span> </span><span>T</span><span>o</span><span>d</span><span>a</span><span>y</span>
                            </a>
                            <a class="btn btn-dark wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.5s" href="#about" data-text="Learn More"> <span>L</span><span>e</span><span>a</span><span>r</span><span>n</span>
                                <span> </span><span>M</span><span>o</span><span>r</span><span>e</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--hero section end-->


        <!--body content start-->

        <div class="page-content">

            <!--feature start-->

            <section class="p-0 text-center wow fadeInUp" data-wow-duration="2s">
                <div class="container-fluid">
                    <div class="row custom-mt-10 z-index-1 md-mt-0">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme" data-dots="false" data-items="4" data-lg-items="3" data-md-items="2" data-sm-items="1" data-autoplay="true">
                                <div class="item">
                                    <div class="featured-item style-2">
                                        <div class="featured-icon">
                                            <i class="flaticon-data"></i>
                                            <span class="rotateme"></span>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Professional tools</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p></p>
                                            <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="featured-item style-2">
                                        <div class="featured-icon">
                                            <i class="flaticon-collaboration"></i>
                                            <span class="rotateme"></span>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Fully Customizable</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p></p>
                                            <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="featured-item style-2">
                                        <div class="featured-icon">
                                            <i class="flaticon-market"></i>
                                            <span class="rotateme"></span>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Marketing</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p></p>
                                            <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="featured-item style-2">
                                        <div class="featured-icon">
                                            <i class="flaticon-objective"></i>
                                            <span class="rotateme"></span>
                                        </div>
                                        <div class="featured-title">
                                            <h5>App integration</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p></p>
                                            <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="featured-item style-2">
                                        <div class="featured-icon">
                                            <i class="flaticon-analytics"></i>
                                            <span class="rotateme"></span>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Easily To Use</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p></p>
                                            <a class="icon-btn mt-4" href="#"> <i class="la la-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--feature end-->


            <!--about start-->

            <section id="about" class="pos-r bg-contain bg-pos-l py-10" data-bg-img="images/bg/02.png">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12 image-column p-0 pr-lg-5">
                            <div class="img-box box-shadow">
                                <div class="box-loader">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <img class="img-center" src="{{url("/")}}/public/front/images/banner/03.jpg" style="width: 98%">
                            </div>
                        </div>
                        <div class="col-lg-5 ml-auto col-md-12 md-mt-5">
                            <div class="section-title mb-4">
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <h6>About Us</h6>
                                <h2>We're Building Modern And High Software</h2>
                            </div>
                            <ul class="list-unstyled list-icon mb-4">
                                <li class="mb-3"><i class="la la-check"></i> Café & Restaurants</li>
                                <li class="mb-3"><i class="la la-check"></i> Fashion </li>
                                <li class="mb-3"><i class="la la-check"></i> Entertainments </li>
                                <li class="mb-3"><i class="la la-check"></i> Beauty&Health </li>
                                <li class="mb-3"><i class="la la-check"></i> Special services&Health </li>
                                <li class="mb-3"><i class="la la-check"></i> Medical  </li>
                            </ul>
                            <a class="btn btn-border btn-circle" href="#about" data-text="See About"> <span>S</span><span>e</span><span>e</span><span> </span>
                                <span>A</span><span>b</span><span>o</span><span>u</span><span>t</span>
                            </a>
                            <a class="btn btn-theme btn-circle" href="{{url("/")}}" data-text="Join Now"> <span>J</span><span>o</span><span>i</span><span>n</span>
                                <span> </span><span>N</span><span>o</span><span>w</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--about end-->


            <!--feature start-->

            <section id="service" class="service pos-r bg-effect o-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 order-lg-12 image-column right">
                            <div class="blink-img">
                                <img class="img-fluid blinkblink" src="{{url("/")}}/public/front/images/pattern/04.png" alt="">
                            </div>
                            <img class="img-fluid z-index-1 w-100" src="{{url("/")}}/public/front/images/banner/qw-01.png" alt="">
                        </div>
                        <div class="col-lg-6 col-md-12 md-mt-5 order-lg-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="featured-item style-3">
                                        <div class="featured-icon">
                                            <i class="la la-diamond"></i>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Our Mission</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>Many People going to low quality-low price market (which is not preferred to those to save their money). Our mission is providing our customer with High quality Brands with low Price</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="featured-item style-3">
                                        <div class="featured-icon">
                                            <i class="la la-eye"></i>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Our Vision</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>Our vision is to achieve the principle of Win-Win Situation. Reach for all People who interested in outstanding brands. We seek to provide our services throughout Egypt to live a better life</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 sm-mt-3">
                                    <div class="featured-item style-3">
                                        <div class="featured-icon">
                                            <i class="la la-lightbulb-o"></i>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Our Idea</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>is based mainly on the win-win situation model, between the customers and the brands and attract new customer to brands and Make a connection between them using a highly intelligent system.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-4">
                                    <div class="featured-item style-3">
                                        <div class="featured-icon">
                                            <i class="la la-money"></i>
                                        </div>
                                        <div class="featured-title">
                                            <h5>Saving Money</h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>Win-Win will help you save more than 30000 EGP. Win-Win App provides you with services in Cairo & Alexandria, in addition to large package of hotels in Sharm El-Sheikh & Hurghada.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--feature end-->


            <!--step start-->

            <section class="text-center pos-r">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-10 ml-auto mr-auto">
                            <div class="section-title">
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <h6>How It Work</h6>
                                <h2 class="title">Three Simple Steps To Started Working Process</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="svg-container">
                            <svg id="svgC" width="100%" height="100%" viewbox="0 0 620 120" preserveaspectratio="xMidYMid meet"></svg>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="work-process">
                                <div class="box-loader"> <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="step-num-box">
                                    <div class="step-icon"><span><i class="la la-lightbulb-o"></i></span>
                                    </div>
                                    <div class="step-num">01</div>
                                </div>
                                <div class="step-desc">
                                    <h4>Get started with WinWin</h4>
                                    <p class="mb-0">Download Win-Win application. from google play or IOS app store</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 md-mt-5">
                            <div class="work-process">
                                <div class="box-loader"> <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="step-num-box">
                                    <div class="step-icon"><span><i class="la la-rocket"></i></span>
                                    </div>
                                    <div class="step-num">02</div>
                                </div>
                                <div class="step-desc">
                                    <h4>Get Your ID</h4>
                                    <p class="mb-0">Order our activation ID to benefit from all of our offers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 md-mt-5">
                            <div class="work-process">
                                <div class="step-num-box">
                                    <div class="step-icon"><span><i class="la la-check-square"></i></span>
                                    </div>
                                    <div class="step-num">03</div>
                                </div>
                                <div class="step-desc">
                                    <h4>Take a Offer</h4>
                                    <p class="mb-0">Choose your offer and confirm it from your App.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--step end-->


            <!--team start-->

            <section id="team" class="bg-effect right pos-r o-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="section-title">
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <h6>Our Partners</h6>
                                <h2 class="title">Meet Our Partners will ready for your service</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 sm-mt-3">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 md-mt-3">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 md-mt-3">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 md-mt-3">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 md-mt-3">
                            <div class="clients-logo">
                                <img class="img-center" src="{{url("/")}}/public/front/images/partners/6.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--team end-->

        </div>

        <!--body content end-->


        @include("front.components.page-footer")


    </div>

    <!-- page wrapper end -->


@endsection