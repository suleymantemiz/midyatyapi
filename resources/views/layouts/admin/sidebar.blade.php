  <!-- Sidebar Start -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{ asset('assets/images/logos/logo.svg')}}" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-6"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Anasayfa</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
              <i class="ti ti-atom"></i>
              <span class="hide-menu">Admin Panel</span>
            </a>
          </li>
          <!-- ---------------------------------- -->
          <!-- Dashboard -->
          <!-- ---------------------------------- -->
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="{{ route('estate.index') }}" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                <i class="ti ti-layout"></i>
                </span>
                <span class="hide-menu">İlanlar</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="{{ route('users.index') }}" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Kullanıcılar</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-layout-grid"></i>
                </span>
                <span class="hide-menu">Front Pages</span>
              </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Homepage</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">About Us</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Blog</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Blog Details</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Contact Us</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Portfolio</span>
                  </div>

                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="#">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Pricing</span>
                  </div>

                </a>
              </li>
            </ul>
          </li>

          
        
          
         

          <li>
            <span class="sidebar-divider lg"></span>
          </li>
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Güvenlik</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
              <i class="ti ti-logout"></i>
              <span class="hide-menu">Çıkış</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Side Login</span>
              </div>

            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
              <i class="ti ti-user-plus"></i>
              <span class="hide-menu">Register</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Side Register</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-rotate"></i>
                </span>
                <span class="hide-menu">Side Forgot Pwd</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-rotate"></i>
                </span>
                <span class="hide-menu">Boxed Forgot Pwd</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-zoom-code"></i>
                </span>
                <span class="hide-menu">Side Two Steps</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-zoom-code"></i>
                </span>
                <span class="hide-menu">Boxed Two Steps</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Error</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#"
              aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Maintenance</span>
              </div>

            </a>
          </li>

         
        </ul>
      </nav>
      <!-- End Sidebar navigation -->

    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->