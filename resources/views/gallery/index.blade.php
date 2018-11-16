@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">แฟ้มภาพ</h1>
    </div>
</section>

<section class="blog-page">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">แฟ้มภาพ</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">หัวข้อ</th>
                <th scope="col">จำนวนภาพ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td scope="row"><a href="{{ url('gallery/view/'.$row->slug) }}">{{ $row->title }}</a></td>
                    <td>{{ $row->attach_imgs->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $rs->appends(@$_GET)->render() }}
    </div>
</section>


@endsection