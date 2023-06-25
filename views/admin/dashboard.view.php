<?php
require_once 'permisos.php'; 
/*if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header("location:login.php");
}*/
?>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                <!-- FIN PERFIL -->

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