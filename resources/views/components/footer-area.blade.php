@props(['template'])
<footer>

         <div class="tp-footer-bg" data-background="{{ asset('frontend/assets/img/shape/footer/bg-1-3.png')}}">
         <!-- footer area start -->
         <div class="tp-footer-area tp-footer-style-2 z-index fix p-relative pt-60 pb-20">
            <div class="container">
               <div class="row">
                  <div class="col-xl-6 col-lg-6 mb-50 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                     <div class="tp-footer-widget">
                        <div class="tp-footer-right">
                           <h4 class="tp-form-title pb-30">Essential</h4>
                           <div class="tp-footer-list pb-20">
                              <ul>
                                 @foreach (App\Models\Menu::where('group_id',3)->where('status',0)->get() as  $menu )
                                     <li><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                                 @endforeach
                                
                               
                              </ul>
                           </div>
                           <div class="tp-footer-content tp-footer-content-border">
                              <p>{!! App\Models\Module::find(8)->text !!}</p>
                              <a href="{!! App\Models\Module::find(8)->link !!}"><i class="fal fa-arrow-right-long"></i> Get It Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 mb-50 wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
                     <div class="tp-footer-widget">
                        <div class="tp-footer-left text-md-center">
                           <div class="tp-footer-logo mb-25">
                              <a href="#"><img class="w-50" src="{{ asset( $template->logo)}}" alt=""></a>
                           </div>
                          
                           <div class="tp-footer-2-form-box">
                              <form action="#">
                                 <div class="tp-footer-2-input-box mb-20 p-relative">
                                    <input type="text" placeholder="info@we">
                                    <div class="tp-footer-2-input-icon">
                                       <span>
                                          <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <path
                                                d="M14 13.4375C14 14.1758 13.3984 14.75 12.6875 14.75H1.3125C0.574219 14.75 0 14.1758 0 13.4375V6.24609C0 5.83594 0.191406 5.45312 0.492188 5.20703C1.17578 4.6875 1.72266 4.25 4.97656 1.89844C5.44141 1.57031 6.34375 0.75 7 0.777344C7.62891 0.75 8.53125 1.57031 8.99609 1.89844C12.25 4.25 12.7969 4.6875 13.4805 5.20703C13.7812 5.45312 14 5.83594 14 6.24609V13.4375ZM12.1953 8.07812C12.1133 7.96875 11.9766 7.94141 11.8672 8.02344C11.2656 8.48828 10.3633 9.14453 8.99609 10.1289C8.53125 10.457 7.62891 11.2773 7 11.25C6.34375 11.2773 5.44141 10.457 4.97656 10.1289C3.60938 9.14453 2.70703 8.48828 2.10547 8.02344C1.99609 7.94141 1.85938 7.96875 1.77734 8.07812L1.53125 8.43359C1.50391 8.46094 1.50391 8.51562 1.50391 8.57031C1.50391 8.625 1.53125 8.70703 1.58594 8.73438C2.21484 9.19922 3.08984 9.85547 4.45703 10.8398C5.03125 11.25 6.01562 12.1523 7 12.125C7.95703 12.1523 8.94141 11.25 9.51562 10.8398C10.8828 9.85547 11.7578 9.19922 12.3867 8.73438C12.4414 8.70703 12.4688 8.625 12.4688 8.57031C12.4688 8.51562 12.4688 8.46094 12.4414 8.43359L12.1953 8.07812Z"
                                                fill="currentcolor" />
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tp-footer-button mb-50">
                              <button class="tp-btn-theme">
                                 <span>
                                    Subscribe Now
                                    <i class="fa-sharp fa-regular fa-arrow-right-long"></i>
                                 </span>
                              </button>
                           </div>
                           <div class="tp-footer-social">
                              <span>Follow Us</span>
                              <a href="{{ $template->facebook }}"   target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="{{ $template->twitter }}"    target="_blank"><i class="fa-brands fa-twitter"></i></a>
                              <a href="{{ $template->pinterest }}"  target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                              <a href="{{ $template->instagram }}"  target="_blank"><i class="fa-brands fa-instagram"></i></a>
                               <a href="{{ $template->youtube }}"  target="_blank"><i class="fa-brands fa-youtube"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- footer area end -->
   
         <!-- copy-right area start -->
       <x-footer-copywrite></x-footer-copywrite>
         <!-- copy-right area end -->
      </div>

   </footer>