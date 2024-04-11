<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('/assets/dist/img/slogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Smart Farming</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/assets/dist/img/adminlte.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" onclick="activeclass(e)" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/contacts" class="nav-link {{ Request::is('orderList') ? 'active' : '' }}">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile/{{ session('user_id') }}" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item menu-is-opening ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Masters
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item ">
                            <a href="/products" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/subproducts" class="nav-link {{ Request::is('subproducts') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pincode" class="nav-link {{ Request::is('pincode') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pincode</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link {{ Request::is('register') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Registration
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-is-opening ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            User Details
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/customers" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/farmers" class="nav-link {{ Request::is('farmers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Farmer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/agents" class="nav-link {{ Request::is('agents') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agent List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/assistants" class="nav-link {{ Request::is('assistants') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assistant List</p>
                            </a>
                        </li>

                    </ul>
                    <li class="nav-item menu-is-opening ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Product Price
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item ">
                                <a href="/cpprice" class="nav-link {{ Request::is('cpprice') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer Product Price</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/apprice" class="nav-link {{ Request::is('apprice') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agent Product Price</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/contacts" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">
                            <i class="fas fa-envelope nav-icon"></i>
                            <p>Contact Messages</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/changePassword" class="nav-link {{ Request::is('change') ? 'active' : '' }}">
                            <i class="fas fa-key nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
