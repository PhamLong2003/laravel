
@php 
    $blog = App\Models\BlogPost::latest()->limit(3)->get();
    
@endphp




<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5 style="font-family: sans-serif;font-weight: bold;">Tin tức và bài viết</h5>
            <h2 style="font-family: sans-serif;font-weight: bold;">Cập nhật thông tin mỗi ngày - mỗi giờ</h2>
            <p style="font-family: sans-serif;">Luôn luôn cập nhật thông tin đúng giờ, đúng thời điểm, độ chính xác cao. <br /></p>
        </div>
        <div class="row clearfix">

            @foreach ($blog as $item)
                
           
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box" style="height: 560px;">
                        <div class="image-box">
                            <figure class="image"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset('storage/post/'.$item->post_image) }}" style="width:100%; height:250px;" alt=""></a></figure>
                            <span class="category">Mới</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img style="height: 40px;" src="{{(!empty($item->user->photo)) ?url('upload/admin_images/'.$item->user->photo) : url('upload/no_image.jpg')}}" alt=""></figure>
                                    <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item['user']['name'] }}</a></h5>
                                </li>
                                <li>{{ $item->created_at }}</li>
                            </ul>
                            <div class="text">
                                <p>{{ $item->short_descp }}</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{ url('blog/details/'.$item->post_slug) }}" class="theme-btn btn-two">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>