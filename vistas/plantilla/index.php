<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Intranet | Academia Aiapaec</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Intranet Academia Aiapaec" name="description">
  <meta content="TI AIAPAEC" name="author">
  <!-- App favicon -->
  <link rel="shortcut icon" href="recursos/img/letra_color.png">
  <?php
  $var = isset($_GET['c']) ? $_GET['c'] : '';
  $var_action = isset($_GET['a']) ? $_GET['a'] : '';
  if ($var == 'Matriculaseminario' || $var == 'matricula' || $var == 'registroconcurso') {
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
  <script type="text/javascript" src="recursos/js/psicologia/pdfobject.min.js"></script>

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


          <?php if ($_SESSION['idRol'] == '7') { ?>
            <li class="side-nav-title side-nav-item">Opciones</li>
            <li class="side-nav-item">
              <a data-bs-toggle="collapse" href="#sidebarProgramas" aria-expanded="false" aria-controls="sidebarProgramas" class="side-nav-link">
                <i class="uil-tv-retro"></i>
                <!-- <span class="badge bg-success float-end">1</span> -->

                <span> Concursos </span>
                <span class="menu-arrow"></span>

              </a>
              <div class="collapse" id="sidebarProgramas">
                <ul class="side-nav-second-level">
                  <li>
                    <a href="?c=programasacademia&a=escolares">Mis Participantes</a>
                  </li>
                  <!-- <li>
                    <a href="?c=programasacademia&a=preuniversitarios">Preuniversitarios</a>
                  </li> -->

                </ul>
              </div>
            </li>
          <?php } else { ?>
            <?php if ($_SESSION['update'] == 0) { ?>
              <li class="side-nav-title side-nav-item">Bienvenido </li>

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
                <a data-bs-toggle="collapse" href="#sidebarProgramas" aria-expanded="false" aria-controls="sidebarProgramas" class="side-nav-link">
                  <i class="uil-tv-retro"></i>
                  <!-- <span class="badge bg-success float-end">1</span> -->

                  <span> Programas </span>
                  <span class="menu-arrow"></span>

                </a>
                <div class="collapse" id="sidebarProgramas">
                  <ul class="side-nav-second-level">
                    <li>
                      <a href="?c=programasacademia&a=escolares">Escolares</a>
                    </li>
                    <li>
                      <a href="?c=programasacademia&a=preuniversitarios">Preuniversitarios</a>
                    </li>

                  </ul>
                </div>
              </li>

              <li class="side-nav-item">
                <a href="?c=matricula&a=matriculas" class="side-nav-link">
                  <i class="uil-graduation-hat"></i>
                  <span> Matrícula </span>
                </a>
              </li>
              <li class="side-nav-item">
                <a href="?c=cuota" class="side-nav-link">
                  <i class="uil-atm-card"></i>
                  <span> Pagos </span>
                </a>
              </li>

              <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                  <i class="uil-podium"></i>
                  <!-- <span class="badge bg-success float-end">1</span> -->
                  <span> Seminarios </span>
                  <span class="menu-arrow"></span>
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
                <a data-bs-toggle="collapse" href="#sidebarConcursos" aria-expanded="false" aria-controls="sidebarConcursos" class="side-nav-link">
                  <i class="uil-medal"></i>
                  <!-- <span class="badge bg-success float-end">1</span> -->
                  <span> Concursos </span>
                  <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarConcursos">
                  <ul class="side-nav-second-level">
                    <li>
                      <a href="?c=concurso">Ver Todos</a>
                    </li>
                    <li>
                      <a href="?c=registroconcurso&a=misConcursos">Mis concursos</a>
                    </li>

                  </ul>
                </div>
              </li>

              <!-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                  <i class="uil-notes"></i>
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
              </li> -->
              <li class="side-nav-item">
                <a href="apps-social-feed.html" class="side-nav-link">
                  <i class="uil-graph-bar"></i>
                  <span> Asistencia </span>
                </a>
              </li>
              <li class="side-nav-item">
                <a href="?c=psicologia&a=index" class="side-nav-link">
                  <i class="mdi mdi-brain"></i>
                  <span> Psicología </span>
                </a>
              </li>
              
              <!-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                  <i class="uil-books"></i>
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
              </li> -->
            <?php  } ?>
          <?php  }
          ?>

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
                <a href="?c=estudiante&a=miPerfil" class="dropdown-item notify-item">
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




  <div class="rightbar-overlay"></div>
  <!-- /End-bar -->


  <!-- bundle -->
  <script src="recursos/assets/js/vendor.min.js"></script>
  <script src="recursos/assets/js/app.min.js"></script>



  <!-- ajax -->

  <?php

  if ($var == 'estudiante') {
    echo '<script src="recursos/js/updated/updated.js"></script>';
    echo '  <script src="recursos/js/ajax.js"></script>';
  }
  if ($var == 'seminario') {
    echo '<script src="recursos/js/simulacro/registro.js"></script>';
  }
  if ($var == 'Matriculaseminario' || $var == 'matricula' || $var == 'registroconcurso') {
    echo  '<script src="recursos/assets/js/vendor/jquery.dataTables.min.js"></script>';
    echo '<script src="recursos/assets/js/vendor/dataTables.bootstrap5.js"></script>';
    echo '<script  src="recursos/assets/js/vendor/dataTables.responsive.min.js"></script>';
    echo '<script src="recursos/assets/js/vendor/responsive.bootstrap5.min.js"></script>';
    echo '<script src="recursos/assets/js/pages/demo.datatable-init.js"></script>';
  }
  if ($var == 'matricula') {
    echo '<script src="recursos/js/matricula/ajax.js"></script>';
    echo '<script src="recursos/js/matricula/matricula.js"></script>';
  }
  if ($var == 'cuota') {
    echo '<script src="recursos/js/pagos/registro_pago.js"></script>';
  }
  if ($var == 'registroconcurso') {
    echo '<script src="recursos/js/simulacro/editar.js"></script>';
  }
  if ($var == 'pago') {
    echo '<script src="recursos/js/pagos/update_pago.js"></script>';
  }
  if ($var == 'psicologia') {
    echo '<script src="recursos/js/psicologia/pdf.js"></script>';
  }
  ?>

</body>

</html>