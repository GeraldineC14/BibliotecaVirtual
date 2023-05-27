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
                          <font face="impact"><h2 >Módulo de SubCategorias</h2></font>
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
                                        <button class="btn btn-success btn-sm d-none d-sm-inline-block" role="button" data-toggle="modal" data-target="#modal-subcategorias" data-target="#modal-libros-subcategorias" id="mostrar-modal-registro">
                                            <i class="fa-solid fa-book fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Registrar Subcategoría
                                        </button>
                                        <button class="btn btn-danger btn-sm d-none d-sm-inline-block" role="button" href="#"  style="margin-left: 50px;">
                                            <i class="fas fa-download fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Generar Reporte
                                        </button>
                                    </div>                                
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <table class="table display responsive" id="tabla-subcategoria" width="85%" cellspacing="0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subcategoría</th>
                                                    <th>Categoría</th>
                                                    <th>Fecha de Registro</th>
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
                            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-subcategorias" tabindex="-1" aria-labelledby="titulo-modal-subcategorias" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-light">
                                            <h5 class="modal-title" id="titulo-modal-libros">Registrar Subcategoría</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="text-light" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" id="formulario-subcategorias" autocomplete="off">
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
                                                        <label for="subcategoryname">Nombre de SubCategoría:</label>
                                                        <input type="text" id="subcategoryname" class="form-control form-control-sm" >
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="guardar-subcategoria"
                                                class="btn btn-sm btn-success" type="button">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
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
    $(document).ready(function(){
        var datosNuevos = true;
        var datos = {
            'operacion'       : "",
            'idcategorie'     : "",
            'idsubcategorie'  : "",
            'subcategoryname' : ""
        };

        function alertar(textoMensaje = ""){
            Swal.fire({
                title   : 'SubCategorías',
                text    :  textoMensaje,
                icon    :  'info',
                footer  :   'Horacio Zeballos Gámez',
                timer   :   2000,
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

        function reiniciarFormulario(){
            $("#formulario-subcategorias")[0].reset();
        }

        function abrirModalRegistro(){
            datosNuevos = true;

            //Le indicimas el titulo del modal y su clase
            $(".modal-header").removeClass("bg-info");
            $(".modal-header").addClass("bg-success");
            $("#titulo-modal-subcategorias").html("Registrar SubCategoria");

            //Button
            $("#guardar-subcategoria").removeClass("bg-info");
            $("#guardar-subcategoria").addClass("bg-success");

            reiniciarFormulario();
        }


        function ListarSubcategoria(){
            $.ajax({
                url:'../../controllers/subcategoria.controller.php',
                type:'GET',
                data:'operacion=listarSubcategoria3',
                success:function(result){
                    let registros = JSON.parse(result);
                    let nuevaFila = ``;

                    let tabla = $("#tabla-subcategoria").DataTable();
                    tabla.destroy();

                    $("#tabla-subcategoria tbody").html();
                    registros.forEach(registro =>{
                        nuevaFila = `
                        <tr>
                            <td>${registro['idsubcategorie']}</td>
                            <td>${registro['subcategoryname']}</td>
                            <td>${registro['categoryname']}</td>
                            <td>${registro['registrationdate']}</td>
                            <td>
                                <a href='#' data-idsubcategorie='${registro['idsubcategorie']}' class = ' eliminar'><i class="fa-solid fa-user-xmark fa-lg" style="color: #e00000;"></i></a>
                                <a href='#' data-idsubcategorie='${registro['idsubcategorie']}' class = ' editar'><i class="fa-solid fa-user-pen fa-lg" style="color: #1959c8;"></i></a>
                            </td>
                        </tr>
                        `;
                        $("#tabla-subcategoria tbody").append(nuevaFila);
                    });
                        $('#tabla-subcategoria').DataTable({
                            language:{ 
                            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                            }
                        });
                }
            });

        }

        function listarCategorias(){
            $.ajax({
                url:'../../controllers/categoria.controller.php',
                type:'GET',
                data: 'operacion=listarCategoria',
                success: function(result){
                    let registros = JSON.parse(result);
                    let elementosLista = ``;

                    if(registros.length>0){
                        elementosLista = `<option select>Seleccione:</option>`;
                        registros.forEach(registro => {
                            elementosLista += `<option value=${registro['idcategorie']}>${registro['categoryname']}</option>`;
                        });
                    }else{
                        elementosLista = `option>No hay datos asiganados</option>`;
                    }
                    $("#categoria").html(elementosLista);
                }
            });
        }

        function RegistrarSubcategoria(){
            datos['idcategorie']        = $("#categoria").val();
            datos['subcategoryname']    = $("#subcategoryname").val(); 

            if(datosNuevos){
                datos['operacion'] = "registrarSubcategoria";
            }else{
                datos['operacion'] = "actualizarSubcategoria";
                datos['idsubcateogrie'] = idsubcategorie;
            }

            if(datos['subcategoryname'] == "" || datos['idcategorie'] == ""){
                alertar("Complete el formulario por favor")
            }else{
                Swal.fire({
                        title   : "Registro SubCategoría",
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
                            $.ajax({
                                url: '../../controllers/subcategoria.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function(result){
                                    alertarToast("Proceso completado","La Subcategoría ha sido registrado correctamente", "success")
                                    setTimeout(function(){
                                        reiniciarFormulario();
                                        $('#modal-subcategorias').modal('hide');
                                        ListarSubcategoria();                       
                                    }, 1800)
                                }
                            });
                        }
                    });

            }

        }

        $("#tabla-subcategoria tbody").on("click",".editar",function(){
            idsubcategorie = $(this).data("idsubcategorie");

            $.ajax({
                url:'../../controllers/subcategoria.controller.php',
                type:'GET',
                dataType:'JSON',
                data:{
                    'operacion'     : 'getSubcategoria',
                    'idsubcategorie'   : idsubcategorie
                },
                success: function(result){
                    $("#categoria").val(result['idcategorie']);
                    $("#subcategoryname").val(result['subcategoryname']);

                    //Canbiando la configuracion modal
                    $("#titulo-modal-subcategorias").html("Actualizar datos");
                    $(".modal-header").removeClass("bg-success");
                    $(".modal-header").addClass("bg-info");
                    //Button
                    $("#guardar-subcategoria").removeClass("bg-success");
                    $("#guardar-subcategoria").addClass("bg-info");

                    $("#modal-subcategorias").modal("show");   
                    datosNuevos = false;
                }
            });

        });


        $("#guardar-subcategoria").click(RegistrarSubcategoria);
        $("#mostrar-modal-registro").click(abrirModalRegistro);
        $("#cancelar-modal").click(reiniciarFormulario);
        ListarSubcategoria();
        listarCategorias();

    });
    
</script>

</body>

</html>