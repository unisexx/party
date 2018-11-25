@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.executive') }}</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <!-- <h3 data-aos="fade-up" data-aos-duration="1000">ผู้บริหารพรรค</h3> -->

    @foreach($rs as $person_type)
        <div class="col-lg-12 col-md-12" style="margin-bottom:50px;">

            <h2 data-aos="fade-up" data-aos-duration="1000">{{ $person_type->{'name_'.session('lang')} }}</h3>
            <ul class="row">
                @foreach($person_type->manager()->where('status','public')->get() as $manager)
                <li class="col-md-3">
                    <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{ url('manager/'.$manager->id) }}">
                            <div class="blog-img">
                                <figure><img src="{{ url('uploads/manager/'.$manager->image) }}" alt="img-1" class="img-fluid"></figure>

                                <div class="blog-img-inner"></div>
                            </div>
                            <h5>
                                {{ $manager->{'title_'.session('lang')} }}
                            </h5>
                        </a>
                        <a href="{{ url('manager/'.$manager->id) }}" style="display:none;">อ่านต่อ</a>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    @endforeach

</section>


@endsection