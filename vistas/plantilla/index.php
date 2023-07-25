<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Intranet | Academia Aiapaec</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <!-- App favicon -->
  <link rel="shortcut icon" href="recursos/img/letra_color.png">
  <?php   
  $var = isset($_GET['c']) ? $_GET['c'] : '';
  $var_action = isset($_GET['a']) ? $_GET['a'] : '';
  if( $var=='Matriculaseminario'){
    echo '<link href="recursos/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">';
    echo '<link href="recursos/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">';
    echo '<link href="recursos/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">';
  
  }
  ?>
  <!-- para el dashboard -->
  <!-- third party css -->
  <link href="recursos/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
  <!-- third party css end -->
  <!-- App css -->
  <link href="recursos/assets/css/icons.min.css" rel="stylesheet" type="text/css">
  <link href="recursos/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
  <link href="recursos/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

  
  
  ?>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  <!-- Begin page -->
  <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

      <!-- LOGO -->
      <a href="?" class="logo text-center logo-light">
        <span class="logo-lg">
          <img src="recursos/img/3.png" alt="" height="50">
        </span>
        <span class="logo-sm">
          <img src="recursos/img/logo_academia_blanco.png" alt="" height="20">
        </span>
      </a>

      <!-- LOGO -->
      <a href="?" class="logo text-center logo-dark">
        <span class="logo-lg">
          <img src="recursos/assets/images/3.png" alt="" height="16">
        </span>
        <span class="logo-sm">
          <img src="recursos/assets/images/3.png" alt="" height="16">
        </span>
      </a>

      <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

          <?php if ($_SESSION['update'] == 0) { ?>
            <li class="side-nav-title side-nav-item">Bienvenido</li>

            <li class="side-nav-item">
              <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge bg-success float-end">1</span>
                <span> Mi perfil </span>
              </a>
              <div class="collapse" id="sidebarDashboards">
                <ul class="side-nav-second-level">
                  <li>
                    <a href="?c=estudiante&a=updated">Actualizar datos</a>
                  </li>
                </ul>
              </div>
            </li>
          <?php } else { ?>
            <li class="side-nav-title side-nav-item">Opciones</li>

            <li class="side-nav-item">
              <a href="apps-calendar.html" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Matrícula </span>
              </a>
            </li>

            
            <li class="side-nav-item">
              <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge bg-success float-end">1</span>
                <span> Seminarios </span>
              </a>
              <div class="collapse" id="sidebarDashboards">
                <ul class="side-nav-second-level">
                  <li>
                    <a href="?c=seminario">Ver Todos</a>
                  </li>
                  <li>
                    <a href="?c=Matriculaseminario&a=misSeminarios">Mis Seminarios</a>
                  </li>
                 
                </ul>
              </div>
            </li>

            <li class="side-nav-item">
              <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                <i class="uil-store"></i>
                <span> Notas </span>
                <span class="menu-arrow"></span>
              </a>
              <div class="collapse" id="sidebarEcommerce">
                <ul class="side-nav-second-level">
                  <li>
                    <a href="apps-ecommerce-products.html">Simulacros</a>
                  </li>
                  <li>
                    <a href="apps-ecommerce-products-details.html">Semanales</a>
                  </li>
                  <li>
                    <a href="apps-ecommerce-orders.html">Diarios</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="side-nav-item">
              <a href="apps-social-feed.html" class="side-nav-link">
                <i class="uil-rss"></i>
                <span> Asistencia </span>
              </a>
            </li>
            <li class="side-nav-item">
              <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                <i class="uil-envelope"></i>
                <span> Biblioteca </span>
                <span class="menu-arrow"></span>
              </a>
              <div class="collapse" id="sidebarEmail">
                <ul class="side-nav-second-level">
                  <li>
                    <a href="apps-email-inbox.html">Cursos</a>
                  </li>
                  <li>
                    <a href="apps-email-read.html">Libros</a>
                  </li>
                </ul>
              </div>
            </li>

          <?php  }
          ?>
          <!-- Help Box -->
          <div class="help-box text-white text-center">
            <a href="javascript: void(0);" class="float-end close-btn text-white">
              <i class="mdi mdi-close"></i>
            </a>
            <img src="recursos/assets/images/help-icon.svg" height="90" alt="Helper Icon Image">
            <h5 class="mt-3">Unlimited Access</h5>
            <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
            <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">Upgrade</a>
          </div>
          <!-- end Help Box -->
          <!-- End Sidebar -->
        </ul>
        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom">
          <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list d-lg-none">
              <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                  <input type="text" class="form-control" placeholder="Buscar ..." aria-label="Recipient's username">
                </form>
              </div>
            </li>


            <li class="dropdown notification-list">
              <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                  <h5 class="m-0">
                    <span class="float-end">
                      <a href="javascript: void(0);" class="text-dark">
                        <small>Clear All</small>
                      </a>
                    </span>Notification
                  </h5>
                </div>

                <div style="max-height: 230px;" data-simplebar="">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-primary">
                      <i class="mdi mdi-comment-account-outline"></i>
                    </div>
                    <p class="notify-details">Caleb Flakelar commented on Admin
                      <small class="text-muted">1 min ago</small>
                    </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-info">
                      <i class="mdi mdi-account-plus"></i>
                    </div>
                    <p class="notify-details">New user registered.
                      <small class="text-muted">5 hours ago</small>
                    </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon">
                      <img src="recursos/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="notify-details">Cristina Pride</p>
                    <p class="text-muted mb-0 user-msg">
                      <small>Hi, How are you? What about our next meeting</small>
                    </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-primary">
                      <i class="mdi mdi-comment-account-outline"></i>
                    </div>
                    <p class="notify-details">Caleb Flakelar commented on Admin
                      <small class="text-muted">4 days ago</small>
                    </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon">
                      <img src="recursos/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="notify-details">Karen Robinson</p>
                    <p class="text-muted mb-0 user-msg">
                      <small>Wow ! this admin looks good and awesome design</small>
                    </p>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="notify-icon bg-info">
                      <i class="mdi mdi-heart"></i>
                    </div>
                    <p class="notify-details">Carlos Crouch liked
                      <b>Admin</b>
                      <small class="text-muted">13 days ago</small>
                    </p>
                  </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                  View All
                </a>

              </div>
            </li>

            <li class="dropdown notification-list d-none d-sm-inline-block">
              <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-view-apps noti-icon"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                <div class="p-2">
                  <div class="row g-0">
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/slack.png" alt="slack">
                        <span>Slack</span>
                      </a>
                    </div>
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/github.png" alt="Github">
                        <span>GitHub</span>
                      </a>
                    </div>
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/dribbble.png" alt="dribbble">
                        <span>Dribbble</span>
                      </a>
                    </div>
                  </div>

                  <div class="row g-0">
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/bitbucket.png" alt="bitbucket">
                        <span>Bitbucket</span>
                      </a>
                    </div>
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/dropbox.png" alt="dropbox">
                        <span>Dropbox</span>
                      </a>
                    </div>
                    <div class="col">
                      <a class="dropdown-icon-item" href="#">
                        <img src="recursos/assets/images/brands/g-suite.png" alt="G Suite">
                        <span>G Suite</span>
                      </a>
                    </div>
                  </div> <!-- end row-->
                </div>

              </div>
            </li>

            <li class="notification-list">
              <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                <i class="dripicons-gear noti-icon"></i>
              </a>
            </li>

            <li class="dropdown notification-list">
              <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                  <img src="recursos/img/user/usuario.png" alt="user-image" class="rounded-circle">
                </span>
                <span>
                  <span class="account-user-name"><?php echo $_SESSION['name']; ?></span>
                  <span class="account-position">Aiapaec</span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bienvenido !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-account-circle me-1"></i>
                  <span>Mi Cuenta</span>
                </a>

                <!-- item-->
                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-account-edit me-1"></i>
                  <span>Configuración</span>
                </a> -->

                <!-- item-->
                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-lifebuoy me-1"></i>
                  <span>Soporte</span>
                </a> -->

                <!-- item-->
                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="mdi mdi-lock-outline me-1"></i>
                  <span>Lock Screen</span>
                </a> -->

                <!-- item-->
                <a href="?c=usuario&a=cerrarSesion" class="dropdown-item notify-item">
                  <i class="mdi mdi-logout me-1"></i>
                  <span>Cerrar Sesión</span>
                </a>
              </div>
            </li>

          </ul>
          <button class="button-menu-mobile open-left">
            <i class="mdi mdi-menu"></i>
          </button>
          <div class="app-search dropdown d-none d-lg-block">
            <form>
              <div class="input-group">
                <input type="text" class="form-control dropdown-toggle" placeholder="BUscar..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-guinda" type="submit">Buscar</button>
              </div>
            </form>

            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
              <!-- item-->
              <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
              </div>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 me-1"></i>
                <span>Analytics Report</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 me-1"></i>
                <span>How can I help you?</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>User profile settings</span>
              </a>

              <!-- item-->
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
              </div>

              <div class="notification-list">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="d-flex">
                    <img class="d-flex me-2 rounded-circle" src="recursos/assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                      <h5 class="m-0 font-14">Erwin Brown</h5>
                      <span class="font-12 mb-0">UI Designer</span>
                    </div>
                  </div>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="d-flex">
                    <img class="d-flex me-2 rounded-circle" src="recursos/assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                      <h5 class="m-0 font-14">Jacob Deo</h5>
                      <span class="font-12 mb-0">Developer</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">


          <?php require $vista; ?>
          <!-- end page title -->
        </div> <!-- container -->


      </div> <!-- content -->

      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Academia Aiapaec - Todos los derechos reservados
            </div>
            <div class="col-md-6">
              <div class="text-md-end footer-links d-none d-md-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->


  <!-- Right Sidebar -->
  <div class="end-bar">

    <div class="rightbar-title">
      <a href="javascript:void(0);" class="end-bar-toggle float-end">
        <i class="dripicons-cross noti-icon"></i>
      </a>
      <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar="">

      <div class="p-3">
        <div class="alert alert-warning" role="alert">
          <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
        </div>

        <!-- Settings -->
        <h5 class="mt-3">Color Scheme</h5>
        <hr class="mt-1">

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
          <label class="form-check-label" for="light-mode-check">Light Mode</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
          <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
        </div>


        <!-- Width -->
        <h5 class="mt-4">Width</h5>
        <hr class="mt-1">
        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
          <label class="form-check-label" for="fluid-check">Fluid</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
          <label class="form-check-label" for="boxed-check">Boxed</label>
        </div>


        <!-- Left Sidebar-->
        <h5 class="mt-4">Left Sidebar</h5>
        <hr class="mt-1">
        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
          <label class="form-check-label" for="default-check">Default</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
          <label class="form-check-label" for="light-check">Light</label>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
          <label class="form-check-label" for="dark-check">Dark</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
          <label class="form-check-label" for="fixed-check">Fixed</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
          <label class="form-check-label" for="condensed-check">Condensed</label>
        </div>

        <div class="form-check form-switch mb-1">
          <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
          <label class="form-check-label" for="scrollable-check">Scrollable</label>
        </div>

        <div class="d-grid mt-4">
          <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

          <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
        </div>
      </div> <!-- end padding-->

    </div>
  </div>

  <div class="rightbar-overlay"></div>
  <!-- /End-bar -->


  <!-- bundle -->
  <script src="recursos/assets/js/vendor.min.js"></script>
  <script src="recursos/assets/js/app.min.js"></script>

  <!-- para el dashboard -->
  <!-- third party js -->
  <!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
  <script src="recursos/assets/js/vendor/apexcharts.min.js"></script>
  <script src="recursos/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="recursos/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
  <!-- third party js ends -->

  <!-- demo app -->
  <script src="recursos/assets/js/pages/demo.dashboard-analytics.js"></script>
  <!-- end demo js-->

  <!-- ajax -->
  <script src="recursos/js/ajax.js"></script>
  <?php

if($var=='estudiante'){
  echo '<script src="recursos/js/updated/updated.js"></script>';
}
if($var=='seminario'){
  echo '<script src="recursos/js/simulacro/registro.js"></script>';
  
}
if ($var=='Matriculaseminario') {
  echo  '<script src="recursos/assets/js/vendor/jquery.dataTables.min.js"></script>';
  echo '<script src="recursos/assets/js/vendor/dataTables.bootstrap5.js"></script>';
  echo '<script  src="recursos/assets/js/vendor/dataTables.responsive.min.js"></script>';
  echo '<script src="recursos/assets/js/vendor/responsive.bootstrap5.min.js"></script>';
  echo '<script src="recursos/assets/js/pages/demo.datatable-init.js"></script>';
}
?>

</body>

</html>