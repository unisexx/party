<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- <div class="user-panel">
            <div style="color:#fff;">
                สวัสดี : {{ Auth::user()->name }}<br>สิทธิ์การใช้งาน : {{ Auth::user()->roles()->first()->name }}
            </div>
        </div> -->


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">จัดการ</li>
        @can('user-view')
        <li {{ request()->segment(2) == 'user' ? 'class=active' : '' }}><a href="{{ url('fdadmin/user') }}"><i class="fa fa-user"></i> <span>ผู้ใช้งาน</span></a></li>
        @endcan
        
        @can('role-view')
        <li {{ request()->segment(2) == 'role' ? 'class=active' : '' }}><a href="{{ url('fdadmin/role') }}"><i class="fa fa-lock"></i> <span>สิทธิ์การใช้งาน</span></a></li>
        @endcan

        <li class="header">เมนู</li>

        @can('hilight-view')
        <li {{ request()->segment(2) == 'hilight' ? 'class=active' : '' }}><a href="{{ url('fdadmin/hilight') }}"><i class="fa fa-bookmark-o"></i> <span>ไฮไลท์</span></a></li>
        @endcan

        @can('page-view')
        <li class="{{ request()->segment(2) == 'page' && request()->path() != 'fdadmin/page/form/5' ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>เกี่ยวกับพรรค</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->path() == 'fdadmin/page/form/1' ? 'active' : '' }}"><a href="{{ url('fdadmin/page/form/1') }}"><i class="fa fa-circle-o"></i> วิสัยทัศน์</a></li>
            <li class="{{ request()->path() == 'fdadmin/page/form/2' ? 'active' : '' }}"><a href="{{ url('fdadmin/page/form/2') }}"><i class="fa fa-circle-o"></i> นโยบาย</a></li>
            <!-- <li class="{{ request()->path() == 'fdadmin/page/form/3' ? 'active' : '' }}"><a href="{{ url('fdadmin/page/form/3') }}"><i class="fa fa-circle-o"></i> พรรค</a></li> -->
            <li class="{{ request()->path() == 'fdadmin/page/form/4' ? 'active' : '' }}"><a href="{{ url('fdadmin/page/form/4') }}"><i class="fa fa-circle-o"></i> ข้อบังคับพรรค</a></li>
          </ul>
        </li>
        @endcan

        @can('manager-view')
        <li {{ request()->segment(2) == 'manager' ? 'class=active' : '' }}><a href="{{ url('fdadmin/manager') }}"><i class="fa fa-users"></i> <span>ผู้บริหารพรรค</span></a></li>
        @endcan

        @can('info-view')
        <li {{ request()->segment(2) == 'info' ? 'class=active' : '' }}><a href="{{ url('fdadmin/info') }}"><i class="fa fa-newspaper-o"></i> <span>ข่าวสารพรรค</span></a></li>
        @endcan

        @can('announce-view')
        <li {{ request()->segment(2) == 'announce' ? 'class=active' : '' }}><a href="{{ url('fdadmin/announce
') }}"><i class="fa fa-bullhorn"></i> <span>ประกาศพรรค</span></a></li>
        @endcan

        <!-- <li {{ request()->segment(2) == 'law' ? 'class=active' : '' }}><a href="{{ url('fdadmin/law
') }}"><i class="fa fa-files-o"></i> <span>กฎหมายต้องรู้</span></a></li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>ผู้สมัคร สส.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> ผู้สมัคร สส.แบบบัญชีรายชื่อ</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> ผู้สมัคร สส.แบบแบ่งเขต</a></li>
          </ul>
        </li> -->

        @can('gallery-view')
        <li {{ request()->segment(2) == 'gallery' ? 'class=active' : '' }}><a href="{{ url('fdadmin/gallery
') }}"><i class="fa fa-picture-o"></i> <span>ภาพกิจกรรม</span></a></li>
        @endcan

        @can('video-view')
        <li {{ request()->segment(2) == 'video' ? 'class=active' : '' }}><a href="{{ url('fdadmin/video
') }}"><i class="fa fa-youtube-play"></i> <span>PPRP Channel</span></a></li>
        @endcan

        @can('download-view')
        <li {{ request()->segment(2) == 'download' ? 'class=active' : '' }}><a href="{{ url('fdadmin/download
') }}"><i class="fa fa-download"></i> <span>ดาวน์โหลดเอกสาร</span></a></li>
        @endcan

        @can('membership-view')
        <li {{ request()->segment(2) == 'membership' ? 'class=active' : '' }}><a href="{{ url('fdadmin/membership
') }}"><i class="fa fa-user-plus"></i> <span>ผู้สมัครพรรค</span></a></li>
        @endcan

        @can('contact-view')
        <li {{ request()->segment(2) == 'contact' ? 'class=active' : '' }}><a href="{{ url('fdadmin/contact') }}"><i class="fa fa-envelope"></i> <span>ติดต่อพรรค <br>ผู้สมัครพรรค และ สส.ของพรรค</span></a></li>
        @endcan

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>