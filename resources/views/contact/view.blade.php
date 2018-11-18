@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">ติดต่อพรรค</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">{{ $rs->name }}</h2>
    <table class="table table-striped">
        <tbody>
            @if($rs->name)
            <tr>
                <td>ชื่อ</td>
                <td>{{ $rs->name }}</td>
            </tr>
            @endif
            @if($rs->address)
            <tr>
                <td>ที่อยู่</td>
                <td>{{ $rs->address }}</td>
            </tr>
            @endif
            @if($rs->tel)
            <tr>
                <td>เบอร์โทรศัพท์</td>
                <td>{{ $rs->tel }}</td>
            </tr>
            @endif
            @if($rs->fax)
            <tr>
                <td>แฟกซ์</td>
                <td>{{ $rs->fax }}</td>
            </tr>
            @endif
            @if($rs->email)
            <tr>
                <td>อีเมล์</td>
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
                <td>Line</td>
                <td>{{ $rs->line }}</td>
            </tr>
            @endif
            @if($rs->facebook)
            <tr>
                <td>Facebook</td>
                <td><a href="{{ $rs->facebook }}">{{ $rs->facebook }}</a></td>
            </tr>
            @endif
            @if($rs->twitter)
            <tr>
                <td>Twitter</td>
                <td><a href="{{ $rs->twitter }}">{{ $rs->twitter }}</a></td>
            </tr>
            @endif
            @if($rs->google_plus)
            <tr>
                <td>Google Plus</td>
                <td><a href="{{ $rs->google_plus }}">{{ $rs->google_plus }}</a></td>
            </tr>
            @endif
            @if($rs->instagram)
            <tr>
                <td>Instagram</td>
                <td><a href="{{ $rs->instagram }}">{{ $rs->instagram }}</a></td>
            </tr>
            @endif
            @if($rs->pinterest)
            <tr>
                <td>Pinterest</td>
                <td><a href="{{ $rs->pinterest }}">{{ $rs->pinterest }}</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</section>


@endsection