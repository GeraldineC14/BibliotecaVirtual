<?php
session_start();

/*if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header("location:login.php");
}*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/popups.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "./template/slider.general.php"; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
                          <font face="impact"><h2 >Módulo de Libros</h2></font>
                        </form>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <!-- NOMBRE USUARIO & IMAGEN -->
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?= $_SESSION['login']['namess']?> <?= $_SESSION['login']['surnames']?> </span>
                                        <img class="border rounded-circle img-profile" src="../../assets/img/profile.png" />
                                    </a>
                                    <!--  -->

                                    <!-- PERFIL & SALIR -->
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="../admin/perfil.view.php">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Perfil
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../../controllers/usuario.controller.php?operacion=cerrar-sesion">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Salir
                                        </a>
                                    </div>
                                    <!--  -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- FIN PERFIL -->

                <div class="container-fluid">
                    <!-- Libros -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./libros.view.php">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Libros</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">502</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Docentes -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./docente.view.php">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Docentes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">54</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-tie fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Estudiantes -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./externo.view.php">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">657</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book-open-reader fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Prestamos -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./prestamos.view.php">
                                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                                                Prestamos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-truck-ramp-box fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Categoria -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./categoria.view.php">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Categorias</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">54</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Subcategoria -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./subcategoria.view.php">
                                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                Subcategoria</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">64</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-list fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Autores -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters success-items-center">
                                    <div class="col mr-2">
                                        <a href="./autor.view.php">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Autores</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">115</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Configuración -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="./perfil.view.php">
                                            <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                                CONFIGURACION
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-gears fa-2x text-gray-550"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Footer -->
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright">
                            <span>Copyright © IA Tech 2023</span>
                        </div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>

    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
</body>

</html>