        <div class="slim-footer">

        </div><!-- slim-footer -->
        <script src="{{url("/")}}/public/admin/lib/popper.js/js/popper.js"></script>
        <script src="{{url("/")}}/public/admin/lib/bootstrap/js/bootstrap.js"></script>
        <script src="{{url("/")}}/public/admin/lib/jquery.cookie/js/jquery.cookie.js"></script>

        <script src="{{url("/")}}/public/admin/lib/jquery-toggles/js/toggles.min.js"></script>

        <script src="{{url("/")}}/public/admin/js/slim.js"></script>

        <!-- other includes -->
        @yield('additional_js')

        <!-- Toastr -->
        <script src="{{url("/")}}/public/js/toastr.js"></script>

        <script src="{{url("/")}}/public/jscode/config.js" type="text/javascript"></script>
        <script src="{{url("/")}}/public/jscode/admin/utility.js" type="text/javascript"></script>
        <script src="{{url("/")}}/public/admin/js/admin.js" type="text/javascript"></script>
        <script src="{{url("/")}}/public/jscode/btm_form_helpers/form.js" type="text/javascript"></script>

        @include("admin.components.theme_settings")

    </body>
</html>
