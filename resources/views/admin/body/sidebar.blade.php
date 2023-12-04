

<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
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
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Bất động sản</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Property Type</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.type')}}" class="nav-link">All Property</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('add.type')}}" class="nav-link">Add Property</a>
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
            <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Lịch</span>
            </a>
        </li>
        <li class="nav-item nav-category">Người dùng</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">Quản lý đai lý</span>
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
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Advanced UI</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                </li>
                <li class="nav-item">
                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                </li>
            </ul>
            </div>
        </li>
       
    
    
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
        </ul>
    </div>

</nav>