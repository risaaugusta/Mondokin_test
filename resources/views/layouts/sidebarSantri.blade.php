<div class="sidebar-heading">
  Menu
</div>

<li class="nav-item">
  <a class="nav-link" href="{{route('santri.tahfidz.index')}}">
    <i class="fas fa-fw fa-book"></i>
    <span>Tahfidz</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{route('santri.report.index')}}">
    <i class="fas fa-fw fa-book"></i>
    <span>Rapot</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-envelope"></i>
    <span>Chat</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Sub Menu:</h6>
      <a class="collapse-item" href="{{ route('santri.chat.index', 'administration') }}">Admin Administrasi</a>
      <a class="collapse-item" href="{{ route('santri.chat.index', 'finance') }}">Admin Keuangan</a>
    </div>
  </div>
</li>