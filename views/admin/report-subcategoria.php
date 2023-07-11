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
                        <h3 class="title-tablas">Módulo de Sub Categoría</h3>
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
                                        <select class="form-select" multiple size="5" id="subcategoria" autofocus></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin body -->
                            <div class="card-footer text-muted text-center">
                                <button type="button" class="btn btn-success mt-2" id="btnObtener">Mostrar</button>
                                <button type="button" class="btn btn-danger mt-2" id="btnGenerar">Generar PDF</button>
                            </div>
                        </div>
                        <!-- Fin Card -->
                    </div>
                </div>
                <!-- Datos - tabla -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-subcategoria" class="table table-sm table-striped">
                                <colgroup>
                                    <col width="10%">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                </colgroup>
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Categoría</th>
                                        <th>Sub Categoria</th>
                                        <th>Fecha de Registro</th>
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
    const selectSubcategoria = document.querySelector("#subcategoria");
    const tableSubcategoria = document.querySelector("#table-subcategoria tbody");
    let filtroPDF = -1;

    function listarSubcategoria() {
        fetch(`../../controllers/categoria.controller.php?operacion=listarCategoria`)
          .then(respuesta => respuesta.json())
          .then(datos => {
            datos.forEach(element => {
              const optionTag = document.createElement("option");
              optionTag.value = element.idcategorie;
              optionTag.text = element.categoryname;
              selectSubcategoria.appendChild(optionTag);
            });
          });
    }

    function getSubcategoria(strActivos){
        const parametros = new URLSearchParams();
        parametros.append("operacion","ReporteSubcategoria");
        parametros.append("idcategorie",strActivos);

        fetch(`../../controllers/subcategoria.controller.php?${parametros}`)
            .then(respuesta => respuesta.json())
            .then(datos => {
                let i = 1;
                tableSubcategoria.innerHTML = ``;
                datos.forEach(element => {
                    filtroPDF = 1;
                    const tableRow = `
                        <tr>
                            <td class='text-center'>${i++}</td>
                            <td>${element.categoryname}</td>
                            <td>${element.subcategoryname}</td>
                            <td>${element.registrationdate}</td>
                        </tr>
                    `;
                    tableSubcategoria.innerHTML +=  tableRow;
                });
            });
    }

    btnObtener.addEventListener("click",() => {
        //Arreglo que almacenará los ID
        let strActivos = "";

        //Recorrer todas las opcionbes y verificar cuáles fueron seleccionadas
        for( let option of document.querySelector("#subcategoria").options){
          if(option.selected){
            strActivos +=  `${option.value},`;
          }
        }
        getSubcategoria(strActivos);
    });

    function generarPDF() {
        if (selectSubcategoria.value == 0) {
          alert("Debes elegir una Categoría para poder crear el PDF");
        } else if (filtroPDF > 0) {
          const parametros = new URLSearchParams();
          parametros.append("idcategorie",[...selectSubcategoria.selectedOptions].map(option => option.value).join(','));
          parametros.append("titulo", selectSubcategoria.options[selectSubcategoria.selectedIndex].text);
          window.open(`../../reports/report-subcategoria/reporte.php?${parametros}`, '_blank');
         //console.log([...selectSubcategoria.selectedOptions].map(option => option.value).join(','));
        } else {
          alert("No existen datos disponibles para generar el PDF");
        }

    }

    btnGenerar.addEventListener("click",generarPDF);
    listarSubcategoria();
    $("#subcategoria").select2();


</script>