@php
    $setting = App\Models\SiteSetting::find(1);
    $blog = App\Models\BlogPost::latest()->limit(2)->get();
    $agents = App\Models\User::where('status','active')->where('role','agent')->orderBy('id','DESC')->limit(5)->get();

    
@endphp



<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>Về chúng tôi</h3>
                        </div>
                        <div class="text">
                            <p>CS1: Hoàng Hoa Thám - Hà Nội <br>CS2: Cầu giấy - Hà Nội <br>SĐT: 0395940171</p>
                            <p>Uy tin làm lên thương hiệu <br>Chọn khác biệt - Chọn thành công</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Danh mục</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="http://127.0.0.1:8000/rent/property">Cho thuê </a></li>
                                <li><a href="http://127.0.0.1:8000/buy/property">Rao bán</a></li>
                                <li><a href="http://127.0.0.1:8000/agent/details/2">Đại lý</a></li>
                                <li><a href="http://127.0.0.1:8000/blog/list">Bài viết</a></li>
                                <li><a href="{{ route('contact.contact') }}">Liên hệ</a></li>
                                <li><a href="">Về chúng tôi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Tin mới</h3>
                        </div>
                        @foreach ($blog as $item)
                            
                       
                        <div class="post-inner">
                            <div class="post">
                                <figure class="post-thumb"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset('storage/post/'.$item->post_image) }}" style="width:100%; height:80px;" alt=""></a></figure>
                                <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h5>
                                <p>{{ $item->created_at }}</p>
                            </div>
                           
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Liên hệ</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->company_address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:0395940171">{{ $setting->support_phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="long8bvv@gmail.com">{{ $setting->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <figure class="footer-logo"><a href="{{ url('/') }}"><img src="{{ asset('frontend/assets/images/footer-logo.png')}}" alt=""></a></figure>
                <div class="copyright pull-left">
                    <p><a href="">{{ $setting->copyright }}</a> &copy; </p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="">Chương Mỹ</a></li>
                    <li><a href="">Hà Nội</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>