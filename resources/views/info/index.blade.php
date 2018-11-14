@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">ข่าวสารพรรค</h1>
    </div>
</section>

<section class="blog-page">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารล่าสุด</h2>
        <ul class="row">
            @foreach($info as $row)
            <li class="col-md-6">
                <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ url('info/'.$row->slug) }}">
                        <div class="blog-img">
                            <figure><img src="{{ url('uploads/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                            <div class="blog-img-inner"></div>
                        </div>
                        <h5>
                            {{ $row->title }}
                        </h5>
                        <p>{!! cuttext($row->description,750) !!}</p>
                    </a>
                    <a href="{{ url('info/'.$row->slug) }}">อ่านต่อ</a>
                </div>
            </li>
            @endforeach
        </ul>

        <div class="navigation">
            <ul>
                <li> <a href="#">1</a> </li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </div>
</section>


@endsection