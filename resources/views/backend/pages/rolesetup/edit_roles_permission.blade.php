@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Sửa vai trò quyền</h6>
               



                <form id="myForm" method="POST" action="{{ route('admin.roles.update',$role->id)}}"  class="forms-sample">
                    @csrf
                

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên quyền</label>
                      <h3>{{ $role->name }}</h3>
                    </div>

                    <div class="form-check mb-2">
                        <input type="checkbox" name="" id="checkDefaultmain" class="form-check-input">
                        <label for="checkDefaultmain" class="form-check-label">Cấp tất cả các quyền</label>
                    </div>
<hr>
@foreach ($permission_groups as $group)
    
                    <div class="row">
                        <div class="col-3">

@php
$permissions = App\Models\User::getpermissionByGroupName($group->group_name)
@endphp
                            <div class="form-check mb-2">
                                <input type="checkbox" name="" id="checkDefault" class="form-check-input" {{App\Models\User::roleHasPermission($role,$permissions) ? 'checked' : ''}}>
                                <label for="checkDefault" class="form-check-label">
                                    {{ $group->group_name }}
                                </label>
                            </div>
                        </div>


                        <div class="col-9">
                         

                            @foreach ($permissions as $permission)
                                
                            <div class="form-check mb-2">
                                <input type="checkbox" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}" class="form-check-input" name="permission[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <label for="checkDefault{{ $permission->id }}" class="form-check-label">
                                    {{ $permission->name }}
                                </label>
                            </div>

                            @endforeach
                            <br>


                        </div>

                        
                    </div> <!-- end row -->

@endforeach
                  
                    <button type="submit" class="btn btn-primary me-2">Lưu</button>
                </form>
  
                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      <!-- right wrapper end -->
    </div>

        </div>

        <script type="text/javascript">

            $('#checkDefaultmain').click(function(){
                if ($(this).is(':checked')){
                    $('input[type= checkbox]').prop('checked',true);
                }else{
                    $('input[type= checkbox]').prop('checked',false);
                }
            });
        </script>



@endsection