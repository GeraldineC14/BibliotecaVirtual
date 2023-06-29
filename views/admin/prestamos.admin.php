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
                                    <!-- Botón para mostrar el modal de registrar libros -->
                                    <button class="btn btn-success btn-sm d-none d-md-inline-block" role="button" data-toggle="modal" data-target="#modal-libros">
                                        <i class="fas fa-truck-ramp-box fa-sm text-black fa-xl"></i>
                                        &nbsp;Registrar Préstamo
                                    </button>
                                    <!-- Botón para mostrar el modal de generación de reporte -->
                                    <button class="btn btn-danger btn-sm d-none d-md-inline-block" role="button" style="margin-left: 50px;" data-toggle="modal" data-target="#modal-reporte">
                                        <i class="fas fa-download fa-sm text-black fa-xl"></i>
                                        &nbsp;Generar Reporte
                                    </button>
                                </div>
                                <!-- INICIO Versión Móvil -->
                                <div class="d-flex mx-auto d-md-none">
                                    <div class="btn-group w-100" role="group">
                                        <!-- Botón para mostrar el modal de registrar libro (versión móvil) -->
                                        <button class="btn btn-outline-success btn-sm d-inline-block mr-2" role="button" data-toggle="modal" data-target="#modal-libros">
                                            <i class="fas fa-truck-ramp-box fa-sm text-black fa-xl"></i>
                                            &nbsp;Registrar
                                        </button>
                                        <!-- Botón para mostrar el modal de generación de reporte (versión móvil) -->
                                        <button class="btn btn-outline-danger btn-sm d-inline-block" role="button" data-toggle="modal" data-target="#modal-reporte">
                                            <i class="fas fa-download fa-sm text-black fa-xl"></i>
                                            &nbsp;Reporte
                                        </button>
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
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros" tabindex="-1" aria-labelledby="titulo-modal-libros" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="titulo-modal-libros">Registrar Libro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-light" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formulario-prestamos">
                                        <div class="form-group">
                                            <label for="libro">Libro</label><br>
                                            <select id="libro" class="form-control libro" name="libro" required style="width: 100%;">

                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="usuario">Usuario</label><br>
                                                    <select name="usuario" id="usuario" class="form-control usuario" required style="width: 100%;">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="cantidad">Cant</label>
                                                    <input id="cantidad" class="form-control" min="1" type="number" name="cantidad" min="1">
                                                    <strong id="msg_error"></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_prestamo">Fecha de Prestamo</label>
                                                    <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" value="<?php echo date(" Y-m-d"); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_devolucion">Fecha de Devolución</label>
                                                    <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" value="<?php echo date(" Y-m-d"); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="observacion">Observación</label>
                                            <textarea id="observacion" class="form-control" placeholder="Observación" name="observacion" rows="3"></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit" id="btnAccion">Prestar</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal" id="cancelar-modal">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Zona Modales editar -->
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros-editar" tabindex="-1" aria-labelledby="titulo-modal-libros-editar" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="titulo-modal-libros-editar">Editar Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-light" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="formulario-libros" autocomplete="off">
                                        <!-- Creación de controles -->
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="categoria2">Categoría:</label>
                                                <select name="categoria2" id="categoria2" class="form-control form-control-sm">
                                                    <option value="">Seleccione:</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="subcategoria2">Sub Categoría:</label>
                                                <select name="subcategoria2" id="subcategoria2" class="form-control form-control-sm">
                                                    <option value="">Seleccione:</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="cantidad2">Cantidad:</label>
                                                <input type="text" id="cantidad2" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-9 form-group">
                                                <label for="descripcion2">Descripción:</label>
                                                <input type="text" id="descripcion2" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9 form-group">
                                                <label for="autor2">Autor:</label>
                                                <input type="text" id="autor2" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-3 form-group">
                                                <label for="estado2">Estado:</label>
                                                <input type="text" id="estado2" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ubicacion2">Ubicación:</label>
                                            <input type="text" id="ubicacion2" class="form-control form-control-sm">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cancelar-modal-editar" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="guardar-libro-editar" class="btn btn-sm btn-primary">Guardar</button>
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



            $(document).on('click', '#devolver', function(event) {

                var dataID = $(this).data('id')
                console.log(dataID)

                Swal.fire({
                    title: 'Devolver libro',
                    text:`¿Estás seguro de devolver este libro?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7ebe7e',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, devolver',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: `../../controllers/prestamo.controller.php`,
                            type: 'GET',
                            data: { 'operacion':'cambiarEstadoPrestamo',
                                  'idloan': dataID,
                                  'state' : '0'
                                },
                            success: function(result){
                                listarPrestamos()
                            }
                        })

                    }
                })


            })


            function listarPrestamos() {
                $.ajax({
                    url: '../../controllers/prestamo.controller.php',
                    type: 'GET',
                    data: 'operacion=listarPrestamos',
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let nuevaFila = '';

                        let tabla = $("#tabla-prestamos").DataTable();
                        tabla.destroy();
                        $("#tabla-prestamos tbody").html("");
                        registros.forEach(registro => {
                            observacion = (registro['observation'] == null) ? 'No cuenta con observación' : registro['observation'];
                            let estado = (registro['state'] == 1) ? '<strong>Prestado</strong>' : '<strong>Devuelto</strong>';
                            let colorCampo = (registro['state'] == 1) ? 'red' : 'green';
                            let disabled = (registro['state'] == 0) ? 'disabled' : ''; // Agregar la condición para habilitar o deshabilitar el botón
                            let btnClass = (registro['state'] == 0) ? 'btn btn-success cambiar-estado-btn' : 'btn btn-danger cambiar-estado-btn'; // Agregar la clase para cambiar el color del botón
                            let btnText = (registro['state'] == 0) ? '<a><i class="fa-solid fa-check fa-lg" style="color: #000000;"></i></a>' : '<a><i class="fa-solid fa-rotate-left fa-lg" style="color: #000000;"></i></a>'; // Agregar el texto del botón correspondiente al estado

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
                        <td><button  id='devolver' class='${btnClass}' data-id="${registro['idloan']}" ${disabled}><a style='color: black; font-weight:bold;'>${btnText}</a></button></td>
                    </tr>
                `;

                            $("#tabla-prestamos tbody").append(nuevaFila);
                        });

                        $('#tabla-prestamos').DataTable({
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                            }
                        });

                        // Agregar evento de clic a los botones
                        $(".cambiar-estado-btn").click(function() {
                            let idPrestamo = $(this).data("id");
                            cambiarEstado(idPrestamo, 'Devuelto'); // Cambiar el estado a 'Devuelto'
                        });
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
                            elementosLista = `<option selected>Seleccione:</option>`;

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

            listarPrestamos();
            listarUsuarioLoans();
            $("#cancelar-modal").click(reiniciarFormulario);
        });
    </script>

    </body>

    </html>