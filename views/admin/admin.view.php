<?php
require_once 'permisos.php';
?>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- SIDEBAR & PERFIL -->
                <!-- FIN -->

                <div class="container-fluid">
                    <div class="row">
                        <!-- Libros -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./libros.view.php"  style="text-decoration: none;">
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
                                            <a href="./docente.view.php"  style="text-decoration: none;">
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
                                            <a href="./externo.view.php"  style="text-decoration: none;">
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
                                            <a href="./prestamos.view.php"  style="text-decoration: none;">
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
                                            <a href="./categoria.view.php"  style="text-decoration: none;">
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
                                            <a href="./subcategoria.view.php"  style="text-decoration: none;">
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
                                            <a href="./autor.view.php"  style="text-decoration: none;">
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
                                            <a href="./perfil.view.php"  style="text-decoration: none;">
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
            </div>
        </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>