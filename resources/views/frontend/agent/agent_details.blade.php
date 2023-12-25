@extends('frontend.frontend_dashboard')
@section('main')

@section('title')
    Tài sản đại lý
@endsection
  <!--Page Title-->
  <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $agent->name }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Trang chủ</a></li>
                <li>{{ $agent->name }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- agent-details -->
<section class="agent-details">
    <div class="auto-container">
        <div class="agent-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0">
                    <figure class="image-box"><img src="{{(!empty($agent->photo)) 
                        ?url('upload/agent_images/'.$agent->photo) : url('upload/no_image.jpg')}}" 
                        alt="" style="width:270px; height:320px;" alt=""></figure>
                    <div class="content-box">
                        <div class="upper clearfix">
                            <div class="title-inner pull-left">
                                <h4>{{ $agent->name}}</h4>
                                <span class="designation">{{ $agent->username }}</span>
                            </div>
                            <ul class="social-list pull-right clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="text">
                            <p>"Thành công thực sự không quá khó khăn. Có một phần đáng kể dân số ở Bắc Mỹ thực sự muốn và cần thành công! Tại sao? Vì vậy, họ có sẵn một lý do bào chữa. Khi mọi thứ không diễn ra như ý muốn! Ít nhất phải nói là một tình huống khá buồn. Hãy vui vẻ và thôi miên bản thân để trở thành Bóng ma Giáng sinh của riêng bạn trong tương lai"</p>
                        </div>
                        <ul class="info clearfix mr-0">
                            <li><i class="fab fa fa-envelope"></i><a href="long8bvv@gmail.com">{{ $agent->email}}</a></li>
                            <li><i class="fab fa fa-phone"></i><a href="tel:0395940171">{{ $agent->phone}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agent-details end -->


<!-- agents-page-section -->
<section class="agents-page-section agent-details-page">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="agents-content-side tabs-box">
                    <div class="group-title">
                        <h3 style="font-weight: 700;">Tài sản của {{ $agent->name}}</h3>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">

            @foreach($property as $item)

            <div class="deals-block-one">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('storage/image/'.$item->property_thambnail)}}" alt="" style="width:100%; height:350px;" ></figure>
                        <div class="batch"><i class="icon-11"></i></div>
                            @if ($item->featured == 1)
                        <span class="category">Đặc trưng</span>
                            @else
                        <span class="category">Mới</span>
                            @endif



                        <div class="buy-btn"><a href="{{ url('property/details/'.$item->id. '/'.$item->propety_slug) }}">{{ $item->property_status }}</a></div>
                    </div>
                    <div class="lower-content">
                        <div class="title-text"><h4><a href="{{ url('property/details/'.$item->id. '/'.$item->propety_slug) }}">{{ $item->property_name }}</a></h4></div>
                        <div class="price-box clearfix">
                            <div class="price-info pull-left">
                                <h6>Giá khởi điểm</h6>
                                <h4>{{ $item->lowest_price }}</h4>
                            </div>
                            @if($item->agent_id == Null)
                            <div class="author-box pull-right">
                                <figure class="author-thumb"> 
                                    <img src="{{ url('upload/phamlong.jpg') }}" alt="">
                                    <span>Quản trị viên</span>
                                </figure>
                            </div>
                            @else 
                            <div class="author-box pull-right">
                                <figure class="author-thumb"> 
                                    <img src="{{(!empty($agent->photo)) 
                                        ?url('upload/agent_images/'.$agent->photo) : url('upload/no_image.jpg')}}" alt="" style="height: 40px;width: 45px;">
                                    <span>{{ $item->user->name}}</span>
                                </figure>
                            </div>
                            @endif

                           
                        </div>
                        <p>{{ $item->short_descp }}</p>
                        <ul class="more-details clearfix">
                            <li><i class="icon-14"></i>{{ $item->bedrooms }} Phòng ngủ</li>
                            <li><i class="icon-15"></i>{{ $item->bathrooms }} Phòng tắm</li>
                            <li><i class="icon-16"></i>{{ $item->property_size }} m2</li>
                        </ul>
                        <div class="other-info-box clearfix">
                            <div class="btn-box pull-left"><a href="{{ url('property/details/'.$item->id. '/'.$item->propety_slug) }}" class="theme-btn btn-two">Xem chi tiết</a></div>
                            <ul class="other-option pull-right clearfix">
                                <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                <li><a aria-label="Add to WishList" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)" ><i class="icon-13"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

                                    @endforeach
                               
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar agent-sidebar">
                    <div class="agents-contact sidebar-widget">
                        <div class="widget-title">
                            <h5>Liên hệ với {{ $agent->name }}</h5>
                        </div>
                        <div class="form-inner">

                            @auth
                            @php
                               $id = Auth::user()->id;
                               $userData = App\Models\User::find($id);
                                
                            @endphp
                
                
                
                
                            
                            <form action="{{ route('agent.details.message') }}" method="post" class="default-form">
                                @csrf
                                <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                                
                             
                
                
                                <div class="form-group">
                                    <input type="text" name="msg_name" placeholder="Tên của bạn" value="{{ $userData->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="msg_email" placeholder="Email" value="{{ $userData->email }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="msg_phone" placeholder="Số điện thoại"  value="{{ $userData->phone }}">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Gửi tin nhắn</button>
                                </div>
                            </form>
                
                            @else
                           
                             <form action="{{ route('agent.details.message') }}" method="post" class="default-form">
                                @csrf
                                <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                              
                
                
                                <div class="form-group">
                                    <input type="text" name="msg_name" placeholder="Tên của bạn" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="msg_email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="msg_phone" placeholder="Số điện thoại" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Gửi tin nhắn</button>
                                </div>
                            </form>
                            @endauth
                
                        </div>
                    </div>
                    <div class="category-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Trạng thái tài sản</h5>
                        </div>
                        <ul class="category-list clearfix">
                            <li><a href="{{ route('rent.property') }}">Cho thuê <span>({{ count($rentproperty) }})</span></a></li>
                            <li><a href="{{ route('buy.property') }}">Rao bán <span>({{ count($buyproperty) }})</span></a></li>
                        </ul>
                    </div>
                    <div class="featured-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Tài sản đặc trưng</h5>
                        </div>
                        <div class="single-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">

                            @foreach($featured as $feat )
                            <div class="feature-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{ asset('storage/image/'.$feat->property_thambnail)}}" style="height: 280px" alt=""></figure>
                                        <div class="batch"><i class="icon-11"></i></div>
                                        <span class="category">Đặc trưng</span>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="{{ url('property/details/'.$feat->id. '/'.$feat->propety_slug) }}">{{ $feat->property_name }}</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info">
                                                <h6>Giá khởi điểm</h6>
                                                <h4>{{ $feat->lowest_price }} VNĐ</h4>
                                            </div>
                                        </div>
                                        <p>{{ $feat->short_descp }}</p>
                                        <div class="btn-box"><a href="{{ url('property/details/'.$feat->id. '/'.$feat->propety_slug) }}" class="theme-btn btn-two">Xem chi tiết</a></div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agents-page-section end -->


<!-- subscribe-section -->

<!-- subscribe-section end -->




@endsection