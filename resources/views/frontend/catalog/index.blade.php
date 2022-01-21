@extends('frontend.layout.base')

@section('content')
<main id="main">
    <section id="catalog" class="catalog">
        <div class="container mt-5" data-aos="fade-up">

            <div class="section-title">
                <h2>
                    @if (app()->getLocale()=='en')
                    Catalog
                    @endif
                    @if (app()->getLocale()=='id')
                    Katalog
                    @endif
                </h2>
                <p>
                    @if (app()->getLocale()=='en')
                    Catalog Us
                    @endif
                    @if (app()->getLocale()=='id')
                    Katalog Kami
                    @endif
                </p>
            </div>

            <div class="row">

              @foreach ( $catalog as $catalog )
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="item" data-aos="fade-up" data-aos-delay="100">
                    <div class="item-img">
                        <img src="{{ asset('upload/catalog/'. $catalog->image) }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href="{{ asset('upload/catalog/'.$catalog->pdf) }}"><i class="bi bi-download"></i></a>
                        </div>
                    </div>
                    <div class="item-info">
                        <h4> 
                            @if (app()->getLocale()=='en')
                            {{ $catalog->name_en }}
                            @endif
                            @if (app()->getLocale()=='id')
                            {{ $catalog->name_id }}
                            @endif
                        </h4>
                        <span>
                            @if (app()->getLocale()=='en')
                            {{ $catalog->description_en }}
                            @endif
                            @if (app()->getLocale()=='id')
                            {{ $catalog->description_id }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
              @endforeach

            </div>

        </div>
    </section>
</main>
@endsection