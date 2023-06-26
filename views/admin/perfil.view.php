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
                                                <label class="small mb-1" for="#">Correo Electrónico</label>
                                                <input class="form-control" id="#" type="text" readonly>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (Nombre)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="#">Nombres</label>
                                                    <input class="form-control" id="#" type="text" readonly>
                                                </div>
                                                <!-- Form Group (Apellidos)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="#">Apellidos</label>
                                                    <input class="form-control" id="#" type="text" readonly>
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (Contraseña Actual)-->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="#">Contraseña Actual</label>
                                                    <input class="form-control" id="#" type="password" placeholder="Ingrese su contraseña actual">
                                                </div>
                                                <!-- Form Group (Nueva contraseña)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="#">Nueva Contraseña</label>
                                                    <input class="form-control" id="#" type="password" placeholder="Ingrese su nueva contraseña">
                                                </div>
                                                <!-- Form Group (Confirmar contraseña)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="#">Confirmar Contraseña</label>
                                                    <input class="form-control" id="#" type="password" placeholder="Confirme su contraseña">
                                                </div>
                                            </div>
                                            <!-- Actualizar button-->
                                            <button class="btn btn-primary" type="button">Actualizar</button>
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

    </script>