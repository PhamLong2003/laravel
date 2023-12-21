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
  
                <h6 class="card-title">Thêm quản trị</h6>
               



                <form id="myForm" method="POST" action="{{ route('update.admin',$user->id)}}"  class="forms-sample">
                    @csrf
                

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên người dùng quản trị</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên quản trị</label>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email quản trị</label>
                        <input value="{{ $user->email }}" type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại quản trị</label>
                        <input value="{{ $user->phone }}" type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ quản trị</label>
                        <input value="{{ $user->address }}" type="text" name="address" class="form-control">
                    </div>
                 
                   
               
               
                   

                  
                    <button type="submit" class="btn btn-primary me-2">Lưu đại lý</button>
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