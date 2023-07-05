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
                                        Libros
                                    </h3>
                                </div>
                                <!-- Título oculto para móvil y tablet -->
                                <div class="d-none d-md-inline-block" style="text-align: center;">
                                    <h3 class="title-tablas">
                                        Módulo de Libros
                                    </h3>
                                </div>

                                <div class="btn-group" role="group">
                                    <!-- Botón para mostrar el modal de registrar libros -->
                                    <button class="btn btn-success btn-sm d-none d-md-inline-block" role="button" data-toggle="modal" data-target="#modal-libros">
                                        <i class="fa-solid fa-book fa-sm text-black fa-xl"></i>
                                        &nbsp;Registrar Libro
                                    </button>
                                    <!-- Botón para mostrar la vista de reporte -->
                                    <button class="btn btn-danger btn-sm d-none d-md-inline-block" style="margin-left: 50px;" id="reportButton">
                                        <a href="index.php?view=report-libro.php"></a>
                                        <i class="fas fa-download fa-sm text-black fa-xl"></i>
                                        &nbsp;Generar Reporte
                                    </button>
                                </div>
                                <!-- INICIO Versión Móvil -->
                                <div class="d-flex mx-auto d-md-none">
                                    <div class="btn-group w-100" role="group">
                                        <!-- Botón para mostrar el modal de registrar libro (versión móvil) -->
                                        <a class="btn btn-outline-success btn-sm d-inline-block mr-2" role="button" data-toggle="modal" data-target="#modal-libros" data-target="#modal-libros-editar" id="mostrar-modal-registro" href="#">
                                            <i class="fa-solid fa-book fa-sm text-black fa-xl"></i>
                                            &nbsp;Registrar
                                        </a>
                                        <!-- Botón para mostrar la vista de generación de reporte (versión móvil) -->
                                        <a class="btn btn-outline-danger btn-sm d-inline-block" id="reportButton" href="index.php?view=report-libro.php">
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
                                <table class="table display responsive" id="tabla-libros" width="85%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Categoría</th>
                                            <th>Sub categoría</th>
                                            <th>Código</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th>Autor</th>
                                            <th>Estado</th>
                                            <th>Ubicación</th>
                                            <th>PDF de descarga</th>
                                            <th>Portada</th>
                                            <th>Comandos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <!-- Zona Modales registro-->
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros" tabindex="-1" aria-labelledby="titulo-modal-libros" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-black">
                                    <h5 class="modal-title" id="titulo-modal-libros" style="font-weight:bold;">Registrar Libro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="text-light" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="formulario-libros" autocomplete="off">
                                        <!-- Creación de controles -->
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="categoria">Categoría:</label>
                                                <select name="categoria" id="categoria" class="form-control form-control-sm">
                                                    <option value="">Seleccione:</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="subcategoria">Sub Categoría:</label>
                                                <select name="subcategoria" id="subcategoria" class="form-control form-control-sm">
                                                    <option value="">Seleccione:</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="cantidad">Cantidad:</label>
                                                <input type="text" id="cantidad" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-9 form-group">
                                                <label for="descripcion">Descripción:</label>
                                                <input type="text" id="descripcion" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9 form-group">
                                                <label for="autor">Autor:</label>
                                                <input type="text" id="autor" class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-3 form-group">
                                                <label for="estado">Estado:</label>
                                                <input type="text" id="estado" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ubicacion">Ubicación:</label>
                                            <input type="text" id="ubicacion" class="form-control form-control-sm">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="url">PDF descarga:</label>
                                                <input type="file" id="url" accept=".pdf" class="form-control-file">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="portada">Portada:</label>
                                                <input type="file" id="portada" accept=".jpg" class="form-control-file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button id="guardar-libro" class="btn btn-sm btn-primary" type="button">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

                    <!-- Zona Modales editar-->
                    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-libros-editar" tabindex="-1" aria-labelledby="titulo-modal-libros-editar" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-light">
                                    <h5 class="modal-title" id="titulo-modal-libros-editar">Editar
                                        Registro</h5>
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
                                    <button type="submit" id="guardar-libro-editar" class="btn btn-sm btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

                    <!-- modal editar portada -->
                    <div class="modal fade" id="editarportada" tabindex="-1" role="dialog" aria-labelledby="editarportadaLabel">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="editarportadaLabel">Editar Portada</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-3 mt-md-5 ml-md-5">
                                                <div class="custom-file" lang="es">
                                                    <input type="file" class="custom-file-input" id="customFileLangModalPortada" accept=".png, .jpg, .jpeg">
                                                    <label class="custom-file-label-portada" for="customFileLangModalPortada" data-browse="Elegir">Seleccionar Archivo</label>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 ml-md-5 text-center">
                                                <button type="button" id="eliminar-PortadaModal" class="btn btn-sm btn-danger mr-3" style="border-radius:8px;">
                                                    <i class="fa-solid fa-trash fa-xl"></i>
                                                    Eliminar
                                                </button>
                                                <button type="button" id="cambiarPortadaModal" class="btn btn-sm btn-success" style="border-radius:8px;">
                                                    <i class="fa-solid fa-circle-check fa-xl"></i>
                                                    Cambiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pdf mt-2 mt-md-0 ml-md-5 editportada">
                                                <!-- Aquí se cargará las portadas por AJAX -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin modal -->

                    <!-- modal editar pdf -->
                    <div class="modal fade" id="editarpdf" tabindex="-1" role="dialog" aria-labelledby="editarpdfLabel">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="editarpdfLabel">Editar PDF</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-3 mt-md-5 ml-md-5">
                                                <div class="custom-file" lang="es">
                                                    <input type="file" class="custom-file-input" id="customFileLangModalPDF" accept=".pdf">
                                                    <label class="custom-file-label-PDF" for="customFileLangModalPDF" data-browse="Elegir">Seleccionar Archivo</label>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 ml-md-5 text-center">
                                                <button type="button" id="eliminar-pdf" class="btn btn-sm btn-danger mr-3" style="border-radius:8px;">
                                                    <i class="fa-solid fa-trash fa-xl"></i>
                                                    Eliminar
                                                </button>
                                                <button type="button" id="cambiarPDFModal" class="btn btn-sm btn-success" style="border-radius:8px;">
                                                    <i class="fa-solid fa-circle-check fa-xl"></i>
                                                    Cambiar
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pdf mt-2 mt-md-0 ml-md-5 editpdf">
                                                <!-- Aquí se cargará la vista previa del PDF -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin modal -->
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
            var idbook = 0;
            var idcategorie = 0;
            var datosNuevos = true;
            datos = {
                'operacion': "",
                'idbook': "",
                'idcategorie': "",
                'idsubcategorie': "",
                'amount': "",
                'descriptions': "",
                'author': "",
                'state': "",
                'locationresponsible': ""
            };

            function alertar(textoMensaje = "") {
                Swal.fire({
                    title: 'Prestamos',
                    text: textoMensaje,
                    icon: 'info',
                    footer: 'Horacio Zeballos Gámez',
                    timer: 2500,
                    confirmButtonText: 'Aceptar'
                });
            }

            function alertarToast(titulo = "", textoMensaje = "", icono = "") {
                Swal.fire({
                    title: titulo,
                    text: textoMensaje,
                    icon: icono,
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            }

            function mostrarLibros() {
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: 'operacion=listarLibros',
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let nuevaFila = ``;

                        let tabla = $("#tabla-libros").DataTable();
                        tabla.destroy();

                        $("#tabla-libros tbody").html("");
                        registros.forEach(registro => {
                            portada = (registro['frontpage'] == null) ? 'sin-imagen.png' : registro['frontpage'];
                            pdf = (registro['url'] == null) ? 'no-pdf.pdf' : registro['url'];

                            nuevaFila = `
                        <tr>
                            <td>${registro['idbook']}</td>
                            <td>${registro['categoryname']}</td>
                            <td>${registro['subcategoryname']}</td>
                            <td>${registro['codes']}</td>
                            <td>${registro['amount']}</td>
                            <td>${registro['descriptions']}</td>
                            <td>${registro['author']}</td>
                            <td>${registro['state']}</td>
                            <td>${registro['locationresponsible']}</td>
                            <td>
                                <a target='_blank' rel='noopener noreferrer' href='../PDF/${pdf}' style="text-decoration: none;"> 
                                    <i class="fa-solid fa-eye fa-lg" style="color: #d81313;"></i>
                                </a>
                                <a href='#' data-idbook='${registro['idbook']}' class='editarpdf'>
                                    <i class="fa-solid fa-file-pen fa-lg" style="color: #d81313;"></i>
                                </a>
                            </td>
                            <td>
                                <a href='../frontpage/${portada}' style="text-decoration: none;"
                                    data-idbook='${registro['idbook']}'
                                    data-lightbox='demo'
                                    data-title='${registro['descriptions']}'
                                    title='Mostrar portada del libro'>
                                    <i class="fa-solid fa-eye fa-lg" style="color: #1a4a9e;"></i>
                                </a>
                                <a href="#" data-idbook="${registro['idbook']}" class="editarportada" data-toggle="modal" data-target="#editarportada"><i class="fa-solid fa-camera-rotate fa-lg" style="color:#1a4a9e;"></i></a>
                            </td>
                            <td>
                                <a href='#' data-idbook='${registro['idbook']}' class='eliminar'><i class="fa-solid fa-trash-can fa-xl" style="color: #cb2525;"></i></a>
                                <a href='#' data-idbook='${registro['idbook']}' data-idcategorie='${registro['idcategorie']}' class='editar'><i class="fa-solid fa-pen-to-square fa-xl" style="color: #4aa9c9;"></i></a>
                            </td>
                        </tr>
                        `;
                            $("#tabla-libros tbody").append(nuevaFila);
                        });

                        $('#tabla-libros').DataTable({
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                            }
                        });

                    }
                });
            }


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



            // Función para mostrar el modal de generación de reporte
            function mostrarModalReporte() {
                // Limpiar los filtros del modal de generación de reporte
                limpiarFiltros();

                // Mostrar el modal
                $('#modal-reporte').modal('show');
            }

            // Función para limpiar los filtros del modal de generación de reporte
            function limpiarFiltros() {
                // Limpiar los valores de los filtros
                $('#filtro-categoria').val('');
                $('#filtro-subcategoria').val('');
                $('#filtro-estado').val('');
            }

            // Función para generar el reporte PDF con los filtros seleccionados
            function generarReporte() {
                // Obtener los valores de los filtros
                var categoria = $('#filtro-categoria').val();
                var subcategoria = $('#filtro-subcategoria').val();
                var estado = $('#filtro-estado').val();

                // Realizar la lógica para generar el reporte con los filtros seleccionados
                // ...

                // Cerrar el modal después de generar el reporte
                $('#modal-reporte').modal('hide');
            }

            function listarCategorias() {
                $.ajax({
                    url: '../../controllers/categoria.controller.php',
                    type: 'GET',
                    data: 'operacion=listarCategoria',
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let elementosLista = ``;
                        if (registros.length > 0) {
                            //Asignamos un primer elemento, que será el que se muestre por defecto
                            elementosLista = `<option selected>Seleccione</option>`;

                            //Recorremos toda la colección
                            registros.forEach(registro => {
                                //Creamos la etiqueta <option> con el valor requerido
                                elementosLista += `<option value=${registro['idcategorie']}>${registro['categoryname']}</option>`;

                            });
                        } else {
                            //En caso no tengamos datos
                            elementosLista = `<option>No hay datos asignados</option>`;
                        }
                        //Agregando los elementos al <select>
                        $("#categoria").html(elementosLista);
                        $("#categoria2").html(elementosLista);
                    }
                });
            }

            $('#categoria').change(function() {
                var categoria_id = $(this).val();
                $.ajax({
                    url: '../../controllers/subcategoria.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'listarSubcategoria',
                        'idcategorie': categoria_id
                    },
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let elementosLista = ``;
                        if (registros.length > 0) {
                            //Asignamos un primer elemento, que será el que se muestre por defecto
                            elementosLista = `<option selected>Seleccione</option>`;

                            //Recorremos toda la colección
                            registros.forEach(registro => {
                                //Creamos la etiqueta <option> con el valor requerido
                                elementosLista += `<option value=${registro['idsubcategorie']}>${registro['subcategoryname']}</option>`;
                            });
                        } else {
                            //En caso no tengamos datos
                            elementosLista = `<option>No hay datos asignados</option>`;
                        }
                        //Agregando los elementos al <select>
                        $("#subcategoria").html(elementosLista);
                    }
                });
            });

            $('#categoria2').change(function() {
                var categoriaid = $(this).val();
                cargarSubcategorias(categoriaid, 'Seleccione');
            });

            function cargarSubcategorias(categoriaId, subcategoriaId) {
                $.ajax({
                    url: '../../controllers/subcategoria.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'listarSubcategoria',
                        'idcategorie': categoriaId
                    },
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let elementosLista = ``;
                        if (registros.length > 0) {
                            // Asignamos un primer elemento, que será el que se muestre por defecto
                            elementosLista = `<option selected>Seleccione</option>`;

                            // Recorremos toda la colección
                            registros.forEach(registro => {
                                // Creamos la etiqueta <option> con el valor requerido
                                elementosLista += `<option value=${registro['idsubcategorie']}>${registro['subcategoryname']}</option>`;
                            });
                        } else {
                            // En caso no tengamos datos
                            elementosLista = `<option>No hay datos asignados</option>`;
                        }
                        // Agregando los elementos al <select>
                        $("#subcategoria2").html(elementosLista);
                        // Establecer el valor de subcategoría después de cargar las opciones
                        $("#subcategoria2").val(subcategoriaId);
                    }
                });
                reiniciarFormulario();
            }

            function reiniciarFormulario() {
                $("#formulario-libros")[0].reset();
            }

            function abrirModalRegistro() {
                datosNuevos = true;

                //Le indicimas el titulo del modal y su clase
                $(".modal-header").removeClass("bg-secondary");
                $(".modal-header").addClass("bg-primary");
                $("#titulo-modal-libros").html("Registrar Libros");
                reiniciarFormulario();
            }

            function abrirModalActualizar() {
                datosNuevos = false;

                //Le indicimas el titulo del modal y su clase
                $(".modal-header").removeClass("bg-secondary");
                $(".modal-header").addClass("bg-primary");
                $("#titulo-modal-libros-editar").html("Actualizar Libros");
                reiniciarFormulario();
            }

            //Registrar enviando Binario (PDF, JPG, XLSX, DOCX, ETC)
            function registrarLibrosBin() {
                //Validadicon de campos de datos completos utilizando las variables globales

                datos['idcategorie'] = $("#categoria").val();
                datos['idsubcategorie'] = $("#subcategoria").val();
                datos['amount'] = $("#cantidad").val();
                datos['descriptions'] = $("#descripcion").val();
                datos['author'] = $("#autor").val();
                datos['state'] = $("#estado").val();
                datos['locationresponsible'] = $("#ubicacion").val();

                // Crear un objeto FormData (reemplazar el array asociativo)
                var formdata = new FormData();
                //3.Enviando partametros
                formdata.append("operacion", "registrarLibros");
                formdata.append("idcategorie", $("#categoria").val());
                formdata.append("idsubcategorie", $("#subcategoria").val());
                formdata.append("amount", $("#cantidad").val());
                formdata.append("descriptions", $("#descripcion").val());
                formdata.append("author", $("#autor").val());
                formdata.append("state", $("#estado").val());
                formdata.append("locationresponsible", $("#ubicacion").val());

                formdata.append("url", $("#url")[0].files[0]);
                formdata.append("frontpage", $("#portada")[0].files[0]);

                // Validamos que los campos no esten vacios
                if (datos['idcategorie'] == "" || datos['idsubcategorie'] == "" || datos['amount'] == "" || datos['descriptions'] == "" || datos['author'] == "" || datos['state'] == "" || datos['locationresponsible'] == "") {
                    alertar("Complete el formulario por favor")
                } else {
                    //Confirmacion de envio de datos
                    Swal.fire({
                        title: "Registro",
                        text: "¿Los datos ingresados son correctos?",
                        icon: "question",
                        footer: "Horacio Zeballos Gámez",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#38AD4D",
                        showCancelButton: true,
                        cancelButtonText: "Cancelar",
                        cancelButtonColor: "#D3280A"
                    }).then(result => {
                        if (result.isConfirmed) {
                            //Enviamos los datos por ajax
                            $.ajax({
                                url: '../../controllers/biblioteca.controller.php',
                                type: 'POST',
                                data: formdata,
                                contentType: false,
                                processData: false,
                                cache: false,
                                success: function(result) {
                                    alertarToast("Proceso completado", "El libro ha sido registrado correctamente", "success")
                                    setTimeout(function() {
                                        reiniciarFormulario();
                                        $('#modal-libros').modal('hide');
                                        mostrarLibros();
                                    }, 1800)
                                }
                            });
                        }
                    });
                }
            }

            function ActualizarLibros() {
                /*
                Cuando se le asigna {} o [] a un objeto, se está REDEFINIENDO
                se le está volviendo a construir /
                */
                //El objeto datos ha sido creado en ámbito GLOBAL
                datos['idcategorie'] = $("#categoria2").val();
                datos['idsubcategorie'] = $("#subcategoria2").val();
                datos['amount'] = $("#cantidad2").val();
                datos['descriptions'] = $("#descripcion2").val();
                datos['author'] = $("#autor2").val();
                datos['state'] = $("#estado2").val();
                datos['locationresponsible'] = $("#ubicacion2").val();

                datos['operacion'] = "actualizarLibro";
                datos['idbook'] = idbook;

                Swal.fire({
                    title: "Editar",
                    text: "¿Los datos ingresados son correctos?",
                    icon: "question",
                    footer: "Horacio Zeballos Gámez",
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#38AD4D",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    cancelButtonColor: "#D3280A"
                }).then(result => {
                    if (result.isConfirmed) {
                        //Enviamos los datos por ajax
                        $.ajax({
                            url: '../../controllers/biblioteca.controller.php',
                            type: 'GET',
                            data: datos,
                            success: function(result) {
                                console.log(result);
                                alertarToast("Proceso completado", "El libro ha sido editado correctamente", "success");
                                mostrarLibros();
                                $("#modal-libros-editar").modal("hide");
                            }
                        });
                    }
                });
            }

            $("#tabla-libros tbody").on("click", ".eliminar", function() {
                //Almacenamos la PK en una variable
                let idbook = $(this).data("idbook");

                Swal.fire({
                    title: "Eliminar",
                    text: "¿Esta seguro de eliminar el libro?",
                    icon: "question",
                    footer: "Horacio Zeballos Gámez",
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#38AD4D",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    cancelButtonColor: "#D3280A"
                }).then(result => {
                    if (result.isConfirmed) {
                        //Enviamos los datos por ajax
                        $.ajax({
                            url: '../../controllers/biblioteca.controller.php',
                            type: 'GET',
                            data: {
                                'operacion': 'eliminarLibro',
                                'idbook': idbook
                            },
                            success: function(result) {
                                if (result == "") {
                                    idbook = ``;
                                    alertarToast("Eliminacion correcta", "El libro ha sido eliminado correctamente", "success")
                                    mostrarLibros();
                                }
                            }
                        });
                    }
                });
            });


            $("#tabla-libros tbody").on("click", ".editar", function() {
                idbook = $(this).data("idbook");
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        'operacion': 'getLibro',
                        'idbook': idbook
                    },
                    success: function(result) {
                        $("#categoria2").val(result['idcategorie']);
                        $("#cantidad2").val(result['amount']);
                        $("#descripcion2").val(result['descriptions']);
                        $("#autor2").val(result['author']);
                        $("#estado2").val(result['state']);
                        $("#ubicacion2").val(result['locationresponsible']);

                        // Cambiando configuración modal
                        $("#titulo-modal-libros-editar").html("Actualizar datos");
                        $(".modal-header").removeClass("bg-primary");
                        $(".modal-header").addClass("bg-secondary");

                        // Cargar subcategorías después de mostrar el modal
                        cargarSubcategorias(result['idcategorie'], result['idsubcategorie']);
                        $("#modal-libros-editar").modal("show");
                        datosNuevos = false;
                    }
                });
            });

            $("#tabla-libros tbody").on("click", ".editarportada", function() {
                idbook = $(this).data('idbook');
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'getBinarios',
                        'idbook': idbook
                    },
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let nuevaFila = ``;
                        portada = (registros['frontpage'] == null) ? 'noimagen.png' : registros['frontpage'];
                        nuevaFila = `
                        <img src="../frontpage/${portada}" width="100%" height="100%">
                        `;
                        $(".editportada").append(nuevaFila);

                        // Establece el idbook como atributo data en el botón "Cambiar"
                        $("#cambiarPortadaModal").data("idbook", idbook);

                        // Abre el modal
                        $('#editarportada').modal('show');
                    }
                });
            });

            // Función para obtener el valor del idbook
            function obtenerIdBookModal() {
                return $("#cambiarPortadaModal").data("idbook");
                return $("#cambiarPDFModal").data("idbook");
            }

            $("#cambiarPortadaModal").click(function() {
                var idbook = obtenerIdBookModal();

                var formData = new FormData();
                var inputFilePortada = $("#customFileLangModalPortada")[0].files[0];
                formData.append("frontpage", inputFilePortada);
                formData.append("idbook", idbook);
                formData.append("operacion", "actualizarFrontpage");

                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        // Realizar acciones después de la actualización
                        console.log("Frontpage actualizado correctamente");
                        // Cierra el modal después de la actualización
                        $('#editarportada').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Manejar errores
                        console.error(error);
                    }
                });
            });

            $("#customFileLangModalPortada").change(function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).next(".custom-file-label-portada").html(fileName);
            });

            $('#editarportada').on('hidden.bs.modal', function() {
                $(".editportada").empty(); // Vacía el contenido de la clase editportada
                $("#customFileLangModalPortada").val(""); // Restablecer el valor del input de archivo
                $(".custom-file-label-portada").html("Seleccionar Archivo"); // Restablecer la etiqueta del input personalizado
            });

            // Agregar evento click para abrir el modal
            $("#tabla-libros tbody").on("click", ".editarpdf", function() {
                idbook = $(this).data('idbook');
                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: {
                        'operacion': 'getBinarios',
                        'idbook': idbook
                    },
                    success: function(result) {
                        let registros = JSON.parse(result);
                        let nuevaFila = ``;
                        pdf = (registros['url'] == null) ? 'no-pdf.pdf' : registros['url'];
                        nuevaFila = `
                        <iframe src="../../views/PDF/${pdf}" width="100%" height="600"></iframe>
                    `;
                        $(".editpdf").append(nuevaFila);

                        // Establece el idbook como atributo data en el botón "Cambiar"
                        $("#cambiarPDFModal").data("idbook", idbook);

                        // Abre el modal
                        $('#editarpdf').modal('show');
                    }
                });
            });

            $("#cambiarPDFModal").click(function() {
                var idbook = obtenerIdBookModal();

                var formData = new FormData();
                var inputFilePDF = $("#customFileLangModalPDF")[0].files[0];
                formData.append("url", inputFilePDF);
                formData.append("idbook", idbook);
                formData.append("operacion", "actualizarPDF");

                $.ajax({
                    url: '../../controllers/biblioteca.controller.php',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(inputFilePDF)
                        console.log(response)
                        // Realizar acciones después de la actualización
                        console.log("PDF actualizado correctamente");
                        // Cierra el modal después de la actualización
                        $('#editarpdf').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        // Manejar errores
                        console.error(error);
                    }
                });
            });

            $("#customFileLangModalPDF").change(function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).next(".custom-file-label-PDF").html(fileName);
            });

            // Evento hidden.bs.modal del modal
            $('#editarpdf').on('hidden.bs.modal', function() {
                $(".editpdf").empty(); // Vacía el contenido de la clase editportada
                $("#customFileLangModalPDF").val(""); // Restablecer el valor del input de archivo
                $(".custom-file-label-PDF").html("Seleccionar Archivo"); // Restablecer la etiqueta del input personalizado
            });





            //Eventos
            $("#mostrar-modal-registro").click(abrirModalRegistro);
            $("#mostrar-modal-reporte").click(mostrarModalReporte);
            $("#guardar-libro").click(registrarLibrosBin);
            $("#cancelar-modal").click(reiniciarFormulario);

            $("#mostrar-modal-editar").click(abrirModalActualizar);
            $("#guardar-libro-editar").click(ActualizarLibros);
            $("#cancelar-modal-editar").click(reiniciarFormulario);


            //Funciones de carga automatica
            mostrarLibros();
            listarCategorias();
            //listarSubcategorias2();

        });
    </script>