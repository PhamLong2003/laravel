@extends('frontend.frontend_dashboard')
@section('main')


@section('title')
Nhắn tin
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Nhắn tin riêng</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/dashboard') }}">Tổng quan</a></li>
                <li>Nhắn tin</li>
            </ul>
        </div>
    </div>
</section>

      <!-- left wrapper start -->
   
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      {{-- <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div style="width:100%; margin-top: 30px; margin-bottom:30px;" class="card">
                <div class="card-body">
  
                <h6 class="card-title">Thay đổi mật khẩu</h6>
               
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="lower-content">
                                        Phamuj Long
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


             
  
                </div>
              </div>
        </div>
      </div> --}}

      <section class="property-page-section property-list">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 sidebar-side">
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

                                        <li class="list-group-item"><a href="{{ route('user.wishlist') }}">Danh sách yêu thích</a></li>
                                        <li class="list-group-item"><a href="{{ route('user.compare') }}">So sánh</a></li>
                                        <li class="list-group-item"><a href="{{ route('user.change.password')}}">Bảo mật</a></li>
                                        <li class="list-group-item"><a href="{{ route('user.logout')}}">Đăng xuất</a></li>
                                      </ul>
                                </div>
                                
                          
                              
                              
                            </div>
                        </div>
                      
                    
                     
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <div class="lower-content">
                                        <h3>Nhắn tin</h3>


                                        <div id="app">
                                            <chat-message></chat-message>
                                        </div>




                                    </div>
                                </div>
    
                            
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      <!-- right wrapper end -->
    </div>
</div>

        </div>
     



@endsection