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
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="admin.view.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Horacio</span></div>
                </a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.view.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa-solid fa-book fa-xl"></i>
                            <span>LIBROS</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Registrar:</h6>
                                <a class="collapse-item" href="libros.view.php">Libros</a>
                                <a class="collapse-item" href="category.view.php">Categorias</a>
                                <a class="collapse-item" href="subcategory.view.php">Subcategorias</a>
                            </div>
                        </div>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link" href="prestamos.view.php">
                            <i class="fa-solid fa-file-signature fa-xl"></i>
                            <span>PRESTAMOS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="usuarios.view.php">
                            <i class="fa-solid fa-user-plus fa-xl"></i>
                            <span>USUARIOS</span>
                        </a>
                    </li>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <font face="impact"><h2 >Editar PDF</h2></font>
                        </form>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded=true" data-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow">
                                <!-- NOMBRE USUARIO & IMAGEN -->
                                <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown"
                                    href="#">
                                    <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                        <?= $_SESSION['ses_namess']?>
                                        <?= $_SESSION['ses_surnames']?>
                                    </span>
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
                                    <a class="dropdown-item"
                                        href="../../controllers/usuario.controller.php?operacion=cerrar-sesion">
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
                <div class="container-fluid">
                    <main class="app-content ml-5 mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-5 mb-5">
                                    <div class="custom-file" lang="es">
                                        <input type="file" class="custom-file-input" id="customFileLang">
                                        <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" id="cancelar-modal-portada" class="btn btn-sm btn-secondary" class="close"data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" id="guardar-portada-editar" class="btn btn-sm btn-primary">
                                        Modificar
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pdf mt-5 ml-5">
                                    <iframe src="../../views/PDF/0e4aaa4dfe0bdaf1a67476f85e99329219502f1c.pdf" width="80%" height="500"></iframe>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © IA Tech 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>

    <script>
    </script>
</body>

</html>