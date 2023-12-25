

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
     
        <ul class="navbar-nav">
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </a>
                
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">


 
                </div>
            </li>

              



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                      
                    </div>
    <div class="p-1">
 
    
     
    
    </div>
                 
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                   
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                  
    <div class="p-1">
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    
      </a>
  
   
    </div>
                </div>
            </li>

            @php 

            $id = Auth::user()->id;
            $profileData = App\Models\User::find($id);



           @endphp


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{(!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{(!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{$profileData->name}}</p>
                            <p class="tx-12 text-muted">{{$profileData->email}}</p>
                        </div>
                    </div>
    <ul class="list-unstyled p-1">
      <li class="dropdown-item py-2">
<a href="{{ route('admin.profile')}}" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="user"></i>
          <span>Tài khoản</span>
        </a>
      </li>
      <li class="dropdown-item py-2">
        <a href="{{ route('admin.change.password')}}" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="edit"></i>
          <span>Đổi mật khẩu</span>
        </a>
      </li>
     
      <li class="dropdown-item py-2">
<a href="{{ route('admin.logout')}}" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="log-out"></i>
          <span>Đăng xuất</span>
        </a>
      </li>
    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

