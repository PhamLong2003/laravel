@extends('frontend.frontend_dashboard')
@section('main')


@section('title')
Danh sách yêu thích
@endsection

   <!--Page Title-->
   <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Danh sách yêu thích</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/dashboard') }}">Trang chủ</a></li>
                <li>Danh sách yêu thích</li>
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


                        @php 
                        $id = Auth::user()->id;
                        $userData = App\Models\User::find($id);
             
                        @endphp


                        <div class="widget-title">
                            <h5>Tài khoản</h5>
                        </div>
                        <div class="widget-content">
                            <div class="select-box">
                                <ul class="list-group" id="simple-list">
                                    <li class="list-group-item">{{$userData->name}}</li>
                                    <li class="list-group-item">{{$userData->email}}</li>
                                    <li class="list-group-item">{{$userData->phone}}</li>
                               
                                  </ul>
                            </div>
                            
                      
                          
                          
                        </div>
                        <div class="widget-title">
                            <h5>Danh muc</h5>
                        </div>
                        <div class="widget-content">
                            <div class="select-box">
                                <ul class="list-group" id="simple-list">
                                    <li class="list-group-item"><a href="{{ route('dashboard') }}">Tổng quan</a></li>
                                    <li class="list-group-item"><a href="{{ route('user.schedule.request')}}">Tham quan</a></li>
                                    <li class="list-group-item"><a href="{{ route('user.compare') }}">So sánh</a></li>
                                    <li class="list-group-item"><a href="{{ route('live.chat') }}">Nhắn tin</a></li>
                                    <li class="list-group-item"><a href="{{ route('user.change.password')}}">Bảo mật</a></li>
                                    <li class="list-group-item"><a href="{{ route('user.logout')}}">Đăng xuất</a></li>
                                  </ul>
                            </div>
                            
                      
                          
                          
                        </div>
                    </div>
                  
                
                 
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">


                         <div id="wishlist">
                         </div>
                        
                        </div>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-page-section end -->


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