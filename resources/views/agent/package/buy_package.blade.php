@extends('agent.agent_dashboard')
@section('agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('agent.add.property')}}" class="btn btn-inverse-info">Thêm tài sản</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
<div class="card">
  <div class="card-body">
    <h3 class="text-center mb-3 mt-4">Mua gói đăng tài sản</h3>
    <div class="container">  
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              <h4 class="text-center mt-3 mb-4">Miễn phí</h4>
              <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
              <h1 class="text-center">0 VNĐ</h1>
              <p class="text-muted text-center mb-4 fw-light">Trong vòng 7 ngày</p>
              <h5 class="text-primary text-center mb-4">Tải lên 1 tài sản</h5>
              <table class="mx-auto">
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><p>Tải lên 1 tài sản</p></td>
                </tr>
                <tr>
                  <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                  <td><p class="text-muted">Hỗ trợ cao cấp</p></td>
                </tr>
              </table>
              <div class="d-grid">
                <button class="btn btn-primary mt-4">Mua ngay</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              <h4 class="text-center mt-3 mb-4">Gói thường</h4>
              <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
              <h1 class="text-center">50.000 VNĐ</h1>
              <p class="text-muted text-center mb-4 fw-light">Không giới hạn thời gian</p>
              <h5 class="text-success text-center mb-4">Tải lên 3 tài sản</h5>
              <table class="mx-auto">
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><p>Tải lên 5 tài sản</p></td>
                </tr>
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><p>Hỗ trợ cao cấp</p></td>
                </tr>
                
              </table>
              <div class="d-grid">
                <a href="{{ route('buy.business.plan') }}" class="btn btn-success mt-4">Mua ngay</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="text-center mt-3 mb-4">Gói víp</h4>
              <i data-feather="briefcase" class="text-primary icon-xxl d-block mx-auto my-3"></i>
              <h1 class="text-center">250.000 VNĐ</h1>
              <p class="text-muted text-center mb-4 fw-light">Không giới hạn thời gian</p>
              <h5 class="text-primary text-center mb-4">Tải lên 10 tài sản</h5>
              <table class="mx-auto">
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><p>Tải lên 10 tài sản</p></td>
                </tr>
                <tr>
                  <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                  <td><p>Hỗ trợ cao cấp</p></td>
                </tr>
                </tr>
              </table>
              <div class="d-grid">
                <a href="{{ route('buy.professional.plan') }}" class="btn btn-primary mt-4">Mua ngay</a>
             
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>

@endsection