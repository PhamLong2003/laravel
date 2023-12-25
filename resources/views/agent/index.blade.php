@extends('agent.agent_dashboard')
@section('agent')

@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp

<div class="page-content">

  @if ($status ==='active')
  <h4>Tài khoản của bạn đã được <span class="text-success">Kích hoạt</span></h4>
  @else
  <h4>Tài khoản của bạn chưa được <span class="text-danger">Kích hoạt</span></h4>
  <p class="text-danger"><b>Vui lòng kiên nhẫn, quản trị viên sẽ phê duyệt tài khoản của bạn</b></p>
      
  @endif

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Chào mừng bạn đến với quản lý Đại lý</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>
   
      </div>
    </div>



</div>
@endsection