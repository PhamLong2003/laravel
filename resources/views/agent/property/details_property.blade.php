@extends('agent.agent_dashboard')
@section('agent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <div class="page-content">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                            <h6 class="card-title">Chi tiết tài sản</h6>
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                        
                                        <tbody>
                                            <tr>                                    
                                                <td>Tên tài sản</td>
                                                <td><code>{{ $property->property_name }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Trạng thái tài sản</td>
                                                <td><code>{{ $property->property_status }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Giá thấp nhất</td>
                                                <td><code>{{ $property->lowest_price }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Giá tối đa</td>
                                                <td><code>{{ $property->max_price }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Phòng ngủ</td>
                                                <td><code>{{ $property->bedrooms }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Phòng tắm</td>
                                                <td><code>{{ $property->bathrooms }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Ga ra</td>
                                                <td><code>{{ $property->garage }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Kích thước ga ra</td>
                                                <td><code>{{ $property->garage_size }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Địa chỉ</td>
                                                <td><code>{{ $property->address }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Thành phố</td>
                                                <td><code>{{ $property->city }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Khu vực</td>
                                                <td><code>{{ $property->state }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Mã bưu điện</td>
                                                <td><code>{{ $property->postal_code }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Ảnh đại diện</td>
                                                <td><img src="{{ asset('storage/image/'.$property->property_thambnail)}}" style="width:100px; height:70px;" alt=""></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Trạng thái</td>
                                                <td>
                                                    @if($property->status == 1)
                                                    <span class="badge rounded-pill bg-success">kích hoạt</span>
                                                        
                                                    @else
                                                    <span class="badge rounded-pill bg-danger">không kích hoạt</span>
                                                        
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                       
                                            
                                            
                                      
                                        </tbody>
                                    </table>
                            </div>
          </div>
        </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                            
                            <div class="table-responsive">
                                    <table class="table table-striped">
                                       
                                        <tbody>
                                            <tr>                                    
                                                <td>Mã sản phẩm</td>
                                                <td><code>{{ $property->property_code }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Quy mô tài sản</td>
                                                <td><code>{{ $property->property_size }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Video</td>
                                                <td><code>{{ $property->amenitis_video }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Hàng xóm</td>
                                                <td><code>{{ $property->neighborhood }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Vĩ độ</td>
                                                <td><code>{{ $property->latitude }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Kinh độ</td>
                                                <td><code>{{ $property->longitude }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Kiểu tài sản</td>
                                                <td><code>{{ $property['type']['type_name'] }}</code></td>
                                            </tr>
                                            <tr>                                    
                                                <td>Tiện ích</td>
                                                <td>
                                                    <select class="js-example-basic-multiple form-select" name="amenities_id[]" multiple="multiple" data-width="100%">
                                                        @foreach ($amenities as $ameni)
                                                        <option value="{{ $ameni->id }}" {{ (in_array($ameni->id,$property_ami)) ? 'selected' : '' }}>{{ $ameni->amenitis_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>                                    
                                                <td>Đại lý</td>
                                             
                                                    @if($property->agent_id == NULL)
                                                <td><code>Admin</code></td>
                                                @else
                                                <td><code>{{ $property['user']['name'] }}</code></td>
                                                @endif
                                               
                                            </tr>
                                            

                                        
                                          
                                        </tbody>
                                    </table>

                                    <br><br>
                                 








                            </div>
          </div>
        </div>
                </div>
            </div>


            

        </div>





@endsection