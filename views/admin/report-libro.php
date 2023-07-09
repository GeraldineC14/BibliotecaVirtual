<?php
require_once 'permisos.php';
?>
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
                        <h3 class="title-tablas">Reportes de Libros</h3>
                    </div>
                </div>
                <!-- Filtro -->
                <div class="row mt-2">
                    <div class="col-md-12">
                        <!-- Inicio Card -->
                        <div class="card">
                            <div class="card-header">Filtro Libros por categoría y subcategoría:</div>
                            <!-- Inicio body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row tex-center">
                                        <div class="col">
                                            <label for="">Categoría:</label>
                                                <select id="categoria" class="form-select categoria" multiple name="libro" required style="width: 100%;">
                                                </select>
                                            </div>
                                            <div class="col">
                                            <label for="">Sub Categoría:</label>
                                                <select id="subcategoria" class="form-select subcategoria" multiple name="libro" required style="width: 100%;">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin body -->
                            <div class="card-footer text-muted text-center">
                                <button type="button" class="btn btn-success mt-2" id="obtener">Mostrar</button>
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
                                        <th>Categoria</th>
                                        <th>Subcategoria</th>
                                        <th>Autor</th>
                                        <th>Cantidad</th>
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
    const selectCategoria = document.querySelector("#categoria");
    const selectSubcategoria = document.querySelector("#subcategoria");

    function listarCategoria() {
        fetch(`../../controllers/categoria.controller.php?operacion=listarCategoria`)
            .then(respuesta => respuesta.json())
            .then(datos => {
            datos.forEach(element => {
                const optionTag = new Option(element.categoryname, element.idcategorie);
                selectCategoria.append(optionTag);
            });

            // Inicializar Select2 después de agregar las opciones
            $(selectCategoria).select2();
            })
            .then(() => {
            // Agregar el evento change al select de categoría
            selectCategoria.addEventListener('change', function() {
                var categoria_id = $(this).val();
                listarSubcategoria(categoria_id);
            });
            });
    }

    function listarSubcategoria(categoria_id) {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarSubcategoria");
        parametros.append("idcategorie", categoria_id);
        fetch(`../../controllers/subcategoria.controller.php?${parametros}`)
            .then(respuesta => respuesta.json())
            .then(datos => {
            // Limpiar selectSubcategoria antes de agregar las nuevas opciones
            $(selectSubcategoria).empty();

            datos.forEach(element => {
                const optionTag = new Option(element.subcategoryname, element.idsubcategorie);
                $(selectSubcategoria).append(optionTag);
            });

            // Actualizar Select2 después de cambiar las opciones
            $(selectSubcategoria).select2();
            });
    }




    //Select2
    $('.categoria').select2({
        maximumSelectionLength: 1,
        placeholder: 'Seleccione: '
    });

    $('.subcategoria').select2({
        maximumSelectionLength: 1,
        placeholder: 'Seleccione: '
    });

    //funciones
    listarCategoria();
    listarSubcategoria();


</script>