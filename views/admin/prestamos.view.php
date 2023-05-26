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
    <title>Prestamos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/popups.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <!-- CSS datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- DataTable Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
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
                <!-- -->

                <hr class="sidebar-divider my-0" />

                <!-- INICIO SECCIONES SIDEBAR -->
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.view.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                            <span>INICIO</span>
                        </a>
                    </li>
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
                                <a class="collapse-item" href="utilities-border.html">Categorias</a>
                                <a class="collapse-item" href="utilities-animation.html">Subcategorias</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active">
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
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
                          <font face="impact"><h2 >Módulo de prestamos</h2></font>
                        </form>
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


                <div class="container-fluid">
                    <div class="card shadow">
                          
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center">
                                    <div class="btn-group " role="group">
                                        <button class="btn btn-success btn-sm d-none d-sm-inline-block" role="button" data-toggle="modal" data-target="#modal-libros" data-target="#modal-libros-editar" id="mostrar-modal-registro">
                                            <i class="fa-solid fa-book fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Realizar Prestamo
                                        </button>
                                        <button class="btn btn-danger btn-sm d-none d-sm-inline-block" role="button" href="#"  style="margin-left: 50px;">
                                            <i class="fas fa-download fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Generar Reporte
                                        </button>
                                    </div>                                
                                </div>
                                <!-- Datatable  -->
                                <div style="width: 90%; margin:auto" class="mt-2">   
                                    <div class="card-body">
                                        <table class="table display responsive" id="tabla-prestamos">
                                            <thead class="table-dark">    
                                                <tr>
                                                    <th>#</th>
                                                    <th>Libro</th>
                                                    <th>Usuario</th>
                                                    <th>Fecha de solicitud</th>
                                                    <th>Fecha de devolución</th>
                                                    <th>Cantidad</th>
                                                    <th>Estado</th>
                                                    <th>Comandos</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>

                            <!-- Zona Modales registro-->
                            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros" tabindex="-1" aria-labelledby="titulo-modal-libros" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-light">
                                            <h5 class="modal-title" id="titulo-modal-libros">Registrar Libro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="text-light" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formulario-prestamos">
                                            <div class="form-group">
                                                <label for="libro">Libro</label><br>
                                                <select id="libro" class="form-control libro" name="libro" required
                                                    style="width: 100%;">

                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label for="usuario">Usuario</label><br>
                                                        <select name="usuario" id="usuario"
                                                            class="form-control usuario" required
                                                            style="width: 100%;">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cantidad">Cant</label>
                                                        <input id="cantidad" class="form-control" min="1" type="number"
                                                            name="cantidad" min="1">
                                                        <strong id="msg_error"></strong>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fecha_prestamo">Fecha de Prestamo</label>
                                                        <input id="fecha_prestamo" class="form-control" type="date"
                                                            name="fecha_prestamo" value="<?php echo date(" Y-m-d"); ?>"
                                                        required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fecha_devolucion">Fecha de Devolución</label>
                                                        <input id="fecha_devolucion" class="form-control" type="date"
                                                            name="fecha_devolucion" value="<?php echo date(" Y-m-d");
                                                            ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="observacion">Observación</label>
                                                <textarea id="observacion" class="form-control"
                                                    placeholder="Observación" name="observacion" rows="3"></textarea>
                                            </div>
                                            <button class="btn btn-primary" type="submit"
                                                id="btnAccion">Prestar</button>
                                            <button class="btn btn-danger" type="button"
                                                data-dismiss="modal" id="cancelar-modal">Cancelar</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->

                        <!-- Zona Modales editar-->
                        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros-editar"
                            tabindex="-1" aria-labelledby="titulo-modal-libros-editar" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-light">
                                        <h5 class="modal-title" id="titulo-modal-libros-editar">Editar Registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="text-light" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="formulario-libros" autocomplete="off">
                                            <!-- Creación de controles -->
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label for="categoria2">Categoría:</label>
                                                    <select name="categoria2" id="categoria2"
                                                        class="form-control form-control-sm">
                                                        <option value="">Seleccione:</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="subcategoria2">Sub Categoría:</label>
                                                    <select name="subcategoria2" id="subcategoria2"
                                                        class="form-control form-control-sm">
                                                        <option value="">Seleccione:</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="cantidad2">Cantidad:</label>
                                                    <input type="text" id="cantidad2"
                                                        class="form-control form-control-sm">
                                                </div>

                                                <div class="col-md-9 form-group">
                                                    <label for="descripcion2">Descripción:</label>
                                                    <input type="text" id="descripcion2"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-9 form-group">
                                                    <label for="autor2">Autor:</label>
                                                    <input type="text" id="autor2" class="form-control form-control-sm">
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <label for="estado2">Estado:</label>
                                                    <input type="text" id="estado2"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="ubicacion2">Ubicación:</label>
                                                <input type="text" id="ubicacion2" class="form-control form-control-sm">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="cancelar-modal-editar"
                                            class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" id="guardar-libro-editar"
                                            class="btn btn-sm btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


        <!-- font -->
        <script defer src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>
        <!-- Boostrap 4.6 -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <!-- Datatable -->
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <!-- DataTable Responsive -->
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

        <!-- Mis funciones y eventos javascript -->
        <script>
           $(document).ready(function(){
            function listarPrestamos(){
                $.ajax({
                    url:'../../controllers/prestamo.controller.php',
                    type:'GET',
                    data:'operacion=listarPrestamos',
                    success:function(result){
                        let registros = JSON.parse(result);
                        let nuevaFila = ``;

                        let tabla = $("#tabla-prestamos").DataTable();
                        tabla.destroy();
                        $("#tabla-prestamos tbody").html("");
                        registros.forEach(registro =>{
                            nuevaFila=`
                            <tr>
                                <td>${registro['idloan']}</td>
                                <td>${registro['descriptions']}</td>
                                <td>${registro['Usuario']}</td>
                                <td>${registro['loan_date']}</td>
                                <td>${registro['return_date']}</td>
                                <td>${registro['amount']}</td>
                                <td>${registro['state']}</td>
                                <td>
                                    <a href='#' data-idloan='${registro['idloan']}' class = ' eliminar'><i class="fa-solid fa-user-xmark fa-lg" style="color: #e00000;"></i></a>
                                    <a href='#' data-idloan='${registro['idloan']}' class = ' editar'><i class="fa-solid fa-user-pen fa-lg" style="color: #1959c8;"></i></a>
                                </td>
                            </tr>
                            `;
                            $("#tabla-prestamos tbody").append(nuevaFila);
                        });
                            $('#tabla-prestamos').DataTable({
                                language:{ 
                                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                                }
                            });
                    }
                });
            }

            function reiniciarFormulario(){
                $("#formulario-prestamos")[0].reset();
            }

            function listarUsuarioLoans(){
                $.ajax({
                    url:'../../controllers/prestamo.controller.php',
                    type:'GET',
                    data:'operacion=listarUsuarioLoans',
                    success: function(result){
                        let registros = JSON.parse(result);
                        let elementosLista = ``;

                        if(registros.length > 0){
                            elementosLista = `<option selected>Seleccione:</option>`;

                            registros.forEach(registro =>{
                                elementosLista += `<option value=${registro['idusers']}>${registro['Users']}</option>`;

                            });
                        }else{
                            elementosLista = `<option>No hay datos asignados</option>`;
                        }
                        $("#usuario").html(elementosLista);
                    }
                });
            }

            listarPrestamos();
            listarUsuarioLoans();
            $("#cancelar-modal").click(reiniciarFormulario);
           });
        </script>

</body>

</html>