 <div id="header-sticky" class="tp-header-area tp-header-style-3">
     <div class="container">
         <div class="tp-header-border">
             <div class="row align-items-center">
                 <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-6">
                     <div class="tp-header-btn d-none d-xl-block">
                         <a class="tp-btn-theme" href="tel:{{ App\Models\SiteSetting::find(1)->support_phone }}"><span>
                                 <i class="fa-light fa-phone"></i>
                                 {{ App\Models\SiteSetting::find(1)->support_phone }}</span></a>
                     </div>
                 </div>
                 <div class="col-xxl-9 col-xl-6 d-none d-xl-block">
                     <div class="tp-header-menu">
                         <nav class="tp-main-menu-content">
                             <ul>
                                 <li><a href="{{ url('/') }}">Home</a></li>
                                 @php
                                     $menus = \App\Models\Menu::where('group_id',1)->where('status', 0)->get();
                                 @endphp
                                 @foreach ($menus as $menu)
                                     <li>
                                         <a href="/{{ urlgen($menu->id) }}">{{ $menu->title }}</a>
                                     </li>
                                 @endforeach

                             </ul>
                         </nav>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
