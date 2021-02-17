@include("admin.components.header")

<?php if(config('menu_display') == "sidebar"): ?>

    <div class="slim-body">

        @include("admin.components.sidebar_menu_links")

        @yield('subview')

    </div>

    <?php else : ?>

    @yield('subview')

<?php endif; ?>


@include("admin.components.footer")



