@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">แฟ้มภาพ</h1>
    </div>
</section>

<section class="about-page contact-page portfolio-page" id="my-port">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">{{ $rs->title }}</h2>

        <ul class="row tz-gallery">
            @foreach($rs->attach_imgs()->orderBy('id','asc')->get() as $row)
            <li class="col-sm-6 col-md-4">
                <a href="{{ url('uploads/gallery/'.$row->file_path) }}" class="lightbox">
                    <div class="portfolio-gallery" data-aos="fade-up" data-aos-duration="1000">
                        <figure>
                            <img src="{{ url('uploads/gallery/'.$row->file_path) }}">
                        </figure>

                        <!-- <div class="overlay">
                            <span> This is Heading <br> visit site</span>
                        </div> -->
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>


@endsection