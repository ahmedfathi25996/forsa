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
                        <h1 class="title"><span>J</span>oin</h1>
                        <p>We're Building Modern And High Software</p>
                    </div>
                    <div class="col-lg-5 col-md-12 text-lg-right md-mt-3">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Join</li>
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

            <!--login start-->

            <section class="login">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <img class="img-fluid" src="{{url("/")}}/public/front/images/banner/06.png" alt="">
                        </div>
                        <div class="col-lg-5 col-md-12 ml-auto mr-auto md-mt-5">
                            <div class="login-form text-center">
                                <img class="img-center mb-5" src="{{url("/")}}/public/front/images/logo.png" alt="">
                                <form id="contact-form" method="post" action="{{url("login")}}">
                                    <div class="messages"></div>
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="User name" required="required" data-error="Username is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="form_password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group mt-4 mb-5">
                                        <div class="remember-checkbox d-flex align-items-center justify-content-between">
                                            <div class="checkbox">
                                                <input type="checkbox" id="check2" name="check2">
                                                <label for="check2">Remember me</label>
                                            </div>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                    </div> <a href="#" class="btn btn-theme btn-block btn-circle" data-text="Sign in"><span>S</span><span>i</span><span>g</span><span>n</span>
                                        <span> </span><span>I</span><span>n</span></a>

                                </form>
                                <h5 class="mb-0 mt-4 text-capitalize">Don't Have An Account ? <a href="{{url("join")}}"><i>Sign Up!</i></a></h5>
                                <div class="social-icons fullwidth social-colored mt-4 text-center clearfix">
                                    <ul class="list-inline">
                                        <li class="social-facebook"><a href="#">Facebook</a>
                                        </li>
                                        <li class="social-twitter"><a href="#">Twitter</a>
                                        </li>
                                        <li class="social-gplus"><a href="#">Google Plus</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--login end-->

        </div>

        <!--body content end-->

        @include("front.components.page-footer")

    </div>

    <!-- page wrapper end -->


@endsection