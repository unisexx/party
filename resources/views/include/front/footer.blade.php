<?php
    $contact = \App\Models\Contact::find(1);
?>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 footer-about wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <img class="logo-footer" src="{{ url('image/logo.png') }}" alt="logo-footer" data-at2x="assets/img/logo.png">
                    <p><a href="{{ url('home') }}" style="font-size:28px;">พรรคพลังประชารัฐ</a></p>
                    <p>โลกเปลี่ยน ไทยต้องปรับ ทางเลือกใหม่ของการเมืองไทย ก้าวข้ามความขัดแย้ง</p>
                </div>
                <div class="col-md-4 col-lg-4 offset-lg-1 footer-contact wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <h3>ติดต่อพรรค</h3>
                    @if($contact->address) <p><i class="fas fa-map-marker-alt"></i> {{ $contact->address }}</p> @endif
                    @if($contact->tel) <p><i class="fas fa-phone"></i> โทรศัพท์: {{ $contact->tel }}</p> @endif
                    @if($contact->fax) <p><i class="fas fa-fax"></i> แฟกซ์: {{ $contact->fax }}</p> @endif
                    @if($contact->email) <p><i class="fas fa-envelope"></i> อีเมล์: <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p> @endif
                    @if($contact->skype) <p><i class="fab fa-skype"></i> Skype: {{ $contact->skype }}</p> @endif
                    @if($contact->line) <p><i class="fab fa-line"></i></i> Line: {{ $contact->line }}</p> @endif
                </div>
                <div class="col-md-4 col-lg-3 footer-social wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3>ติดตามพรรค</h3>
                    <p>
                        @if($contact->facebook) <a href="{{ $contact->facebook }}"><i class="fab fa-facebook"></i></a> @endif
                        @if($contact->twitter) <a href="{{ $contact->twitter }}"><i class="fab fa-twitter"></i></a> @endif
                        @if($contact->google_plus) <a href="{{ $contact->google_plus }}"><i class="fab fa-google-plus-g"></i></a> @endif
                        @if($contact->instagram) <a href="{{ $contact->instagram }}"><i class="fab fa-instagram"></i></a> @endif
                        @if($contact->pinterest) <a href="{{ $contact->pinterest }}"><i class="fab fa-pinterest"></i></a> @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 footer-copyright">
                    <p>© 2018 พรรคพลังประชารัฐ</p>
                </div>
                <div class="col-md-7 footer-menu">
                    <nav class="navbar navbar-dark navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link scroll-link" href="{{ url('home') }}">หน้าแรก</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll-link" href="{{ url('page') }}">เกี่ยวกับพรรค</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll-link" href="{{ url('manager') }}">ผู้บริหารพรรค</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll-link" href="{{ url('info') }}">ข่าวสารพรรค</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll-link" href="{{ url('contact/1') }}">ติดต่อพรรค</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>


<button class="scrolltop-btn">
    <i class="fa fa-angle-up"></i>
</button>