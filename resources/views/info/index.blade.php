@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news') }}</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.news') }}</h2>
    <table class="table table-striped">
        <tbody>
            @foreach($rs as $row)
            <tr>
                <td><a href="{{ url('info/type/'.$row->id) }}">{{ $row->{'name_'.session('lang')} }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>


@endsection