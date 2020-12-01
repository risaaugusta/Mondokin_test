<div class="sidebar-heading">
  Menu
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-money-bill"></i>
    <span>Gaji {{ env('TEXT_TEACHER', 'Asatidz') }}</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('financeadmin.salary.create')}}">Bayar Gaji</a>
      <a class="collapse-item" href="{{route('financeadmin.salary.unreceived')}}">Menunggu Konfirmasi</a>
      <a class="collapse-item" href="{{route('financeadmin.salary.index')}}">Histori Gaji</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-file-invoice"></i>
    <span>Tagihan</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('financeadmin.bill.index')}}">Daftar Tagihan</a>
      <a class="collapse-item" href="{{route('financeadmin.bill.create')}}">Buat Tagihan</a>
      <a class="collapse-item" href="{{route('financeadmin.billTransaction.unpaid')}}">Tagihan Belum Terbayar</a>
      <a class="collapse-item" href="{{route('financeadmin.billTransaction.confirm')}}">Tagihan Konfirmasi</a>
      <a class="collapse-item" href="{{route('financeadmin.billTransaction.index')}}">Histori Tagihan</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fas fa-fw fa-donate"></i>
    <span>Tabungan</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('financeadmin.topup.create')}}">Top Up</a>
      <a class="collapse-item" href="{{route('financeadmin.topup.index')}}">List Top Up</a>
      <a class="collapse-item" href="{{route('financeadmin.topup.santri')}}">Saldo {{ env('TEXT_STUDENT', 'Santri') }}</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('financeadmin.chat.index')}}">
    <i class="fas fa-fw fa-envelope"></i>
    <span>Chat</span>
  </a>
</li>