 @extends('frontend.layout.base')

 @section('content')
<main id="main">
<section id="about" class="about">
    <div class="container pt-5" data-aos="fade-up">
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
</section>
     <section id="visimisi" class="visimisi">
        <div class="container" data-aos="fade-up">

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
</main>    
 @endsection

 