@extends('layouts.front') @section('content')

<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.download') }}</h1>
    </div>
</section> -->

<section class="blog-page">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.download') }}</h2>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">{{ trans('site.topics') }}</th>
                    <th scope="col">{{ trans('site.downloads') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td scope="row">{{ $row->{'title_'.session('lang')} }}</td>
                    <td>
                        @if(!empty($row->file_path)) 
                            <a href="{{ url('download/filedownload/'.$row->id) }}"><div><i class="fa fa-download"></i><div></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $rs->appends(@$_GET)->render() }}
    </div>
</section>

@endsection