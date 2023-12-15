@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm danh mục bài viết</button>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Dánh sách danh mục bài viết</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Tên danh mục</th>
            <th>Link danh mục</th>
            <th>Hành động</th>
         
          </tr>
        </thead>
        <tbody>
      
          @foreach ($category as $key => $item)
                         <tr>
                             <td>{{ $key+1 }}</td>
                             <td>{{ $item->category_name}}</td>
                             <td>{{ $item->category_slug}}</td>
                             <td>


<button type="button" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#catedit" id="{{ $item->id }}" onclick="categoryEdit(this.id)">
    Sửa</button>
                              <a href="{{route('delete.blog.category',$item->id)}}" class="btn btn-inverse-danger" id="delete">Xóa</a></td>
                            </td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục bài viết</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">


            <form id="myForm" method="POST" action="{{ route('store.blog.category')}}"  class="forms-sample">
                            @csrf
                        
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control">
                
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
            </form>

      </div>
    </div>
  </div>

  <!-- Edit category models -->
<div class="modal fade" id="catedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục bài viết</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">


            <form id="myForm" method="POST" action="{{ route('update.blog.category')}}"  class="forms-sample">
                            @csrf
                            <input type="hidden" name="cat_id" id="cat_id">
                        
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control" id="cat">
                
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
            </form>

      </div>
    </div>
  </div>

<script type="text/javascript">
        function categoryEdit(id){
            $.ajax({
                type: 'GET',
                url: '/blog/category/'+id,
                datatype: 'json',

                success:function(data){
                    // console.log(data)
                    $('#cat').val(data.category_name);
                    $('#cat_id').val(data.id);
                }
            })
        }


</script>






@endsection