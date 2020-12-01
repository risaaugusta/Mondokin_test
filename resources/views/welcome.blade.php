@extends('layouts.landingPage')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section class="hero-section" id="hero">

      <div class="wave">

        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>

      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 hero-text-image">
            <div class="row" style="margin-top: -100px">
              <div class="col-lg-7 text-center text-lg-left">
                <h2 class="text-light" data-aos="fade-right">SOLUSI ADMINISTRASI {{ env('APP_TYPE') == 'school' ? 'SEKOLAH' : 'PONDOK PESANTREN' }} HANYA LEWAT GADGET !</h2>
                <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#" class="btn btn-outline-white">coba gratis disini</a></p>
              </div>
              <div class="col-lg-5 iphone-wrap">
                <img src="/landingpage/img/screenshot.jpeg" alt="Image" class="phone-1" data-aos="fade-right">
                <img src="/landingpage/img/screenshot-2.jpeg" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Hero -->

    <main id="main">

      <!-- ======= Home Section ======= -->
      <section class="section" id="services">
        <div class="container">

          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-10" data-aos="fade-up">
              <h3 class="section-heading">Temukan 10 kemudahan dalam 1 Aplikasi {{ env('APP_TYPE') == 'school' ? 'Sekolah' : 'Mondok' }}</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-users"></span>
                </div>
                <h3 class="mb-3">Explore Your Team</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-toggle-off"></span>
                </div>
                <h3 class="mb-3">Digital Whiteboard</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-1 text-center">
                <div class="wrap-icon icon-1">
                  <span class="icon la la-umbrella"></span>
                </div>
                <h3 class="mb-3">Design To Development</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
              </div>
            </div>
          </div>

        </div>
      </section>

      <section class="section">

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="step" style="min-height: 300px">
                <span class="number">01</span>
                <h3 style="min-height: 100px">Pendaftaran cukup 5 menit</h3>
                <p>Yuk daftar sekarang juga dan download aplikasinya.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step" style="min-height: 300px">
                <span class="number">02</span>
                <h3 style="min-height: 100px">Custom fiturnya sesuai ponpes anda</h3>
                <p>Kami akan berikan pelayanan sesuai kebutuhan ponpes anda. </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="step" style="min-height: 300px">
                <span class="number">03</span>
                <h3 style="min-height: 100px">Mudah digunakan dan Multiplatform</h3>
                <p>Aplikasi ini mudah digunakan dan juga multiplatform dapat digunakan di web dan hp</p>
              </div>
            </div>
          </div>
        </div>

      </section>

      <section class="section" id="about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mr-auto">
              <h2 class="mb-4">Sejarah Mondok Apps</h2>
              <p class="mb-4">Mondok Apps adalah aplikasi yang dibangun oleh anak bangsa, sudah mulai digunakan pada tahun 2019 dan resmi dilaunching pada 2020. Awalnya aplikasi ini request dari salah satu rekan kami yang memiki pondok pesantren dan berkeinginan besar untuk dibuatkan aplikasi agar dapat go digital dan tidak ketinggalan zaman. namun betapa terkejutnya kami ternyata aplikasi ini sangat solutif dan menuai kepuasan dari client kami. sehingga di tahun 2020 ini kami berkomitmen untuk fokus mengembangkan aplikasi ini. tidak hanya itu kami berharap dapat berkontribusi untuk kemajuan pondok pesantren diseluruh Indonesia dan tentunya juga kemajuan Islam.</p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
              <img src="https://assets-a1.kompasiana.com/items/album/2019/10/05/channelmuslim-5d9817360d823046db64fef2.jpg" alt="Image" class="img-fluid img-thumbnail">
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 ml-auto order-2">
              <h2 class="mb-4">Tips & Trick Mondok</h2>
              <p class="mb-4">
                Banyaknya permintaan dari pondok pesantren di sekitar kami membuat kami terus mengembangkan aplikasi ini hingga versi tidak terhingga. 
                Yuk baca tips & trick nya :
                <ol>
                  <li>Pelajari aplikasi demo dan fitur-fiturnya</li>
                  <li>Anda bisa custom sesuai kebutuhan ponpes anda</li>
                  <li>Tonton Youtube kami untuk meilhat tutorial penggunaan aplikasi ini</li>
                  <li>Hubungi CS untuk mendaftarkan pondok anda</li>
                  <li>Kami siap untuk presentasi offline maupun secara online</li>
                </ol>
                Selamat menggunakan aplikasi Mondok ^^
              </p>
            </div>
            <div class="col-md-4" data-aos="fade-right">
              <img src="/landingpage/img/undraw_svg_3.svg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </section>

      <!-- ======= Testimonials Section ======= -->
      <section class="section border-top border-bottom" id="testimoni">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-10">
              <h2 class="section-heading">Pesan penting dari mereka yang sudah menggunakan Mondok</h2>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-7">
              <div class="owl-carousel testimonial-carousel">
                <div class="review text-center">
                  <p class="stars">
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star muted"></span>
                  </p>
                  <h3>Go Global Go Digital!</h3>
                  <blockquote>
                    <p>lhamdulillah setelah memakai aplikasi Mondok kini kami bisa mewujudkan Yahtadi One Gate System, sangat membantu kami selaku pengasuh untuk memantau semua tranksaksi dan administrasi Pegawai dan Santri,terlebih semua tim Mondok sangat responsif tiap kali ada problem dari admin2 kami...  Go Global Go Digital</p>
                  </blockquote>

                  <p class="review-user">
                    <img src="{{ asset('landingpage/img/yahtadi.png') }}" alt="Image" class="img-fluid rounded-circle mb-3">
                    <span class="d-block">
                      <span class="text-black">Bu Nyai Husnia</span> &mdash; Yayasan Hidayatul Mubtadi'in
                    </span>
                  </p>

                </div>

                <div class="review text-center">
                  <p class="stars">
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star"></span>
                    <span class="icofont-star muted"></span>
                  </p>
                  <h3>Menyambut Era Digital!</h3>
                  <blockquote>
                    <p>
                      Alhamdulillah setelah menggunakan aplikasi Mondok.  Saat ini pengurus PPT Al Mumtaz lebih mudah dalam mengelola data siswa, keuangan, pegawai, dan kegiatan sivitas Al Mumtaz. Lebih-lebih dalam menyambut era digital saat ini peran aplikasi penunjang sangatlah vital.
Terimakasih admin Mondok yang responsif dalam menangani problem kami.. 
                    </p>
                  </blockquote>

                  <p class="review-user">
                    <img src="{{ asset('landingpage/img/almumtaz.png') }}" alt="Image" class="img-fluid rounded-circle mb-3">
                    <span class="d-block">
                      <span class="text-black">Tim media</span>, PP Almumtaz
                    </span>
                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Testimonials Section -->

      <!-- ======= CTA Section ======= -->
      <section class="section cta-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mr-auto text-center text-md-left mb-5 mb-md-0">
              <h2>YUK DOWNLOAD APP {{ env('APP_NAME') }} DI HP KAMU!</h2>
            </div>
            <div class="col-md-5 text-center text-md-right">
              <p>
                <a href="#" class="btn"><span class="icofont-brand-apple mr-3"></span>App store</a>
                <a href="#" class="btn"><span class="icofont-ui-play mr-3"></span>Google play</a>
              </p>
            </div>
          </div>
        </div>
        </div>
      </section><!-- End CTA Section -->

    </main><!-- End #main -->
@endsection