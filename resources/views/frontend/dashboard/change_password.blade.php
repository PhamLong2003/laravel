@extends('frontend.frontend_dashboard')
@section('main')


@section('title')
    Đổi mật khẩu
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Đổi mật khẩu</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/dashboard') }}">Tổng quan</a></li>
                <li>Thay đổi mật khẩu</li>
            </ul>
        </div>
    </div>
</section>

<div class="page-content">
    <div class="container">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
   
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div style="width:100%; margin-top: 30px; margin-bottom:30px;" class="card">
                <div class="card-body">
  
                <h6 class="card-title">Thay đổi mật khẩu</h6>
               



                <form method="POST" action="{{ route('user.password.update')}}"  class="forms-sample"  enctype="multipart/form-data">
                    @csrf
                

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                        @error('old_password')
                           <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                        @error('new_password')
                           <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nhập lại Mật khẩu mới</label>
                        <input type="password" name="new_password_confirmation" class="form-control"  id="new_password_confirmation" autocomplete="off">
                    
                    </div>
                   
      
                 
                   

                  
                    <button type="submit" class="btn btn-primary me-2">Lưu</button>
                </form>
  
                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      <!-- right wrapper end -->
    </div>
</div>

        </div>
     



@endsection