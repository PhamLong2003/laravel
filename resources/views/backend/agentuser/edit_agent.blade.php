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
  
                <h6 class="card-title">Chỉnh sửa đại lý</h6>
               



                <form id="myForm" method="POST" action="{{ route('update.agent')}}"  class="forms-sample">
                    @csrf
                
                    <input type="hidden" name="id" value="{{ $allagent->id }}">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên đại lý</label>
                        <input type="text" name="name" value="{{ $allagent->name }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ $allagent->email }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại đại lý</label>
                        <input type="text" name="phone" value="{{ $allagent->phone }}" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ đại lý</label>
                        <input type="text" name="address" value="{{ $allagent->address }}" class="form-control">
                    </div>
                   
               
               
                   

                  
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
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
                        name: {
                            required : true,
                        }, 
                        email: {
                            required : true,
                        }, 
                        phone: {
                            required : true,
                        }, 
                        password: {
                            required : true,
                        }, 
                    },
                    messages :{
                        name: {
                            required : 'Vui lòng nhập tên đại lý',
                        }, 
                        email: {
                            required : 'Vui lòng nhập email đại lý',
                        }, 
                        phone: {
                            required : 'Vui lòng nhập SĐT đại lý',
                        }, 
                        password: {
                            required : 'Vui lòng nhập mật khẩu đại lý',
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