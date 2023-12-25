@extends('agent.agent_dashboard')
@section('agent')




<div class="page-content">

    <nav class="page-breadcrumb">
        
    </nav>

    <div class="row">
        <div class="col-md-12">
                <div class="card">


            <form action="{{ route('store.professional.plan') }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Pham<span>Long</span></a>                 
                        <p class="mt-1 mb-1"><b>Địa chỉ:</b></p>
                        <p>Chương mỹ<br> Hà Nội<br>Việt Nam</p>
                        <h5 class="mt-5 mb-2 text-muted">Hóa đơn tới:</h5>
                        <p>{{ $data->name }}<br> {{ $data->email }}<br>{{ $data->address }}</p>
                    </div>
                    <div class="col-lg-3 pe-0">
                        <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">Hóa đơn</h4>
                        <h6 class="text-end mb-5 pb-4"></h6>
                        <p class="text-end mb-1">Tổng tiền</p>
                        <h4 class="text-end fw-normal">250.000VNĐ</h4>
                        <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted"></span></h6>
                    </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên gói</th>
                                <th class="text-end">Số lượng tài sản</th>
                                <th class="text-end">Đơn giá</th>
                                <th class="text-end">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="text-end">
                                <td class="text-start">1</td>
                                <td class="text-start">Gới víp</td>
                                <td>10</td>
                                <td>250.000 VNĐ</td>
                                <td>250.000 VNĐ</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <td>Giá ban đầu</td>
                                    <td class="text-end">250.000 VNĐ</td>
                                    </tr>
                            
                                    <tr>
                                  
                                    <tr>
                                    <td>Thanh toán</td>
                                    <td class="text-danger text-end">- 250.000 VNĐ</td>
                                    </tr>
                                    <tr class="bg-dark">
                                    <td class="text-bold-800">Tổng phải trả</td>
                                    <td class="text-bold-800 text-end">250.000 VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="container-fluid w-100">
                   <button type="submit" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send" class="me-3 icon-md"></i>Mua</button>
                    </div>
                </div>
            </form>

                </div>
        </div>
    </div>
</div>






@endsection