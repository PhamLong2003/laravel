@extends('frontend.frontend_dashboard')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container">
<div class="page-content">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none mt-50 d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

       @php 
           $id = Auth::user()->id;
           $userData = App\Models\User::find($id);

       @endphp


              <div>
                <img class="wd-100 rounded-circle" style="height: 150px;width:140px;" src="{{(!empty($userData->photo)) ?url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3"></span>
              </div>
             
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Tên người dùng:</label>
              <p class="text-muted">{{$userData->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$userData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Số điện thoại:</label>
              <p class="text-muted"></p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Địa chỉ:</label>
              <p class="text-muted">{{$userData->phone}}</p>
            </div>
            <div class="mt-3">
              <div class="widget-content">
                <ul class="category-lish">
                  <div class="mt-3">
                    <li class="current"><a href="{{ url('/dashboard') }}" class="text-muted tx-11 fw-bolder mb-0 text-uppercase"><i class="fab fa fa-envelope"></i> Tổng quan</a></li>
                  </div>
                  <div class="mt-3">
                    <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('user.schedule.request')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> Lên lịch tham quan<span class="badge bagde-info"></span></a></li>
                  </div>
                  <div class="mt-3">
                    <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('user.compare')}}"><i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách so sánh </a></li>
                  </div>
                  <div class="mt-3">
                    <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('user.wishlist')}}"><i class="fa fa-indent" aria-hidden="true"></i> Danh sách yêu thích</a></li>
                  </div>
                  <div class="mt-3">
                    <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('live.chat')}}"><i class="fa fa-indent" aria-hidden="true"></i> Nhắn tin</a></li>
                  </div>
                  <div class="mt-3">
                       <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('user.change.password')}}"><i class="fa fa-key" aria-hidden="true"></i> Bảo mật</a></li>
                  </div>
                  <div class="mt-3">
              
                    <li><a class="text-muted tx-11 fw-bolder mb-0 text-uppercase" href="{{ route('user.logout')}}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Đăng xuất</a></li>
                  </div>
            
                </ul>
            </div>
            </div>
           
          </div>


        </div>
      </div>


      <!-- left wrapper end -->
      <!-- middle wrapper start -->

      @php 

         
               $id = Auth::user()->id;
               $userData = App\Models\User::find($id);
      @endphp
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Cập nhật thông tin</h6>
               



                <form method="POST" action="{{ route('user.profile.store')}}"  class="forms-sample"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1"  class="form-label">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" value="{{ $userData->username}}" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $userData->name}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $userData->email}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $userData->phone}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="{{ $userData->address}}" id="exampleInputUsername1" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input class="form-control" name="photo" type="file" id="image">   

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="wd-80 rounded-circle" src="{{(!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile" style="width:100px; height:100px">

                  
                    </div>
                   

                  
                    <button type="submit" class="btn btn-primary me-2">Lưu thông tin</button>
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

        <script type="text/javascript">
               $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
               });
        
        </script>
     


@endsection
