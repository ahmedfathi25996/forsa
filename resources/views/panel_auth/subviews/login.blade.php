@extends("panel_auth.main_layout")

@section("subview")

    <div class="signin-wrapper">

        <div class="signin-box">
            <h2 class="slim-logo">
                <a href="{{url("/")}}">
                    <img src="{{get_image_or_default(site_data['logo_path'])}}-64,64" style="width: 64px;height: 64px;">
                </a>
            </h2>
            <h2 class="signin-title-primary">مرحبا بك</h2>
            <h3 class="signin-title-secondary">ادخل بيانات تسجيل الدخول</h3>

            <form action="{{url("login")}}" method="POST">
                <div class="form-group">
                    @include('global_components.inline_error_msgs')
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="text" class="form-control" name="email" required placeholder="ادخل البريد الإلكتروني">
                </div><!-- form-group -->
                <div class="form-group mg-b-20">
                    <input type="password" class="form-control" name="password" required placeholder="ادخل كلمة السر">
                </div><!-- form-group -->
                <div class="form-group mg-b-20">
                    <div class="option-row-wrapper">
                        <label class="slim-options-label">تذكرني : </label>
                        <div>
                            <label class="rdiobox">
                                <input name="remember_me" checked class="sticky-sidebar" type="radio" value="true">
                                <span>نعم</span>
                            </label>
                            <label class="rdiobox">
                                <input name="remember_me" class="sticky-sidebar" type="radio" value="false">
                                <span>لا</span>
                            </label>
                        </div>
                    </div>
                </div><!-- form-group -->
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary btn-block btn-signin">تسجيل دخول</button>
            </form>
            <?php if(false): ?>
                <p class="mg-b-0">
                    Don't remember your password ?
                    <a href="{{url("")}}">Reset Password</a>
                </p>
            <?php endif; ?>
        </div><!-- signin-box -->

    </div>

@endsection

