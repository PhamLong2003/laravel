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
                    <h2 style="font-family: sans-serif; font-weight:650;">Đăng nhập bằng tài khoản của bạn</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li style="font-size: 16px;" class="tab-btn active-btn" data-tab="#tab-1">Đăng nhập</li>
                            <li class="tab-btn" data-tab="#tab-2">Đăng ký</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <h4>Đăng nhập</h4>
                                <form action="{{route('login')}}" method="post" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email/Tên/Số điện thoại</label>
                                        <input type="text" name="login" id="login" required="Thông tin tài khoản hoặc mật khẩu không chính xác">
                                        @error('login')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" id="password" >
                                        @error('password')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>Bạn chưa có tài khoản <a href="">Đăng ký ngay</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <h4>Đăng ký</h4>
                                <form action="{{ route('register') }}" method="post" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input type="text" name="name" id="name" >
                                        @error('name')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="email" name="email" >
                                        @error('email')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" id="password" name="password" >
                                        @error('password')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" >
                                        @error('password_confirmation')
                                            <p class="d-flex justify-content-start ps-3 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Đăng ký</button>
                                    </div>
                                </form>
                               
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

<!-- subscribe-section end -->

@endsection