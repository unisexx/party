@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h1>
    </div>
</section> -->

<section class="about-page contact-page portfolio-page" id="my-port">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">{{ $rs->{'title_'.session('lang')} }}</h2>

        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ convertYoutube($rs->youtube) }}" allowfullscreen></iframe>
        </div>
    </div>
</section>


@endsection