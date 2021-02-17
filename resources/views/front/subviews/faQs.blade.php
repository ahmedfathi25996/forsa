@extends("front.main_layout")

@section("subview")


    <!-- page wrapper start -->

    <div class="page-wrapper">

        @include("front.components.pre-loader")

        @include("front.components.page-header")


        <!--page title start-->

        <section class="page-title o-hidden pos-r md-text-center" data-bg-color="#fbf3ed">
            <canvas id="confetti"></canvas>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <h1 class="title"><span>F.</span>A.Q.</h1>
                        <p>We're Building Modern And High Software</p>
                    </div>
                    <div class="col-lg-5 col-md-12 text-lg-right md-mt-3">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">FaQs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-title-pattern"><img class="img-fluid" src="{{url("/")}}/public/front/images/bg/11.png" alt=""></div>
        </section>

        <!--page title end-->


        <!--body content start-->

        <div class="page-content">

            <!--faq start-->

            <section class="z-index-1">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-8 col-md-12 ml-auto mr-auto">
                            <div class="section-title">
                                <div class="title-effect">
                                    <div class="bar bar-top"></div>
                                    <div class="bar bar-right"></div>
                                    <div class="bar bar-bottom"></div>
                                    <div class="bar bar-left"></div>
                                </div>
                                <h6>Accordion</h6>
                                <h2 class="title">Frequently asked questions</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ml-auto">
                            <div id="accordion" class="accordion style-1">
                                <div class="card active">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true">Get started with WinWin</a>
                                        </h6>
                                    </div>
                                    <div id="collapse1" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">Download Win-Win application. from google play or IOS app store</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Get your ID</a>
                                        </h6>
                                    </div>
                                    <div id="collapse2" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Order our activation ID to benefit from all of our offers.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Link the app with your card</a>
                                        </h6>
                                    </div>
                                    <div id="collapse3" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Activate your App by scanning QR on your ID.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Browse Offers</a>
                                        </h6>
                                    </div>
                                    <div id="collapse4" class="collapse" data-parent="#accordion">
                                        <div class="card-body">browse all partners we contract with.</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Take a offer</a>
                                        </h6>
                                    </div>
                                    <div id="collapse5" class="collapse" data-parent="#accordion">
                                        <div class="card-body">Choose your offer and confirm it from your App.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--faq end-->

        </div>

        <!--body content end-->

        @include("front.components.page-footer")

    </div>

    <!-- page wrapper end -->


@endsection