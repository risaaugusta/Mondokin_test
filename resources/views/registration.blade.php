@extends('layouts.landingPage')

@section('content')
    <main id="main">

      <section class="hero-section inner-page">
        <div class="wave">

          <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
              </g>
            </g>
          </svg>

        </div>

        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-md-7 text-center hero-text">
                  <h1 data-aos="fade-up" data-aos-delay="">Pendaftaran Online</h1>
                  <p class="mb-5" data-aos="fade-up" data-aos-delay="100">{{$pesantren->name}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

      <section class="section">
        <div class="container">
          <div class="row mb-5 align-items-end">
            <div class="col-md-6 offset-md-3" data-aos="fade-up">
              <h2>Formulir Pendaftaran</h2>
              @isset($pesantren->Registration->description)  
                {!! $pesantren->Registration->description !!}
              @endisset
              <p class="mb-0">Silahkan isi dan lengkapi semua inputan yang tersedia.</p>
              @isset($pesantren->Registration->offline_document)
                  <a href="{{ asset('storage/'.$pesantren->Registration->offline_document) }}" class="text-info">Download Formulir untuk pendaftaran offline</a>
              @endisset
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 offset-md-3 mb-5 mb-md-0" data-aos="fade-up">
              @include('layouts.alert')
              <form action="{{route('santri.store', $pesantren->slug)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="pesantren_id" value="{{$pesantren->id}}">
                  <h6>Data Santri</h6>
                  <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input name="name" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Email</label>
                      <input name="email" type="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Kelamin</label>
                      <select name="gender" id="" class="form-control" required>
                          <option value="" disabled selected>Pilih Jenis Kelamin</option>
                          <option value="male">Laki-laki</option>
                          <option value="female">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Tempat Lahir</label>
                      <input name="birthplace" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Tanggal Lahir</label>
                      <input name="birthdate" type="date" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Agama</label>
                      <select name="religion" id="" class="form-control" required>
                          <option value="" disabled selected>Pilih Agama</option>
                          <option value="islam">Islam</option>
                          <option value="christian">Kristen</option>
                          <option value="catholic">Katolik</option>
                          <option value="hindu">Hindu</option>
                          <option value="buddha">Budha</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Kode Pos</label>
                      <input name="postal" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Alamat</label>
                      <textarea name="address" id="" cols="" rows="" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="">Jenis Pesantren</label>
                      <select name="pesantren_type_id" id="" class="form-control" required>
                          <option value="" disabled selected>Pilih Jenis Pesantren</option>
                          @foreach ($pesantren->PesantrenType as $type)
                              <option value="{{ $type->id }}">{{ $type->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Pilihan Jenjang</label>
                      <select name="class_id" id="" class="form-control" required>
                          <option value="" disabled selected>Pilih Jenjang</option>
                          @foreach ($pesantren->Classes as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Telepon</label>
                      <input name="phone" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="">Foto</label>
                      <input name="photo" type="file" class="form-control">
                  </div>
                  <hr>
                  @isset($pesantren->Registration->requirement)
                    <h5>Lampiran / Syarat</h5>
                    {!! $pesantren->Registration->requirement !!}    
                  @endisset
                  <button type="submit" class="btn btn-primary" style="width: 100%">Daftar</button>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= CTA Section ======= -->
      <section class="section cta-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 mr-auto text-center text-md-left mb-5 mb-md-0">
              <h2>Starts Publishing Your Apps</h2>
            </div>
            <div class="col-md-5 text-center text-md-right">
              <p><a href="#" class="btn"><span class="icofont-brand-apple mr-3"></span>App store</a> <a href="#" class="btn"><span class="icofont-ui-play mr-3"></span>Google play</a></p>
            </div>
          </div>
        </div>
        </div>
      </section><!-- End CTA Section -->

    </main><!-- End #main -->
@endsection