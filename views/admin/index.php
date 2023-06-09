<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HZG Admin</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/css/navSid.css" />
        <link rel="stylesheet" href="../../assets/css/popups.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
        <!-- CSS datatable -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
        <!-- LightBox -->
        <link rel="stylesheet" href="../../vendor/lightbox/css/lightbox.min.css" />
        <!-- DataTable Responsive -->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
        <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />



        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"/>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Horacio Zeballos</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Perfil</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </nav>
        <div id="layoutSidenav">
            <!-- SidebarOptions -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php require_once 'sidebaroptions.php'; ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Bienvenido:</div>
                        <span>
                            <?= $_SESSION['login']['namess']?>
                            <?= $_SESSION['login']['surnames']?>
                        </span>
                    </div>
                </nav>
                
            </div>
            <!-- FIN -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-3">
                        <div class="align-content-center">

                            <ol class="breadcrumb mb-4">
                                <li class=" alert-dismissible active">Biblioteca Virtual - Horacio Zeballo Gamez</li>
                            </ol>
                        </div>
                        <!-- Sección Dashboard -->
                        <div class="row">
                            <!-- Libros -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="./libros.view.php">
                                                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                        Libros</div>
                                                    <div class="h5 mb-0 font-weight-bold text-dark">502</div>
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
                                                    <div class="h5 mb-0 font-weight-bold text-dark">54</div>
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
                                                    <div class="h5 mb-0 font-weight-bold text-dark">657</div>
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
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="./prestamos.view.php">
                                                    <div class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                                        Prestamos</div>
                                                    <div class="h5 mb-0 font-weight-bold text-dark">18</div>
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
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="./categoria.view.php">
                                                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                        Categorias</div>
                                                    <div class="h5 mb-0 font-weight-bold text-dark">54</div>
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
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="./subcategoria.view.php">
                                                    <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                        Subcategoria</div>
                                                    <div class="h5 mb-0 font-weight-bold text-dark">64</div>
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
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters success-items-center">
                                            <div class="col mr-2">
                                                <a href="./autor.view.php">
                                                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                        Autores</div>
                                                    <div class="h5 mb-0 font-weight-bold text-dark">115</div>
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
                        <div class="row">
                            <!-- Prestamos de Libros -->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Prestamo de Libros
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <!-- Descarga de Libros -->
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Descarga de Libros
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/js/navSid.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/js/chart-area-demo.js"></script>
        <script src="../../assets/js/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
