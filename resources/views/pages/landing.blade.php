@extends('layouts.app')

@section('title', 'Nusa Pratama Anugrah')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @foreach ($heroBanners as $heroBanner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $heroBanner->image) }}" alt="{{ $heroBanner->title }}"
                        class="product-image img-fluid">
                    <div class="carousel-container">
                        <h2 style="text-align: center">{{ $heroBanner->title }}</h2>
                        <p>{{ $heroBanner->subtitle }}</p>
                        <a href="{!! $heroBanner->button_url !!}" class="btn-get-started">{{ $heroBanner->button_text }}</a>
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="content-wrapper">
                        <div class="section-header">
                            <span class="section-badge">ABOUT OUR COMPANY</span>
                            <h2>General Chemical Agro & Speciality Chemical</h2>
                        </div>

                        {{-- <p class="lead-text" style="text-align: justify">Solusi kimia terpadu untuk industri dan pertanian
                            melalui produk yang inovatif, berkualitas, dan berorientasi pada keselamatan serta kinerja
                            optimal.</p> --}}

                        <p class="description-text" style="text-align: justify">{{ $companies->description }}</p>

                        <div class="stats-grid">
                            @foreach ($stats as $stat)
                                <div class="stat-item">
                                    <div class="stat-number">{{ $stat->value }}</div>
                                    <div class="stat-label">{{ $stat->title }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="visual-section">
                        <div class="main-image-container">
                            <img src="{{ asset('assets/img/about-company-2.jpeg') }}" alt="Professional team collaboration"
                                class="img-fluid main-visual">
                            <div class="overlay-card">
                                <div class="card-content">
                                    <h4>{{ $values[0]->title }}</h4>
                                    <p>{{ $values[0]->description }}</p>
                                    <div class="card-icon">
                                        <i class="bi {{ $values[0]->icon }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="secondary-images">
                            <div class="row g-3">
                                <div class="col-6">
                                    <img src="{{ asset('assets/img/about-company-1.jpg') }}" alt="Team meeting"
                                        class="img-fluid secondary-img">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('assets/img/about-company-3.jpeg') }}" alt="Office workspace"
                                        class="img-fluid secondary-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="features-section">
                        <div class="row gy-4">

                            @foreach ($values->skip(1) as $value)
                                <div class="col-md-4">
                                    <div class="feature-box">
                                        <div class="feature-icon">
                                            <i class="bi {{ $value->icon }}"></i>
                                        </div>
                                        <h5>{{ $value->title }}</h5>
                                        <p>{{ $value->description }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <span class="description-title">Products</span> --}}
            <h2>Products</h2>
            <p>Produk - Produk yang kami sediakan</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="tabs-wrapper">
                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    @foreach ($productCategories as $productCategory)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#features-tab-{{ $productCategory->id }}">
                                <div class="tab-icon">
                                    <i class="bi {{ $productCategory->icon }}"></i>
                                </div>
                                <div class="tab-content">
                                    <h5>{{ $productCategory->name }}</h5>
                                    <span>{{ $productCategory->subtitle }}</span>
                                </div>
                            </a>
                        </li><!-- End tab nav item -->
                    @endforeach

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($productCategories as $productCategory)
                        <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}"
                            id="features-tab-{{ $productCategory->id }}">
                            <div class="row align-items-center">

                                <div class="col-lg-5">
                                    <div class="content-wrapper">
                                        <div class="icon-badge">
                                            <i class="bi {{ $productCategory->icon }}"></i>
                                        </div>
                                        <h3>{{ $productCategory->name }}</h3>
                                        <p style="text-align: justify">{{ $productCategory->description }}</p>

                                        <div class="feature-grid">
                                            <div class="feature-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Excepteur sint occaecat cupidatat non proident</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Sunt in culpa qui officia deserunt mollit anim</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>At vero eos et accusamus et iusto odio</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>Et harum quidem rerum facilis est et expedita</span>
                                            </div>
                                        </div>

                                        <a href="#" class="btn-primary">Lihat Selengkapnya<i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="visual-content">
                                        <div class="main-image">
                                            <img src="{{ asset('storage/' . $productCategory->image) }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End tab content item -->
                    @endforeach

                </div>
            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-lg-center">
                <div class="col-lg-5 order-lg-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="image-wrapper position-relative">
                        <div class="floating-card">
                            <i class="bi bi-truck"></i>
                            <h4>Sistem Logistik Terorganisir</h4>
                            <p style="text-align: justify">Proses penyimpanan dan pengiriman dilakukan sesuai standar
                                keamanan dan regulasi yang berlaku.</p>
                        </div>
                        <img src="{{ asset('assets/img/cta.jpg') }}" alt="Security Solutions"
                            class="img-fluid main-image">
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-1 order-lg-1" data-aos="fade-right" data-aos-delay="100">
                    <div class="content-area">
                        <h2>Your Trusted Partner in Chemical Supply and Distribution</h2>
                        <p style="text-align: justify">CV. Nusa Pratama Anugrah menyediakan layanan distribusi dan logistik
                            bahan kimia yang aman, tepat waktu, dan terpercaya untuk berbagai sektor industri. Kami
                            memastikan setiap produk ditangani sesuai standar keselamatan dan regulasi yang berlaku, mulai
                            dari penyimpanan hingga pengiriman ke lokasi pelanggan.</p>

                        <ul class="feature-list">
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Jaringan Distribusi Luas & Efisien</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Melayani Berbagai Sektor Industri</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Menjaga Stabilitas Rantai Pasok</span>
                            </li>
                        </ul>

                        <div class="cta-wrapper">
                            <a href="#" class="btn btn-cta">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Call To Action Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                <div class="swiper-wrapper align-items-center">
                    @foreach ($customers as $customer)
                        <div class="swiper-slide"><img src="{{ asset('storage/' . $customer->logo) }}" class="img-fluid"
                                alt="{{ $customer->name }}"></div>
                    @endforeach
                </div>
            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <span class="description-title">Contact</span> --}}
            <h2>Contact</h2>
            <p>Let’s Connect and Grow Together</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="content" data-aos="fade-up" data-aos-delay="200">
                        <div class="section-category mb-3">Contact US</div>
                        <h2 class="display-5 mb-4">Konsultasikan kebutuhan distribusi Anda</h2>
                        <p class="lead mb-4">Hubungi kami untuk informasi produk, permintaan penawaran, atau kebutuhan
                            distribusi bahan kimia.</p>

                        <div class="contact-info mt-5">
                            <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-envelope-at me-3"></i>
                                <a href="mailto:{{ $companies->email }}"
                                    target="_blank"><span>{{ $companies->email }}</span></a>
                            </div>

                            <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-telephone me-3"></i>
                                <a href="https://wa.me/{{ $companies->phone }}" target="_blank">
                                    <span>+62 {{ $companies->phone }}</span></a>
                            </div>

                            <div class="info-item d-flex mb-4" data-aos="fade-up" data-aos-delay="500">
                                <i class="bi bi-geo-alt me-3"></i>
                                <span>{{ $companies->address }}</span>
                            </div>

                            <a href="https://maps.app.goo.gl/W9k63zuttEL2fC8y9" target="_blank"
                                class="map-link d-inline-flex align-items-center" data-aos="fade-up"
                                data-aos-delay="600">
                                Open Map
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-body p-4 p-lg-5">

                            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                                data-aos-delay="600">
                                <div class="row gy-4">

                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name" required="">
                                    </div>

                                    <div class="col-12 ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Your Email" required="">
                                    </div>

                                    <div class="col-12">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                            required="">
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                    </div>

                                    <div class="col-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button type="submit" class="btn btn-submit w-100">Submit Message</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->

@endsection

@section('scripts')

@endsection
