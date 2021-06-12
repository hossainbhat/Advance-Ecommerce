<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/admin_img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Online Store BD</span>
    </a>

    <!-- Sidebar sections-->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('images/admin_img/admin_photo/'.Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucfirst(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Session::get('page') == 'dashboard')
          <?php $active = "active"; ?>
        @else
          <?php $active = ""; ?>
        @endif
        <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Session::get('page') == 'Admin-Password' || Session::get('page') == 'AdminDetails')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <!-- menu-open -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-plus"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               @if(Session::get('page') == 'Admin-Password')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/setting')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Password</p>
                </a>
              </li>
                @if(Session::get('page') == 'AdminDetails')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/admin-details')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Details</p>
                </a>
              </li>
            </ul>
          </li>
        @if(Session::get('page') == 'sections' || Session::get('page') == 'Categories' || Session::get('page') == 'Products' || Session::get('page') == 'brands' || Session::get('page') == 'banners')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Catalogues
                <i class="right fas fa-plus"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page') == 'sections')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/sections')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
              @if(Session::get('page') == 'brands')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/brands')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
                @if(Session::get('page') == 'Categories')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/categories')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              @if(Session::get('page') == 'Products')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/products')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              @if(Session::get('page') == 'banners')
                  <?php $active = "active"; ?>
                @else
                  <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/banners')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Session::get('page') == 'logout')
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif
          <li class="nav-item">
              <a href="{{url('admin/logout')}}" class="nav-link {{$active}}">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  LogOut
                </p>
              </a>
            </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
