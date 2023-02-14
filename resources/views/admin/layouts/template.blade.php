<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('page_title')</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>

  <style>
    .margin {
      margin: 0px !important;
      padding: 0px 10px !important;
    }

    h4.shirt_text.section {
      padding: 60px 0px;
      text-align: center;
      background: #406ec1;
      margin-top: 40px;
      color: white;
      border-radius: 8px;
      transition: .3s
    }

    h4.shirt_text.section:hover {
      background: #295dbd;
    }
  </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="sidebar">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">

              <span class="app-brand-text demo menu-text fw-bolder ms-2">Anam Shop</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item margin active">
              <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>



            <li class="menu-header margin small text-uppercase">
              <span class="menu-header-text">Category</span>
            </li>
            <li class="menu-item ">
              <a href="{{ route('allcategory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All Category</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('addcategory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add Category</div>
              </a>
            </li>

            {{-- SubCategory --}}
            <li class="menu-header margin small text-uppercase">
              <span class="menu-header-text">SubCategory</span>
            </li>
            <li class="menu-item ">
              <a href="{{ route('allsubcategory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All SubCategory</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('addsubcategory') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add SubCategory</div>
              </a>
            </li>

            <!-- Products -->
            <li class="menu-header small text-uppercase margin"><span class="menu-header-text">Products</span></li>
            <li class="menu-item ">
              <a href="{{ route('allproducts') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics"> All Product</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('addproduct') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add Product</div>
              </a>
            </li>
            <!-- Orders -->
            <li class="menu-header small text-uppercase margin"><span class="menu-header-text">Orders</span></li>
            <li class="menu-item ">
              <a href="{{ route('pendingorder') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics"> Pending Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Complete Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Cancel Orders</div>
              </a>
            </li>
            <!-- User interface -->


            <!-- Extended components -->




            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
            <!-- Forms -->

            <!-- Tables -->

            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>

          </ul>
        </div>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">

                <form method="POST" action="{{ route('logout') }}">
                  @csrf


                  <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                     this.closest('form').submit();">
                    {{ Auth::user()->name }}-{{ __('Log Out') }}
                  </x-dropdown-link>
                </form>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content_wrapper">
          @yield('content')
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="/{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="/{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="/{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="/{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

  <script src="/{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <!-- Main JS -->
  <script src="/{{ asset('dashboard/assets/js/main.js') }}"></script>

  <!-- Page JS -{{ asset('dashboard/assets/img/favicon/favicon.ico') }}-->
  <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
