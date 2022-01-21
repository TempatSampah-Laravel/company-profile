@extends('frontend.layout.base')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container py-3">

            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    @if (app()->getLocale()=='en')
                    Product Detail {{ $product->name_en }}
                    @endif
                    @if (app()->getLocale()=='id')
                    Detail Produk {{ $product->name_id }}
                    @endif
                </h2>
                <ol>
                    <li><a href="{{ route('product') }}">
                            @if (app()->getLocale()=='en')
                            Product
                            @endif
                            @if (app()->getLocale()=='id')
                            Produk
                            @endif
                        </a>
                    </li>
                    <li>
                        @if (app()->getLocale()=='en')
                        Product Detail
                        @endif
                        @if (app()->getLocale()=='id')
                        Detail Produk
                        @endif
                    </li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="image">
                        <img src="{{ asset('upload/product/'.$product->image) }}" alt="" width="100%" class="rounded">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>
                            @if (app()->getLocale()=='en')
                            Product Information
                            @endif
                            @if (app()->getLocale()=='id')
                            Informasi Produk
                            @endif
                        </h3>
                        <ul>
                            <li><strong>@if (app()->getLocale()=='en')
                              Category
                              @endif
                              @if (app()->getLocale()=='id')
                              Kategori
                              @endif</strong>: @if (app()->getLocale()=='en')
                              {{ $product->category->name_en }}
                              @endif
                              @if (app()->getLocale()=='id')
                              {{ $product->category->name_id }}
                              @endif</li>
                            <li><strong>@if (app()->getLocale()=='en')
                              Product Name
                              @endif
                              @if (app()->getLocale()=='id')
                              Nama Product
                              @endif</strong>: @if (app()->getLocale()=='en')
                              {{ $product->name_en }}
                              @endif
                              @if (app()->getLocale()=='id')
                              {{ $product->name_id }}
                              @endif</li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>
                          @if (app()->getLocale()=='en')
                          Product Detail Description
                          @endif
                          @if (app()->getLocale()=='id')
                          Deskripsi Detail Produk
                          @endif
                        </h2>
                        <p>
                          @if (app()->getLocale()=='en')
                          {{ $product->description_en }}
                          @endif
                          @if (app()->getLocale()=='id')
                          {{ $product->description_id }}
                          @endif
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->
@endsection