<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>{{ $config->nameweb }} | {{ $title_page }}</title>
  <meta content="{{ $config->nameweb }}" name="title" />
  <meta content="{{ $config->description }}" name="description" />
  <Meta content="{{ $config->keywords }}" name="keywords"/>
  
  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('upload/config/'. $config->icon) }}">
  <link href="{{ asset('upload/config/'. $config->icon) }}" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{ asset('admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/joinchat.min.css') }}" rel="stylesheet">
  
  <!-- =======================================================
    * Template Name: Gp - v4.6.0
    * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>
  
  <body>
    
    <!-- ======= Header ======= -->  
  @if (request()->routeIs('home'))
  <header id="header" class="fixed-top " >
    <div class="container d-flex align-items-center justify-content-lg-between">
    
    <h1 class="logo me-auto me-lg-0"><a href="{{ route('home') }}">
      <img src="{{ asset('upload/config/'.$config->logo) }}" alt="logo" width="100%">
    </a></h1>    
    
    @include('frontend.layout.navbar')    
    </div>
  </header>    
  @else
    <header id="header" class="fixed-top " style="background-color:black" >
    <div class="container d-flex align-items-center justify-content-lg-between">
    
    <h1 class="logo me-auto me-lg-0"><a href="{{ route('home') }}">
      <img src="{{ asset('upload/config/'.$config->logo) }}" alt="logo" width="100%">
    </a></h1>    
    
    @include('frontend.layout.navbar')    
    </div>
  </header>
  @endif
  <!-- End Header -->

    
    <!-- ======= Hero Section ======= -->
  @yield('content')
  
  @include('frontend.layout.footer')
  <!-- End Footer -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  {{-- <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script> --}}
  <script src="{{asset('frontend/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script>
    @if ($message = Session::get('success'))
    Swal.fire({
    title: 'Success',
    text: "<?php echo $message ?>",
    icon: 'success',
    })
    @endif

    @if ($message = Session::get('error'))
    // Notifikasi
    Swal.fire({
    title: 'Opsss...',
    text: "<?php echo $message ?>",
    icon:'error',
    })
    @endif
</script>
  
  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  {{-- <script src="{{ asset('frontend/js/joinchat.js') }}"></script> --}}
  
</body>

</html>