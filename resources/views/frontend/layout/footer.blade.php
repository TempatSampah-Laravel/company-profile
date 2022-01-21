<footer id="footer">
    <div class="footer-top ">
        <div class="container">
            <div class="row ">

                <div class="col-lg-6 col-md-6 d-flex justify-content-start">
                    <div class="footer-info">
                        <img src="{{ asset('upload/config/'.$config->logo) }}" width="15%" />
                        <p>
                            {{ $config->address }}
                            <br>
                            <strong>Phone:</strong> {{ $config->phone }}<br>
                            <strong>Email:</strong> {{ $config->email }}<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="{{ $config->twitter }}" target="_blank" class="twitter"><i
                                    class="bx bxl-twitter"></i></a>
                            <a href="{{ $config->facebook }}" target="_blank" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="{{ $config->instagram }}" target="_blank" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="{{ $config->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                           
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 footer-links d-flex justify-content-lg-around justify-content-md-start">
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">
                                @if (app()->getLocale()=='en')
                                Home
                                @endif
                                @if (app()->getLocale()=='id')
                                Beranda
                                @endif</a></li>
                        {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Spesification</a></li> --}}
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">
                                @if (app()->getLocale()=='en')
                                About Us
                                @endif
                                @if (app()->getLocale()=='id')
                                Tentang Kami
                                @endif</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('product') }}">
                                @if (app()->getLocale()=='en')
                                Product
                                @endif
                                @if (app()->getLocale()=='id')
                                Produk
                                @endif
                            </a></li>
                        {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Workshop</a></li> --}}
                        {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Info</a></li> --}}
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('contact') }}">
                                @if (app()->getLocale()=='en')
                                Contact Us
                                @endif
                                @if (app()->getLocale()=='id')
                                Hubungi Kami
                                @endif</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ $config->nameweb }}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://yh2bae.com/" target="_blank">yh2bae</a>
        </div>
    </div>
</footer>

<div class="joinchat joinchat--right joinchat--show joinchat--tooltip">
    <a href="https://api.whatsapp.com/send?phone={{ $config->whatsapp }}&text=Halo,+Admin+" target="_blank">
      <div class="joinchat__button">
        <div class="joinchat__button__open"></div>
        <div class="joinchat__button__sendtext">WhatsApp Kami</div>
        <div class="joinchat__tooltip">
            <div>
              @if (app()->getLocale()=='en')
              Contact Us
              @endif
              @if (app()->getLocale()=='id')
              Hubungi Kami
              @endif
            </div>
        </div>
    </div>
    </a>
</div>

<style>
  .joinchat {
    margin-right: 3%;
    --bottom:0px;
  }

  @media (min-width: 320px) and (max-width: 480px) {
      .joinchat{
        margin-right: 12%;
        --bottom:0px;
      }
    }
</style>