<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/dist/img/slogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Smart Farming</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/dist/img/adminlte.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Agent</a>
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
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
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
                            <a href="product" class="nav-link {{ Request::is('agent/product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="commission" class="nav-link {{ Request::is('commission') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Commission</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item menu-is-opening ">
                    <a href="#" class="nav-link {{ Request::is('agent/purchase') ? 'active' :  Request::is('agent/purchasebill') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Purchase
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item ">
                            <a href="purchase" class="nav-link {{ Request::is('agent/purchase') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchase Entry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="purchasebill" class="nav-link {{ Request::is('agent/purchasebill') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchase Details</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item menu-is-opening ">
                    <a href="#" class="nav-link  {{ Request::is('agent/sale') ? 'active' :  Request::is('agent/salebill') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Sale
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item ">
                            <a href="sale" class="nav-link {{ Request::is('agent/sale') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale Entry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="salebill" class="nav-link {{ Request::is('agent/salebill') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale Details</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="profile" class="nav-link {{ Request::is('agent/profile') ? 'active' : '' }}">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/agent/changePassword" class="nav-link {{ Request::is('agent/changePassword') ? 'active' : '' }}">
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
                {{-- <li class="nav-item">
                    <a href="register" class="nav-link {{ Request::is('register') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Registration
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Registration Masters
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="customers" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="farmers" class="nav-link {{ Request::is('farmers') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Farmer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="agents" class="nav-link {{ Request::is('agents') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agent List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="assistants" class="nav-link {{ Request::is('assistants') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assistant List</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
