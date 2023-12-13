@extends('agent.agent_dashboard')
@section('agent')


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
                        <form method="POST" action="{{ route('agent.update.property') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $property->id }}">
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
											<option selected="" disabled="">Chọn trạng thái</option>
											<option value="Cho Thuê" {{ $property->property_status == 'Cho thuê' ? 'selected' : '' }}>Cho thuê</option>
											<option value="Rao Bán" {{ $property->property_status == 'Rao bán' ? 'selected' : '' }}>Rao bán</option>
										
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
                                            <label class="form-label">Quận/Huyện</label>
                                            <input name="city" value="{{ $property->city }}"  class="form-control" id="exampleFormControlSelect1">
                                              
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Thành phố</label>
                                            <select name="state" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Chọn thành phố</option>
                                                @foreach ($pstate as $state)
                                                <option value="{{ $state->id }}" {{ $state->id == $property->state ? 'selected' : '' }}>{{ $state->state_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                   
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Mã zip</label>
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
                                                <input type="text" value="{{ $property->amenitis_video }}" name="amenitis_video" class="form-control" title="Vào ytb-> chọn video muốn đăng-> click vào chia sẻ -> ấn vào nhúng -> copy phần src gián vào đây">
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
											<option selected="" disabled="">Chon kiểu</option>
                                            @foreach ($propertytype as $ptype)
											<option value="{{ $ptype->id }}" {{ $ptype->id == $property->ptype_id ? 'selected' : '' }}>{{ $ptype->type_name }}</option>
                                            @endforeach
										</select>


                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tiện ích</label>
                                        <select class="js-example-basic-multiple form-select" name="amenities_id[]" multiple="multiple" data-width="100%">
                                            @foreach ($amenities as $ameni)
											<option value="{{ $ameni->amenitis_name }}" {{ (in_array($ameni->amenitis_name,$property_ami)) ? 'selected' : '' }}>{{ $ameni->amenitis_name }}</option>
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
                <input type="checkbox" value="1" name="featured" class="form-check-input" id="checkInline1" {{ $property->featured == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkInline1">
                                    Tài sản đặc sắc
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" value="1" name="hot" class="form-check-input" id="checkInline" {{ $property->hot == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkInline">
                                    Tài sản HOT
                                </label>
                            </div>
                        </div>
                
                        <button type="submit" style="width:15%" class="btn btn-primary">Cập nhật tài sản</button>

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




        {{-- property thumbnail Image update --}}

        <div class="page-content"  style="padding-left: 12px;padding-right:12px;margin-top:-17px">

    
            <div class="row profile-body">
              <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                   
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Sửa ảnh đại diện</h6>
                                <form method="POST" action="{{ route('agent.update.property.thumbnail') }}" id="myForm" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $property->id }}">
                                    <input type="hidden" name="old_img" value="{{ $property->property_thambnail }}">

                                    <div class="row mb-3">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Ảnh đại diện</label>
                                            <input type="file" name="property_thambnail" class="form-control" 
                                            placeholder="Enter first name" onChange="mainThamUrl(this)">
    
                                            <img src="" id="mainThmb">
                                        </div>                       
                                        <div class="form-group col-md-6">
                                            <label class="form-label"></label>
    
                                            <img src="{{ asset('storage/image/'.$property->property_thambnail) }}" style="width:130px; height:130px;">
                                        </div>
                                    </div>





                                    <button type="submit" style="width:15%" class="btn btn-primary">Cập nhật</button>


                                </form>
                        </div>
                    </div>
             
              </div>
            </div>
        </div>

        {{-- end property thumbnail Image update --}}



        {{-- property main multu image Image update --}}


<div class="page-content"  style="margin-left:-24px;margin-top:-10px;margin-right:-23px">


    <div class="row profile-body">
        <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sửa album ảnh</h6>
                        <form method="POST" action="{{ route('agent.update.property.multiimage') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Image</th>
                                            <th>Change Image</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($multiImage as $key => $img)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset('storage/image/' .$img->photo_name) }}" alt="image" style="width:50px;height:50px;">
                                            </td>
                                            <td>
                                                <input type="file" name="multi_img[{{ $img->id }}]" class="form-control">
                                            </td>
                                            <td>
                                                <input value="Update Image" type="submit" class="btn btn-primary px-4" class="form-group">
                                                <a href="{{ route('agent.property.multiimage.delete',$img->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                           
                                          
                                        </tr>
                                        @endforeach
                                </table>
                            </div>

                    


                        </form>

                        <form method="POST" action="{{ route('agent.store.new.multiimage') }}" id="myForm" enctype="multipart/form-data">
                            @csrf


                                <input type="hidden" name="imageid" value="{{ $property->id }}">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="file" name="multi_img" class="form-control" id="">
                                        </td>
                                        <td>
                                            <input type="submit" value="Add Image" class="btn btn-info px-4">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </form>
                </div>
            </div>
        
        </div>
    </div>
</div>



        {{-- end property main multu image Image update --}}


                {{-- property facility update --}}

                <div class="page-content"  style="padding-left: 0px;padding-right:0px;margin-top:-10px">

    
                    <div class="row profile-body">
                      <div class="col-md-12 col-xl-12 middle-wrapper">
                        <div class="row">
                           
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Sửa cơ sở</h6>
                                        <form method="POST" action="{{ route('agent.update.property.facilities') }}" id="myForm" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $property->id }}">

                                            @foreach($facilities as $item)
                                            <div class="row add_item">
                                            <div class="whole_extra_item_add" id="whole_extra_item_add">
                                            <div class="whole_extra_item_add_delete" id="whole_extra_item_add_delete">
                                                <div class="container mt-2">
                                                    <div class="row">
                                
                                                        <div class="form-group col-md-4">
                                                            <label for="facility_name">Điểm gần</label>
                                                            <select name="facility_name[]" id="facility_name" class="form-control">
                                                                <option value="">Chọn điểm gần </option>
                                                                <option value="Hopspital" {{ $item->facility_name == 'Hopspital' ? 'selected' : '' }}>Bệnh viện</option>
                                                                <option value="SuperMarket" {{ $item->facility_name == 'SuperMarket' ? 'selected' : '' }}>Siêu thị</option>
                                                                <option value="School" {{ $item->facility_name == 'School' ? 'selected' : '' }}>Trường học</option>
                                                                <option value="Entertainment" {{ $item->facility_name == 'Entertainment' ? 'selected' : '' }}">Khu giải trí</option>
                                                                <option value="Pharmacy" {{ $item->facility_name == 'Pharmacy' ? 'selected' : '' }}>Tiệm thuốc</option>
                                                                <option value="Bus Stop" {{ $item->facility_name == 'Bus Stop' ? 'selected' : '' }}>Điểm dừng xe buýt</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="distance" class="form-lable">Khoảng cách</label>
                                                            <input type="text" name="distance[]" id="distance" class="form-control" value="{{ $item->distance }}">
                                                        </div>
                                                        <div class="form-group col-md-4" style="padding-top:20px;">
                                                            <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                                                            <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                
                                            </div>
                                            </div>
                                            </div>
                                            @endforeach
                                            <br>

                                    <button type="submit" style="width:15%" class="btn btn-primary">Cập nhật</button>

        
                                            
        
        
                                        </form>
                                </div>
                            </div>
                     
                      </div>
                    </div>
                </div>
        
                           {{-- property facility update --}}


                           <div style="visibility: hidden">
                            <div class="whole_extra_item_add" id="whole_extra_item_add">
                                <div class="whole_extra_item_add_delete" id="whole_extra_item_add_delete">
                                    <div class="container mt-2">
                                        <div class="row">
                    
                                            <div class="form-group col-md-4">
                                                <label for="facility_name">Facilities</label>
                                                <select name="facility_name[]" id="facility_name" class="form-control">
                                                    <option value="">Chọn điểm gần </option>
                                                    <option value="Hopspital">Bệnh viện</option>
                                                    <option value="SuperMarket">Siêu thị</option>
                                                    <option value="School">Trường học</option>
                                                    <option value="Entertainment">Khu giải trí</option>
                                                    <option value="Pharmacy">Tiệm thuốc</option>
                                                    <option value="Bus Stop">Điểm dừng xe buýt</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="distance" class="form-lable">Khoảng cách</label>
                                                <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                                            </div>
                                            <div class="form-group col-md-4" style="padding-top:20px;">
                                                <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                                                <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                                            </div>
                    
                    
                                        </div>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    
                        {{-- for section--}}
                    
                        <script type="text/javascript">
                            
                            $(document).ready(function(){
                                var counter = 0;
                                $(document).on("click",".addeventmore",function(){
                                    var whole_extra_item_add = $("#whole_extra_item_add").html();
                                    $(this).closest(".add_item").append(whole_extra_item_add);
                                    counter++;
                                });
                                $(document).on("click",".removeeventmore",function(event){
                                    $(this).closest("#whole_extra_item_add_delete").remove();
                                    counter -= 1;
                                });
                            });
                        </script>
                        {{-- end of add faciliti class with ajax --}}
                    






















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