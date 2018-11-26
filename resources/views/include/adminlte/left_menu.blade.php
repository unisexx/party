<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="https://stickershop.line-scdn.net/stickershop/v1/sticker/2021/ANDROID/sticker.png" class="img-circle" alt="User Image" width="160" height="160">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">เมนู</li>
        <li {{ request()->segment(2) == 'hilight' ? 'class=active' : '' }}><a href="{{ url('fdadmin/hilight') }}"><i class="fa fa-bookmark-o"></i> <span>ไฮไลท์</span></a></li>
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
        <li {{ request()->segment(2) == 'manager' ? 'class=active' : '' }}><a href="{{ url('fdadmin/manager') }}"><i class="fa fa-users"></i> <span>ผู้บริหารพรรค</span></a></li>
        <li {{ request()->segment(2) == 'info' ? 'class=active' : '' }}><a href="{{ url('fdadmin/info') }}"><i class="fa fa-newspaper-o"></i> <span>ข่าวสารพรรค</span></a></li>
        <li {{ request()->segment(2) == 'announce' ? 'class=active' : '' }}><a href="{{ url('fdadmin/announce
') }}"><i class="fa fa-bullhorn"></i> <span>ประกาศพรรค</span></a></li>
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
        <li {{ request()->segment(2) == 'gallery' ? 'class=active' : '' }}><a href="{{ url('fdadmin/gallery
') }}"><i class="fa fa-picture-o"></i> <span>ภาพกิจกรรม</span></a></li>
        <li {{ request()->segment(2) == 'video' ? 'class=active' : '' }}><a href="{{ url('fdadmin/video
') }}"><i class="fa fa-youtube-play"></i> <span>PPRP Channel</span></a></li>
        <li {{ request()->segment(2) == 'download' ? 'class=active' : '' }}><a href="{{ url('fdadmin/download
') }}"><i class="fa fa-download"></i> <span>ดาวน์โหลดเอกสาร</span></a></li>
        <li {{ request()->segment(2) == 'membership' ? 'class=active' : '' }}><a href="{{ url('fdadmin/membership
') }}"><i class="fa fa-user-plus"></i> <span>ผู้สมัครพรรค</span></a></li>
        <li {{ request()->segment(2) == 'contact' ? 'class=active' : '' }}><a href="{{ url('fdadmin/contact') }}"><i class="fa fa-envelope"></i> <span>ติดต่อพรรค <br>ผู้สมัครพรรค และ สส.ของพรรค</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>