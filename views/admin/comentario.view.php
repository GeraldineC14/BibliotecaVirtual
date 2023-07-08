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
                                        Usuarios
                                    </h3>
                                </div>
                                <!-- Título oculto para móvil y tablet -->
                                <div class="d-none d-md-inline-block" style="text-align: center;">
                                    <h3 class="title-tablas">
                                        Módulo de Comentarios
                                    </h3>
                                </div>

                                <div class="btn-group" role="group">
                                    <!-- Botón para mostrar la vista de reporte -->
                                    <button class="btn btn-danger btn-sm d-none d-md-inline-block"  id="reportButton">
                                        <a href="index.php?view=report-comentario.php"></a>
                                        <i class="fas fa-download fa-sm text-black fa-xl"></i>
                                        &nbsp;Generar Reporte
                                    </button>
                                </div>
                                <!-- INICIO Versión Móvil -->
                                <div class="d-flex mx-auto d-md-none">
                                    <div class="btn-group w-100" role="group">
                                        <!-- Botón para mostrar la vista de generación de reporte (versión móvil) -->
                                        <a class="btn btn-outline-danger btn-sm d-inline-block" id="reportButton" href="index.php?view=report-comentario.php">
                                            <i class="fas fa-download fa-sm text-black fa-xl"></i>
                                            &nbsp;Reporte
                                        </a>
                                    </div>
                                </div>
                                <!-- FIN Versión Móvil -->
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
                                            <th>Usuario</th>
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

                    <!-- ... -->
                    <div class="modal fade" id="modal-comentario" tabindex="-1" role="dialog" aria-labelledby="modal-comentario-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-black" id="modal-comentario-label"><i class="fa-solid fa-eye fa-beat fa-xl" style="color: #000000;"></i></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="comentario-contenido">
                                        <!-- Llamado por AJAX -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ... -->
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
            idusers = <?php echo $_SESSION['login']['idusers']; ?>;
            accesslevel = "<?php echo $_SESSION['login']['accesslevel']; ?>";

            $(document).on('click', '#borrar', function(event) {
                var dataID = $(this).data('id');

                Swal.fire({
                    title: 'Eliminar comentario',
                    text: `¿Estás seguro de eliminar este comentario?`,
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
                    data: {
                            'operacion': 'listarComentario',
                            'idusers': idusers,
                            'accesslevel': accesslevel
                        },
                    success: function(response) {
                        let registros = JSON.parse(response);
                        let nuevaFila = "";

                        let tabla = $("#tabla-comentario").DataTable();
                        tabla.destroy();

                        $("#tabla-comentario tbody").html("");

                        registros.forEach(registro => {
                            let commentPreview = registro['commentary'].split(' ').slice(0, 5).join(' ');
                            let disabled = (accesslevel === 'D' || accesslevel === 'E') ? 'disabled' : '';
                            nuevaFila = `
                    <tr>
                        <td>${registro['idcomentario']}</td>
                        <td>${registro['datos']}</td>
                        <td>${registro['descriptions']}</td>
                        <td>${registro['commentary_date']}</td>
                        <td>${commentPreview}</td>
                        <td class='text-center'>
                            <button class='btn btn-info ver-comentario' data-id='${registro['idcomentario']}' data-toggle='modal' data-target='#modal-comentario'>
                                <a style='color: black; font-weight:bold;'><i class="fa-solid fa-comment-dots fa-lg"></i></a>
                            </button>
                            <button id='borrar' class='btn btn-danger' data-id="${registro['idcomentario']}"${disabled}>
                                <a style='color: black; font-weight:bold;'><i class="fa-solid fa-trash-can fa-lg"></i></a>
                            </button>
                        </td>
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


            $(document).on('click', '.ver-comentario', function() {
                var dataID = $(this).data('id');

                $.ajax({
                    url: '../../controllers/comentario.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'obtenerComentario',
                        'idcomentario': dataID
                    },
                    success: function(response) {
                        let comentario = JSON.parse(response)[0];

                        // Mostrar los datos en el modal
                        let modalBody = $("#modal-comentario .modal-body");
                        modalBody.html(`
                    <p><strong>Comentario:</strong> ${comentario.commentary}</p>
                `);

                        // Abrir el modal
                        $("#modal-comentario").modal('show');
                    }
                });
            });

            document.getElementById('reportButton').addEventListener('click', function(event) {
                // Evitar que el evento de clic se propague al botón
                event.preventDefault();

                // Obtener el enlace dentro del botón
                var link = this.querySelector('a');

                // Obtener la URL de href del enlace
                var url = link.getAttribute('href');

                // Redirigir a la URL indicada en el href
                window.location.href = url;
            });


            listarComentario();
        });
    </script>