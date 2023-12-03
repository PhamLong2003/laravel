@extends('frontend.frontend_dashboard')
@section('main')
 
 <!--Page Title-->
 <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png);')}}"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png);')}}"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Đăng nhập</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Trang chủ</a></li>
                <li>Đăng nhập</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
            
                    <h2>Đăng nhập hoặc đăng ký</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1" style="width:100%;">Đăng nhập</li>
                            <li class="tab-btn"  data-tab="#tab-2" style="width:100%;">Tạo tài khoản đại lý</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <h4>Đăng nhập đại lý</h4>
                                <form action="{{route('login')}}" method="post" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email/Tên/SĐT</label>
                                        <input type="text" name="login" id="login" required="Vui long nhap thong tin">
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" id="password" required="Vui long nhap pass">
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>
                                        Chưa có tài khoản? <a href="">Đăng ký ngay bây giờ</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <h4>Register</h4>

                                <form action="{{ route('agent.register') }}" method="post" class="default-form">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label>Tên đại lý</label>
                                        <input type="text" name="name" id="name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" id="email" name="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại đại lý</label>
                                        <input type="text" id="phone" name="phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" id="password" name="password" required="">
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Đăng ký</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ragister-section end -->


<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->

@endsection