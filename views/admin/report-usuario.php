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
                        <h3 class="title-tablas">Módulo de Usuario</h3>
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
                                        <div class="row text-center">
                                            <select id="usuario" class="form-select" size="3" multiple name="usuario">
                                                <option value="A">Administrador</option>
                                                <option value="D">Docente</option>
                                                <option value="E">Estudiante</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin body -->
                            <div class="card-footer text-muted text-center">
                                <button type="button" class="btn btn-success mt-2" id="btnObtener">Mostrar</button>
                                <button type="button" class="btn btn-danger mt-2" id="generarpdf">Generar PDF</button>
                            </div>
                        </div>
                        <!-- Fin Card -->
                    </div>
                </div>
                <!-- Datos - tabla -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-usuario" class="table table-sm table-striped">
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
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Nombre Usuario</th>
                                        <th>Email</th>
                                        <th>Nivel Acceso</th>
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
    const btnObtener = document.querySelector("#btnObtener");
    const selectUser = document.querySelector("#usuario");
    const tableUser = document.querySelector("#table-usuario tbody");
    const btnGenerarPDF = document.querySelector("#generarpdf");

    let filtroPDF = -1;

    function obtenerUsuarios(usuariosSeleccionados) {
        // Limpiar la tabla antes de agregar los nuevos datos
        tableUser.innerHTML = '';

        // Realizar la solicitud al servidor para obtener los usuarios filtrados
        fetch(`../../controllers/usuario.controller.php?operacion=getUsersReport&iduser=${usuariosSeleccionados}`)
            .then(respuesta => respuesta.json())
            .then(datos => {
                let i = 1;
                datos.forEach(usuario => {
                    // Crear una nueva fila en la tabla con los datos del usuario
                    const fila = document.createElement('tr');
                    filtroPDF = 1;
                    fila.innerHTML = `
                            <td>${i++}</td>
                            <td>${usuario.namess}</td>
                            <td>${usuario.surnames}</td>
                            <td>${usuario.username}</td>
                            <td>${usuario.email}</td>
                            <td>${usuario.accesslevel}</td>
                        `;

                    // Agregar la fila a la tabla
                    tableUser.appendChild(fila);
                });
            });
    }

    btnObtener.addEventListener("click", () => {
        // Obtener los valores seleccionados del select
        const usuariosSeleccionados = [...selectUser.selectedOptions].map(option => option.value).join(',');
        console.log(usuariosSeleccionados);

        obtenerUsuarios(usuariosSeleccionados);
    });


    function generarPDF() {
        if (selectUser.value == 0) {
          alert("Debes elegir un usuario para poder crear el PDF");
        } else if (filtroPDF > 0) {
          const parametros = new URLSearchParams();
          parametros.append("iduser", [...selectUser.selectedOptions].map(option => option.value).join(','));
          parametros.append("titulo", selectUser.options[selectUser.selectedIndex].text);
          //console.log([...selectUser.selectedOptions].map(option => option.value).join(','));
          window.open(`../../reports/report-user/reporte.php?${parametros}`, '_blank');
        } else {
          alert("No existen datos disponibles para generar el PDF");
        }

    }

    //Generar reportes
    btnGenerarPDF.addEventListener("click", generarPDF);

    // Método inicializador (control SELECT)
    $("#usuario").select2();

</script>