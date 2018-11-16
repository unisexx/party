@extends('layouts.front') @section('content')


<section class="banner innerpage-banner contact-banner">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000">ดาวน์โหลดเอกสาร</h1>
    </div>
</section>

<section class="blog-page">
    <div class="container">
        <h2 data-aos="fade-up" data-aos-duration="1000">ดาวน์โหลดเอกสาร</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">หัวข้อ</th>
                <th scope="col">ดาวน์โหลด</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rs as $row)
                <tr>
                    <td scope="row">{{ $row->title }}</td>
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