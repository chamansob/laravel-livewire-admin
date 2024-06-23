<div class="tpoffcanvas-are">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo">
            <a href="{{ url('/') }}"><img src="{{ asset(App\Models\SiteSetting::find(1)->logo) }}" alt=""></a>
        </div>

        <div class="tp-main-menu-mobile d-xl-none"></div>
      
        <div class="tpoffcanvas__contact-info">
            <div class="tpoffcanvas__contact-title">
                <h5>Contact us</h5>
            </div>
            <ul>
                <li>
                    <i class="fa-light fa-location-dot"></i>
                    <a href="#" target="_blank">{{ App\Models\SiteSetting::find(1)->company_address }}</a>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <a
                        href="mailto:{{ App\Models\SiteSetting::find(1)->email }}">{{ App\Models\SiteSetting::find(1)->email }}</a>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <a
                        href="tel:{{ App\Models\SiteSetting::find(1)->support_phone }}">{{ App\Models\SiteSetting::find(1)->support_phone }}</a>
                </li>
            </ul>
        </div>

        <div class="tpoffcanvas__social">
            <div class="social-icon">
                <a href="{{ App\Models\SiteSetting::find(1)->facebook }}" target="_blank"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="{{ App\Models\SiteSetting::find(1)->twitter }}" target="_blank"><i
                        class="fa-brands fa-twitter"></i></a>
                <a href="{{ App\Models\SiteSetting::find(1)->pinterest }}" target="_blank"><i
                        class="fa-brands fa-pinterest"></i></a>
                <a href="{{ App\Models\SiteSetting::find(1)->instagram }}" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="{{ App\Models\SiteSetting::find(1)->youtube }}" target="_blank"><i
                        class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
