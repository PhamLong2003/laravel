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
  
                <h6 class="card-title">Thêm quyền</h6>
               



                <form id="myForm" method="POST" action="{{ route('update.permission')}}"  class="forms-sample">
                    @csrf

                    <input type="hidden" name="id" value="{{ $permission->id }}">
                

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên quyền</label>
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên nhóm</label>
                        <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                            <option selected="" disabled="">Chọn nhóm</option>
                            <option value="type" {{ $permission->group_name  == 'type' ? 'selected' : '' }}>Loại tài sản</option>
                            <option value="state"{{ $permission->group_name  == 'state' ? 'selected' : '' }}>Thành phố</option>
                            <option value="amenities"{{ $permission->group_name  == 'amenities' ? 'selected' : '' }}>Tiện ích</option>
                            <option value="property"{{ $permission->group_name  == 'property' ? 'selected' : '' }}>Tài sản</option>
                            <option value="history"{{ $permission->group_name  == 'history' ? 'selected' : '' }}>Lịch sử mua gói</option>
                            <option value="message"{{ $permission->group_name  == 'message' ? 'selected' : '' }}>Hộp như</option>
                            <option value="testimonials"{{ $permission->group_name  == 'testimonials' ? 'selected' : '' }}>Lời chứng thực</option>
                            <option value="agent"{{ $permission->group_name  == 'agent' ? 'selected' : '' }}>Quản lý đại lý</option>
                            <option value="category"{{ $permission->group_name  == 'category' ? 'selected' : '' }}>Danh mục bài viết</option>
                            <option value="post"{{ $permission->group_name  == 'post' ? 'selected' : '' }}>Bài đăng</option>
                            <option value="comment"{{ $permission->group_name  == 'comment' ? 'selected' : '' }}>Bình luận bài viết</option>
                            <option value="smtp"{{ $permission->group_name  == 'smtp' ? 'selected' : '' }}>Cài đặt SMTP</option>
                            <option value="site"{{ $permission->group_name  == 'site' ? 'selected' : '' }}>Cài đặt giao diện</option>
                            <option value="role"{{ $permission->group_name  == 'role' ? 'selected' : '' }}>Cấp quyền</option>
                        
                        </select>
                   
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