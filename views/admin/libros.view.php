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
    <title>Libros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/popups.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <!-- CSS datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- LightBox -->
    <link rel="stylesheet" href="../../vendor/lightbox/css/lightbox.min.css">
    <!-- DataTable Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" />
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
                            <!-- Datatable  -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center">
                                    <div class="btn-group " role="group">
                                        <button class="btn btn-success btn-sm d-none d-sm-inline-block" role="button" data-toggle="modal" data-target="#modal-libros" data-target="#modal-libros-editar" id="mostrar-modal-registro">
                                            <i class="fa-solid fa-book fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Registrar Libro
                                        </button>
                                        <button class="btn btn-danger btn-sm d-none d-sm-inline-block" role="button" href="#"  style="margin-left: 50px;">
                                            <i class="fas fa-download fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Generar Reporte
                                        </button>
                                    </div>                                
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <table class="table display responsive" id="tabla-libros" width="85%" cellspacing="0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Categoría</th>
                                                    <th>Sub categoría</th>
                                                    <th>Código</th>
                                                    <th>Cantidad</th>
                                                    <th>Descripción</th>
                                                    <th>Autor</th>
                                                    <th>Estado</th>
                                                    <th>Ubicación</th>
                                                    <th>PDF de descarga</th>
                                                    <th>Portada</th>
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
                                            <form action="" id="formulario-libros" autocomplete="off">
                                                <!-- Creación de controles -->
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="categoria">Categoría:</label>
                                                        <select name="categoria" id="categoria"
                                                            class="form-control form-control-sm" >
                                                            <option value="">Seleccione:</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="subcategoria">Sub Categoría:</label>
                                                        <select name="subcategoria" id="subcategoria"
                                                            class="form-control form-control-sm" >
                                                            <option value="">Seleccione:</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label for="cantidad">Cantidad:</label>
                                                        <input type="text" id="cantidad"
                                                            class="form-control form-control-sm" >
                                                    </div>

                                                    <div class="col-md-9 form-group">
                                                        <label for="descripcion">Descripción:</label>
                                                        <input type="text" id="descripcion"
                                                            class="form-control form-control-sm" >
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-9 form-group">
                                                        <label for="autor">Autor:</label>
                                                        <input type="text" id="autor"
                                                            class="form-control form-control-sm" >
                                                    </div>

                                                    <div class="col-md-3 form-group">
                                                        <label for="estado">Estado:</label>
                                                        <input type="text" id="estado"
                                                            class="form-control form-control-sm" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="ubicacion">Ubicación:</label>
                                                    <input type="text" id="ubicacion"
                                                        class="form-control form-control-sm" >
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="url">PDF descarga:</label>
                                                        <input type="file" id="url" accept=".pdf"
                                                            class="form-control-file">
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="portada">Portada:</label>
                                                        <input type="file" id="portada" accept=".jpg"
                                                            class="form-control-file">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="guardar-libro"
                                                class="btn btn-sm btn-primary" type="button">Guardar</button>
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
                                        <button type="submit" id="guardar-libro-editar"
                                            class="btn btn-sm btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Zona Modal editar PORTADA-->
                        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-portada-editar" tabindex="-1"
                            aria-labelledby="titulo-modal-portada-editar" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-light">
                                        <h5 class="modal-title" id="titulo-modal-portada-editar">Modificar Portada</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="text-light" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="formulario-portada" autocomplete="off">
                                            <!-- Creación de controles -->
                
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="cancelar-modal-portada" class="btn btn-sm btn-secondary" class="close"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" id="guardar-portada-editar"
                                            class="btn btn-sm btn-primary">Modificar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!-- Zona Modal editar PDF-->
                        <div class="modal" id="modal-pdf-editar" tabindex="-1" aria-labelledby="modalPdf"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-light">  
                                        <h4>EDITAR PDF</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="formulario-pdf" autocomplete="off">
                                            <!-- Creación de controles -->

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="cancelar-modal-portada"
                                            class="btn btn-sm btn-secondary" class="close"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" id="guardar-portada-editar"
                                            class="btn btn-sm btn-primary">Modificar</button>
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


<!-- Lightbox -->
<script src="../../vendor/lightbox/js/lightbox.min.js"></script>
<!-- font -->
<script defer src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>
<!-- Boostrap 4.6 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
<!-- Datatable -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- DataTable Responsive -->
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Mis funciones y eventos javascript -->
<script>
    $(document).ready(function () {
        var idbook = 0;
        var idcategorie = 0;
        var datosNuevos = true;
        datos = {
            'operacion': "",
            'idbook': "",
            'idcategorie': "",
            'idsubcategorie': "",
            'amount': "",
            'descriptions': "",
            'author': "",
            'state': "",
            'locationresponsible': ""
        };

        function alertar(textoMensaje = ""){
                Swal.fire({
                    title   : 'Prestamos',
                    text    :  textoMensaje,
                    icon    :  'info',
                    footer  :   'Horacio Zeballos Gámez',
                    timer   :   2500,
                    confirmButtonText   :   'Aceptar'
                });
        }

        function alertarToast(titulo = "",textoMensaje = "", icono = ""){
            Swal.fire({
                title   : titulo,
                text    : textoMensaje,
                icon    : icono,
                toast   : true,
                position : 'bottom-end',
                showConfirmButton   : false,
                timer   : 1500,
                timerProgressBar    : true
            });
        }

        function mostrarLibros() {
            $.ajax({
                url: '../../controllers/biblioteca.controller.php',
                type: 'GET',
                data: 'operacion=listarLibros',
                success: function (result) {
                    let registros = JSON.parse(result);
                    let nuevaFila = ``;

                    let tabla = $("#tabla-libros").DataTable();
                    tabla.destroy();

                    $("#tabla-libros tbody").html("");
                    registros.forEach(registro => {
                        portada = (registro['frontpage'] == null) ? 'sin-imagen.png' : registro['frontpage'];
                        pdf = (registro['url'] == null) ? 'sin-pdf.png' : registro['url'];

                        nuevaFila = `
                            <tr>
                                <td>${registro['idbook']}</td>
                                <td>${registro['categoryname']}</td>
                                <td>${registro['subcategoryname']}</td>
                                <td>${registro['codes']}</td>
                                <td>${registro['amount']}</td>
                                <td>${registro['descriptions']}</td>
                                <td>${registro['author']}</td>
                                <td>${registro['state']}</td>
                                <td>${registro['locationresponsible']}</td>
                                <td>
                                    <a target='_blank' rel='noopener noreferrer' href='../PDF/${pdf}'> 
                                    <i class="fa-solid fa-eye fa-lg" style="color: #d81313;"></i>
                                    </a>
                                    <a href='#' data-idbook='${registro['idbook']}' class = 'editarpdf'><i class="fa-solid fa-file-pen fa-lg" style="color: #d81313;"></i></a>
                                </td>

                                <td>
                                    <a href='../frontpage/${portada}'
                                        data-idbook='${registro['idbook']}'
                                        data-lightbox='demo'
                                        data-title='${registro['descriptions']}'
                                        title='Mostrar portada del libro'>
                                        <i class="fa-solid fa-eye fa-lg" style="color: #1a4a9e;"></i>
                                    </a>
                                    <a href='#' data-idbook='${registro['idbook']}' class = ' editarportada'><i class="fa-solid fa-camera-rotate fa-lg"  style="color: #1a4a9e;"></i></a>
                                </td>
                                <td>
                                    <a href='#' data-idbook='${registro['idbook']}' class = ' eliminar'><i class="fa-solid fa-trash-can fa-xl" style="color: #cb2525;"></i></a>
                                    <a href='#' data-idbook='${registro['idbook']}' data-idcategorie='${registro['idcategorie']} ' class = ' editar'><i class="fa-solid fa-pen-to-square fa-xl" style="color: #4aa9c9;"></i>  </a>
                                </td>
                            </tr>
                        `;
                        $("#tabla-libros tbody").append(nuevaFila);
                    });

                    $('#tabla-libros').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                        }
                    });
                }
            });
        }

        function listarCategorias() {
            $.ajax({
                url: '../../controllers/categoria.controller.php',
                type: 'GET',
                data: 'operacion=listarCategoria',
                success: function (result) {
                    let registros = JSON.parse(result);
                    let elementosLista = ``;
                    if (registros.length > 0) {
                        //Asignamos un primer elemento, que será el que se muestre por defecto
                        elementosLista = `<option selected>Seleccione</option>`;

                        //Recorremos toda la colección
                        registros.forEach(registro => {
                            //Creamos la etiqueta <option> con el valor requerido
                            elementosLista += `<option value=${registro['idcategorie']}>${registro['categoryname']}</option>`;

                        });
                    } else {
                        //En caso no tengamos datos
                        elementosLista = `<option>No hay datos asignados</option>`;
                    }
                    //Agregando los elementos al <select>
                    $("#categoria").html(elementosLista);
                    $("#categoria2").html(elementosLista);
                }
            });
        }

        $('#categoria').change(function () {
            var categoria_id = $(this).val();
            $.ajax({
                url: '../../controllers/subcategoria.controller.php',
                type: 'GET',
                data: { 'operacion': 'listarSubcategoria', 'idcategorie': categoria_id },
                success: function (result) {
                    let registros = JSON.parse(result);
                    let elementosLista = ``;
                    if (registros.length > 0) {
                        //Asignamos un primer elemento, que será el que se muestre por defecto
                        elementosLista = `<option selected>Seleccione</option>`;

                        //Recorremos toda la colección
                        registros.forEach(registro => {
                            //Creamos la etiqueta <option> con el valor requerido
                            elementosLista += `<option value=${registro['idsubcategorie']}>${registro['subcategoryname']}</option>`;
                        });
                    } else {
                        //En caso no tengamos datos
                        elementosLista = `<option>No hay datos asignados</option>`;
                    }
                    //Agregando los elementos al <select>
                    $("#subcategoria").html(elementosLista);
                }
            });
        });

        $('#categoria2').change(function () {
            var categoriaid = $(this).val();
            $.ajax({
                url: '../../controllers/subcategoria.controller.php',
                type: 'GET',
                data: { 'operacion': 'listarSubcategoria', 'idcategorie': categoriaid },
                success: function (result) {
                    let registros = JSON.parse(result);
                    let elementosLista = ``;
                    if (registros.length > 0) {
                        //Asignamos un primer elemento, que será el que se muestre por defecto
                        elementosLista = `<option selected>Seleccione</option>`;

                        //Recorremos toda la colección
                        registros.forEach(registro => {
                            //Creamos la etiqueta <option> con el valor requerido
                            elementosLista += `<option value=${registro['idsubcategorie']}>${registro['subcategoryname']}</option>`;
                        });
                    } else {
                        //En caso no tengamos datos
                        elementosLista = `<option>No hay datos asignados</option>`;
                    }
                    //Agregando los elementos al <select>
                    $("#subcategoria2").html(elementosLista);
                }
            });
            reiniciarFormulario();
        });

        /*function listarSubcategorias2(){
            $.ajax({
                url:'../controllers/subcategoria.controller.php',
                type:'GET',
                data:'operacion=listarSubcategoria2',
                success: function(result){
                    let registros = JSON.parse(result);
                    let elementosLista = ``;
                    if(registros.length > 0){
                        //Asignamos un primer elemento, que será el que se muestre por defecto
                        elementosLista = `<option selected>Seleccione</option>`;

                        //Recorremos toda la colección
                        registros.forEach(registro => {
                            //Creamos la etiqueta <option> con el valor requerido
                            elementosLista += `<option value=${registro['idsubcategorie']}>${registro['subcategoryname']}</option>`;
                        });
                    }else{
                        //En caso no tengamos datos
                        elementosLista = `<option>No hay datos asignados</option>`;
                    }
                    //Agregando los elementos al <select>
                    $("#subcategoria2").html(elementosLista);
                }
            });
        }*/

        function reiniciarFormulario() {
            $("#formulario-libros")[0].reset();
        }

        function abrirModalRegistro() {
            datosNuevos = true;

            //Le indicimas el titulo del modal y su clase
            $(".modal-header").removeClass("bg-secondary");
            $(".modal-header").addClass("bg-primary");
            $("#titulo-modal-libros").html("Registrar Libros");
            reiniciarFormulario();
        }

        function abrirModalActualizar() {
            datosNuevos = false;

            //Le indicimas el titulo del modal y su clase
            $(".modal-header").removeClass("bg-secondary");
            $(".modal-header").addClass("bg-primary");
            $("#titulo-modal-libros-editar").html("Actualizar Libros");
            reiniciarFormulario();
        }

        //Registrar enviando Binario (PDF, JPG, XLSX, DOCX, ETC)
        function registrarLibrosBin() {
            //Validadicon de campos de datos completos utilizando las variables globales
            
                datos['idcategorie']             =   $("#categoria").val();
                datos['idsubcategorie']          =   $("#subcategoria").val();
                datos['amount']                  =   $("#cantidad").val();
                datos['descriptions']            =   $("#descripcion").val();
                datos['author']                  =   $("#autor").val();
                datos['state']                   =   $("#estado").val();
                datos['locationresponsible']     =   $("#ubicacion").val();

            // Crear un objeto FormData (reemplazar el array asociativo)
                var formdata = new FormData();
                //3.Enviando partametros
                formdata.append("operacion", "registrarLibros");
                formdata.append("idcategorie", $("#categoria").val());
                formdata.append("idsubcategorie", $("#subcategoria").val());
                formdata.append("amount", $("#cantidad").val());
                formdata.append("descriptions", $("#descripcion").val());
                formdata.append("author", $("#autor").val());
                formdata.append("state", $("#estado").val());
                formdata.append("locationresponsible", $("#ubicacion").val());

                formdata.append("url", $("#url")[0].files[0]);
                formdata.append("frontpage", $("#portada")[0].files[0]);

            // Validamos que los campos no esten vacios
            if(datos['idcategorie'] == "" || datos['idsubcategorie'] == "" || datos['amount'] == "" || datos['descriptions'] == "" || datos['author'] == "" || datos['state'] == ""|| datos['locationresponsible'] == ""){
                alertar("Complete el formulario por favor")
            }else{
                //Confirmacion de envio de datos
                Swal.fire({
                        title   : "Registro",
                        text    : "¿Los datos ingresados son correctos?",
                        icon    : "question",
                        footer  : "Horacio Zeballos Gámez",
                        confirmButtonText   : "Aceptar",
                        confirmButtonColor  : "#38AD4D",
                        showCancelButton    : true,
                        cancelButtonText    : "Cancelar",
                        cancelButtonColor   : "#D3280A"
                }).then(result => {
                        if(result.isConfirmed){
                            //Enviamos los datos por ajax
                            $.ajax({
                                url: '../../controllers/biblioteca.controller.php',
                                type: 'POST',
                                data: formdata,
                                contentType: false,
                                processData: false,
                                cache: false,
                                success: function(result){
                                    alertarToast("Proceso completado","El libro ha sido registrado correctamente", "success")
                                    setTimeout(function(){
                                        reiniciarFormulario();
                                        $('#modal-libros').modal('hide');
                                        mostrarLibros();                       
                                    }, 1800)
                                }
                            });
                        }
                    });  
            }               
        }

        function ActualizarLibros() {
            /*
            Cuando se le asigna {} o [] a un objeto, se está REDEFINIENDO
            se le está volviendo a construir / 
            */
            //El objeto datos ha sido creado en ámbito GLOBAL
            datos['idcategorie'] = $("#categoria2").val();
            datos['idsubcategorie'] = $("#subcategoria2").val();
            datos['amount'] = $("#cantidad2").val();
            datos['descriptions'] = $("#descripcion2").val();
            datos['author'] = $("#autor2").val();
            datos['state'] = $("#estado2").val();
            datos['locationresponsible'] = $("#ubicacion2").val();

            datos['operacion'] = "actualizarLibro";
            datos['idbook'] = idbook;

            if (confirm("¿Estas seguro de guardar el registro?")) {
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: datos,
                    success: function (result) {
                        console.log(result);
                        alert("Proceso terminado correctamente");
                        mostrarLibros();
                        $("#modal-libros-editar").modal("hide");

                    }
                });
            }
        }

        $("#tabla-libros tbody").on("click", ".eliminar", function () {
            //Almacenamos la PK en una variable
            let idbook = $(this).data("idbook");

            if (confirm("¿Está seguro de eliminar el registro?")) {
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: { 'operacion': 'eliminarLibro', 'idbook': idbook },
                    success: function (result) {
                        if (result == "") {
                            idbook = ``;
                            mostrarLibros();
                        }
                    }
                });
            }
        });

        $("#tabla-libros tbody").on("click", ".editar", function () {
            idbook = $(this).data("idbook");
            $.ajax({
                url: '../../controllers/biblioteca.controller.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'operacion': 'getLibro',
                    'idbook': idbook
                },
                success: function (result) {
                    $("#categoria2").val(result['idcategorie']);
                    $("#subcategoria2").val(result['idsubcategorie']);
                    $("#cantidad2").val(result['amount']);
                    $("#descripcion2").val(result['descriptions']);
                    $("#autor2").val(result['author']);
                    $("#estado2").val(result['state']);
                    $("#ubicacion2").val(result['locationresponsible']);

                    //Cambiando configuración modal
                    $("#titulo-modal-libros-editar").html("Actualizar datos");
                    $(".modal-header").removeClass("bg-primary");
                    $(".modal-header").addClass("bg-secondary");

                    $("#modal-libros-editar").modal("show");
                    datosNuevos = false;
                    console.log(result);
                }
            });
        });
        
        $("#tabla-libros tbody").on("click", ".editarportada", function () {
            idbook = $(this).data("idbook");
            $.ajax({
                url: '../../controllers/biblioteca.controller.php',
                type: 'GET',
                data: { 'operacion': 'getBinarios', 'idbook': idbook },
                success: function (result) {
                    let registros = JSON.parse(result);
                    let nuevaFila = ``;
                    portada = (registros['frontpage'] == null) ? 'noimagen.png' : registros['frontpage'];
                    nuevaFila = `
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="frontpage">Portada</label>
                                    <input id="frontpage" class="form-control" type="file" name="frontpage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img class="img-thumbnail" src="../frontpage/${portada}" width="250">   
                            </div>
                        `;
                    $("#formulario-portada").append(nuevaFila);
                    $("#modal-portada-editar").modal("show");
                }
    
            });
        });



        // MODAL EDITAR PDF
        $("#tabla-libros tbody").on("click", ".editarpdf", function () {
                    idbook = $(this).data("idbook");
                    $.ajax({
                        url: '../../controllers/biblioteca.controller.php',
                        type: 'GET',
                        data: { 'operacion': 'getBinarios', 'idbook': idbook },
                        success: function (result) {
                            let registros = JSON.parse(result);
                            let nuevaFila = ``;
                            pdf = (registros['url'] == null) ? 'sin-pdf.png' : registros['url'];
                            nuevaFila = `

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="pdf">PDF</label>
                                    <input id="pdf" class="form-control" type="file" name="pdf">
                                </div>
                            </div>
                            <div class="pdf">
                                <iframe src='../PDF/${pdf}' width='100%' height='450'></iframe>
                            </div> 
                    
                    `;
                            $("#formulario-pdf").append(nuevaFila);
                            $("#modal-pdf-editar").modal("show");
                        }

                    });
                });

        //Eventos
        $("#mostrar-modal-registro").click(abrirModalRegistro);
        $("#guardar-libro").click(registrarLibrosBin);
        $("#cancelar-modal").click(reiniciarFormulario);

        $("#mostrar-modal-editar").click(abrirModalActualizar);
        $("#guardar-libro-editar").click(ActualizarLibros);
        $("#cancelar-modal-editar").click(reiniciarFormulario);


        //Funciones de carga automatica
        mostrarLibros();
        listarCategorias();
        //listarSubcategorias2();

    });
</script>

</body>

</html>