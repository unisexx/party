@extends('layouts.front') @section('content')


<!-- <section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">{{ trans('site.contact') }}</h1>
    </div>
</section> -->

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">{{ $rs->{'name_'.session('lang')} }}</h2>
    <table class="table table-striped">
        <tbody>
            @if($rs->name)
            <tr>
                <td>{{ trans('site.name') }}</td>
                <td>{{ $rs->{'name_'.session('lang')} }}</td>
            </tr>
            @endif
            @if($rs->address)
            <tr>
                <td>{{ trans('site.address') }}</td>
                <td>{{ $rs->{'address_'.session('lang')} }}</td>
            </tr>
            @endif
            @if($rs->tel)
            <tr>
                <td>{{ trans('site.tel') }}</td>
                <td>{{ $rs->tel }}</td>
            </tr>
            @endif
            @if($rs->fax)
            <tr>
                <td>{{ trans('site.fax') }}</td>
                <td>{{ $rs->fax }}</td>
            </tr>
            @endif
            @if($rs->email)
            <tr>
                <td>{{ trans('site.email') }}</td>
                <td><a href="mailto:{{ $rs->email }}">{{ $rs->email }}</a></td>
            </tr>
            @endif
            @if($rs->skype)
            <tr>
                <td>Skype</td>
                <td>{{ $rs->skype }}</td>
            </tr>
            @endif
            @if($rs->line)
            <tr>
                <td>Line ID</td>
                <td><a href="javascript:void(0)" target="_blank" onclick="window.open('http://line.me/ti/p/~{{ $rs->line }}','_blank')">{{ $rs->line }}</a></td>
            </tr>
            @endif
            @if($rs->facebook)
            <tr>
                <td>Facebook</td>
                <td><a href="{{ $rs->facebook }}" target="_blank">{{ $rs->facebook }}</a></td>
            </tr>
            @endif
            @if($rs->twitter)
            <tr>
                <td>Twitter</td>
                <td><a href="{{ $rs->twitter }}" target="_blank">{{ $rs->twitter }}</a></td>
            </tr>
            @endif
            @if($rs->google_plus)
            <tr>
                <td>Google Plus</td>
                <td><a href="{{ $rs->google_plus }}" target="_blank">{{ $rs->google_plus }}</a></td>
            </tr>
            @endif
            @if($rs->instagram)
            <tr>
                <td>Instagram</td>
                <td><a href="{{ $rs->instagram }}" target="_blank">{{ $rs->instagram }}</a></td>
            </tr>
            @endif
            @if($rs->pinterest)
            <tr>
                <td>Pinterest</td>
                <td><a href="{{ $rs->pinterest }}" target="_blank">{{ $rs->pinterest }}</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</section>


@endsection