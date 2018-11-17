@extends('layouts.front') @section('content')


<!-- Main Banner Block -->
<section class="banner">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <h1>พรรคพลังประชารัฐ</h1>
        <h6>โลกเปลี่ยน ไทยต้องปรับ ทางเลือกใหม่ของการเมืองไทย ก้าวข้ามความขัดแย้ง</h6>
        <a href="membership/form" class="get-started-btn" style="color:#fff !important;">สมัครสมาชิกพรรค</a>
    </div>
</section>


<!-- Sub Banner Block -->
<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <!-- <div class="row"> -->
            <div class="col-12">Banner 1<br>นำภาพผลงานของพรรคมาขยายผลการดำเนินการอย่างต่อเนื่องและมีเป้าหมาย ทางด้านเศรษฐกิจ สังคม และการเมือง</div>
            <div class="col-12">Banner 2<br>บัตรคนจน</div>
            <div class="col-12">Banner 3<br>ราคาข้าวสูง</div>
            <div class="col-12">Banner 4<br>คำขวัญของพรรค</div>
        <!-- </div> -->
    </div>
</section>


<!-- Body Block -->
<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
            

            <!-- Left Side -->
            <div class="col-lg-9 col-md-12">


                <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารเกี่ยวกับพรรค</h2>
                <ul class="row">
                    @foreach($info as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->slug) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->title }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->slug) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารจากสาขาพรรค</h2>
                <ul class="row">
                    @foreach($info_sub as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->slug) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->title }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->slug) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>

                <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารจากเยาวชนคนรุ่นใหม่</h2>
                <ul class="row">
                    @foreach($info_youth as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->slug) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/info/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

                                    <div class="blog-img-inner"></div>
                                </div>
                                <h5>
                                    {{ $row->title }}
                                </h5>
                                <!-- <p>{!! cuttext($row->description,100) !!}</p> -->
                            </a>
                            <a href="{{ url('info/'.$row->slug) }}" style="display:none;">อ่านต่อ</a>
                        </div>
                    </li>
                    @endforeach
                </ul>



            </div>
            <!-- END Left Side -->
            

            <!-- Right Side -->
            <div class="col-lg-3 col-md-12">

            
                <h2 data-aos="fade-up" data-aos-duration="1000">ข้อมูลพรรค</h2>
                <ul class="section-nav">
                    <li class="toc-entry toc-h2"><a href="#">ข้อมูลเกี่ยวกับพรรค</a>
                        <ul>
                            <li class="toc-entry toc-h3"><a href="{{ url('page/วิสัยทัศน์') }}">- วิสัยทัศน์</a></li>
                            <li class="toc-entry toc-h3"><a href="{{ url('page/นโยบาย') }}">- นโยบาย</a></li>
                            <li class="toc-entry toc-h3"><a href="{{ url('page/พรรค') }}">- พรรค</a></li>
                            <li class="toc-entry toc-h3"><a href="{{ url('page/ข้อบังคับพรรค') }}">- ข้อบังคับพรรค</a></li>
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">ผู้บริหารพรรค</a>
                        <ul>
                            @foreach($person_type as $row)
                            <li class="toc-entry toc-h3"><a href="{{ url('manager/type/'.$row->id) }}">- {{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">ประกาศพรรค</a>
                        <ul>
                            @foreach($announce_type as $row)
                            <li class="toc-entry toc-h3"><a href="{{ url('announce/type/'.$row->id) }}">- {{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="{{ url('page/ติดต่อพรรค') }}">ติดต่อพรรค</a></li>
                </ul>

                <div class="row">
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="far fa-list-alt"></i> สมัครสมาชิกพรรค</div>
                    </a>
                    <a class="col-12" href="{{ url('download') }}">
                        <div class="right-side-banner"><i class="fas fa-download"></i> ดาวน์โหลดเอกสาร</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="fas fa-users"></i> ระบบสมาชิกออนไลน์</div>
                    </a>
                    <a class="col-12" href="{{ url('gallery') }}">
                        <div class="right-side-banner"><i class="far fa-image"></i> แฟ้มภาพ</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="far fa-handshake"></i> ระบบบริหารงานพรรค</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="fas fa-list-ul"></i> รายชื่อผู้สมัคร สส.และ<br>สส.บัญชีรายชื่อ ของ<br>พรรคทั่วประเทศ</div>
                    </a>
                    <a class="col-12" href="#">
                        <div class="right-side-banner"><i class="far fa-envelope"></i> ติดต่อพรรค ผู้สมัครพรรค<br>และ สส.ของพรรค</div>
                    </a>
                </div>
                

            

            </div>
            <!-- END RIGHT Side -->


        </div>
    </div>
</section>
<!-- END Body Block -->


@endsection