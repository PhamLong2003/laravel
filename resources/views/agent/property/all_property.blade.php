@extends('agent.agent_dashboard')
@section('agent')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('agent.add.property')}}" class="btn btn-inverse-info">Thêm tài sản</a>
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
            <th>Trạng thái kiểu</th>
            <th>Thành phố</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($property as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td><img src="{{ asset('storage/image/'.$item->property_thambnail)}}" style="width:70px; height:40px;"></td>
                             <td>{{ $item->property_name}}</td>
                   
                             <td>{{ $item->property_status}}</td>
                             <td>{{ $item->city}}</td>
                             <td>{{ $item->max_price }}</td>
                             <td>

                                @if($item->status == 1)
                                <span class="badge rounded-pill bg-success">kích hoạt</span>
                                    
                                @else
                                <span class="badge rounded-pill bg-danger">Ngưng kích hoạt</span>
                                    
                                @endif




                             </td>

                             
                             <td>
                             <a href="{{route('agent.details.property',$item->id)}}" class="btn btn-inverse-info" title="Chi tiết"><i data-feather="eye"></i></a>
                             <a href="{{route('agent.edit.property',$item->id)}}" class="btn btn-inverse-warning" title="Sửa"><i data-feather="edit"></i></a>
                             <a href="{{route('agent.delete.property',$item->id)}}" class="btn btn-inverse-danger" id="delete" title="Xóa"><i data-feather="trash-2"></i></a></td>
                             
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