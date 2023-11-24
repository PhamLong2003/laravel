@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.property')}}" class="btn btn-inverse-info">Thêm tài sản</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Danh sách tài sản</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Ảnh</th>
            <th>Tên tài sản</th>
            <th>P kiểu</th>
            <th>Trạng thái kiểu</th>
            <th>Thành phố</th>
            <th>Trạng thá<i></i></th>
            <th>Action</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($property as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td><img src="{{ asset('storage/image/'.$item->property_thambnail)}}" style="width:100px; height:70px;"></td>
                             <td>{{ $item->property_name}}</td>
                             <td>{{ $item->ptype_id}}</td>
                             <td>{{ $item->property_status}}</td>
                             <td>{{ $item->city}}</td>
                             <td>

                                @if($item->status == 1)
                                <span class="badge rounded-pill bg-success">Active</span>
                                    
                                @else
                                <span class="badge rounded-pill bg-dange">InActive</span>
                                    
                                @endif




                             </td>

                             

                             <td><a href="{{route('edit.amenitie',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                              <a href="{{route('delete.amenitie',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a></td>
                             
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