<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        @if (env('APP_TYPE') == 'school')
            <span>SIDIGS</span>
        @else
            <img src="{{asset('images/logo-text-white.svg')}}" alt="logo" class="d-none d-lg-block">
            <img src="{{asset('images/logo-type-white.svg')}}" alt="logo" class="d-lg-none">
        @endif
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      @switch(Auth::user()->role)
          @case('super_admin')
                @include('layouts.sidebarSuperAdmin')
              @break
          @case('pesantren_admin')
                @include('layouts.sidebarPesantrenAdmin')
              @break
          @case('administration_admin')
                @include('layouts.sidebarAdministrationAdmin')
              @break
          @case('finance_admin')
                @include('layouts.sidebarFinanceAdmin')
              @break
          @case('asatidz')
                @include('layouts.sidebarAsatidz')
              @break
          @case('santri')
                @include('layouts.sidebarSantri')
              @break
      @endswitch

      {{-- <!-- Example Menu -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> --}}

    </ul>
    <!-- End of Sidebar -->