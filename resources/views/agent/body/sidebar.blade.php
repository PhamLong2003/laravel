
@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp






<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        Dragon<span>Đại Lý</span>
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
            <a href="{{route('agent.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Tổng quan</span>
            </a>
        </li>
  @if ($status ==='active')





        <li class="nav-item nav-category">Bất động sản</li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Tài Sản</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('agent.all.property')}}" class="nav-link">Danh sách tài sản</a>
                    </li>
                    {{-- <li class="nav-item">
                    <a href="{{route('agent.add.property')}}" class="nav-link">Thêm tài sản</a>
                    </li> --}}
                    
                </ul>
                </div>
            </li>
       
        <li class="nav-item">
            <a href="{{ route('buy.package') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Mua Gói</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('package.history') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Lịch sử mua</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('agent.property.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Hộp thư đến</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('agent.schedule.message') }}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Lên lịch tham quan</span>
            </a>
        </li>
        <li class="nav-item nav-category">Components</li>

            <li class="nav-item">
                <a href="{{ route('agent.live.chat') }}" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Nhắn nhắn</span>
                </a>
            </li>

        </li>




        @else

        @endif
       
    
    
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