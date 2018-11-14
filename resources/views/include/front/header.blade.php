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
                            หน้าแรก
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">เกี่ยวกับพรรค</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('page/วิสัยทัศน์') }}">วิสัยทัศน์</a>
                            <a class="dropdown-item" href="{{ url('page/นโยบาย') }}">นโยบาย</a>
                            <a class="dropdown-item" href="{{ url('page/พรรค') }}">พรรค</a>
                            <a class="dropdown-item" href="{{ url('page/ข้อบังคับพรรค') }}">ข้อบังคับพรรค</a>
                        </div>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="services.html">
                            เกี่ยวกับพรรค
                        </a>
                    </li> -->


                    <li class="nav-item">
                        <a class="nav-link text-white" href="blog.html">
                            ผู้บริหารพรรค
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('info') }}">
                            ข่าวสารพรรค
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.html">
                            ผู้สมัคร สส.
                        </a>
                    </li>
                </ul>
                <div class="search-box mr-lg-0">
                    <input type="text" placeholder="Search here..." name="search1">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="menu-icon d-lg-none">
                    <span class="ml-auto"></span>
                    <span class="ml-auto"></span>
                    <span class="ml-auto"></span>
                </div>
        </nav>
    </div>
</header>