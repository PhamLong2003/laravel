@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.testimonials')}}" class="btn btn-inverse-info">Thêm lời chứng thực</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Dánh lời chứng thực</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Tên</th>
            <th>Vị trí</th>
            <th>Ảnh</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($testimonial as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item->name}}</td>
                             <td>{{ $item->position}}</td>
                             <td><img src="{{ asset('storage/testimonial/'.$item->image) }}" style="width:70px; height:65px;" alt=""></td>

                             <td><a href="{{route('edit.testimonials',$item->id)}}" class="btn btn-inverse-warning">Sửa</a>
                              <a href="{{route('delete.testimonials',$item->id)}}" class="btn btn-inverse-danger" id="delete">Xóa</a></td>
                             
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