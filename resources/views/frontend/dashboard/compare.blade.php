@extends('frontend.frontend_dashboard')
@section('main')


@section('title')
So sánh
@endsection

  <!--Page Title-->
  <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-10.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>So sánh</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/dashboard') }}">Trang chủ</a></li>
                <li>So sánh tài sản</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- properties-section -->
<section class="properties-section centred">
    <div class="auto-container">
        <div class="table-outer">
            <table class="properties-table">
                <tbody id="compare">
                   
                   
                </tbody>    
            </table>
        </div>
    </div>
</section>
<!-- properties-section end -->


<!-- subscribe-section -->

<!-- subscribe-section end -->




@endsection