@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.post')}}" class="btn btn-inverse-info">Thêm bài viết</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Danh sách bài viết</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Tiêu đề bài viết</th>
            <th>Danh mục</th>
            <th>Ảnh bài viết</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($post as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item->post_title}}</td>
                             <td>{{ $item['cat']['category_name']}}</td>
                             <td><img src="{{ asset('storage/post/'.$item->post_image) }}" style="width:70px; height:65px;" alt=""></td>

                             <td><a href="{{route('edit.post',$item->id)}}" class="btn btn-inverse-warning">Sửa</a>
                              <a href="{{route('delete.post',$item->id)}}" class="btn btn-inverse-danger" id="delete">Xóa</a></td>
                             
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