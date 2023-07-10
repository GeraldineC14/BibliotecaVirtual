<?php require_once 'permisos.php'; ?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <!-- INICIO PERFIL -->

        <!-- FIN PERFIL -->
        <div class="container-fluid">
            <div class="container">
                <!-- Cabecera -->
                <!-- Botón de retroceso -->
                <div class="text-left">
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm d-inline-block" role="button">
                        <i class="fas fa-chevron-left"></i>
                        &nbsp;Volver
                    </a>
                </div>
                <div class="d-grid gap-2 col-12 col-md-6 mx-auto">
                    <!-- Título oculto para pc y laptop -->
                    <div class="d-inline-block d-md-none text-center">
                        <h3 class="title-tablas2">Reportes</h3>
                    </div>
                    <!-- Título oculto para móvil y tablet -->
                    <div class="row mt-3 d-none d-md-inline-block text-center">
                        <h3 class="title-tablas">Módulo de Préstamos</h3>
                    </div>
                </div>
                <!-- Filtro -->
                <div class="row mt-2">
                    <div class="col-md-12">
                        <!-- Inicio Card -->
                        <div class="card">
                            <div class="card-header">Seleccione los filtros que desea aplicar:</div>
                            <!-- Inicio body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row tex-center">
                                            <div class="col">
                                                <select id="listarLoans" class="form-select listarLoans" multiple name="listarLoans" required style="width: 100%;">
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="month" id="month-year-input" name="month-year" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin body -->
                            <div class="card-footer text-muted text-center">
                                <button type="button" class="btn btn-success mt-2" id="obtener_libros_meses">Mostrar</button>
                                <button type="button" class="btn btn-danger mt-2" id="generar">Generar PDF</button>
                            </div>
                        </div>
                        <!-- Fin Card -->
                    </div>
                </div>
                <!-- Datos - tabla -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="multiselect" class="table table-sm table-striped">
                                <colgroup>
                                    <col width="5%">
                                    <col width="25%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titulo</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Asíncrono -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // Obtener libros prestados y llenar el select
    $.ajax({
        url: '../../controllers/prestamo.controller.php',
        type: 'GET',
        data: {
            operacion: 'listarLoans'
        },
        success: function(response) {
            var libros = JSON.parse(response);
            var selectLibros = $('.listarLoans');

            // Limpiar opciones anteriores
            selectLibros.empty();

            // Agregar las opciones de los libros prestados al select
            $.each(libros, function(index, libro) {
                var option = new Option(libro.descriptions, libro.idbook);
                selectLibros.append(option);
            });

            // Actualizar el select después de agregar las opciones
            selectLibros.trigger('change');
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});
    // Select2
    $('.listarLoans').select2({
        maximumSelectionLength: 1,
        placeholder: 'Seleccione: '
    });
</script>