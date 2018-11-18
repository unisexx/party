@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">เกี่ยวกับพรรค</h1>
    </div>
</section>

<section class="blog-page blogsingle">
    <h2 data-aos="fade-up" data-aos-duration="1000">เกี่ยวกับพรรค</h2>
    <table class="table table-striped">
        <tbody>
            @foreach($rs as $row)
            <tr>
                <td><a href="{{ url('page/'.$row->slug) }}">{{ $row->title }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>


@endsection