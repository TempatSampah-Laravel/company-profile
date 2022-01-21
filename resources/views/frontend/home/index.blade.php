@extends('frontend.layout.base')


@section('content')
<section id="hero" class="d-flex align-items-center justify-content-center"
    style="background: url({{ asset('upload/banner/'.$banner->image) }}) top center; background-size:cover;">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>
                    @if (app()->getLocale()=='en')
                    {{ $banner->title_en }}
                    @endif
                    @if (app()->getLocale()=='id')
                    {{ $banner->title_id }}
                    @endif
                    <span>.</span>
                </h1>
                <h2>
                    @if (app()->getLocale()=='en')
                    {{ $banner->description_en }}
                    @endif
                    @if (app()->getLocale()=='id')
                    {{ $banner->description_id }}
                    @endif
                </h2>
                <br>
                <a href="#about" class="btn btn-warning px-5 py-3" style="border-radius: 24px;"><strong> @if (app()->getLocale()=='en')
                    About Us
                    @endif
                    @if (app()->getLocale()=='id')
                    Tentang Kami
                    @endif</strong></a>
            </div>
        </div>


    </div>
</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= product Section ======= -->

    <section id="visimisi" class="visimisi">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                {{-- <h2>visimisi</h2> --}}
                <p>
                    @if (app()->getLocale()=='en')
                    Vision & Mission
                    @endif
                    @if (app()->getLocale()=='id')
                    Visi & Misi
                    @endif
                </p>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6  align-items-stretch aos-init aos-animate" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-show"></i></div>
                        <h4>
                            <a href="">
                                @if (app()->getLocale()=='en')
                                Vision
                                @endif
                                @if (app()->getLocale()=='id')
                                Visi
                                @endif
                            </a>
                        </h4>
                        <p>
                            @if (app()->getLocale()=='en')
                            {{ $about->vision_en }}
                            @endif
                            @if (app()->getLocale()=='id')
                            {{ $about->vision_id }}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6  align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-rocket"></i></div>
                        <h4>
                            <a href="">
                                @if (app()->getLocale()=='en')
                                Mision
                                @endif
                                @if (app()->getLocale()=='id')
                                Misi
                                @endif
                            </a>
                        </h4>
                        <p>
                            @if (app()->getLocale()=='en')
                            {{ $about->mission_en }}
                            @endif
                            @if (app()->getLocale()=='id')
                            {{ $about->mission_id }}
                            @endif
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>
                    @if (app()->getLocale()=='en')
                    About
                    @endif
                    @if (app()->getLocale()=='id')
                    Tentang
                    @endif
                </h2>
                <p>
                    @if (app()->getLocale()=='en')
                    {{ $about->title_en}}
                    @endif
                    @if (app()->getLocale()=='id')
                    {{ $about->title_id}}
                    @endif
                </p>
            </div>

            <div class="row ">
                <div class="col-lg-6 order-1 p-0 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('upload/about/'.$about->image) }}" class="img-fluid" alt="img">
                </div>
                <div class="col-lg-6 p-5 tulisan-about about-bgcolor order-2 order-lg-1 content" data-aos="fade-right"
                    data-aos-delay="100">
                    <p>
                        @if (app()->getLocale()=='en')
                        {!! $about->content_en!!}
                        @endif
                        @if (app()->getLocale()=='id')
                        {!! $about->content_id!!}
                        @endif
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    {{-- service --}}
    <section id="services" class="services">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Check our Services</p>
            </div>

            <div class="row">
                @foreach ( $service as $s)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="icon-box service-box">
                        <div class="icon"><i class="{{ $s->icon }}"></i></div>
                        <h4><a href="">
                                @if (app()->getLocale()=='en')
                                {{ $s->name_en }}
                                @endif
                                @if (app()->getLocale()=='id')
                                {{ $s->name_id }}
                                @endif</a></h4>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>



    @if($certificate->isEmpty())
    {{-- Data Null --}}
    @else
    <section id="certificate" class="certificate">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>
                    @if (app()->getLocale()=='en')
                    Certification
                    @endif
                    @if (app()->getLocale()=='id')
                    Sertifikat
                    @endif
                </h2>
                <p>
                    @if (app()->getLocale()=='en')
                    Certification and Autorization
                    @endif
                    @if (app()->getLocale()=='id')
                    Sertifikasi dan Otorisasi
                    @endif
                </p>
            </div>

            <div class="row certificate-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($certificate as $certificate)
                <div class="col-lg-4 col-md-6 certificate-item">
                    <div class="certificate-wrap">
                        <img src="{{ asset('upload/certificate/'. $certificate->image) }}" class="img-fluid" alt="">
                        <div class="certificate-info">
                            <h4>{{ $certificate->name }}</h4>
                            <div class="certificate-links">
                                <a href="{{ asset('upload/certificate/'. $certificate->image) }}"
                                    data-gallery="certificateGallery" class="portfolio-lightbox"
                                    title="{{ $certificate->name }}"><i class="bx bx-show"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </section>
    <!-- End About Section -->

    @endif

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">
            <div class="section-title">
                <h2>@if (app()->getLocale()=='en')
                    Clients
                    @endif
                    @if (app()->getLocale()=='id')
                    Pelanggan
                    @endif </h2>
                <p>@if (app()->getLocale()=='en')
                    Client Us
                    @endif
                    @if (app()->getLocale()=='id')
                    Pelanggan Kami
                    @endif </p>
            </div>

            <div class="clients-slider swiper mt-5">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($client as $c)
                    <div class="swiper-slide"><img src="{{ asset('upload/client/'.$c->image) }}" class="img-fluid"
                            alt="">
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination mt-5"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->

</main><!-- End #main -->
@endsection