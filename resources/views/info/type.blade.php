@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news') }}</h1>
    </div>
</section> -->

<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
            

            <!-- Left Side -->
            <div class="col-lg-12 col-md-12">


                <h2 data-aos="fade-up" data-aos-duration="1000">{{ $type->{'name_'.session('lang')} }}</h2>
                <ul class="row">
                    @foreach($rs as $row)
                    <li class="col-md-3">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->id) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->{'title_'.session('lang')} }}
                                </h5>
                            </a>
                            <a href="{{ url('info/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                {{ $rs->appends(@$_GET)->render() }}

            </div>
            <!-- END Left Side -->
            
        </div>
    </div>
</section>
<!-- END Body Block -->


@endsection