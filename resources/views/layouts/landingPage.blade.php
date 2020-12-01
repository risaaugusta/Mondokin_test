<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ env('APP_TYPE') == 'school' ? 'Sistem Informasi Digital Sekolah' : 'Portal Pondok Pesantren Indonesia' }}</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{asset('images/logo-type-green.png')}}" />
  <link href="{{asset('images/logo-type-green.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/landingpage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/landingpage/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/landingpage/vendor/aos/aos.css" rel="stylesheet">
  <link href="/landingpage/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="/landingpage/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/landingpage/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SoftLand - v2.0.0
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @laravelPWA
</head>

<body>

  <!-- ======= Mobile Menu ======= -->
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <!-- ======= Header ======= -->
  <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-lg-2">
          <h1 class="mb-0 site-logo"><a href="/" class="mb-0">{{ env('APP_TYPE') == 'school' ? 'SIDIGS' : 'MONDOK' }}</a></h1>
        </div>

        <div class="col-12 col-md-10 d-none d-lg-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li class="active"><a href="{{route('landingpage')}}" class="nav-link">Home</a></li>
              <li class="active"><a href="#services" class="nav-link">Services</a></li>
              <li class="active"><a href="#about" class="nav-link">About Us</a></li>
              <li class="active"><a href="#testimoni" class="nav-link">Testimoni</a></li>
              <li><a href="{{route('pesantren.public.all')}}" class="nav-link">Pesantren dan Sekolah</a></li>
              <li><a href="{{route('login')}}" class="nav-link">Masuk</a></li>
            </ul>
          </nav>
        </div>

        <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

          <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>

      </div>
    </div>

  </header>

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>About {{ env('APP_NAME') }}</h3>
          <p>
            {{ env('APP_NAME') }} adalah aplikasi yang dibangun oleh anak bangsa, sudah mulai digunakan pada tahun 2019 dan resmi dilaunching pada 2020. Awalnya aplikasi ini request dari salah satu rekan kami yang memiki pondok pesantren dan berkeinginan besar untuk dibuatkan aplikasi agar dapat go digital dan tidak ketinggalan zaman.
          </p>
          <p class="social">
            <a href="#"><span class="icofont-twitter"></span></a>
            <a href="#"><span class="icofont-facebook"></span></a>
            <a href="#"><span class="icofont-dribbble"></span></a>
            <a href="#"><span class="icofont-behance"></span></a>
          </p>
        </div>
        <div class="col-md-7 ml-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Navigation</h3>
              <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#services">Service</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Services</h3>
              <ul class="list-unstyled">
                <li><a href="#">Team</a></li>
                <li><a href="#">Collaboration</a></li>
                <li><a href="#">Pesantren</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Downloads</h3>
              <ul class="list-unstyled">
                <li><a href="#">Get from the App Store</a></li>
                <li><a href="#">Get from the Play Store</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">&copy; Copyright Mondok. All Rights Reserved</p>
        </div>
      </div>

    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="/landingpage/vendor/jquery/jquery.min.js"></script>
  <script src="/landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/landingpage/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/landingpage/vendor/php-email-form/validate.js"></script>
  <script src="/landingpage/vendor/aos/aos.js"></script>
  <script src="/landingpage/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/landingpage/vendor/jquery-sticky/jquery.sticky.js"></script>

  <!-- Template Main JS File -->
  <script src="/landingpage/js/main.js"></script>

</body>

</html>