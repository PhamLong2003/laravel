

<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
        Dragon<span> Admin</span>
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
        <li class="nav-item nav-category">Chính</li>
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Tổng quan</span>
            </a>
        </li>
        <li class="nav-item nav-category">Bất động sản</li>

        
            
       
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Loại tài sản</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="type">
                <ul class="nav sub-menu">
                 
                    <li class="nav-item">
                    <a href="{{route('all.type')}}" class="nav-link">Danh sách loại</a>
                    </li>
                
             
                    <li class="nav-item">
                    <a href="{{route('add.type')}}" class="nav-link">Thêm loại tài sản</a>
                    </li>
         
                    
                </ul>
                </div>
            </li>
      

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Thành phố</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="state">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.state')}}" class="nav-link">Danh sách thành phố</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('add.state')}}" class="nav-link">Thêm thành phố</a>
                    </li>
                    
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Tiện ích</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="amenitie">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.amenitie')}}" class="nav-link">Danh sách Tiện ích</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('add.amenitie')}}" class="nav-link">Thêm Tiện ích</a>
                    </li>
                    
                </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Tài Sản</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.property')}}" class="nav-link">Danh sách tài sản</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('add.property')}}" class="nav-link">Thêm tài sản</a>
                    </li>
                    
                </ul>
                </div>
            </li>
       
        <li class="nav-item">
            <a href="{{ route('admin.package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Lịch sử gói</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Quản lý Hộp thư đến</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#testimonials" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Lời chứng thực</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="testimonials">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{route('all.testimonials')}}" class="nav-link">Danh sách lời chứng thực</a>
                </li>
                <li class="nav-item">
                <a href="{{route('add.testimonials')}}" class="nav-link">Thêm lời chứng thực</a>
                </li>
                
            </ul>
            </div>
        </li>


        <li class="nav-item nav-category">Người dùng</li>


        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Quản lý đại lý</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.agent') }}" class="nav-link">Tất cả đại lý</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('add.agent') }}" class="nav-link">Thêm đại lý</a>
                </li>
            </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blogcategory" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Quản lý danh mục bài viết</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="blogcategory">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.blog.category') }}" class="nav-link">Tất cả các danh mục</a>
                </li>
            </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Post" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Bài viết</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Post">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{ route('all.post') }}" class="nav-link">Tất cả bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add.post') }}" class="nav-link">Thêm bài viết</a>
                    </li>
            </ul>
            </div>
        </li>


        <li class="nav-item">
            <a href="{{ route('admin.blog.comment') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Quản lý bình luận</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('smtp.setting') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Cài đặt SMTP</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('site.setting') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Cài đặt trang web</span>
            </a>
        </li>

        <li class="nav-item nav-category">Quyền quản lý</li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Quản lý </span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('all.permission') }}" class="nav-link">Danh sách</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('all.roles') }}" class="nav-link">Danh sách quản trị</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('add.roles.permission') }}" class="nav-link">Cấp quyền quản trị</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('all.roles.permission') }}" class="nav-link">Danh sách quyền quản trị</a>
                    </li>

                </ul>
                </div>
            </li>

       

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#adminuser" role="button" aria-expanded="false" aria-controls="adminuser">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Quản lý tài khoản quản trị </span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="adminuser">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('all.admin') }}" class="nav-link">Tất cả tài khoản</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('add.admin') }}" class="nav-link">Thêm tài khoản</a>
                    </li>
                   

                </ul>
                </div>
            </li>
       
    
    
        
        </ul>
    </div>

</nav>