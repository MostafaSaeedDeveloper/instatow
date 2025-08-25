<!doctype html>
<html lang="en" class="remember-theme">
  <head>
    <meta charset="utf-8">
    <!--
      Available classes for <html> element:

      'dark'                  Enable dark mode - Default dark mode preference can be set in app.js file (always saved and retrieved in localStorage afterwards):
                                window.Dashmix = new App({ darkMode: "system" }); // "on" or "off" or "system"
      'dark-custom-defined'   Dark mode is always set based on the preference in app.js file (no localStorage is used)
      'remember-theme'        Remembers active color theme between pages using localStorage when set through
                                - Theme helper buttons [data-toggle="theme"]
    -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>InstaTow Dashboard</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('images/Logo.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('images/Logo.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/Logo.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- InstaTow framework -->
    <link rel="stylesheet" id="css-main" href="{{asset('admin/assets/css/instatow.min.css')}}">
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    {{-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xpro.min.css"> --}}
    <!-- END Stylesheets -->

    <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
    <!-- <script src="assets/js/setTheme.js"></script> -->
    <style>
#page-container.page-header-dark #page-header, html.dark #page-container #page-header {
    color: #000000;
    background-color: #ffffff;
}
.bg-sidebar-dark {
    background-color: #204a9e !important;
}
#sidebar .bg-header-dark .content-header .btn-alt-secondary, .page-header-dark #page-header .btn-alt-secondary, .page-header-dark.page-header-glass:not(.page-header-scroll) #page-header .btn-alt-secondary, .sidebar-dark #sidebar .btn-alt-secondary, html.dark #page-header .btn-alt-secondary, html.dark #sidebar .btn-alt-secondary, html.dark #sidebar .content-header .btn-alt-secondary, html.dark .page-header-glass:not(.page-header-scroll) #page-header .btn-alt-secondary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #204a9e;
    --bs-btn-border-color: #204a9e;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #204a9e;
    --bs-btn-hover-border-color: #7179c9;
    --bs-btn-focus-shadow-rgb: 118,126,203;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #4b529b;
    --bs-btn-active-border-color: #474d92;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #5e67c2;
    --bs-btn-disabled-border-color: #5e67c2;
}
.nav-main-dark.nav-main-horizontal .nav-main-link.active, .nav-main-dark.nav-main-horizontal .nav-main-link:hover, .page-header-dark #page-header .nav-main-horizontal .nav-main-link.active, .page-header-dark #page-header .nav-main-horizontal .nav-main-link:hover, .sidebar-dark #sidebar .nav-main-horizontal .nav-main-link.active, .sidebar-dark #sidebar .nav-main-horizontal .nav-main-link:hover, html.dark #main-container .nav-main-horizontal .nav-main-link.active, html.dark #main-container .nav-main-horizontal .nav-main-link:hover, html.dark #page-header .nav-main-horizontal .nav-main-link.active, html.dark #page-header .nav-main-horizontal .nav-main-link:hover, html.dark #sidebar .nav-main-horizontal .nav-main-link.active, html.dark #sidebar .nav-main-horizontal .nav-main-link:hover {
    color: #ffffff;
    background-color: #f06414;
}
.nav-main-dark.nav-main-horizontal .nav-main-link>.nav-main-link-icon, .page-header-dark #page-header .nav-main-horizontal .nav-main-link>.nav-main-link-icon, .sidebar-dark #sidebar .nav-main-horizontal .nav-main-link>.nav-main-link-icon, html.dark #main-container .nav-main-horizontal .nav-main-link>.nav-main-link-icon, html.dark #page-header .nav-main-horizontal .nav-main-link>.nav-main-link-icon, html.dark #sidebar .nav-main-horizontal .nav-main-link>.nav-main-link-icon {
    color: rgb(255 255 255);
}
.content.content-full {
    max-width: 1920px !important;
}
.toast-success {
            background-color: #28a745 !important; /* Solid green */
            opacity: 1 !important; /* Full opacity */
            color: white !important;
        }
        .delete_form button {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
  </head>

  <body>
    <div id="page-container" class="page-header-dark main-content-boxed">

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Logo -->
            <a class="fw-semibold text-dual tracking-wide" href="{{route('dashboard')}}">
                <img style="height: 40px;" src="{{asset('images/Logo H.png')}}" alt="">
            </a>
            <!-- END Logo -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-alt-secondary ms-2" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-search"></i>
            </button>
            <!-- END Open Search Section -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-alt-secondary dropdown-toggle" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-none d-sm-inline me-1">{{auth()->user()->name}}</span>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                <div class="rounded-top fw-semibold text-white text-center bg-image" style="background-image: url('assets/media/photos/photo16.jpg');">
                  {{-- <div class="p-3">
                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                  </div> --}}
                  <div class="p-3 bg-primary-dark-op">
                    <a class="text-white fw-semibold" href="">{{auth()->user()->name}}</a>
                    <div class="text-white-75">{{auth()->user()->email}}</div>
                  </div>
                </div>
                <div class="p-2">
                  {{-- <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                    Profile
                    <i class="fa fa-fw fa-user-circle opacity-50 ms-1"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                    Websites
                    <div>
                      <span class="badge rounded-pill bg-primary">3</span>
                      <i class="fa fa-fw fa-globe opacity-50 ms-1"></i>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                    Subscriptions
                    <div>
                      <span class="badge rounded-pill bg-primary">1</span>
                      <i class="fa fa-fw fa-sync-alt opacity-50 ms-1"></i>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                    Billing
                    <i class="fab fa-fw fa-paypal opacity-50 ms-1"></i>
                  </a>
                  <a class="dropdown-item d-flex justify-content-between align-items-center" href="javascript:void(0)">
                    Preferences
                    <i class="fa fa-fw fa-wrench opacity-50 ms-1"></i>
                  </a>
                 --}}
                 <a class="dropdown-item d-flex justify-content-between align-items-center" target="_blank" href="{{route('front_page')}}">
                    Visit Website
                    <i class="fa fa-fw fa-globe opacity-50 ms-1"></i>
                  </a>
                 <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{route('logout')}}">
                    Log Out
                    <i class="fa fa-fw fa-sign-out-alt text-danger ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-header-dark">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search for lead, quotation, order.." id="page-header-search-input" name="page-header-search-input">
              </div>
            </form>
          </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="fa fa-fw fa-2x fa-spinner fa-spin text-white"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Navigation -->
        <div class="bg-sidebar-dark">
          <div class="content">
            <!-- Toggle Main Navigation -->
            <div class="d-lg-none push">
              <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
              <button type="button" class="btn w-100 btn-primary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                Menu
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- END Toggle Main Navigation -->

            <!-- Main Navigation -->
            <div id="main-navigation" class="d-none d-lg-block push">
              <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-dark">
                <li class="nav-main-item">
                  <a class="nav-main-link {{request()->is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">
                    <i class="nav-main-link-icon fa fa-chart-pie"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link  {{request()->is('dashboard/leads*') ? 'active' : ''}}" href="{{route('leads.index')}}">
                    <i class="nav-main-link-icon fa fa-file-import"></i>
                    <span class="nav-main-link-name">Leads</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link {{request()->is('dashboard/quotes*') ? 'active' : ''}}"  href="{{route('quotes.index')}}">
                    <i class="nav-main-link-icon fa fa-question"></i>
                    <span class="nav-main-link-name">Quotations</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" {{request()->is('dashboard/orders*') ? 'active' : ''}} href="{{route('orders.index')}}">
                    <i class="nav-main-link-icon fa fa-truck-fast"></i>
                    <span class="nav-main-link-name">Orders</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="#">
                    <i class="nav-main-link-icon fa fa-car"></i>
                    <span class="nav-main-link-name">Vehicles</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link {{request()->is('dashboard/customers*') ? 'active' : ''}}" href="{{route('customers.index')}}">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Customers</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link {{request()->is('dashboard/users*') ? 'active' : ''}}" href="{{route('users.index')}}">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Users</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="{{route('logout')}}">
                    <i class="nav-main-link-icon fa fa-chart-pie"></i>
                    <span class="nav-main-link-name">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Main Navigation -->
          </div>
        </div>
        <!-- END Navigation -->

        <!-- Page Content -->
        <div class="content content-full">
            @yield('content')
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer" class="footer-static bg-body-extra-light">
        <div class="content py-4">
          <!-- Footer Navigation -->

          <!-- Footer Copyright -->
          <div class="row fs-sm pt-4">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
              Designed & Development by <a class="fw-semibold" href="https:://bishop-solutions.com" target="_blank">Bishop Integrated Solutions</a>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-start">
              <a class="fw-semibold" href="{{url('/')}}" target="_blank">InstaTow 0.1</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
          <!-- END Footer Copyright -->
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="{{asset('admin/assets/js/dashmix.app.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/db_analytics.min.js')}}"></script>
<!-- Toastr JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $(".delete-btn").click(function (event) {
            event.preventDefault(); // Stop form submission

            let form = $(".delete_form"); // Get the form

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to undo this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit(); // Submit the form after confirmation
                }
            });
        });
    });
    toastr.options = {
    "positionClass": "toast-top-left"
};
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
  </body>
</html>

