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
                                    <a href="index.php?view=report-prestamo.php" class="btn btn-danger  d-none d-md-inline-block" style="margin-right: 10px;">
                                        <i class="fas fa-solid fa-file-pdf fa-sm text-black fa-xl"></i>
                                        &nbsp;Reporte
                                    </a>
                                    <!-- Enlace para redirigir a la vista de gráficos -->
                                    <a href="index.php?view=grafico-prestamos.php" class="btn btn-info d-none d-md-inline-block">
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
                                            <col width="10%">
                                            <col width="15%">
                                            <col width="15%">
                                            <col width="20%">
                                            <col width="25%">
                                            <col width="15%">
                                            <col width="15%">
                                            <col width="15%">
                                            <col width="15%">
                                        </colgroup>
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Libro</th>
                                                <th>Usuario</th>
                                                <th>Observación</th>
                                                <th>Registro</th>
                                                <th>Recojo</th>
                                                <th>Retorno</th>
                                                <th>Cancelado</th>
                                                <th>Cantidad</th>
                                                <th>Reporte</th>
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

        <!-- Modal Devolver Libro -->
        <div class="modal fade" id="modalDevolverLibro" tabindex="-1" role="dialog" aria-labelledby="modalDevolverLibroLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDevolverLibroLabel">Devolver Libro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="comentario">Comentario:</label>
                            <textarea class="form-control" id="comentario" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnDevolverLibro">Devolver</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Mis funciones y eventos javascript -->
        <script>
            $(document).ready(function() {
                idusers = <?php echo $_SESSION['login']['idusers']; ?>;
                accesslevel = "<?php echo $_SESSION['login']['accesslevel']; ?>";
                const selectLibro = document.querySelector("#libro");

                function listarPrestamos() {
                    $.ajax({
                        url: '../../controllers/prestamo.controller.php',
                        type: 'GET',
                        data: {
                            'operacion': 'listarPrestamo',
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
                                let estadoColor = '';
                                let estadoTexto = '';

                                if (registro['Estado'] === '1') {
                                    estadoColor = 'text-secondary';
                                    estadoTexto = '<b>PENDIENTE</b>';

                                    // Ocultar botones Cancelar y Devolver para D y E
                                    let comandosHtml = '';
                                    if (accesslevel !== 'D' && accesslevel !== 'E') {
                                        comandosHtml = `
                                            <td>
                                            <button class='btn btn-success entregar' data-id="${registro['idloan']}" title='Entregar'>
                                            <a style='color: black; font-weight:bold;'>
                                                <i class="fa-solid fa-hand-holding-hand" style="color: #000000;"></i>
                                            </a>
                                        </button>
                                        <button class='btn btn-danger cancelar' data-id="${registro['idloan']}" title='Cancelar'>
                                            <a style='color: black; font-weight:bold;'>
                                                <i class="fa-solid fa-ban" style="color: #000000;"></i>
                                            </a>
                                        </button>
                                            </td>
                                        `;
                                    }

                                    // Ocultar botones Devolver y Observado
                                    nuevaFila += `
                                <tr>
                                    <td>${registro['idloan']}</td>
                                    <td>${registro['Titulo']}</td>
                                    <td>${registro['Usuario']}</td>
                                    <td>${registro['Observacion']}</td>
                                    <td>${registro['F. Registro']}</td>
                                    <td>${registro['F. Recojo']}</td>
                                    <td>${registro['F. Retorno']}</td>
                                    <td>${registro['F. Cancelacion']}</td>
                                    <td>${registro['Cantidad']}</td>
                                    <td>${registro['Perdida']}</td>
                                    <td class="${estadoColor}">${estadoTexto}</td>
                                    ${comandosHtml}
                                </tr>
                            `;
                                } else if (registro['Estado'] === '2') {
                                    estadoColor = 'text-primary';
                                    estadoTexto = '<b>ENTREGADO</b>';

                                     // Ocultar botones Cancelar y Devolver para D y E
                                     let comandosHtml = '';
                                    if (accesslevel !== 'D' && accesslevel !== 'E') {
                                        comandosHtml = `
                                            <td>
                                            <button class='btn btn-danger cancelar' data-id="${registro['idloan']}" title='Cancelar'>
                                            <a style='color: black; font-weight:bold;'>
                                                <i class="fa-solid fa-ban" style="color: #000000;"></i>
                                            </a>
                                        </button>
                                        <button class='btn btn-warning devolver' data-id="${registro['idloan']}" title='Devolver'>
                                            <a style='color: black; font-weight:bold;'>
                                                <i class="fa-solid fa-rotate-left" style="color: #000000;"></i>
                                            </a>
                                        </button>
                                            </td>
                                        `;
                                    }

                                    nuevaFila += `
                                <tr>
                                    <td>${registro['idloan']}</td>
                                    <td>${registro['Titulo']}</td>
                                    <td>${registro['Usuario']}</td>
                                    <td>${registro['Observacion']}</td>
                                    <td>${registro['F. Registro']}</td>
                                    <td class="${estadoColor}" style="${registro['Estado'] === '2' ? 'color: blue; font-weight: bold;' : ''}">${registro['F. Recojo']}</td>                                    <td>${registro['F. Retorno']}</td>
                                    <td>${registro['F. Cancelacion']}</td>
                                    <td>${registro['Cantidad']}</td>
                                    <td>${registro['Perdida']}</td>
                                    <td class="${estadoColor}">${estadoTexto}</td>
                                    ${comandosHtml}
                                </tr>
                            `;
                                } else if (registro['Estado'] === '3') {
                                    estadoColor = 'text-danger';
                                    estadoTexto = '<b>CANCELADO</b>';

                                    nuevaFila += `
                                <tr>
                                <td>${registro['idloan']}</td>
                                    <td>${registro['Titulo']}</td>
                                    <td>${registro['Usuario']}</td>
                                    <td>${registro['Observacion']}</td>
                                    <td>${registro['F. Registro']}</td>
                                    <td>${registro['F. Recojo']}</td>
                                    <td>${registro['F. Retorno']}</td>
                                    <td class="${estadoColor}" style="${registro['Estado'] === '3' ? 'color: red; font-weight: bold;' : ''}">${registro['F. Cancelacion']}</td>
                                    <td>${registro['Cantidad']}</td>
                                    <td>${registro['Perdida']}</td>
                                    <td class="${estadoColor}">${estadoTexto}</td>
                                    <td></td>
                                </tr>
                            `;
                                } else if (registro['Estado'] === '4') {
                                    estadoColor = 'text-success';
                                    estadoTexto = '<b>DEVUELTO</b>';

                                    nuevaFila += `
                                <tr>
                                <td>${registro['idloan']}</td>
                                    <td>${registro['Titulo']}</td>
                                    <td>${registro['Usuario']}</td>
                                    <td>${registro['Observacion']}</td>
                                    <td>${registro['F. Registro']}</td>
                                    <td>${registro['F. Recojo']}</td>
                                    <td class="${estadoColor}" style="${registro['Estado'] === '4' ? 'color: green; font-weight: bold;' : ''}">${registro['F. Retorno']}</td>                                    <td>${registro['F. Cancelacion']}</td>
                                    <td>${registro['Cantidad']}</td>
                                    <td>${registro['Perdida']}</td>
                                    <td class="${estadoColor}">${estadoTexto}</td>
                                    <td></td>
                                </tr>
                            `;
                                }
                            });
                            $("#tabla-prestamos tbody").html(nuevaFila);
                            $('#tabla-prestamos').DataTable({
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                                }
                            });
                        }
                    });
                }


                $(document).on('click', '.entregar', function() {
                    let idloan = $(this).data('id');

                    Swal.fire({
                        title: 'Confirmar entrega',
                        text: '¿Deseas marcar este libro como entregado?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, entregar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let pickup_date = new Date().toLocaleString();

                            $.ajax({
                                url: '../../controllers/prestamo.controller.php',
                                type: 'GET',
                                data: {
                                    'operacion': 'entregarLibro',
                                    'idloan': idloan,
                                    'pickup_date': pickup_date
                                },
                                success: function(result) {
                                    let response = JSON.parse(result);
                                    console.log(response.message);

                                    // Mostrar mensaje de éxito
                                    Swal.fire({
                                        title: 'Entrega exitosa',
                                        text: 'El libro ha sido entregado correctamente.',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        // Actualizar la lista de préstamos
                                        listarPrestamos();
                                    });
                                }
                            });
                        }
                    });
                });

                $(document).on('click', '.cancelar', function() {
                    let idloan = $(this).data('id');

                    Swal.fire({
                        title: 'Confirmar cancelación',
                        text: '¿Deseas cancelar este préstamo?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, cancelar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let cancellation_date = new Date().toLocaleString();
                            $.ajax({
                                url: '../../controllers/prestamo.controller.php',
                                type: 'GET',
                                data: {
                                    'operacion': 'cancelarPrestamo',
                                    'idloan': idloan,
                                    'cancellation_date': cancellation_date
                                },
                                success: function(result) {
                                    let response = JSON.parse(result);
                                    console.log(response.message);

                                    // Mostrar mensaje de éxito
                                    Swal.fire({
                                        title: 'Cancelación exitosa',
                                        text: 'El préstamo ha sido cancelado correctamente.',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        // Actualizar la lista de préstamos
                                        listarPrestamos();
                                    });
                                }
                            });
                        }
                    });
                });

                $(document).on('click', '.devolver', function() {
                    let idloan = $(this).data('id');
                    $('#modalDevolverLibro').modal('show');

                    $('#btnDevolverLibro').off().on('click', function() {
                        let comentario = $('#comentario').val();
                        let return_date = new Date().toLocaleString();

                        $.ajax({
                            url: '../../controllers/prestamo.controller.php',
                            type: 'GET',
                            data: {
                                'operacion': 'retornarLibro',
                                'idloan': idloan,
                                'acotacion': comentario,
                                'return_date': return_date
                            },
                            success: function(result) {
                                let response = JSON.parse(result);
                                console.log(response.message);

                                // Mostrar mensaje de éxito
                                Swal.fire({
                                    title: 'Devolución exitosa',
                                    text: 'El libro ha sido devuelto correctamente.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    // Actualizar la lista de préstamos
                                    listarPrestamos();
                                });

                                $('#modalDevolverLibro').modal('hide');
                            }
                        });
                    });
                });

                listarPrestamos();
            });
        </script>


        </body>

        </html>