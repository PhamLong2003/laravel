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
               



                <form id="myForm" method="POST" action="{{ route('store.permission')}}"  class="forms-sample">
                    @csrf
                

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên quyền</label>
                        <input type="text" name="name" class="form-control">
                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên nhóm</label>
                        <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                            <option selected="" disabled="">Chọn nhóm</option>
                            <option value="type">Loại tài sản</option>
                            <option value="state">Thành phố</option>
                            <option value="amenities">Tiện ích</option>
                            <option value="property">Tài sản</option>
                            <option value="history">Lịch sử mua gói</option>
                            <option value="message">Hộp như</option>
                            <option value="testimonials">Lời chứng thực</option>
                            <option value="agent">Quản lý đại lý</option>
                            <option value="category">Danh mục bài viết</option>
                            <option value="post">Bài đăng</option>
                            <option value="comment">Bình luận bài viết</option>
                            <option value="smtp">Cài đặt SMTP</option>
                            <option value="site">Cài đặt giao diện</option>
                            <option value="role">Cấp quyền</option>
                        
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
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        amenitis_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        amenitis_name: {
                            required : 'Vui lòng nhập tiện ích',
                        }, 
                         
        
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>


@endsection