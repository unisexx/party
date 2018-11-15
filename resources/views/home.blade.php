@extends('layouts.front') @section('content')

<style>
a {
    text-decoration: none;
    /* font-size: 16px !important; */
    color: #363636 !important;
}

.row>[class^=col-] {
    padding-top: .75rem;
    padding-bottom: .75rem;
    background-color: rgba(86,61,124,.15);
    border: 1px solid rgba(86,61,124,.2);
}

/* ------ home ------- */
section.blog-home {
    text-align: left;
    padding-top: 64px;
    padding-bottom: 140px;
}

section.blog-home ul li .overlay a:first-child h5 {
    color: #363636;
    margin-bottom: 23px;
    font-size: 16px;
}

section.blog-home ul li .overlay p {
    font-size: 16px;
    line-height: 28px;
    color: #000000;
    opacity: 0.6;
    margin-bottom: 40px;
}

section.blog-home ul li .overlay a:last-child {
    display: inline-block;
    min-width: 152px;
    height: 57px;
    background: linear-gradient(180deg, #007bff 22%, #0062cc 95%);
    color: #FFF;
    letter-spacing: -0.6px;
    font-size: 17px;
    text-align: center;
    line-height: 58px;
    text-transform: uppercase;
    font-weight: 500;
    transition: all 0.6s;
    margin-bottom: 75px;
}

section.blog-home ul li .overlay a:last-child:hover {
    background: #fff;
    color: #000000;
    border-radius: 50px;
    box-shadow: 1px 1px 10px 7px rgba(0, 0, 0, 0.15);

}

section.blog-home ul li .overlay .blog-img {
    width: 100%;
    height: 100%;
    position: relative;
    margin-bottom: 10px;
    overflow: hidden;
}


section.blog-home ul li .overlay .blog-img figure {
    margin: 0;
    transition: all 0.7s;
}

section.blog-home ul li .overlay a:hover .blog-img figure {
    transform: scale(1.2);
}


section.blog-home ul li .overlay a:hover .blog-img .blog-img-inner {
    background: rgba(0, 0, 0, 0.5);
}

section.blog-home .container {
    max-width: 980px;
    padding: 0;
}

section.blog-home .container h2 {
    font-size: 25px;
    color: #000000;
    text-transform: capitalize;
    line-height: 27px;
    margin-bottom: 10px;
}

section.blog-home ul li.col-md-6 {
    padding: 0 40px;
}

section.blog-home ul {
    margin: 0 0 25px 0;
}

section.blog-home ul:last-child {
    margin: 0px;
}

section.blog-home ul li .overlay .blog-img .blog-img-inner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 10px solid rgba(255, 255, 255, .4);
}
/* ------End of Blog page------ */

.section-nav ul {
    padding-left: 1rem;
}
.toc-entry a {
    display: block;
    padding: .125rem 0;
    color: #99979c;
}

.right-side-banner{
    margin:10px 0;
}
</style>

<!-- Main Banner Block -->
<section class="banner">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <!-- <h1>Let’s Create Something Awesome Together</h1>
        <h6>This is how we work, to make your project awesome !</h6>
        <a href="#" class="get-started-btn">get started</a> -->
        <h1>พรรคพลังประชารัฐ</h1>
        <h6>โลกเปลี่ยน ไทยต้องปรับ ทางเลือกใหม่ของการเมืองไทย ก้าวข้ามความขัดแย้ง</h6>
        <a href="#" class="get-started-btn">สมัครสมาชิกพรรค</a>
    </div>
</section>


<!-- Sub Banner Block -->
<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-12">Banner 1<br>นำภาพผลงานของพรรคมาขยายผลการดำเนินการอย่างต่อเนื่องและมีเป้าหมาย ทางด้านเศรษฐกิจ สังคม และการเมือง</div>
            <div class="col-12">Banner 2<br>บัตรคนจน</div>
            <div class="col-12">Banner 3<br>...</div>
            <div class="col-12">Banner 4<br>คำขวัญของพรรค</div>
        </div>
    </div>
</section>


<!-- Body Block -->
<section class="blog-home" style="padding-bottom:0px;">
    <div class="container">
        <div class="row">
            

            <!-- Left Side -->
            <div class="col-lg-9 col-md-12">


                <h2 data-aos="fade-up" data-aos-duration="1000">ข่าวสารเกี่ยวกับพรรค</h2>
                <ul class="row">
                    @foreach($info as $row)
                    <li class="col-md-4">
                        <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                            <a href="{{ url('info/'.$row->slug) }}">
                                <div class="blog-img">
                                    <figure><img src="{{ url('uploads/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

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
                                    <figure><img src="{{ url('uploads/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

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
                                    <figure><img src="{{ url('uploads/'.$row->image) }}" alt="img-1" class="img-fluid"></figure>

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
                            <li class="toc-entry toc-h3"><a href="#">- หัวหน้าพรรค</a></li>
                            <li class="toc-entry toc-h3"><a href="#">- กรรมการบริหาร</a></li>
                            <li class="toc-entry toc-h3"><a href="#">- ที่ปรึกษาพรรค</a></li>
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">ประกาศพรรค</a>
                        <ul>
                            <li class="toc-entry toc-h3"><a href="#">- กฎหมายน่ารู้</a></li>
                        </ul>
                    </li>
                    <li class="toc-entry toc-h2"><a href="#">ติดต่อพรรค</a></li>
                </ul>

                <div class="row">
                    <div class="col-12 right-side-banner"><i class="far fa-list-alt"></i> สมัครสมาชิกพรรค</div>
                    <div class="col-12 right-side-banner"><i class="fas fa-download"></i> ดาวน์โหลดเอกสาร</div>
                    <div class="col-12 right-side-banner"><i class="fas fa-users"></i> ระบบสมาชิกออนไลน์</div>
                    <div class="col-12 right-side-banner"><i class="far fa-image"></i> แฟ้มภาพ</div>
                    <div class="col-12 right-side-banner"><i class="far fa-handshake"></i> ระบบบริหารงานพรรค</div>
                    <div class="col-12 right-side-banner"><i class="fas fa-list-ul"></i> รายชื่อผู้สมัคร สส.และ<br>สส.บัญชีรายชื่อ ของ<br>พรรคทั่วประเทศ</div>
                    <div class="col-12 right-side-banner"><i class="far fa-envelope"></i> ติดต่อพรรค ผู้สมัครพรรค<br>และ สส.ของพรรค</div>
                </div>
                

            

            </div>
            <!-- END RIGHT Side -->


        </div>
    </div>
</section>
<!-- END Body Block -->


@endsection