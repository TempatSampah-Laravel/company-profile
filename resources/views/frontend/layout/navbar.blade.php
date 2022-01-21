<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
        <li><a class="nav-link scrollto {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                @if (app()->getLocale()=='en')
                Home
                @endif
                @if (app()->getLocale()=='id')
                Beranda
                @endif
            </a>
        </li>
        <li><a class="nav-link scrollto {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                @if (app()->getLocale()=='en')
                About Us
                @endif
                @if (app()->getLocale()=='id')
                Tentang Kami
                @endif
            </a>
        </li>
        <li><a class="nav-link scrollto {{ Route::is('product') ? 'active' : '' }}" href="{{ route('product') }}">
                @if (app()->getLocale()=='en')
                Product
                @endif
                @if (app()->getLocale()=='id')
                Produk
                @endif
            </a>
        </li>
        {{-- <li><a class="nav-link scrollto" href="#">Spesification</a></li>
        <li><a class="nav-link scrollto" href="#">Info</a></li> --}}
        <li><a class="nav-link scrollto {{ Route::is('catalog') ? 'active' : '' }}"  href="{{ route('catalog') }}">@if (app()->getLocale()=='en')
            Catalog
            @endif
            @if (app()->getLocale()=='id')
            Katalog
            @endif</a></li>
        <li><a class="nav-link scrollto {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
          @if (app()->getLocale()=='en')
          Contact Us
          @endif
          @if (app()->getLocale()=='id')
          Hubungi Kami
          @endif
      </a>
  </li>
        <li class="dropdown"><a href="#" onclick="return false;">
                <span>
                    @if (app()->getLocale()=='en')
                    <div class="img-lang">
                        <img src="{{ asset('lang/en.png') }}" width="60%" alt="english">
                    </div>
                    @endif
                    @if (app()->getLocale()=='id')
                    <div class="img-lang">
                        <img src="{{ asset('lang/id.png') }}" width="60%" alt="indonesia">
                    </div>
                    @endif
                </span>
                <i class="bi bi-chevron-down icon"></i></a>
            <ul>
                <li><a href="{{ route('localization', 'en') }}">
                        English
                    </a>
                </li>
                <li><a href="{{ route('localization', 'id') }}">Indonesia</a></li>
            </ul>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

<style>
    .icon {
        margin-right: 20%
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .icon {
            margin-right: 0
        }

        .img-lang img {
            width: 40%
        }
    }
</style>