@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">ข่าวสารพรรค</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h3 data-aos="fade-up" data-aos-duration="1000">{{ $rs->title }}</h3>
    {!! $rs->description !!}
</section>


@endsection