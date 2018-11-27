@extends('layouts.front') @section('content')


<!-- Main Banner Block -->
<!-- <section class="banner">
    <div class="container" data-aos="fade-up" data-aos-duration="1000"> -->
        <!-- <h1>พรรคพลังประชารัฐ</h1>
        <h6>โลกเปลี่ยน ไทยต้องปรับ ทางเลือกใหม่ของการเมืองไทย ก้าวข้ามความขัดแย้ง</h6>
        <a href="membership/form" class="get-started-btn" style="color:#fff !important;">สมัครสมาชิกพรรค</a> -->
    <!-- </div>
</section> -->

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top:93px;">
    <ol class="carousel-indicators">
        @foreach($hilight as $key => $row)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($hilight as $key => $row)
        <div class="carousel-item @if($key == 0) active @endif">
            <a href="{{ $row->url != '' ? url($row->url) : url('home') }}"><img class="d-block w-100" src="{{ url('uploads/hilight/'.$row->image) }}" alt="{{ $row->title }}"></a>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="fas fa-chevron-circle-left fa-3x" aria-hidden="true" style="opacity:0.4;"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="fas fa-chevron-circle-right fa-3x" aria-hidden="true" style="opacity:0.4;"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- Sub Banner Block -->
<!-- <section class="blog-home h-banner" style="padding-bottom:0px;">
    <div class="container">
        <div class="col-md-12">

            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($hilight as $key => $row)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($hilight as $key => $row)
                <div class="carousel-item @if($key == 0) active @endif">
                    <a href="{{ $row->url != '' ? url($row->url) : url('home') }}"><img class="d-block w-100" src="{{ url('uploads/hilight/'.$row->image) }}" alt="{{ $row->title }}"></a>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="fas fa-chevron-circle-left fa-3x" aria-hidden="true" style="opacity:0.4;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="fas fa-chevron-circle-right fa-3x" aria-hidden="true" style="opacity:0.4;"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

        </div>
    </div>
</section> -->


<!-- Body Block -->
<section class="blog-home" style="padding-bottom:0px; padding-top:0px;">
    <!-- <div class="container"> -->
        <div class="row contain-block" style="margin-right: 0px !important; margin-left: 0px !important;">
            

            <!-- Left Side -->
            <div class="col-lg-9 col-md-12">


                <!-- <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.menu') }}</h2> -->
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-6">
                        <a class="btn btn-lg btn-block btn-primary text-white" href="{{ url('membership/form') }}" role="button" style="background-color:#3180cc;">
                            <div class="right-side-banner"><i class="far fa-list-alt"></i> {{ trans('site.party_membership') }}</div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-lg btn-block btn-primary text-white" href="{{ url('download') }}" role="button" style="background-color:#3180cc;">
                            <div class="right-side-banner"><i class="fas fa-download"></i> {{ trans('site.download') }}</div>
                        </a>
                    </div>
                </div>

                <!-- <div class="col-md-12">
                <a class="btn btn-primary" href="#" role="button">Link</a>
                    <ul>
                        <li>
                            <a class="" href="{{ url('membership/form') }}">
                                <div class="right-side-banner"><i class="far fa-list-alt"></i> {{ trans('site.party_membership') }}</div>
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ url('download') }}">
                                <div class="right-side-banner"><i class="fas fa-download"></i> {{ trans('site.download') }}</div>
                            </a>
                        </li>
                    </ul>
                </div> -->

                <h2 data-aos="fade-up" data-aos-duration="1000">PPRP Channel</h2>
                <div class="col-md-12" style="margin-bottom:20px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ convertYoutube($video->youtube) }}" allowfullscreen></iframe>
                    </div>
                </div>


                <!-- <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-8">
                        <h2 data-aos="fade-up" data-aos-duration="1000">PPRP Channel</h2>

                        <div class="col-md-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ convertYoutube($video->youtube) }}" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.menu') }}</h2>
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    <a class="" href="{{ url('membership/form') }}">
                                        <div class="right-side-banner"><i class="far fa-list-alt"></i> {{ trans('site.party_membership') }}</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('download') }}">
                                        <div class="right-side-banner"><i class="fas fa-download"></i> {{ trans('site.download') }}</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->


                <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news_about') }}</h2>
                <ul class="row">
                    @foreach($info as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->id) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->{'title_'.session('lang')} }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <!-- <hr> -->
                <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news_branch') }}</h2>
                <ul class="row">
                    @foreach($info_sub as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->id) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->{'title_'.session('lang')} }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <!-- <hr> -->
                <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news_young') }}</h2>
                <ul class="row">
                    @foreach($info_youth as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->id) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->{'title_'.session('lang')} }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <!-- <hr> -->
                <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h2>
                <ul class="row">
                    @foreach($gallery as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('gallery/'.$row->id) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/gallery/'.$row->attach_imgs()->first()->file_path) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->{'title_'.session('lang')} }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->id) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>



            </div>
            <!-- END Left Side -->
            

            <!-- Right Side -->
            <div class="col-lg-3 col-md-12 right-sidebar">

                <!-- <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.party_infomation') }}</h2>
                <ul class="section-nav">
                    <li class="toc-entry toc-h2"><a href="#">{{ trans('site.about') }}</a>
                        <ul>
                            @foreach($page as $row)
                                <li class="toc-entry toc-h3"><a href="{{ url('page/'.$row->slug) }}">- {{ $row->{'title_'.session('lang')} }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">{{ trans('site.executive') }}</a>
                        <ul>
                            @foreach($person_type as $row)
                            <li class="toc-entry toc-h3"><a href="{{ url('manager/type/'.$row->id) }}">- {{ $row->{'name_'.session('lang')} }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">{{ trans('site.party_announcement') }}</a>
                        <ul>
                            @foreach($announce_type as $row)
                            <li class="toc-entry toc-h3"><a href="{{ url('announce/type/'.$row->id) }}">- {{ $row->{'name_'.session('lang')} }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="{{ url('contact/1') }}">{{ trans('site.contact') }}</a></li>
                </ul> -->


                <div class="row side-banner sticky">
                    <!-- <a class="col-12" href="{{ url('membership/form') }}">
                        <div class="right-side-banner"><i class="far fa-list-alt"></i> {{ trans('site.party_membership') }}</div>
                    </a> -->
                    <!-- <a class="col-12" href="{{ url('download') }}">
                        <div class="right-side-banner"><i class="fas fa-download"></i> {{ trans('site.download') }}</div>
                    </a> -->
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="fas fa-users"></i> {{ trans('site.membership_system') }}</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="fas fa-user-tie"></i> {{ trans('site.online_party_system') }}</div>
                    </a>
                    <!-- <a class="col-12" href="{{ url('gallery') }}">
                        <div class="right-side-banner"><i class="far fa-image"></i> {{ trans('site.gallery') }}</div>
                    </a> -->
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="far fa-handshake"></i> {{ trans('site.party_management_system') }}</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="fas fa-list-ul"></i> {!! trans('site.candidate_list') !!}</div>
                    </a>
                    <a class="col-12" href="{{ url('contact') }}">
                        <div class="right-side-banner"><i class="far fa-envelope"></i> {!! trans('site.contact_party') !!}</div>
                    </a>
                </div>
                

            

            </div>
            <!-- END RIGHT Side -->


        </div>
    <!-- </div> -->
</section>
<!-- END Body Block -->


@endsection