<div class="sidebar-heading">
  Menu
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-school"></i>
    <span>{{ env('TEXT_SCHOOL', 'Pesantren') }}</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{route('pesantrenadmin.pesantren.edit')}}">Ubah Data {{ env('TEXT_SCHOOL', 'Pesantren') }}</a>
      <a class="collapse-item" href="{{route('pesantrenadmin.admin.index')}}">Admin {{ env('TEXT_SCHOOL', 'Pesantren') }}</a>
    </div>
  </div>
</li>