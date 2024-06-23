<div class="tp-header-top-area tp-header-top-style d-md-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                <div class="tp-header-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset(App\Models\SiteSetting::find(1)->logo) }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-xxl-7 col-xl-6 col-lg-8 d-none d-lg-block">

                {
                <div class="tp-header-search-box">


                </div>

            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-2 col-md-6 col-6 d-flex justify-content-end">

                    @auth
                        @if (Auth::user()->role == 'user')
                          <div class="tp-header-right pt-3">
                            <div class="tp-header__lang text-start" id="tp-header__lang-toogle">
                                <ul>
                                    <li class="btn btn-sm btn-warning rounded-3">
                                        <a href="javascript:void(0)">
                                            <i class="fa-light fa-user"></i>
                                            <span><i class="fa-regular fa-angle-down"></i></span>
                                        </a>
                                        <ul class="tp-header__lang-submenu text-start">
                                            <li>
                                                <a href="{{ route('profile.edit') }}">Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">Log Out</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                          </div>
                        @elseif (Auth::user()->role == 'admin')
                          <div class="tp-header-right pt-3">
                            <div class="tp-header__lang text-start" id="tp-header__lang-toogle">
                                <ul>
                                    <li class="btn btn-sm btn-warning rounded-3">
                                        <a href="javascript:void(0)">
                                            <i class="fa-light fa-user"></i>
                                            <span><i class="fa-regular fa-angle-down"></i></span>
                                        </a>
                                        <ul class="tp-header__lang-submenu text-start">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">Dashborad</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">Log Out</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div></div>
                        @endif
                    @else
                    <div class="tp-header-right d-flex align-items-center justify-content-end">
                        <div class="tp-header-sign-box d-none d-sm-block">
                            <a href="{{ route('login') }}"><i class="fa-light fa-user"></i>Sign In</a>
                        </div>
                        <div class="tp-header-btn d-none d-xl-block">
                            <a class="tp-btn-theme" href="{{ route('register') }}"><span>Register <i
                                        class="fa-sharp fa-regular fa-arrow-right-long"></i></span></a>
                        </div>
                         <div class="tp-header__lang text-start  d-xl-none " id="tp-header__lang-toogle">
                         <ul>
                                    <li class="btn btn-sm btn-warning rounded-3">
                                        <a href="javascript:void(0)">
                                            <i class="fa-light fa-user"></i>
                                            <span><i class="fa-regular fa-angle-down"></i></span>
                                        </a>
                                        <ul class="tp-header__lang-submenu text-start">
                                            <li>
                                                <a href="{{ route('login') }}">Sign In</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}">Register</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                         </div>
                    </div>
                        @endif


                    <div class="tp-header-bar d-xl-none ">
                        <button class="tp-menu-bar ms-1"><i class="fa-sharp fa-regular fa-bars-staggered"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
