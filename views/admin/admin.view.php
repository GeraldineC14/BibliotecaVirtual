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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- INICIO SIDEBAR LEFT -->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0">
                <!-- INICIO LOGO -->
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="admin.view.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <span>HORACIO</span>
                    </div>
                </a>
                <!--  -->

                <hr class="sidebar-divider my-0" />

                <!-- INICIO SECCIONES SIDEBAR -->
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.view.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros.view.php">
                            <i class="fa-solid fa-book fa-xl"></i>
                            <span>LIBROS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prestamos.view.php">
                            <i class="fa-solid fa-file-signature fa-xl"></i>
                            <span>PRESTAMOS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.view.php">
                            <i class="fa-solid fa-user-plus fa-xl"></i>
                            <span>USUARIOS</span>
                        </a>
                    </li>
                </ul>
                <!-- -->

                <!-- INICIO OCULTAR SIDEBAR -->
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
                <!-- -->

                <!-- INICIO POPUP BIENVENIDA -->
                <div class="notificacion">
                    <p>Bienvenido, <?= $_SESSION['ses_namess']?> 👋</p>
                    <span class="notification_progress"></span>
                </div>
                <!-- -->
            </div>
        </nav>
        <!-- FIN SIDEBAR LEFT -->

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <!-- NOMBRE USUARIO & IMAGEN -->
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?= $_SESSION['ses_namess']?> <?= $_SESSION['ses_surnames']?> </span>
                                        <img class="border rounded-circle img-profile" src="../../assets/img/perfil.jpg" />
                                    </a>
                                    <!--  -->

                                    <!-- PERFIL & SALIR -->
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="profile.view.php">
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

                <!-- CONTENEDOR DE DATOS -->
                <main class="app-content ml-5 mt-5">
                    <div class="row">
                        <div class="col-md col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Docentes</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Libros</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small warning coloured-icon"><i class="icon fa fa-address-book-o fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Autor</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class="icon fa fa-tags fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Categoria</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small warning coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Estudiantes</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small danger coloured-icon"><i class="icon fa fa-hourglass-start fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Prestamos</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small info coloured-icon"><i class="icon fa fa-list-alt fa-3x"></i>
                                <a class="info" href="#">
                                    <h4>Subcategorias</h4>
                                    <p>
                                        <b>
                                            <!-- Aqui se llama los datos, con los contadores -->
                                        </b>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md col-lg-3">
                            <div class="widget-small primary coloured-icon"><i class="icon fa fa-cogs fa-3x"></i>
                                <a class="info" href="#">
                                    <h5>Configuracion</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Aqui se llama el grafico de barras -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <h3 class="tile-title">Libros Disponibles</h3>
                                <!-- <div class="embed-responsive embed-responsive-16by9">
                                    <canvas class="embed-responsive-item" id="reportePrestamo"></canvas>
                                </div> -->
                            </div>
                        </div>  
                    </div>
                </main>
                <!-- FIN CONTENEDOR DATOS -->
            </div>
        </div>
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