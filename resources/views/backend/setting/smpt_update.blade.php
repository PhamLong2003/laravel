@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Cập nhật SMTL</h6>
               



                <form id="myForm" method="POST" action="{{ route('update.smpt.setting')}}"  class="forms-sample">
                    @csrf

                    <input type="hidden" name="id" value="{{ $setting->id }}">
                

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Người gửi</label>
                        <input type="text" name="mailer" class="form-control" value="{{ $setting->mailer }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Máy chủ</label>
                        <input type="text" name="host" class="form-control" value="{{ $setting->host }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bài đăng</label>
                        <input type="text" name="post" class="form-control" value="{{ $setting->post }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Người dùng</label>
                        <input type="text" name="username" class="form-control" value="{{ $setting->username }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" value="{{ $setting->password }}">
                   
                    </div>
               

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mã hóa</label>
                        <input type="text" name="encryption" class="form-control" value="{{ $setting->encryption }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="from_address" class="form-control" value="{{ $setting->from_address }}">
                   
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
       


@endsection