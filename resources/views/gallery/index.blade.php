@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h1>
    </div>
</section> -->

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h2>
    <!-- <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">{{ trans('site.topics') }}</th>
                <th scope="col">{{ trans('site.images') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rs as $row)
            <tr>
                <td scope="row"><a href="{{ url('gallery/'.$row->id) }}">{{ $row->{'title_'.session('lang')} }}</a></td>
                <td>{{ $row->attach_imgs->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
    <ul class="row">
        @foreach($rs as $row)
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
    {{ $rs->appends(@$_GET)->render() }}
</section>


@endsection