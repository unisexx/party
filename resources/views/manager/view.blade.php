@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.executive') }}</h1>
    </div>
</section> -->

<section class="blog-page blogsingle">
    <h3 data-aos="fade-up" data-aos-duration="1000">{{ $rs->{'title_'.session('lang')} }}</h3>
    {!! $rs->{'description_'.session('lang')} !!}
</section>


@endsection