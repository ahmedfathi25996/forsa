<!--header start-->

<header id="site-header" class="header header-1">
    <div class="container-fluid">
        <div id="header-wrap" class="box-shadow">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="{{url("/")}}">
                            <img id="logo-img" class="img-center" src="{{url("/")}}/public/front/images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <!-- Left nav -->
                            <ul id="main-menu" class="nav navbar-nav ml-auto mr-auto">
                                <li class="nav-item"> <a class="nav-link active" href="{{url("/")}}">Home</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="#service">How it Works</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="#team">Partners</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{url("/contact-us")}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <?php if(false): ?>
                            <a class="btn btn-theme btn-sm" href="{{url("/join")}}" data-text="Login"> <span>L</span><span>o</span><span>g</span><span>i</span><span>n</span>
                            </a>
                        <?php endif; ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!--header end-->