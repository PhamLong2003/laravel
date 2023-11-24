@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
           
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sửa tài sản</h6>
                        <form method="POST" action="{{ route('store.property') }}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tên tài sản</label>
                                        <input type="text" name="property_name" class="form-control" placeholder="Enter first name" 
                                        value="{{ $property->property_name }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Trạng thái tài sản</label>
                                        <select name="property_status" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Chon trạng thái</option>
											<option value="rent">Cho thuê</option>
											<option value="buy">Rao bán</option>
										
										</select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Giá thấp nhất</label>
                                        <input type="text" name="lowest_price" value="{{ $property->lowest_price }}" class="form-control" placeholder="Enter first name">
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Giá tối đa</label>
                                        <input type="text" name="max_price" value="{{ $property->max_price }}"  class="form-control" placeholder="Enter first name">
                                    </div>
                                </div><!-- Col -->
                              

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Phòng ngủ</label>
                                        <input type="text" value="{{ $property->bedrooms }}" name="bedrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Phòng tắm</label>
                                        <input type="text" value="{{ $property->bathrooms }}" name="bathrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Ga ra</label>
                                        <input type="text" value="{{ $property->garage }}" name="garage" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Kích thước ga ra</label>
                                        <input type="text" value="{{ $property->garage_size }}" name="garage_size" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" value="{{ $property->address }}" name="address" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Thành phố</label>
                                            <input type="text" value="{{ $property->city }}" name="city" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Khu vực</label>
                                            <input type="text" value="{{ $property->state }}" name="state" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Mã bưu điện</label>
                                            <input type="text" value="{{ $property->postal_code }}" name="postal_code" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Quy mô tài sản</label>
                                                <input type="text" value="{{ $property->property_size }}" name="property_size" class="form-control">
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Video</label>
                                                <input type="text" value="{{ $property->amenitis_video }}" name="amenitis_video" class="form-control">
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">Hàng xóm</label>
                                                <input type="text" value="{{ $property->neighborhood }}" name="neighborhood" class="form-control">
                                            </div>
                                        </div><!-- Col -->
                                     
    

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Vĩ độ</label>
                                        <input type="text" value="{{ $property->latitude }}" class="form-control" name="latitude">
                                        <a href="https://www.latlong.net/"  target="_blank">Kích vào để xem chi tiết</a>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kinh độ</label>
                                        <input type="text" name="longitude" value="{{ $property->longitude }}" class="form-control" autocomplete="off">
                                        <a href="https://www.latlong.net/" target="_blank">Kích vào để xem chi tiết</a>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Kiểu tài sản</label>

                                        <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Chon trạng thái</option>
                                            @foreach ($propertytype as $ptype)
											<option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                            @endforeach
										</select>


                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tiện ích</label>
                                        <select class="js-example-basic-multiple form-select" name="amenities_id[]" multiple="multiple" data-width="100%">
                                            @foreach ($amenities as $ameni)
											<option value="{{ $ameni->id }}">{{ $ameni->amenitis_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Đại lý</label>

                                          <select name="agent_id" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Chon đại lý</option>
                                            @foreach ($activeAgent as $agent)
											<option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
										</select>
                                         
                                    </div>
                                </div><!-- Col -->
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Mô tả ngắn</label>
                                    <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $property->short_descp }}
                                    </textarea>
                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Mô tả dài</label>
                                    <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10">{!! $property->long_descp !!}</textarea>

                    
                                </div>
                            </div><!-- Col -->


        <hr>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                <input type="checkbox" value="1" name="featured" class="form-check-input" id="checkInline1">
                                <label class="form-check-label" for="checkInline1">
                                    Tài sản đặc sắc
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" value="1" name="hot" class="form-check-input" id="checkInline">
                                <label class="form-check-label" for="checkInline">
                                    Tài sản HOT
                                </label>
                            </div>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Luu tai san</button>

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
                        property_name: {
                            required : true,
                        }, 
                        property_status: {
                            required : true,
                        }, 
                        lowest_price: {
                            required : true,
                        }, 
                        max_price: {
                            required : true,
                        }, 
                        ptype_id: {
                            required : true,
                        }, 
                     
                    },
                    messages :{
                        property_name: {
                            required : 'Vui lòng nhập tai san',
                        }, 
                        property_status: {
                            required : 'Vui lòng chon trang thai',
                        }, 
                        lowest_price: {
                            required : 'Vui lòng nhập gia',
                        },    
                        max_price: {
                            required : 'Vui lòng nhập gia',
                        },    
                        ptype_id: {
                            required : 'Vui lòng mhap loai tai san',
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
       
             <script type="text/javascript">

             $(document).ready(function(){
                $('#multiImg').on('change', function(){
                    if(window.File && window.FileReader && window.FileList && window.Blob) {
                        var data = $(this)[0].files;
                        $.each(data, function(index, file){
                            if(/(\.|\/)(gif|jpg?g|png|webp)$/i.test(file.type)){
                                var fRead = new FileReader();
                                fRead.onload = (function(file){
                                    return function(e) {
                                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100).height(80);
                                        $('#preview_img').append(img);
                                    };
                                })(file);
                                fRead.readAsDataURL(file);
                            }
                        });
                    }else {
                        alert("Trình duyệt của bạn không hỗ trợ tập tin này");
                    }
                });
             });







             </script>
        <script type="text/javascript">

            function mainThamUrl(input) {
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);

                }

            }

        </script>


@endsection