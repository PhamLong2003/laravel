@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
  </head>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.agent')}}" class="btn btn-inverse-info">Thêm đại lý</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Danh sách đại lý</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Ảnh</th>
            <th>Tên tài sản</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
            <th>Thay đổi</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($allagent as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td><img src="{{(!empty($item->photo)) ?url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg')}}" style="width:70px; height:40px;"></td>
                             <td>{{ $item->name}}</td>
                             <td>{{ $item->role }}</td>
                             <td>
                                @if($item->status == 'active')
                                <span class="badge rounded-pill bg-success">kích hoạt</span>
                                    
                                @else
                                <span class="badge rounded-pill bg-danger">Ngưng kích hoạt</span>
                                    
                                @endif
                             </td>
                             <td>
                              <input type="checkbox" data-id="{{ $item->id }}" data-on="Active" data-off="Inactive" class="toggle-class" 
                              data-onstyle="success" data-offstyle="danger" data-toggle="toggle" {{ $item->status ? 'checked' : '' }}>


                             </td>
                             

                             
                             <td>
                            <a href="{{route('edit.agent',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                            <a href="{{route('delete.agent',$item->id)}}" class="btn btn-inverse-danger" id="delete" title="Delete"><i data-feather="trash-2"></i></a></td>
                             
                         </tr>
            @endforeach
           

        
        </tbody>
    
      </table>
      
    </div>
  </div>
</div>
        </div>
    </div>

</div>



<script type="text/javascript">
$(function() {
  $('.toggle-class').change(function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var user_id = $(this).data('id');

    $.ajax({
      type: "GET",
      dataType: "json",
      url: '/changeStatus',
      data: {'status': status, 'user_id': user_id},
      success:function(data){

        //start message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        })
        if($.isEmptyObject(data.error)) {
          Toast.fire({
            type:'success',
            title: data.success,
          })
        }else{
          Toast.fire({
            type: 'error',
            title: data.error,
          })
        }
        //end message
      }
    });
  })
})
</script>






@endsection