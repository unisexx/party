@extends('layouts.front') @section('content')

<section class="banner">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <!-- <h1>Let’s Create Something Awesome Together</h1>
        <h6>This is how we work, to make your project awesome !</h6>
        <a href="#" class="get-started-btn">get started</a> -->
        <h1>พรรคพลังประชารัฐ</h1>
        <h6>โลกเปลี่ยน ไทยต้องปรับ ทางเลือกใหม่ของการเมืองไทย ก้าวข้ามความขัดแย้ง</h6>
        <a href="#" class="get-started-btn">สมัครสมาชิกพรรค</a>
    </div>
</section>

<section class="blog-page" style="padding-bottom:0px;">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารพรรค</h2>
        <ul class="row">
            @foreach($info as $row)
            <li class="col-md-4">
                <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ url('info/'.$row->slug) }}">
                        <div class="blog-img">
                            <figure><img src="{{ url('uploads/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                            <div class="blog-img-inner"></div>
                        </div>
                        <h5>
                            {{ $row->title }}
                        </h5>
                        <p>{!! cuttext($row->description,100) !!}</p>
                    </a>
                    <a href="{{ url('info/'.$row->slug) }}" style="display:none;">อ่านต่อ</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>

<section class="about-page contact-page portfolio-page" id="my-port">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">ภาพกิจกรรม</h2>
        <ul class="row tz-gallery">
            @foreach($gallery as $row)
            <li class="col-sm-6 col-md-4">
                <a href="{{ url('gallery/'.$row->slug) }}" class="lightbox">
                    <div class="portfolio-gallery" data-aos="fade-up" data-aos-duration="1000">
                        <figure>
                            <img src="{{ url('uploads/gallery/'.@$row->attach_imgs()->first()->file_path) }}" alt="one">
                        </figure>

                        <div class="overlay">
                            <span>{{ $row->title }}</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>



@endsection