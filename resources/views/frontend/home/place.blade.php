@php
    $skip_state_0 = App\Models\State::skip(0)->first();
    $property_0 = App\Models\Property::where('state',$skip_state_0->id)->get();

    $skip_state_1 = App\Models\State::skip(1)->first();
    $property_1 = App\Models\Property::where('state',$skip_state_1->id)->get();
    

    $skip_state_2 = App\Models\State::skip(2)->first();
    $property_2 = App\Models\Property::where('state',$skip_state_2->id)->get();
    
    $skip_state_3 = App\Models\State::skip(5)->first();
    $property_3 = App\Models\Property::where('state',$skip_state_3->id)->get();
    
@endphp


<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5 style="font-weight:600;">Địa điểm nổi bật</h5>
            <h2 style="font-weight:650;font-family: system-ui;">Những nơi phổ biến nhất</h2>
            <p>Sự lựa chọn vô cùng hấp dẫn dành cho dân bất động sản liên hệ với chúng<br /> tôi để được tư vấn</p>
        </div>
        <div class="sortable-masonry">
            <div class="items-container row clearfix">


                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img style="width:100%;height:580px;" src="{{ asset('storage/state/'.$skip_state_0->state_image) }}" alt=""></figure>
                            <div class="text">
                                <h4><a href="{{ route('state.details',$skip_state_0->id) }}">{{ $skip_state_0->state_name }}</a></h4>
                                <p>{{ count($property_0) }} Tài sản</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img style="width:100%;height:275px;" src="{{ asset('storage/state/'.$skip_state_1->state_image) }}" alt=""></figure>
                            <div class="text">
                                <h4><a href="{{ route('state.details',$skip_state_1->id) }}">{{ $skip_state_1->state_name }}</a></h4>
                                <p>{{ count($property_1) }} Tài sản</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img style="width:100%;height:275px;" src="{{ asset('storage/state/'.$skip_state_2->state_image) }}" alt=""></figure>
                            <div class="text">
                                <h4><a href="{{ route('state.details',$skip_state_2->id) }}">{{ $skip_state_2->state_name }}</a></h4>
                                <p>{{ count($property_2) }} Tài sản</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img style="width:100%;height:275px;" src="{{ asset('storage/state/'.$skip_state_3->state_image) }}" alt=""></figure>
                            <div class="text">
                                <h4><a href="{{ route('state.details',$skip_state_3->id) }}">{{ $skip_state_3->state_name }}</a></h4>
                                <p>{{ count($property_3) }} Tài sản</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>