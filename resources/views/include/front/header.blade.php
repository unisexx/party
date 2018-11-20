<?php
    $page = \App\Models\Page::orderBy('id','asc')->get();
    $person_type = \App\Models\Person_type::orderBy('id','asc')->get();
    $info_type = \App\Models\Info_type::orderBy('id','asc')->get();
?>

<header class="fixed-top p-auto">
    <div class="container">
        <nav class="navbar navbar-expand p-0">
            <a class="navbar-brand mr-0 pr-4" href="{{ url('home') }}">
                <img src="image/logo.png" alt="logo" width="100">
            </a>
            <a href="javascript:void(0)" id="cls-btn">&times;</a>
            <div class="navbar-collapse nav-sec" id="sidenav">
                <ul class="navbar-nav mr-auto header-nav">
                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="{{ url('home') }}">
                            {{ trans('site.home') }}
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{ trans('site.about') }}</a>
                        <div class="dropdown-menu">
                            @foreach($page as $row)
                                <a class="dropdown-item" href="{{ url('page/'.$row->slug) }}">{{ $row->{'title_'.session('lang')} }}</a>
                            @endforeach
                            <!-- <a class="dropdown-item" href="{{ url('page/วิสัยทัศน์') }}">วิสัยทัศน์</a>
                            <a class="dropdown-item" href="{{ url('page/นโยบาย') }}">นโยบาย</a>
                            <a class="dropdown-item" href="{{ url('page/พรรค') }}">พรรค</a>
                            <a class="dropdown-item" href="{{ url('page/ข้อบังคับพรรค') }}">ข้อบังคับพรรค</a> -->
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{ trans('site.executive') }}</a>
                        <div class="dropdown-menu">
                            @foreach($person_type as $row)
                                <a class="dropdown-item" href="{{ url('manager/type/'.$row->id) }}">{{ $row->{'name_'.session('lang')} }}</a>
                            @endforeach
                            <!-- <a class="dropdown-item" href="{{ url('manager/type/1') }}">หัวหน้าพรรค</a>
                            <a class="dropdown-item" href="{{ url('manager/type/2') }}">กรรรมการบริหารพรรค</a>
                            <a class="dropdown-item" href="{{ url('manager/type/3') }}">คณะที่ปรึกษาพรรค</a> -->
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">{{ trans('site.news') }}</a>
                        <div class="dropdown-menu">
                            @foreach($info_type as $row)
                            <a class="dropdown-item" href="{{ url('info/type/'.$row->id) }}">{{ $row->{'name_'.session('lang')} }}</a>
                            @endforeach
                            <!-- <a class="dropdown-item" href="{{ url('info/type/1') }}">ข่าวสารเกี่ยวกับพรรค</a>
                            <a class="dropdown-item" href="{{ url('info/type/2') }}">ข่าวสารจากสาขาพรรค</a>
                            <a class="dropdown-item" href="{{ url('info/type/3') }}">ข่าวสารจากเยาวชนคนรุ่นใหม่</a> -->
                        </div>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            ผู้สมัคร สส.
                        </a>
                    </li> -->
                </ul>
                <!-- <div class="search-box mr-lg-0">
                    <input type="text" placeholder="Search here..." name="search1">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div> -->
                
                <!-- เปลี่ยนภาษา -->
                <div class="pull-right setlang">
                    <a class="text-white {{ session('lang') == 'th' ? 'active' : '' }}" href="{{ URL::to('change/th') }}">TH</a> <span class="text-white">|</span>
                    <a class="text-white {{ session('lang') == 'en' ? 'active' : '' }}" href="{{ URL::to('change/en') }}">EN</a>
                    {{-- trans('site.home') --}}
                    {{-- session('lang') --}}
                </div>
                <div class="menu-icon d-lg-none">
                    <span class="ml-auto"></span>
                    <span class="ml-auto"></span>
                    <span class="ml-auto"></span>
                </div>
        </nav>
    </div>
</header>