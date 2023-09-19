<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Iniciar Sesión | Aiapaec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Intranet Aiapaec" name="description" />
    <meta content="TI Aiapaec" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="recursos/img/letra_color.png">

    <!-- App css -->
    <link href="recursos/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="recursos/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="recursos/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <a href="index.html" class="logo-dark">
                            <span><img src="recursos/img/logo_academia_color.png" alt="" height="50"></span>
                        </a>
                        <a href="index.html" class="logo-light">
                            <span><img src="recursos/img/logo_academia_blanco.png" alt="" height="50"></span>
                        </a>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Iniciar Sesión</h4>
                    <p class="text-muted mb-4">Ingrese su usuario y contraseña para acceder a su cuenta.</p>

                    <!-- form -->
                    <form method="post" action="index.php" id="formLogin" name="formLogin">
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Usuario</label>
                            <input class="form-control" type="number" id="nombreUsuario" name="nombreUsuario" required="" placeholder="Ingresa tu usuario">
                        </div>
                        <div class="mb-3">
                            <a href="pages-recoverpw-2.html" class="text-muted float-end"><small>Olvido su Contraseña?</small></a>
                            <label for="password" class="form-label">Contraseña</label>
                            <input class="form-control" type="password" required="" id="passwordUsuario" name="passwordUsuario" placeholder="Ingresa tu contraseña">
                        </div>
                        <!-- <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> -->
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-guinda" type="submit"><i class="mdi mdi-login"></i> Iniciar Sesión </button>
                        </div>
                        <!-- social-->
                        <!-- <div class="text-center mt-4">
                                <p class="text-muted font-16">Sign in with</p>
                                <ul class="social-list list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        <p class="text-muted">No tienes una cuenta? <a href="https://www.academiaaiapaec.edu.pe/registro-aiapaec/" class="text-muted ms-1"><b>Registrate </b></a>y forma parte de la familia Aiapaec</p>
                    </footer>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
          
            <div class="auth-user-testimonial">
                <h2 class="mb-3"> La pre de los cómputos e ingresantes mas jóvenes!</h2>
                <!-- <p class="lead"><i class="mdi mdi-format-quote-open"></i> La pre de los cómputos e ingresantes mas jóvenes ! . <i class="mdi mdi-format-quote-close"></i>
                </p> -->
                <p>
                    - Academia Aiapaec
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->

    <!-- bundle -->
    <script src="recursos/assets/js/vendor.min.js"></script>
    <script src="recursos/assets/js/app.min.js"></script>
    <script src="recursos/js/login.js"></script>

</body>

</html>