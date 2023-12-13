@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.state')}}" class="btn btn-inverse-info">Thêm thành phố</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Dánh sách thành phố</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Tên thành phố</th>
            <th>Ảnh thành phố</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($state as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item->state_name}}</td>
                             <td><img src="{{ asset('storage/state/'.$item->state_image) }}" style="width:70px; height:65px;" alt=""></td>

                             <td><a href="{{route('edit.state',$item->id)}}" class="btn btn-inverse-warning">Sửa</a>
                              <a href="{{route('delete.state',$item->id)}}" class="btn btn-inverse-danger" id="delete">Xóa</a></td>
                             
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