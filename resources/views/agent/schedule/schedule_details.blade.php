@extends('agent.agent_dashboard')
@section('agent')




<div class="page-content">

    <nav class="page-breadcrumb">
        
    </nav>

    <div class="row">
        <div class="col-md-10">
                <div class="card">
                    <br>
<h6 style="margin-left: 15px;" class="card-title">Lịch trình tham quan</h6>

            <form action="{{ route('agent.update.schedule') }}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{ $schedule->id }}">
                <input type="hidden" name="email" value="{{ $schedule->user->email }}">

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      
                        <tbody>
                            <tr>
                                <td>Tên người dùng</td>
                                <td>{{ $schedule->user->name }}</td>
                                       
                            </tr>

                            <tr>
                                <td>Tên tài sản</td>
                                <td>{{ $schedule->property->property_name }}</td>
                                       
                            </tr>

                            <tr>
                                <td>Ngày</td>
                                <td>{{ $schedule->tour_date }}</td>
                                       
                            </tr>   <tr>
                                <td>Giờ</td>
                                <td>{{ $schedule->tour_time }}</td>
                                       
                            </tr>   <tr>
                                <td>Nội dung</td>
                                <td>{{ $schedule->message }}</td>
                                       
                            </tr>   <tr>
                                <td>Ngày gửi</td>
                                <td>{{ $schedule->created_at }}</td>
                                       
                            </tr>   
                         
                        </tbody>
                    </table>
                </div>
                <br><br>

                <button type="submit" class="btn btn-primary">Xác nhận</button>
                <br><br>

            </form>

                </div>
        </div>
    </div>
</div>






@endsection