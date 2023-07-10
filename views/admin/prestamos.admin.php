<?php

require_once 'permisos.php';

?>
<div id="wrapper">
    <!-- INICIO SIDEBAR LEFT -->

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <!-- INICIO PERFIL -->

            <!-- FIN PERFIL -->
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <!-- Título oculto para pc y laptop -->
                                <div class="d-inline-block d-md-none text-center">
                                    <h3 class="title-tablas2">
                                        Préstamos
                                    </h3>
                                </div>
                                <!-- Título oculto para móvil y tablet -->
                                <div class="d-none d-md-inline-block text-center">
                                    <h3 class="title-tablas">
                                        Módulo de Préstamos
                                    </h3>
                                </div>

                                <div class="btn-group" role="group">
                                    <!-- Enlace para redirigir a la vista de reporte -->
                                    <a href="index.php?view=report-prestamo.php" class="btn btn-danger btn-sm d-none d-md-inline-block" style="margin-right: 10px;">
                                        <i class="fas fa-solid fa-file-pdf fa-sm text-black fa-xl"></i>
                                        &nbsp;Reporte
                                    </a>
                                    <!-- Enlace para redirigir a la vista de gráficos -->
                                    <a href="index.php?view=grafico-prestamos.php" class="btn btn-info btn-sm d-none d-md-inline-block">
                                        <i class="fas fa-chart-pie fa-sm text-black fa-xl"></i>
                                        &nbsp;Gráfico
                                    </a>
                                </div>

                                <!-- INICIO Versión Móvil -->
                                <div class="d-flex mx-auto d-md-none">
                                    <div class="btn-group w-100" role="group">
                                        <div class="btn-group w-100" role="group">
                                            <!-- Botón para mostrar la vista de generar de reporte (versión móvil) -->
                                            <a class="btn btn-outline-danger btn-sm d-inline-block mr-2" id="reportButton" href="index.php?view=report-prestamo.php">
                                                <i class="fas fa-solid fa-file-pdf fa-sm text-black fa-xl"></i>
                                                &nbsp;Reporte
                                            </a>
                                            <!-- Botón para mostrar la vista de generar de reporte (versión móvil) -->
                                            <a class="btn btn-outline-info btn-sm d-inline-block" id="chartsButton" href="index.php?view=grafico-prestamos.php">
                                                <i class="fas fa-chart-pie fa-sm text-black fa-xl"></i>
                                                &nbsp;Gráfico
                                            </a>
                                        </div>
                                    </div>
                                    <!-- FIN Versión Móvil -->
                                </div>
                            </div>

                            <!-- Datatable -->
                            <div style="width: 90%; margin:auto" class="mt-2">
                                <div class="card-body">
                                    <table class="table display responsive" id="tabla-prestamos">
                                        <colgroup>
                                            <col width="5%">
                                            <col width="25%">
                                            <col width="20%">
                                            <col width="20%">
                                            <col width="15%">
                                            <col width="15%">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Libro</th>
                                                <th>Usuario</th>
                                                <th>Observación</th>
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



        <!-- Mis funciones y eventos javascript -->
        <script>
            $(document).ready(function() {
                idusers = <?php echo $_SESSION['login']['idusers']; ?>;
                accesslevel = "<?php echo $_SESSION['login']['accesslevel']; ?>";
                const selectLibro = document.querySelector("#libro");

                $(document).on('click', '#devolver', function(event) {
                    var dataID = $(this).data('id');
                    console.log(dataID);

                    Swal.fire({
                        title: 'Devolver libro',
                        text: `¿Estás seguro de devolver este libro?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#7ebe7e',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, devolver',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '../../controllers/prestamo.controller.php',
                                type: 'GET',
                                data: {
                                    'operacion': 'devolverPrestamo',
                                    'idloan': dataID
                                },
                                success: function(result) {
                                    listarPrestamos();
                                }
                            });
                        }
                    });
                });

                function listarPrestamos() {
                    $.ajax({
                        url: '../../controllers/prestamo.controller.php',
                        type: 'GET',
                        data: {
                            'operacion': 'listarPrestamos',
                            'idusers': idusers,
                            'accesslevel': accesslevel
                        },
                        success: function(result) {
                            let registros = JSON.parse(result);
                            let nuevaFila = '';

                            let tabla = $("#tabla-prestamos").DataTable();
                            tabla.destroy();
                            $("#tabla-prestamos tbody").html("");
                            registros.forEach(registro => {
                                observacion = (registro['observation'] == null || registro['observation'] == '') ? 'No cuenta con observación' : registro['observation'];
                                let estado = (registro['state'] == 1) ? '<strong>Prestado</strong>' : '<strong>Devuelto</strong>';
                                let colorCampo = (registro['state'] == 1) ? 'red' : 'green';
                                let disabled = (accesslevel === 'D' || accesslevel === 'E') ? 'disabled' : '';
                                let btnClass = (registro['state'] == 0) ? 'btn btn-success cambiar-estado-btn' : 'btn btn-danger cambiar-estado-btn';
                                let btnText = (registro['state'] == 0) ? '<a><i class="fa-solid fa-check fa-lg" style="color: #000000;"></i></a>' : '<a><i class="fa-solid fa-rotate-left fa-lg" style="color: #000000;"></i></a>';

                                nuevaFila = `
                                        <tr>
                                            <td>${registro['idloan']}</td>
                                            <td>${registro['descriptions']}</td>
                                            <td>${registro['Usuario']}</td>
                                            <td>${observacion}</td>
                                            <td>${registro['loan_date']}</td>
                                            <td>${registro['return_date']}</td>
                                            <td>${registro['amount']}</td>
                                            <td style="color: ${colorCampo}">${estado}</td>
                                            <td><button id='devolver' class='${btnClass}' data-id="${registro['idloan']}" ${disabled}><a style='color: black; font-weight:bold;'>${btnText}</a></button></td>
                                        </tr>
                                        `;

                                $("#tabla-prestamos tbody").append(nuevaFila);
                            });

                            $('#tabla-prestamos').DataTable({
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                                }
                            });

                            // Ocultar botón y columna "Comandos" si el accesslevel es "D" o "E"
                            if (accesslevel === 'D' || accesslevel === 'E') {
                                $('.cambiar-estado-btn').hide();
                                tabla.column(8).visible(false);
                            } else {
                                // Agregar evento de clic a los botones
                                $(".cambiar-estado-btn").click(function() {
                                    let idPrestamo = $(this).data("id");
                                    cambiarEstado(idPrestamo, 'Devuelto');
                                });
                            }
                        }
                    });
                }

                listarPrestamos();
                
            });

        </script>

        </body>

        </html>