@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.gallery') }}</h2>
    <table class="table table-striped">
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
    </table>
    {{ $rs->appends(@$_GET)->render() }}
</section>


@endsection