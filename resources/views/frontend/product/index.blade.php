@extends('frontend.layout.base')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container py-5 " data-aos="fade-up">

            <div class="section-title">
                <h2>@if (app()->getLocale()=='en')
                    Product
                    @endif
                    @if (app()->getLocale()=='id')
                    Produk
                    @endif
                </h2>
                <p>
                  @if (app()->getLocale()=='en')
                  All Product
                  @endif
                  @if (app()->getLocale()=='id')
                  Semua Produk
                  @endif
                </p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($category as $c )
                        <li data-filter=".filter-{{ $c->id }}" class="">
                            @if (app()->getLocale()=='en')
                            {{ $c->name_en }}
                            @endif
                            @if (app()->getLocale()=='id')
                            {{ $c->name_id }}
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                @foreach ($product as $p)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $p->category->id }}">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('upload/product/'. $p->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>
                                @if (app()->getLocale()=='en')
                                {{ $p->name_en }}
                                @endif
                                @if (app()->getLocale()=='id')
                                {{ $p->name_id }}
                                @endif
                            </h4>
                            <div class="portfolio-links ">
                                <a href="{{ asset('upload/product/'. $p->image) }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox" title=" @if (app()->getLocale()=='en')
                                  {{ $p->name_en }}
                                  @endif
                                  @if (app()->getLocale()=='id')
                                  {{ $p->name_id }}
                                  @endif"><i class="bx bx-show"></i></a>
                                <a href="{{ route('product.detail', $p->slug) }}" title="More Details"><i
                                        class="bx bx-right-arrow-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </section>
</main>
@endsection