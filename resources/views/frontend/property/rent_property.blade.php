@extends('frontend.frontend_dashboard')
@section('main')
      
        <!--Page Title-->
        <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
                <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Danh sách tài sản cho thuê</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li>Tài sản cho thuê</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-page-section -->
        <section class="property-page-section property-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Lọc tài sản</h5>
                                </div>
@php
    $states = App\Models\State::latest()->get();
    $ptypes = App\Models\PropertyType::latest()->get();
    
@endphp



<form action="{{ route('all.property.search') }}" method="post" class="search-form">
    @csrf

                                <div class="widget-content">
                                    <div class="select-box">
                                        <select name="property_status" class="wide">
                                           <option data-display="">Tất cả trạng thái</option>
                                           <option value="Cho Thuê">Cho Thuê</option>
                                           <option value="Rao Bán">Rao Bán</option>
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select name="ptype_id" class="wide">
                                           <option data-display="" selected="" disabled="">Chọn loại tài sản</option>

                                           @foreach ($ptypes as $type)
                                                           <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                                                
                                           @endforeach

                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select name="state" class="wide">
                                           <option data-display="" selected="" disabled="">Chọn thành phố</option>
                                           @foreach ($states as $state)
                                           <option value="{{ $state->state_name }}">{{ $state->state_name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select name="bedrooms" class="wide">
                                           <option data-display="">Chọn phòng ngủ</option>
                                           <option value="1">1 Phòng</option>
                                           <option value="2">2 Phòng</option>
                                           <option value="3">3 Phòng</option>
                                           <option value="4">4 Phòng</option>
                                           <option value="5">5 Phòng</option>
                                        </select>
                                    </div>
                                    <div class="select-box">
                                        <select name="bathrooms" class="wide">
                                           <option data-display="">Chọn phòng tắm</option>
                                           <option value="1">1 Phòng</option>
                                           <option value="2">2 Phòng</option>
                                           <option value="3">3 Phòng</option>
                                           <option value="4">4 Phòng</option>
                                           <option value="5">5 Phòng</option>
                                        </select>
                                    </div>
                                  
                                    <div class="filter-btn">
                                        <button type="submit" class="theme-btn btn-one"><i class="fas fa-filter"></i>&nbsp;Lọc</button>
                                    </div>
                                </div>

</form>




                            </div>
                            <div class="price-filter sidebar-widget">
                                <div class="widget-title">
                                    <h5>Select Price Range</h5>
                                </div>
                                <div class="range-slider clearfix">
                                    <div class="clearfix">
                                        <div class="input">
                                            <input type="text" class="property-amount" name="field-name" readonly="">
                                        </div>
                                    </div>
                                    <div class="price-range-slider"></div>
                                </div>
                            </div>
                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Trạng thái tài sản</h5>
                                </div>
                                <ul class="category-list clearfix">
                                    <li><a href="{{ route('rent.property') }}">Cho thuê <span></span></a></li>
                                    <li><a href="{{ route('buy.property') }}">Rao bán <span></span></a></li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Kết quả tìm kiếm: <span>Hiển thị {{ count($property) }} tài sản</span></h5>
                                </div>
                                <div class="right-column pull-right clearfix">
                                   
                                   
                                </div>
                            </div>
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                    @foreach($property as $item)

                                    <div class="deals-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><img src="{{ asset('storage/image/'.$item->property_thambnail)}}" alt="" style="width:100%; height:350px;" ></figure>
                                                <div class="batch"><i class="icon-11"></i></div>
                                                    @if ($item->featured == 1)
                                                <span class="category">Đặc sắc</span>
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
                                                            <img src="{{(!empty($item->user->photo)) 
                                                                ?url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg')}}" alt="" style="height: 40px;width: 45px;">
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
                            <div class="pagination-wrapper">
                                {{ $property->links('vendor.pagination.custom') }}
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-page-section end -->


        <!-- subscribe-section -->
        <section class="subscribe-section bg-color-3">
            <div class="pattern-layer" style="background-image: url({{asset('frontend/assets/images/shape/shape-2.png')}});"></div>
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
                            <form action="http://azim.commonsupport.com/Realshed/contact.html" method="post" class="subscribe-form">
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