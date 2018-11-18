@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">ผู้บริหารพรรค</h1>
    </div>
</section>

<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
            

            <!-- Left Side -->
            <div class="col-lg-12 col-md-12">


                <h2 data-aos="fade-up" data-aos-duration="1000">{{ $type->name }}</h2>
                <ul class="row">
                    @foreach($rs as $row)
                    <li class="col-md-3">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('manager/'.$row->slug) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/manager/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->title }}
                                </h5>
                            </a>
                            <a href="{{ url('manager/'.$row->slug) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>


            </div>
            <!-- END Left Side -->
            
        </div>
    </div>
</section>
<!-- END Body Block -->


@endsection