<?php
    session_start();

    /*if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
        header("location:login.php");
    }*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
     <!-- CSS datatable -->
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- DataTable Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
</head>

<body id="page-top">
    <div id="wrapper">
    <?php include "./template/slider.general.php"; ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                
                <!-- FIN PERFIL -->
                <div class="container-fluid">
                    <!-- Datatable  -->
                    <div style="width: 90%; margin:auto" class="mt-2">
                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-usuarios" data-target="#modal-usuarios" id="mostrar-modal-usuario">
                                <i class="fa-solid fa-user-plus fa-2xl" style="color: #2fbf1d;"></i>
                            </button>    
                            <hr>
                            <div class="card-body">
                                <table class="table display responsive" id="tabla-usuarios">
                                    <thead class="table-dark">    
                                        <tr>
                                            <th>#</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Nivel de Acceso</th>
                                            <th>Comandos</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- Zona Modal registro usuario-->
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-usuarios" tabindex="-1" aria-labelledby="titulo-modal-usuarios" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                <h5 class="modal-title" id="titulo-modal-usuarios">Registrar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="text-light" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="formulario-usuarios" autocomplete="off">
                                    <!-- Creación de controles -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="namess">Nombres:</label>
                                            <input type="text" class="form-control form-control-sm" id="namess">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="surnames">Apellidos:</label>
                                            <input type="text" class="form-control form-control-sm" id="surnames">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="accesslevel"> Nivel de Acceso</label>
                                            <select name="accesslevel" id="accesslevel" class="form-control form-control-sm">
                                                <option value="E">Estudiante</option>
                                                <option value="D">Docente</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="accesskey">Contraseña:</label>
                                            <input type="password" id="accesskey" class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="repetir">Repetir contraseña:</label>
                                            <input type="password" id="repetir" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="guardar-usuario" class="btn btn-sm btn-primary">Guardar</button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Zona Modal editar usuario-->
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-usuarios2" tabindex="-1" aria-labelledby="titulo-modal-usuarios2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                <h5 class="modal-title" id="titulo-modal-usuarios2">Editar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="text-light" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="formulario-usuarios2" autocomplete="off">
                                    <!-- Creación de controles -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="namess2">Nombres:</label>
                                            <input type="text" class="form-control form-control-sm" id="namess2">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="surnames2">Apellidos:</label>
                                            <input type="text" class="form-control form-control-sm" id="surnames2">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="email2">Email:</label>
                                            <input type="email" id="email2" class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="accesslevel2"> Nivel de Acceso</label>
                                            <select name="accesslevel2" id="accesslevel2" class="form-control form-control-sm">
                                                <option value="E">Estudiante</option>
                                                <option value="D">Docente</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="accesskey2">Contraseña:</label>
                                            <input type="password" id="accesskey2" class="form-control form-control-sm" disabled>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="repetir2">Repetir contraseña:</label>
                                            <input type="password" id="repetir2" class="form-control form-control-sm" disabled>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="cancelar-modal2" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="guardar-usuario2" class="btn btn-sm btn-primary" >Guardar</button>
                                <button type="button" id="editar-contraseña" class="btn btn-sm btn-primary">Editar Contraseña</button>
                            </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ARFECAS 2023</span></div>
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
    
<!-- font -->
<script defer src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>
<!-- Boostrap 4.6 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<!-- Datatable -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- DataTable Responsive -->
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Mis funciones y eventos javascript -->
<script>
    $(document).ready(function(){
        var idusers = 0;
        var datosNuevos = true;
        var datos={
            'operacion' : "",
            'namess'  : "",
            'surnames'  : "",
            'email'  : "",
            'accesskey'  : "",
            'repetir'  : "",
            'accesslevel'  : ""
        };
        
        function alertar(textoMensaje = ""){
                Swal.fire({
                    title   : 'Usuarios',
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

        function listarUsuarios(){
            $.ajax({
                url:'../../controllers/usuario.controller.php',
                type:'GET',
                data:'operacion=listarUsuarios',
                success: function(result){
                let registros = JSON.parse(result);
                let nuevaFila = ``;

                let tabla = $("#tabla-usuarios").DataTable();
                tabla.destroy();

                $("#tabla-usuarios tbody").html("");
                registros.forEach(registro => {
                    nuevaFila = `
                    <tr>
                        <td>${registro['idusers']}</td>
                        <td>${registro['namess']}</td>
                        <td>${registro['surnames']}</td>
                        <td>${registro['email']}</td>
                        <td>${registro['accesslevel']}</td>
                        <td>
                            <a href='#' data-idusers='${registro['idusers']}' class = ' eliminar'><i class="fa-solid fa-user-xmark fa-lg" style="color: #e00000;"></i></a>
                            <a href='#' data-idusers='${registro['idusers']}' class = ' editar'><i class="fa-solid fa-user-pen fa-lg" style="color: #1959c8;"></i></a>
                        </td>
                    </tr>
                    `;
                    $("#tabla-usuarios tbody").append(nuevaFila);
                });

                    $('#tabla-usuarios').DataTable({
                        language:{ 
                        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                        }
                    });
                }
            });
        }

        function abrirModalRegistro(){
            datosNuevos = true;

            $(".modal-header").removeClass("bg-info");
            $(".modal-header").addClass("bg-success");
            $("#titulo-modal-usuarios").html("Registrar Usuario");

            reiniciarFormulario();
        }
        
      
        function registrarUsuario(){
            datos['surnames']    =   $("#surnames").val();
            datos['namess']      =   $("#namess").val();
            datos['email']       =   $("#email").val();
            datos['accesslevel'] =   $("#accesslevel").val();
            datos['accesskey']   =   $("#accesskey").val();
            datos['repetir']     =   $("#repetir").val();

            datos['operacion']  = "registrarUsuario";

            if(datos['surnames'] == "" || datos['namess'] == "" || datos['email'] == "" || datos['accesslevel'] == "" || datos['accesskey'] == "" || datos['repetir'] == ""){
                alertar("Complete el formulario por favor")
                }else{
                if(datos['accesskey'] !== datos['repetir']){
                    alertarToast("Ha sucecido un error","Las claves no coinciden","error")
                }else{

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
                            $.ajax({
                                url: '../../controllers/usuario.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function(result){
                                    alertarToast("Proceso completado","El usuario ha sido registrado correctamente", "success")
                                    setTimeout(function(){
                                        reiniciarFormulario();
                                        $('#modal-usuarios').modal('hide');
                                        listarUsuarios();                       
                                    }, 1800)
                                }
                            });
                        }
                    });
                }
            
            }     
                        
        }

        function editarUsuario(){
            datos['surnames']    =   $("#surnames2").val();
            datos['namess']      =   $("#namess2").val();
            datos['email']       =   $("#email2").val();
            datos['accesslevel'] =   $("#accesslevel2").val();
            datos['accesskey']   =   $("#accesskey2").val();
            datos['repetir']     =   $("#repetir2").val();
            
            datos['operacion']  = "actualizarUsuario";
            datos['idusers'] = idusers; 


            if(datos['surnames'] == "" || datos['namess'] == "" || datos['email'] == "" || datos['accesslevel'] == "" ){
                alertar("Complete el formulario por favor")
                }else{
                if(datos['accesskey'] !== datos['repetir']){
                    alertarToast("Ha sucecido un error","Las claves no coinciden","error")
                }else{

                    Swal.fire({
                        title   : "Actualizar",
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
                                url: '../../controllers/usuario.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function(result){
                                    alertarToast("Proceso completado","Los datos del usuario ha sido actualizado", "success")
                                    document.getElementById('accesskey2').disabled = true;
                                    document.getElementById('repetir2').disabled = true;
                                    $("#editar-contraseña").prop('disabled',false);
                                    setTimeout(function(){
                                        reiniciarFormulario();
                                        $('#modal-usuarios2').modal('hide');
                                        listarUsuarios();                       
                                    }, 1800)
                                }
                            });
                        }
                    });
                }
            
            }     
                        
        }

        function reiniciarFormulario(){
            $("#formulario-usuarios")[0].reset();
            $("#formulario-usuarios2")[0].reset();
            document.getElementById('accesskey2').disabled = true;
            document.getElementById('repetir2').disabled = true;
            $("#editar-contraseña").prop('disabled',false);
        }

        function activarContraseña(){
           
           Swal.fire({
                   title   : "Usuarios",
                   text    : "¿Esta seguro modificar contraseña?",
                   icon    : "question",
                   footer  : "I.E. Horacio Zeballos Gámez",
                   confirmButtonText   : "Aceptar",
                   confirmButtonColor  : "#38AD4D",
                   showCancelButton    : true,
                   cancelButtonText    : "Cancelar",
                   cancelButtonColor   : "#D3280A"
               }).then(result => {
                   if (result.isConfirmed){
                       document.getElementById('accesskey2').disabled = false;
                       document.getElementById('repetir2').disabled = false;
                       $("#accesskey2").val("");
                       $("#repetir2").val("");
                       $("#editar-contraseña").prop('disabled',true);
                       alertarToast("Modificación de contraseña activada","", "success")
                   }
               })

        }

        $("#tabla-usuarios tbody").on("click", ".eliminar", function(){
            //Almacenamos la PK en una variable
            let idusers = $(this).data("idusers");
            Swal.fire({
                    title   : "Usuarios",
                    text    : "¿Esta seguro de eliminar al usuario?",
                    icon    : "question",
                    footer  : "I.E. Horacio Zeballos Gámez",
                    confirmButtonText   : "Aceptar",
                    confirmButtonColor  : "#38AD4D",
                    showCancelButton    : true,
                    cancelButtonText    : "Cancelar",
                    cancelButtonColor   : "#D3280A"
                }).then(result => {
                    if (result.isConfirmed){
                        $.ajax({
                            url: '../../controllers/usuario.controller.php',
                            type: 'GET',
                            data: {'operacion':'eliminarUsuario','idusers':idusers},
                            success: function(result){
                                if(result == ""){
                                    idusers = ``;
                                    alertarToast("Perfecto","Usuario eliminado correctamente","success")
                                    listarUsuarios();
                                }
                            }
                        });
                    }
                })
        });

        $("#tabla-usuarios tbody").on("click", ".editar", function(){
            idusers = $(this).data("idusers");
                $.ajax({
                    url: '../../controllers/usuario.controller.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        'operacion' : 'getUsers', 
                        'idusers': idusers
                    },
                    success: function(result){
                        $("#namess2").val(result['namess']);
                        $("#surnames2").val(result['surnames']);
                        $("#email2").val(result['email']);
                        $("#accesslevel2").val(result['accesslevel']);
                        $("#accesskey2").val(result['accesskey']);
                        $("#repetir2").val(result['accesskey']);

                        //Cambiando configuración modal
                        $("#titulo-modal-usuarios2").html("Actualizar datos de Usuario");
                        $(".modal-header").removeClass("bg-primary");
                        $(".modal-header").addClass("bg-secondary");
                        $("#modal-usuarios2").modal("show");
                        datosNuevos =false;
                        console.log(result);
                    }
                });
        });

        //Funciones de carga automatica
        listarUsuarios();
        $("#mostrar-modal-usuario").click(abrirModalRegistro);
        $("#guardar-usuario").click(registrarUsuario);
        $("#cancelar-modal").click(reiniciarFormulario);
        
        $("#guardar-usuario2").click(editarUsuario);
        $("#cancelar-modal2").click(reiniciarFormulario);
        $("#editar-contraseña").click(activarContraseña);
        
    });
</script>
</body>
</html>