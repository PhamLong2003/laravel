@extends('frontend.frontend_dashboard')
@section('main')
 
 
 
 <!--Page Title-->
        <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-3.jpg')}});">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Về chúng tôi</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li>Về chúng tôi</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- about-section -->
        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('upload/admin.jpg')}}" alt=""></figure>
                                    <div class="text wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <h2>20</h2>
                                        <h4>Năm <br />Kinh Nghiệm</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <h5>Về tôi</h5>
                                        <h2>Xin chào tôi là Phạm Long</h2>
                                    </div>
                                    <div class="text">
                                        <p>Rất cảm ơn bạn đã quan tâm và ủng hộ trang web của chúng tôi.</p>
                                        <p>Tôi xin cam đoan rằng, trang web uy tín, chất lượng cao, độ phủ sóng giày, phù hợp với nhu cầu người tiêu dùng.</p>
                                    </div>
                                    <ul class="list clearfix">
                                        <li>Chọn khác biệt chọn thành công</li>
                                        <li>Có áp lực sẽ có tiền</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="http://127.0.0.1:8000/contact" class="theme-btn btn-one">Liên hệ với tôi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- feature-style-three -->
        <section class="feature-style-three centred pb-110">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Dịch vụ của chúng tôi</h5>
                    <h2>Dịch vụ</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h4>Mua nhà</h4>
                            <p>Là nơi mua nhà dành cho những người đang có nhu cầu bất động sản</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Cho thuê</h4>
                            <p>Nếu bạn không đủ kinh phí mua nhà, hay dùng thử cách này, nó hoàn toàn phù hợp.</p>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Bán Nhà</h4>
                            <p>Hãy tạo một tài khoản đại lý và đăng tài sản của bạn lên trang web, để nhiều người biết đến.</p>
                        </div>
                    </div>
                
                
                </div>
            </div>
        </section>
        <!-- feature-style-three end -->


        <!-- cta-section -->
        <section class="cta-section alternate-2 pb-240 centred" style="background-image: url({{ asset('frontend/assets/images/background/cta-1.jpg')}});">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text">
                        <h2>Bạn quan tâm đến loại tài sản nào <br />Chọn để đi đến</h2>
                    </div>
                    <div class="btn-box">
                        <a href="http://127.0.0.1:8000/rent/property" class="theme-btn btn-three">Cho thuê</a>
                        <a href="http://127.0.0.1:8000/buy/property" class="theme-btn btn-one">Rao bán</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-section end -->

        @endsection