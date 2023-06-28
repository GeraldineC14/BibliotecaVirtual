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
                                        Comentarios
                                    </h3>
                                </div>
                                <!-- Título oculto para móvil y tablet -->
                                <div class="d-none d-md-inline-block" style="text-align: center;">
                                    <h3 class="title-tablas">
                                        Módulo de Comentarios
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table display responsive" id="tabla-comentario" width="85%" cellspacing="0">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="15%">
                                        <col width="25%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Datos personales</th>
                                            <th>Libro</th>
                                            <th>Fecha</th>
                                            <th>Comentario</th>
                                            <th>Comando</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
        $(document).ready(function() {

            $(document).on('click', '#borrar', function(event) {
                var dataID = $(this).data('id');

                Swal.fire({
                    title: 'Eliminar comentario',
                    text:`¿Estás seguro de eliminar este comentario?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7ebe7e',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../../controllers/comentario.controller.php',
                            type: 'GET',
                            data: {
                                'operacion': 'eliminarComentario',
                                'idcomentario': dataID
                            },
                            success: function(result) {
                                listarComentario();
                                Swal.fire('Eliminado', 'El comentario del usuario ha sido eliminado correctamente', 'success').then(() => {

                                });
                            }
                        });
                    }
                });
            });


            function listarComentario() {
                $.ajax({
                    url: "../../controllers/comentario.controller.php",
                    type: "GET",
                    data: 'operacion=listarComentario',
                    success: function(response) {
                        let registros = JSON.parse(response);
                        let nuevaFila = "";

                        let tabla = $("#tabla-comentario").DataTable();
                        tabla.destroy();

                        $("#tabla-comentario tbody").html("");

                        registros.forEach(registro => {

                            nuevaFila = `
                                <tr>
                                    <td>${registro['idcomentario']}</td>
                                    <td>${registro['datos']}</td>
                                    <td>${registro['descriptions']}</td>
                                    <td>${registro['commentary_date']}</td>
                                    <td>${registro['commentary']}</td>
                                    <td class='text-center'><button  id='borrar' class='btn btn-danger' data-id="${registro['idcomentario']}"><a style='color: black; font-weight:bold;'><i class="fa-solid fa-trash-can fa-lg"></i></a></button></td>
                                </tr>
                            `;

                            $("#tabla-comentario tbody").append(nuevaFila);

                        });

                        $('#tabla-comentario').DataTable({
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                            }
                        });

                    }
                });
            }


            listarComentario();
        });
    </script>