@extends('frontend.frontend_dashboard')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container">
<div class="page-content">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none mt-50 d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

       @php 
           $id = Auth::user()->id;
           $userData = App\Models\User::find($id);

       @endphp


              <div>
                <img class="wd-100 rounded-circle" src="{{(!empty($userData->photo)) ?url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3"></span>
              </div>
             
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">User name:</label>
              <p class="text-muted">{{$userData->name}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$userData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted"></p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{$userData->phone}}</p>
            </div>
            <div class="mt-3">
              <div class="widget-content">
                <ul class="category-lish">
                    <li class="current"><a href=""><i class="fab fa fa-envelope"></i>Dashboard</a></li>
                    <li><a href=""><i class="fa fa-credit-card" aria-hidden="true"></i>By credits<span class="badge bagde-info">( 10 credits )</span></a></li>
                    <li><a href=""><i class="fa fa-list-alt" aria-hidden="true"></i>Properties</a></li>
                    <li><a href=""><i class="fa fa-indent" aria-hidden="true"></i>Add a property</a></li>
                    <li><a href="{{ route('user.change.password')}}"><i class="fa fa-key" aria-hidden="true"></i>Security</a></li>
                    <li><a href="{{ route('user.logout')}}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i>Logout</a></li>
            
            
                </ul>
            </div>
            </div>
           
          </div>


        </div>
      </div>


      <!-- left wrapper end -->
      <!-- middle wrapper start -->

      @php 

         
               $id = Auth::user()->id;
               $userData = App\Models\User::find($id);
      @endphp
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Cap nhat thong tin</h6>
               



                <form method="POST" action="{{ route('user.profile.store')}}"  class="forms-sample"  enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1"  class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $userData->username}}" id="exampleInputUsername1" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $userData->name}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $userData->email}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $userData->phone}}" id="exampleInputUsername1" autocomplete="off">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $userData->address}}" id="exampleInputUsername1" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="image">   

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="wd-80 rounded-circle" src="{{(!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile" style="width:100px; height:100px">

                  
                    </div>
                   

                  
                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
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
    </div>

        <script type="text/javascript">
               $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
               });
        
        </script>
     


@endsection
