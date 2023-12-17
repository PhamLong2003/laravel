@extends('agent.agent_dashboard')
@section('agent')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Danh sách tham quan</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Người dùng</th>
            <th>Tên tài sản</th>
            <th>Ngày</th>
            <th>Thời gian</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($usermsg as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item['user']['name']}}</td>
                             <td>{{ $item['property']['property_name']}}</td>
                   
                             <td>{{ $item->tour_date}}</td>
                             <td>{{ $item->tour_time}}</td>
                             <td>

                                @if($item->status == 1)
                                <span class="badge rounded-pill bg-success">Xác nhận</span>
                                    
                                @else
                                <span class="badge rounded-pill bg-danger">Chưa giải quyết</span>
                                    
                                @endif




                             </td>

                             
                             <td>
                             <a href="{{route('agent.details.property',$item->id)}}" class="btn btn-inverse-info" title="Details"><i data-feather="eye"></i></a>
                             <a href="{{route('agent.delete.property',$item->id)}}" class="btn btn-inverse-danger" id="delete" title="Delete"><i data-feather="trash-2"></i></a></td>
                             
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