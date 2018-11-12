@extends('layouts.front') @section('content')

<section class="banner">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <h1>Let’s Create Something Awesome Together</h1>
        <h6>This is how we work, to make your project awesome !</h6>
        <a href="#" class="get-started-btn">get started</a>
    </div>
</section>

<section class="index-about-sec">
    <div class="layer">
        <div class="container">
            <h5 data-aos="zoom-in" data-aos-duration="1000">This is how we work, to make your project awesome !</h5>
            <p data-aos="zoom-in" data-aos-duration="1000">Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into
                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release
                of Letraset sheets containing Lorem Ipsum passages...
            </p>
            <ul class="row">
                <li class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="index-abt-content">
                        <h3>web designing</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            dummy
                            text ever since the 1500s, when an...</p>
                    </div>
                </li>
                <li class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-duration="1200">
                    <div class="index-abt-content">
                        <h3>domian registering</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            dummy
                            text ever since the 1500s, when an...</p>
                    </div>
                </li>
                <li class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-duration="1400">
                    <div class="index-abt-content">
                        <h3>wordpress development</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            dummy
                            text ever since the 1500s, when an...</p>
                    </div>
                </li>
                <li class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-duration="1600">
                    <div class="index-abt-content">
                        <h3>graphic design</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            dummy
                            text ever since the 1500s, when an...</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="index-services">
    <div class="container">
        <div class="services-filter">
            <div class="service-list">
                <h3 class="tab-link current" data-tab="tab-1">our portfolio</h3>
                <h3 class="tab-link" data-tab="tab-2">read articles</h3>
                <h3 class="tab-link" data-tab="tab-3">our clients</h3>
                <h3 class="tab-link" data-tab="tab-4">view pricing</h3>
            </div>
            <div class="service-images">
                <ul id="tab-1" class="tab-content current">
                    <li data-aos="fade-up" data-aos-duration="1000">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-1.jpg); background-position: center right"></figure>
                        </a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1200">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-2.jpg); background-position: center"></figure>
                        </a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1400">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-3.jpg);"></figure>
                        </a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1000">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-4.jpg); background-position: center right"></figure>
                        </a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1200">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-5.jpg);"></figure>
                        </a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1400">
                        <a href="portfolio.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-6.jpg); background-position: center "></figure>
                        </a>
                    </li>
                </ul>
                <ul id="tab-2" class="tab-content article-section">
                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/article-img.jpg); background-position: center right"></figure>
                            <h4>girl holding black jacket</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iste deserunt a
                                rerum temporibus quidem consequuntur facilis fugit laborum reprehenderit!</p>
                            <a href="blogsingle.html" class="article-btn">read more</a>
                        </a>
                    </li>
                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/article-img1.jpg);"></figure>
                            <h4>girl holding mug</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae iste deserunt a
                                rerum temporibus quidem consequuntur facilis fugit laborum reprehenderit!</p>
                            <a href="blogsingle.html" class="article-btn">read more</a>
                        </a>
                    </li>

                </ul>
                <ul id="tab-3" class="tab-content client-section">
                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/article-img.jpg); background-position: center;"></figure>
                        </a>
                    </li>

                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/article-img1.jpg); background-position: center;"></figure>
                        </a>
                    </li>

                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/our-clients1.jpg); background-position: center;"></figure>
                        </a>
                    </li>

                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-2.jpg); background-position: center"></figure>
                        </a>
                    </li>

                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-6.jpg); background-position: center "></figure>
                        </a>
                    </li>

                    <li>
                        <a href="blogsingle.html">
                            <figure style="background:url(bizzy-master/images/index-portfolio-3.jpg);"></figure>
                        </a>
                    </li>

                </ul>
                <ul id="tab-4" class="tab-content pricing-section">
                    <li>
                        <div class="content">
                            <h2>lite</h2>

                            <h6>free</h6>

                            <!-- <a href="https://www.template.net/editable/websites" class="buy-now">download</a> -->
                        </div>


                        <ul class="features">
                            <li>10 Downloads of Pro Templates a month</li>
                            <li>Unlimited Downloads of Free Templates without Giving Credit</li>
                            <li>Royalty Free Templates with Images, Fonts &amp; Art Work</li>
                            <li>Original Content by Business Writers</li>
                            <li>100% Customizable, Shareable &amp; Print Ready</li>
                            <li>Available File Format (Adobe, MS Office, Mac &amp; G Drive....)</li>
                        </ul>
                        <a href="blogsingle.html" class="buy-now">buy now</a>
                    </li>
                    <li>
                        <div class="content">
                            <h2>Pro</h2>

                            <h6>5$/Month</h6>

                            <!-- <a href="https://www.template.net/editable/websites" class="buy-now">Subscribe</a> -->
                        </div>

                        <ul class="features">
                            <li>10 Downloads of Pro Templates a month</li>
                            <li>Unlimited Downloads of Free Templates without Giving Credit</li>
                            <li>Royalty Free Templates with Images, Fonts &amp; Art Work</li>
                            <li>Original Content by Business Writers</li>
                            <li>100% Customizable, Shareable &amp; Print Ready</li>
                            <li>Available File Format (Adobe, MS Office, Mac &amp; G Drive....)</li>
                        </ul>
                        <a href="blogsingle.html" class="buy-now">buy now</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>

<section class="index-blog">
    <div class="layer">
        <div class="container">
            <h3 data-aos="zoom-in" data-aos-duration="1000">We write great web design articles, have a look on them</h3>
            <p data-aos="zoom-in" data-aos-duration="1000">Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the
                industry's type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting,</p>

            <ul class="row">
                <li class="col-md-6">
                    <div class="overlay" data-aos="fade-up" data-aos-duration="1000">
                        <a href="blogsingle.html">
                            <div class="blog-img">
                                <figure><img src="bizzy-master/images/img-1.jpg" alt="img-1" class="img-fluid"></figure>
                                <div class="blog-img-inner"></div>
                            </div>
                            <h5>
                                Girl wearing white frock holding coffee and posing for photo.
                            </h5>
                        </a>
                        <a href="blogsingle.html">read more</a>
                    </div>
                </li>
                <li class="col-md-6">
                    <div class="overlay" data-aos="fade-up" data-aos-duration="1300">
                        <a href="blogsingle.html">
                            <div class="blog-img">
                                <figure> <img src="bizzy-master/images/img-2.jpg" alt="img-2" class="img-fluid"></figure>
                                <div class="blog-img-inner"></div>
                            </div>
                            <h5>
                                Man getting ready for photoshoot by wearing blue suit
                            </h5>
                        </a>
                        <a href="blogsingle.html">read more</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="index-contact">
    <div class="layer">
        <div class="container">
            <h3 data-aos="zoom-in" data-aos-duration="1000">Got a project in mind? please contact and lets make awesome</h3>
            <p data-aos="zoom-in" data-aos-duration="1000">Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the
                industry's type specimen book. It has survived not only five centuries, but also the leap into
                electronic typesetting,</p>
            <form data-aos="fade-up" data-aos-duration="1000">
                <ul class="row">
                    <li class="col-md-4">
                        <input type="text" required class="w-100" placeholder="Your Name">
                    </li>
                    <li class="col-md-4">
                        <input type="email" required class="w-100" placeholder="Your Email Id">
                    </li>
                    <li class="col-md-4">
                        <input type="text" required class="w-100" placeholder="Your Mobile No">
                    </li>
                    <li class="col-12">
                        <textarea class="w-100" required placeholder="Your Message"></textarea>
                    </li>
                </ul>
                <button type="submit">alright submit it</button>
            </form>
        </div>
    </div>
</section>

@endsection