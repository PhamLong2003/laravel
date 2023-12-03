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
    <h6 class="card-title">Lịch sử mua</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Ảnh</th>
            <th>Gói</th>
            <th>Mã Gói</th>
            <th>Giá</th>
            <th>Thời gian mua</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($packagehistory as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td><img src="{{(!empty($item->user->photo)) ?url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg')}}" style="width:70px; height:40px;"></td>
                             <td>{{ $item->package_name}}</td>
                             <td>{{ $item->invoice}}</td>
                             <td>{{ $item->package_amount}} VNĐ</td>
                             <td>{{ $item->created_at }}</td>
                            

                             
                             <td>
                             <a href="{{route('agent.edit.property',$item->id)}}" class="btn btn-inverse-warning" title="Download"><i data-feather="download"></i></a>
                             
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