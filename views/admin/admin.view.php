<?php
require_once './permisos.php';
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
                                            <a href="index.php?view=libros.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                    Libros</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="libros"></p>
                                                </div>
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
                                            <a href="index.php?view=users.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                    Docentes</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="docentes"></p>
                                                </div>
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
                                            <a href="index.php?view=users.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                    Usuarios</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="usuarios"></p>
                                                </div>
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
                                            <a href="index.php?view=prestamos.admin.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                                                    Prestamos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="prestamos"></p>
                                                </div>
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
                                            <a href="index.php?view=categoria.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                    Categorias</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="categorias"></p>
                                                </div>
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
                                            <a href="index.php?view=subcategoria.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                    Subcategoria</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="subcategorias"></p>
                                                </div>
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
                                            <a href="#"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                    Autores</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <p id="autores"></p>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-550"></i>
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
                                            <a href="index.php?view=perfil.view.php"  style="text-decoration: none;">
                                                <div class="text-s font-weight-bold text-dark text-uppercase mb-1">
                                                    Mi perfil
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            function contadorBooks(){
                $.ajax({
                    url: '../../controllers/usuario.controller.php',
                    type: 'GET',
                    datatype: 'JSON',
                    data: 'operacion=contadorBooks',
                    success: function(result){
                        var json = $.parseJSON(result);
                        $("#libros").text(json[0]['total_libros']);
                        $("#categorias").text(json[0]['total_categorias']);
                        $("#subcategorias").text(json[0]['total_subcategorias']);
                        $("#autores").text(json[0]['total_autores']);
                    }
                });
            }

            function contadorUsers(){
                $.ajax({
                    url: '../../controllers/usuario.controller.php',
                    type: 'GET',
                    datatype: 'JSON',
                    data: 'operacion=contadorUsers',
                    success: function(result){
                        var json = $.parseJSON(result);
                        $("#usuarios").text(json[0]['total_users']);
                        $("#docentes").text(json[0]['total_docentes']);
                        $("#prestamos").text(json[0]['total_prestamos']);
                    }
                });
            }
            contadorBooks();
            contadorUsers();
        });
    </script>