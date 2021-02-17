@include("branch.components.header")

<?php if(config('menu_display') == "sidebar"): ?>

    <div class="slim-body">

        @include("branch.components.sidebar_menu_links")

        @yield('subview')

    </div>

    <?php else : ?>

    @yield('subview')

<?php endif; ?>


@include("branch.components.footer")



