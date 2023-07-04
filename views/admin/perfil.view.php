<?php
require_once './permisos.php';
?>

<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <!-- INICIO PERFIL -->

            <!-- FIN PERFIL -->

            <div class="container-fluid">
                <div class="card shadow">
                    <!-- Datatable  -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <!-- Título oculto para pc y laptop -->
                                <div class="d-inline-block d-md-none" style="text-align: center;">
                                    <h3 class="title-tablas2">
                                        Perfil
                                    </h3>
                                </div>
                                <!-- Título oculto para móvil y tablet -->
                                <div class="d-none d-md-inline-block" style="text-align: center;">
                                    <h3 class="title-tablas">
                                        Perfil
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-xl px-4 mt-4">
                        <hr class="mt-0 mb-4">
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Card Perfil-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Usuario</div>
                                    <div class="card-body text-center">
                                        <!-- Imagen estática-->
                                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Detalle de perfil</div>
                                    <div class="card-body">
                                        <form>
                                            <!-- Form Group (Email)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Correo Electrónico</label>
                                                <input class="form-control" id="email" type="text" readonly>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (Nombre)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="namess">Nombres</label>
                                                    <input class="form-control" id="namess" type="text" readonly>
                                                </div>
                                                <!-- Form Group (Apellidos)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="surnames">Apellidos</label>
                                                    <input class="form-control" id="surnames" type="text" readonly>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (Contraseña Actual)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="actualkey">Contraseña Actual</label>
                                                    <input class="form-control" id="actualkey" type="password" placeholder="Ingrese su contraseña actual" disabled>
                                                </div>
                                                <!-- Form Group (Nueva contraseña)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="#">Nueva Contraseña</label>
                                                    <input class="form-control" id="accesskey" type="password" placeholder="Ingrese su nueva contraseña" disabled>
                                                </div>
                                                <!-- Form Group (Confirmar contraseña)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="repetir">Confirmar Contraseña</label>
                                                    <input class="form-control" id="repetir" type="password" placeholder="Confirme su contraseña" disabled>
                                                </div>
                                            </div>
                                            <!-- Actualizar button-->
                                            <button class="btn btn-primary" id="habilitar" type="button">Actualizar</button>
                                            <button class="btn btn-info" id="actualizar" type="button">Cambiar</button>
                                            <button class="btn btn-secondary" id="cancelar" type="button">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>Copyright © ARFECAS 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>

    <!-- Mis funciones y eventos javascript -->
    <script>
        $(document).ready(function(){
            idusers = <?php echo $_SESSION['login']['idusers']; ?>;
            var datos = {
                'operacion': "",
                'accesskey': "",
                'repetir' : "",
                'actualkey':""
            };

            function alertar(textoMensaje = "") {
                Swal.fire({
                    title: 'Usuarios',
                    text: textoMensaje,
                    icon: 'info',
                    footer: 'Horacio Zeballos Gámez',
                    timer: 2000,
                    confirmButtonText: 'Aceptar'
                });
            }

            function alertarToast(titulo = "", textoMensaje = "", icono = "") {
                Swal.fire({
                    title: titulo,
                    text: textoMensaje,
                    icon: icono,
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            }

            function datosUsers(){
                $.ajax({
                    url: '../../controllers/usuario.controller.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data: { 'operacion':'getUsers',
                          'idusers': idusers},
                    success: function (result){
                        $("#email").val(result['email']);
                        $("#namess").val(result['namess']);
                        $("#surnames").val(result['surnames']);
                    }
                });
            }

            function actualizarPerfil(){
                datos['accesskey'] = $("#accesskey").val();
                datos['repetir'] = $("#repetir").val();

                datos['operacion'] = "actualizarPerfil";
                datos['idusers'] = idusers;

                if (datos['accesskey'] !== datos['repetir']) {
                    Swal.fire({
                        title: "Error",
                        text: "Las claves no coinciden",
                        icon: "error",
                        footer: "Horacio Zeballos Gámez",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#38AD4D"
                    });
                } else {
                    Swal.fire({
                        title: "Actualizar",
                        text: "¿Los datos ingresados son correctos?",
                        icon: "question",
                        footer: "Horacio Zeballos Gámez",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#38AD4D",
                        showCancelButton: true,
                        cancelButtonText: "Cancelar",
                        cancelButtonColor: "#D3280A"
                    }).then(result => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '../../controllers/usuario.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function (result) {
                                    alertarToast("Proceso completado", "La contraseña del usuario ha sido actualizado", "success")
                                    //document.getElementById('accesskey2').disabled = true;
                                    //document.getElementById('repetir2').disabled = true;
                                    //$("#editar-contraseña").prop('disabled', false);
                                    setTimeout(function () {
                                       location.reload();
                                    }, 1800)
                                }
                            });
                        }
                    });
                }

            }

            $('#habilitar').on('click',function(){
                //Input - contraseña actual
                document.getElementById('actualkey').disabled = false;
                // Input - nueva contraseña
                document.getElementById('accesskey').disabled = false;
                // Input - repetir nueva contraseña
                document.getElementById('repetir').disabled = false;

            });

            $('#actualizar').on('click',function(){
                email = '<?php echo $_SESSION['login']['email']; ?>';
                actual = $("#actualkey").val();

                datos['actualkey'] = $("#actualkey").val();
                datos['accesskey'] = $("#accesskey").val();
                datos['repetir'] = $("#repetir").val();

                if (datos['accesskey'] == "" || datos['repetir'] == "" || datos['actualkey']=="") {
                    alertar("Complete los campos por favor")
                }else{
                    $.ajax({
                        url: '../../controllers/usuario.controller.php',
                        type: 'GET',
                        dataType: 'JSON',
                        data: {
                            'operacion': 'comparacionContraseña',
                            'email': email,
                            'accesskey': actual
                        },
                        success: function(result) {
                            if (result.comparacion) {
                                actualizarPerfil();
                            }else{
                                Swal.fire({
                                    title: "Error",
                                    text: result.mensaje,
                                    icon: "error",
                                    footer: "Horacio Zeballos Gámez",
                                    confirmButtonText: "Aceptar",
                                    confirmButtonColor: "#38AD4D"
                                });
                            }
                        }
                    });
                }
            });



            datosUsers();


        });


    </script>