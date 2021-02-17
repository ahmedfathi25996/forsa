<div class="template-options-wrapper">

    <a href="" class="template-options-btn">
        <i class="icon ion-ios-gear"></i>
    </a>

    <div class="template-options-inner">
        <h1 class="template-option-logo">{{site_data['name']}}</h1>

        <h6 class="template-options-title">إعدادات العرض</h6>

        <div class="option-row-wrapper">
            <label class="slim-options-label">لون الواجهة : </label>
            <div>
                <div class="skin-mode-item">
                    <a href="" class="skin-light-mode switch_toggle" data-dark_mode="off"></a>
                </div>
                <div class="skin-mode-item">
                    <a href="" class="skin-dark-mode switch_toggle" data-dark_mode="on"></a>
                </div><!-- skin-mode-item -->
            </div>
        </div><!-- option-row-wrapper -->

        <div class="option-row-wrapper">
            <label class="slim-options-label">إتجاة العرض : </label>
            <div>
                <label class="rdiobox">
                    <a href="{{url("branch/theme/change_direction/en")}}">
                        <input name="slim-direction" class="slim-direction" {{(config('locale') == "en")?"checked":""}} type="radio" value="ltr">
                        <span>LTR</span>
                    </a>
                </label>
                <label class="rdiobox">
                    <a href="{{url("branch/theme/change_direction/ar")}}">
                        <input name="slim-direction" class="slim-direction" {{(config('locale') == "ar")?"checked":""}} type="radio" value="rtl">
                        <span>RTL</span>
                    </a>
                </label>
            </div>
        </div><!-- option-row-wrapper -->

        <div class="option-row-wrapper">
            <label class="slim-options-label">نوع القائمة : </label>
            <div>
                <label class="rdiobox">
                    <a href="{{url("branch/theme/change_menu/navbar")}}">
                        <input name="slim-menu" class="slim-direction" {{(config('menu_display') == "navbar")?"checked":""}} type="radio" value="navbar">
                        <span>بالعرض</span>
                    </a>
                </label>
                <label class="rdiobox">
                    <a href="{{url("branch/theme/change_menu/sidebar")}}">
                        <input name="slim-menu" class="slim-direction" {{(config('menu_display') == "sidebar")?"checked":""}} type="radio" value="sidebar">
                        <span>من الجنب</span>
                    </a>
                </label>
            </div>
        </div><!-- option-row-wrapper -->

    </div><!-- template-options-inner -->
</div>