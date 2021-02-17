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
                        <h1 class="title"><span>C</span>ontact Us</h1>
                        <p>We're Building Modern And High Software</p>
                    </div>
                    <div class="col-lg-5 col-md-12 text-lg-right md-mt-3">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

            <!--contact start-->

            <section class="contact-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <img class="img-center" src="{{url("/")}}/public/front/images/banner/06.png" alt="">
                        </div>
                        <div class="col-lg-6 col-md-12 md-mt-5">
                            <div class="section-title">
                                <div class="title-effect title-effect-2">
                                    <div class="ellipse"></div> <i class="la la-info"></i>
                                </div>
                                <h2>Stay Contact Us</h2>
                                <p>Get in touch and let us know how we can help. Fill out the form and we’ll be in touch as soon as possible.</p>
                            </div>
                            <form method="post" action="{{url("/contact-us")}}">
                                <div class="messages"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Type First name" required="required" data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Type Last name" required="required" data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Type Email" required="required" data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Type Phone" required="required" data-error="Phone is required">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="form_message" name="message" class="form-control" placeholder="Type Message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="col-md-12 mt-2">
                                        <button class="btn btn-theme btn-circle" data-text="Send Message"><span>S</span><span>e</span><span>n</span><span>d</span>
                                            <span> </span><span>M</span><span>e</span><span>s</span><span>s</span><span>a</span><span>g</span><span>e</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-info p-0 z-index-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="contact-media"> <i class="flaticon-paper-plane"></i><span>Address:</span>
                                <p>Win-Win Agency, 7 El-mireland Buildings Gesr El-seuz </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 md-mt-5">
                            <div class="contact-media"> <i class="flaticon-email"></i><span>Email Address</span><a href="mailto:info@winwin-eg.com"> info@winwin-eg.com</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 md-mt-5">
                            <div class="contact-media"> <i class="flaticon-social-media"></i><span>Phone Number</span><a href="tel:+200114 131 3114">+200114 131 3114</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="o-hidden p-0 custom-mt-10 z-index-0">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="map iframe-h-2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13806.527832295491!2d31.319848499999996!3d30.1047252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14581585d0b0f0f5%3A0xf03c125a965cb5e8!2sMaryland%20Buildings%2C%20Gesr%20Al%20Suez%2C%20El-Montaza%2C%20Heliopolis%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1574161572625!5m2!1sen!2seg" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--contact end-->

        </div>

        <!--body content end-->


        @include("front.components.page-footer")

    </div>

    <!-- page wrapper end -->


@endsection