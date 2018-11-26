@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h1>
    </div>
</section> -->

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">PPRP Channel</h2>
    <ul class="row">
        @foreach($rs as $row)
        <li class="col-md-4">
            <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                <a href="{{ url('video/'.$row->id) }}">
                    <div class="blog-img">
                        <figure><img src="{{ url('uploads/video/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                        <div class="blog-img-inner"></div>
                    </div>
                    <h5>
                        {{ $row->{'title_'.session('lang')} }}
                    </h5>
                    <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                </a>
                <a href="{{ url('video/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
            </div>
        </li>
        @endforeach
    </ul>
    {{ $rs->appends(@$_GET)->render() }}
</section>


@endsection