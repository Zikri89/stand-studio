<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Menu</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
            <i class="mdi mdi-archive menu-icon"></i>
            <span class="menu-title">Produk</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="product">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('product')}}">Create Data</a></li>
              <li class="nav-item"> <a class="nav-link" href="/list/product">List Data</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tracking">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Tracking</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Master</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('master')}}">Create Data</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>