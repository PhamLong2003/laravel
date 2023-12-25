@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.amenitie')}}" class="btn btn-inverse-info">Thêm tiện ích</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Danh sách tiện ích</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Tên tiện ích</th>
            <th>Action</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($amenities as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item->amenitis_name}}</td>
                             <td><a href="{{route('edit.amenitie',$item->id)}}" class="btn btn-inverse-warning">Sửa</a>
                              <a href="{{route('delete.amenitie',$item->id)}}" class="btn btn-inverse-danger" id="delete">Xóa</a></td>
                             
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






@endsection