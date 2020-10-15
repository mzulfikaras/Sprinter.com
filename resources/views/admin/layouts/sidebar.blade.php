<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Digital Admin <sup>6</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.index')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Admin Pages:</h6>
          <a class="collapse-item" href="{{route('blog.index')}}">Blog Table</a>
          <a class="collapse-item" href="{{route('author.index')}}">Author Table</a>
          <a class="collapse-item" href="{{route('kategori.index')}}">Kategori Table</a>
          <a class="collapse-item" href="{{route('subkategori.index')}}">SubKategori Table</a>
          <a class="collapse-item" href="{{route('tags.index')}}">Tags Table</a>
          <a class="collapse-item" href="{{route('status.index')}}">Status Table</a>
          <a class="collapse-item" href="{{route('about.index')}}">About Table</a>
          <a class="collapse-item" href="{{route('contact.index')}}">Contact Table</a>
          <h6 class="collapse-header">User Pages:</h6>
          <a class="collapse-item" href="#">About Table</a>
          <a class="collapse-item" href="{{route('contact.user.index')}}">Contact User Table</a>
          <div class="collapse-divider"></div>
        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>