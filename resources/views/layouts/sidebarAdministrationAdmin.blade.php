<div class="sidebar-heading">
  Menu
</div>

{{-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-book"></i>
    <span>Mata Pelajaran</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('administrationadmin.subject.index')}}">Daftar Mata Pelajaran</a>
    </div>
  </div>
</li> --}}

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
    <i class="fas fa-fw fa-chalkboard"></i>
    <span>Jenjang</span>
  </a>
  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('administrationadmin.class.index')}}">Daftar Jenjang</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-chalkboard-teacher"></i>
    <span>{{ env('TEXT_TEACHER', 'Asatidz') }}</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('administrationadmin.asatidz.index')}}">Daftar {{ env('TEXT_TEACHER', 'Asatidz') }}</a>
      <a class="collapse-item" href="{{route('administrationadmin.asatidzschedule.createBulk')}}">Tambah Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }}</a>
      <a class="collapse-item" href="{{route('administrationadmin.asatidzschedule.index')}}">Daftar Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }}</a>
      <a class="collapse-item" href="{{route('administrationadmin.asatidzabsent.index')}}">Absen {{ env('TEXT_TEACHER', 'Asatidz') }}</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fas fa-fw fa-user"></i>
    <span>{{ env('TEXT_STUDENT', 'Murid') }}</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('administrationadmin.santri.index')}}">Daftar {{ env('TEXT_STUDENT', 'Murid') }}</a>
      <a class="collapse-item" href="{{route('administrationadmin.santri.create')}}">Tambah {{ env('TEXT_STUDENT', 'Murid') }}</a>
      <a class="collapse-item" href="{{route('administrationadmin.report.index')}}">Rapot</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
    <i class="fas fa-fw fa-location-arrow"></i>
    <span>Pendaftaran {{ env('TEXT_STUDENT', 'Santri') }}</span>
  </a>
  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('administrationadmin.registration.index')}}">Registrasi Online</a>
      <a class="collapse-item" href="{{route('administrationadmin.santri.verification')}}">Verifikasi {{ env('TEXT_STUDENT', 'Santri') }} Baru</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('administrationadmin.pesantrentype.index')}}">
    <i class="fas fa-fw fa-list"></i>
    <span>Tipe {{ env('APP_TYPE') == 'school' ? 'Sekolah' : 'Pesantren' }}</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('administrationadmin.announcement.index')}}">
    <i class="fas fa-fw fa-bullhorn"></i>
    <span>Pengumuman</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('administrationadmin.chat.index')}}">
    <i class="fas fa-fw fa-envelope"></i>
    <span>Chat</span>
  </a>
</li>