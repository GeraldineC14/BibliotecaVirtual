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
                                <button type="button" class="btn btn-danger mt-2" id="btnGenerarPDF">Generar PDF</button>
                            </div>
                        </div>
                        <!-- Fin Card -->
                    </div>
                </div>
                <!-- Datos - tabla -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="libros" class="table table-sm table-striped">
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
                                        <th>Categoría</th>
                                        <th>Sub Categoría</th>
                                        <th>Código</th>
                                        <th>Contidad disponible</th>
                                        <th>Libro</th>
                                        <th>Autor</th>
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
    const tablaLibro = document.querySelector("#libros tbody");
    let filtroPDF = -1;

    function alerta(textoMensaje = "") {
        Swal.fire({
            title: 'Comentarios',
            text: textoMensaje,
            icon: 'info',
            footer: 'Horacio Zeballos Gámez',
            timer: 2500,
            confirmButtonText: 'Aceptar'
        });
    }

    function listarCategoria(){
        fetch(`../../controllers/categoria.controller.php?operacion=listarCategoria`)
            .then(respuesta => respuesta.json())
            .then(datos => {
                datos.forEach(element=> {
                    const optionTag = document.createElement("option");
                    optionTag.value = element.idcategorie
                    optionTag.text = element.categoryname;
                    selectCategoria.appendChild(optionTag);
                });
                // Agregar evento onchange al selectCategoria
                selectCategoria.onchange = function() {
                    const idcategorie = this.value; // Obtener el valor seleccionado
                    //otraFuncion(selectedValue); // Llamar a la otra función y pasar el valor seleccionado
                    listarSubcategoria(idcategorie);
                    console.log(idcategorie);
                };
            });
    }


    function listarSubcategoria(idcategorie) {
        // Limpiar opciones existentes en el selectSubcategoria
        selectSubcategoria.innerHTML = "";
        const parametros = new URLSearchParams();
        parametros.append("operacion", "listarSubcategoria");
        parametros.append("idcategorie", idcategorie);
        fetch(`../../controllers/subcategoria.controller.php?${parametros}`)
            .then(respuesta => respuesta.json())
            .then(datos => {
                datos.forEach(element=> {
                    const optionTag = document.createElement("option");
                    optionTag.value = element.idsubcategorie
                    optionTag.text = element.subcategoryname;
                    selectSubcategoria.appendChild(optionTag);
                    console.log(element.idsubcategorie);
                });
            });
    }

    function listarLibro() {
        const indiceCategoria = parseInt(selectCategoria.value);
        const indiceCategoriaSeleccionado = indiceCategoria >= 1 ? indiceCategoria : "0";

        const indiceSubCategoria = parseInt(selectSubcategoria.value);
        const indiceSubcategoriaSeleccionado = indiceSubCategoria >= 1 ? indiceSubCategoria : '';

        const parametros = new URLSearchParams();
        parametros.append("operacion","reporteLibro");
        parametros.append("idcategorie", indiceCategoriaSeleccionado);
        parametros.append("idsubcategorie",indiceSubcategoriaSeleccionado);
        console.log(parametros.toString());
        fetch(`../../controllers/biblioteca.controller.php?${parametros}`)
        .then(respuesta => respuesta.text())
            .then(datos => {
                if(!datos || datos.length === 0){
                    tablaLibro.innerHTML = '<tr><td colspan="7">No ha seleccionado ningún Categoría</td></tr>';
                    filtroPDF = -1;
                }else{
                    registro = JSON.parse(datos);
                    tablaLibro.innerHTML=``;
                    filtroPDF = 1;

                    registro.forEach(element => {
                    const tableRow = `
                    <tr>
                        <td>${element.idbook}</td>
                        <td>${element.categoryname}</td>
                        <td>${element.subcategoryname}</td>
                        <td>${element.codes}</td>
                        <td>${element.amount}</td>
                        <td>${element.descriptions}</td>
                        <td>${element.author}</td>
                    </tr>
                    `;
                    tablaLibro.innerHTML += tableRow;

                    });
                }
            });
    }

    function generarPDF() {
        if (selectCategoria.value == 0) {
          alerta("Debes elegir una categoria para poder crear el PDF");
        } else if (filtroPDF > 0) {
          const parametros = new URLSearchParams();
            parametros.append("idcategorie", selectCategoria.value);
            parametros.append("idsubcategorie", selectSubcategoria.value);
            parametros.append("titulo_Categoria", selectCategoria.options[selectCategoria.selectedIndex].text);
            console.log(parametros.toString());
            if (selectSubcategoria.value >=1){
                parametros.append("titulo_Subcategoria", selectSubcategoria.options[selectSubcategoria.selectedIndex].text);
            }else{
                parametros.append("titulo_Subcategoria", 'No ha seleccionado una Sub Categoría');
            }
          window.open(`../../reports/report-libro/reporte.php?${parametros}`, '_blank');
        } else {
          alerta("No existen datos disponibles para generar el PDF");
        }
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

    $(selectCategoria).on('change', listarLibro);
    $(selectSubcategoria).on('change', listarLibro);

    //funciones
    listarCategoria();
    listarSubcategoria();

    //Reporte
    btnGenerarPDF.addEventListener("click", generarPDF);


</script>