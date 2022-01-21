@extends('frontend.layout.base')
@section('content')
    <main id="main">
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container py-5" data-aos="fade-up">
          
          <div class="section-title">
            <h2>
                @if (app()->getLocale()=='en')
                    Contact
                    @endif
                    @if (app()->getLocale()=='id')
                    Kontak
                @endif</h2>
            <p>@if (app()->getLocale()=='en')
                    Contact Us
                    @endif
                    @if (app()->getLocale()=='id')
                    Hubungi Kami
                @endif</p>
          </div>
          
          <div class="map-responsive rounded">{!! $config->google_maps !!}</div>
          
          <div class="row mt-5 pt-5">
            
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>@if (app()->getLocale()=='en')
                    Address :
                    @endif
                    @if (app()->getLocale()=='id')
                    Alamat :
                @endif</h4>
                  <p> {{ $config->address }}</p>
                </div>
                
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{ $config->email }}</p>
                </div>
                
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>@if (app()->getLocale()=='en')
                    Phone :
                    @endif
                    @if (app()->getLocale()=='id')
                    Telepon :
                @endif</h4>
                  <p>{{ $config->phone }}</p>
                </div>
                
              </div>
              
            </div>
            
            <div class="col-lg-8 mt-5 mt-lg-0">
              
              <form action="{{ route('send.message') }}" method="POST"  class="php-email-form">
                @csrf
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="@if (app()->getLocale()=='en') Enter your name @endif @if (app()->getLocale()=='id') Masukkan nama anda @endif" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="@if (app()->getLocale()=='en') Enter your email @endif @if (app()->getLocale()=='id') Masukkan email anda @endif" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control  @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="@if (app()->getLocale()=='en') Subject @endif @if (app()->getLocale()=='id') Subjek @endif" value="{{ old('subject') }}">
                  @error('subject')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control  @error('message') is-invalid @enderror" name="message" rows="5" placeholder="@if (app()->getLocale()=='en') Message @endif @if (app()->getLocale()=='id') Pesan @endif">{{ old('message') }}</textarea>
                  @error('message')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit">@if (app()->getLocale()=='en')
                  Send Message @endif @if (app()->getLocale()=='id') Mengirim Pesan @endif</button>
                </div>
              </form>
              
            </div>
            
          </div>
          
        </div>
      </section><!-- End Contact Section -->
    </main>

<style>
.map-responsive{
    overflow:hidden;
    padding-bottom:25%;
    position:relative;
    height:0;
}

.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

 @media (min-width: 320px) and (max-width: 480px) {
     .map-responsive{
    padding-bottom:80%;
}
 } 
</style>
@endsection