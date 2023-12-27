
@php
    $setting = App\Models\SiteSetting::find(1);
    
@endphp



<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{ $setting->company_address }}</li>
                    <li><i class="fas fa-envelope"></i> <a href="long8bvv@gmail.com">{{ $setting->email }}</a></li>
                    <li><i class="far fa-phone"></i><a href="tel:0395940171">{{ $setting->support_phone }}</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                </ul>
                @auth
                <div class="sign-box">
                    <a href="{{route('dashboard')}}"><i class="fas fa-user"></i>Tổng quan</a>
                    <a href="{{route('user.logout')}}"><i class="fas fa-user"></i>Đăng xuất</a>
                </div>

                @else

                <div class="sign-box">
                    <a href="{{route('login')}}"><i class="fas fa-user"></i>Đăng nhập</a>
                </div>

                @endauth


              




            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/') }}"><img style="width:100%; height:55px;" src="{{asset('storage/site/' .$setting->logo )}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix" style="font-weight:600;">
                                <li><a style="font-weight:600;" href="{{ url('/') }}"><span>Trang chủ</span></a></li>
                              
                                <li class="dropdown"><a style="font-weight:600;" href="{{ route('rent.property')}}"><span>Tài sản</span></a>
                                    <ul>
                                        <li><a style="font-weight:600;" href="{{ route('rent.property')}}">Cho thuê</a></li>
                                        <li><a style="font-weight:600;" href="{{ route('buy.property')}}">Rao bán</a></li>
                                    </ul>
                                </li>

                                <li><a style="font-weight:600;" href="http://127.0.0.1:8000/agent/details/2"><span>Đại lý</span></a></li>

                                <li><a style="font-weight:600;" href="{{ route('blog.list') }}"><span>Bài viết</span></a></li>
                                <li><a style="font-weight:600;" href="{{ route('about.us') }}"><span>Về chúng tôi</span></a></li>

                              
                                <li><a style="font-weight:600;" href="{{ route('contact.contact') }}"><span>Liên hệ</span></a></li>   

                                      <li><a href="{{ route('agent.login') }}" class="theme-btn btn-one"><span>+</span>Thêm danh sách</a></li>   
                            </ul>
                        </div>
                    </nav>
                </div>
             
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/') }}"><img style="width:100%; height:55px;" src="{{asset('storage/site/' .$setting->logo )}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
               
            </div>
        </div>
    </div>
</header>