@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ $rs->title }}</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    {!! $rs->description !!}
</section>


@endsection