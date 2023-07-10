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
                                    <!-- Botón para mostrar el modal de registrar préstamos -->
                                    <button class="btn btn-success btn-sm d-none d-md-inline-block" role="button" data-toggle="modal" data-target="#modal-prestamo">
                                        <i class="fas fa-truck-ramp-box fa-sm text-black fa-xl"></i>
                                        &nbsp;Registrar
                                    </button>
                                    <!-- Enlace para redirigir a la vista de reporte -->
                                    <a href="index.php?view=report-prestamo.php" class="btn btn-danger btn-sm d-none d-md-inline-block" style="margin-left: 50px;">
                                        <i class="fas fa-solid fa-file-pdf fa-sm text-black fa-xl"></i>
                                        &nbsp;Reporte
                                    </a>
                                    <!-- Enlace para redirigir a la vista de gráficos -->
                                    <a href="index.php?view=grafico-prestamos.php" class="btn btn-info btn-sm d-none d-md-inline-block" style="margin-left: 50px;">
                                        <i class="fas fa-chart-pie fa-sm text-black fa-xl"></i>
                                        &nbsp;Gráfico
                                    </a>
                                </div>

                                <!-- INICIO Versión Móvil -->
                                <div class="d-flex mx-auto d-md-none">
                                    <div class="btn-group w-100" role="group">
                                        <div class="btn-group w-100" role="group">
                                            <!-- Botón para mostrar el modal de registrar libro (versión móvil) -->
                                            <a class="btn btn-outline-success btn-sm d-inline-block mr-2" role="button" data-toggle="modal" data-target="#modal-prestamo">
                                                <i class="fas fa-truck-ramp-box fa-sm text-black fa-xl"></i>
                                                &nbsp;Registrar
                                            </a>
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

                        <!-- Zona Modales registro -->
                        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-prestamo" tabindex="-1" aria-labelledby="titulo-modal-libros" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-black">
                                        <h5 class="modal-title text-black" id="titulo-modal-libros" style="font-weight:bold;">Registrar Prestamo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="text-light" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formulario-prestamos">
                                            <div class="form-group">
                                                <label for="libro">Libro</label><br>
                                                <select id="libro" class="form-select libro" multiple name="libro" required style="width: 100%;">
                                                </select>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label for="usuario">Usuario</label><br>
                                                        <select id="usuario" class="form-select usuario" multiple name="usuario" required style="width: 100%;">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cantidad">Stock</label>
                                                        <input id="cantidad" class="form-control" min="1" type="number" name="stock" min="1" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="cantidad">Cant</label>
                                                        <input id="cantidad" class="form-control" min="1" type="number" name="cantidad" min="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fecha_prestamo">Fecha de Prestamo</label>
                                                        <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" value="<?php echo date(" Y-m-d"); ?>" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . "+ 10 days")); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fecha_devolucion">Fecha de Devolución</label>
                                                        <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" value="<?php echo date(" Y-m-d"); ?>" min="" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . "+ 10 days")); ?>" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="observacion">Observación</label>
                                                <textarea id="observacion" class="form-control" placeholder="Ingrese alguna observacion..." name="observacion" rows="3"></textarea>
                                            </div>
                                            <button class="btn btn-primary" type="button" id="prestar">Prestar</button>
                                            <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-modal">Cancelar</button>
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



        <!-- Mis funciones y eventos javascript -->
        <script>
            $(document).ready(function() {
                idusers = <?php echo $_SESSION['login']['idusers']; ?>;
                accesslevel = "<?php echo $_SESSION['login']['accesslevel']; ?>";

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


                function reiniciarFormulario() {
                    $("#formulario-prestamos")[0].reset();
                }

                function listarUsuarioLoans() {
                    $.ajax({
                        url: '../../controllers/prestamo.controller.php',
                        type: 'GET',
                        data: 'operacion=listarUsuarioLoans',
                        success: function(result) {
                            let registros = JSON.parse(result);
                            let elementosLista = ``;

                            if (registros.length > 0) {
                                registros.forEach(registro => {
                                    elementosLista += `<option value=${registro['idusers']}>${registro['Users']}</option>`;

                                });
                            } else {
                                elementosLista = `<option>No hay datos asignados</option>`;
                            }
                            $("#usuario").html(elementosLista);
                        }
                    });
                }

                function listarLibros() {
                    $.ajax({
                        url: '../../controllers/biblioteca.controller.php',
                        type: 'GET',
                        data: 'operacion=listarLibros',
                        success: function(result) {
                            let registros = JSON.parse(result);
                            let elementosLista = '';

                            if (registros.length > 0) {
                                registros.forEach(registro => {
                                    elementosLista += `<option value=${registro['descriptions']}>${registro['descriptions']}</option>`;
                                });
                            } else {
                                elementosLista = '<option>No hay libros disponibles</option>';
                            }

                            $('#libro').html(elementosLista);
                        }
                    });
                }

                // Obtener los elementos de entrada de fecha
                var fechaRecojo = $("#fecha_prestamo");
                var fechaDevolucion = $("#fecha_devolucion");

                // Establecer un controlador de eventos para el cambio de fecha en el campo de fecha de recojo
                fechaRecojo.on("change", function() {
                    // Obtener la fecha seleccionada en el campo de fecha de recojo
                    var fechaRecojoValue = new Date($(this).val());

                    // Obtener la fecha mínima permitida para el campo de fecha de devolución
                    var minFechaDevolucion = new Date(fechaRecojoValue);

                    fechaDevolucion.prop('readonly', false);

                    minFechaDevolucion.setDate(minFechaDevolucion.getDate()); // Incrementar la fecha en 1 día

                    // Establecer la fecha mínima para el campo de fecha de devolución
                    fechaDevolucion.attr("min", minFechaDevolucion.toISOString().split("T")[0]);
                });

                listarLibros();
                listarPrestamos();
                listarUsuarioLoans();
                $("#cancelar-modal").click(reiniciarFormulario);


                $('.libro').select2({
                    maximumSelectionLength: 1,
                    placeholder: 'Seleccione: '
                });
                
                $('.usuario').select2({
                    maximumSelectionLength: 1,
                    placeholder: 'Seleccione: '
                });
            });

        </script>

        </body>

        </html>