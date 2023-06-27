<?php

require_once './permisos.php';
 
?>
<div id="wrapper">
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
                                            <th>Nombre de usuario</th>
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
                                            <label for="username">Nombre de Usuario:</label>
                                            <input type="username" id="username" class="form-control form-control-sm">
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
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" class="form-control form-control-sm">
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
                                            <label for="username2">Nombre de usuario:</label>
                                            <input type="text" id="username2" class="form-control form-control-sm">
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
                                        <div class="form-group">
                                            <label for="email2">Email:</label>
                                            <input type="email" id="email2" class="form-control form-control-sm">
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
                                <button type="button" id="cancelar-modal2" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
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

<!-- Mis funciones y eventos javascript -->
<script>
    $(document).ready(function(){
        var idusers = 0;
        var datosNuevos = true;
        var datos={
            'operacion'     : "",
            'namess'        : "",
            'surnames'      : "",
            'username'       : "",
            'email'         : "",
            'accesskey'     : "",
            'repetir'       : "",
            'accesslevel'   : ""
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
                        <td>${registro['username']}</td>
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

        function validar() {
            const username = $("#username").val();
            const surnames = $("#surnames").val();
            const namess = $("#namess").val();
            const email = $("#email").val();
            const accesskey = $("#accesskey").val();
            const accesslevel = $("#accesslevel").val();
            const repetir = $("#repetir").val();

            datos['username'] = username;
            datos['surnames'] = surnames;
            datos['namess'] = namess;
            datos['email'] = email;
            datos['accesskey'] = accesskey;
            datos['accesslevel'] = accesslevel;
            datos['repetir'] = repetir;
            datos['operacion'] = "registrarUsuario";

            // Valida que los campos no esten vacios
            if (username === "" || surnames === "" || namess === "" || email === "" || accesslevel === "" || accesskey === "" || repetir === "") {
                alertar("Complete el formulario por favor");
                return;
            }

            console.log($("#username").val())

            // Realiza la llamada AJAX para validar el username
            $.ajax({
                url: '../../controllers/usuario.controller.php',
                type: 'GET',
                data: {
                    'operacion': 'validacionUsuario',
                    'username': datos['username']
                },
                success: function(result) {
                    if (result !== '[]') {
                            alertar("El USUARIO ya existe en el sistema");
                            console.log(result);
                            return;
                    }

                    if (accesslevel === "D") {
                        const esvalido = document.getElementById('email');
                        const exprecion = /[a-zA-Z0-9._-]+\@midominio\.com/;
                        if (exprecion.test(esvalido.value)) {
                            const email = $("#email").val();
                            $.ajax({
                                url: '../../controllers/usuario.controller.php',
                                type: 'GET',
                                data: {
                                        'operacion': 'validacionCorreo',
                                        'email': email
                                },
                                success: function(result) {
                                    if (result !== '[]') {
                                        alertar("El correo de docente ya existe en el sistema");
                                        console.log(result);
                                        return;
                                    }
                                    registrar();
                                }
                            });
                        }else{
                            Swal.fire({
                                title: "Error",
                                text: "Correo no autorizado",
                                icon: "error",
                                footer: "Horacio Zeballos Gámez",
                                confirmButtonText: "Aceptar",
                                confirmButtonColor: "#38AD4D"
                            });
                        }
                    }else{
                        const email = document.getElementById('email');
                        const dominios = ['gmail.com', 'hotmail.com', 'outlook.es'];
                        const value = email.value.split('@');

                        if (!dominios.includes(value[1])) {
                                Swal.fire({
                                        title: "Error",
                                        text: `Correos autorizados: ${dominios}`,
                                        icon: "error",
                                        footer: "Horacio Zeballos Gámez",
                                        confirmButtonText: "Aceptar",
                                        confirmButtonColor: "#38AD4D"
                                });
                        }else{
                            const email = $("#email").val();
                            $.ajax({
                                url: '../../controllers/usuario.controller.php',
                                type: 'GET',
                                data: {
                                        'operacion': 'validacionCorreo',
                                        'email': email
                                },
                                success: function(result) {
                                    if (result !== '[]') {
                                            alertar("El correo de estudiante ya existe en el sistema");
                                            console.log(result);
                                            return;
                                    }
                                    registrar();
                                }
                            });
                        }
                    }
                }
            });
		}

        function registrar(){
            if(datos['accesskey'] !== datos['repetir']){
                Swal.fire({
                    title   : "Ha sucecido un error",
                    text    : `Las claves no coinciden`,
                    icon    : "error",
                    footer  : "Horacio Zeballos Gámez",
                    confirmButtonText   : "Aceptar",
                    confirmButtonColor  : "#38AD4D"
                });
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
                                alertarToast("Registrado correctamente","Su usuario ha sido creado", "success")
                                $("#formulario-usuarios")[0].reset();
                                setTimeout(function(){
                                    reiniciarFormulario();
                                    $("#modal-usuarios").modal('hide');
                                    listarUsuarios();
                                }, 1500)
                            }
                        });
                    }
                });
            }
        }

        function editarUsuario(){
            datos['surnames']    =   $("#surnames2").val();
            datos['namess']      =   $("#namess2").val();
            datos['username']    =   $("#username2").val();
            datos['email']       =   $("#email2").val();
            datos['accesslevel'] =   $("#accesslevel2").val();
            datos['accesskey']   =   $("#accesskey2").val();
            datos['repetir']     =   $("#repetir2").val();

            datos['operacion']  = "actualizarUsuario";
            datos['idusers'] = idusers;

             // Valida que los campos no esten vacios
            if (datos['surnames'] == "" || datos['namess']  == "" || datos['username'] == "" || datos['email'] == "" || datos['accesslevel'] == "") {
                alertar("Complete el formulario por favor");
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
                                        $("#modal-usuarios2").modal('hide');
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
                        $("#username2").val(result['username']);
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
        //Registro
        $("#mostrar-modal-usuario").click(abrirModalRegistro);
        $("#guardar-usuario").click(validar);
        $("#cancelar-modal").click(reiniciarFormulario);

        //Editar
        $("#guardar-usuario2").click(validar);
        $("#cancelar-modal2").click(reiniciarFormulario);
        $("#editar-contraseña").click(activarContraseña);


    });
</script>
</body>
</html>