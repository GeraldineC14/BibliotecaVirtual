<?php
require_once './permisos.php';
?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <!-- INICIO PERFIL -->

        <!-- FIN PERFIL -->
        <div class="container-fluid">
            <main class="app-content ml-md-5 mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" id="" class="btn btn-sm btn-black">
                            <a href="index.php?view=libros.view.php">
                                <i class="fa-solid fa-circle-arrow-left fa-2xl" style="color: #000000;"></i>
                            </a>
                        </button>
                        <div class="form-group mt-3 mt-md-5 ml-md-5">
                            <div class="custom-file" lang="es">
                                <input type="file" class="custom-file-input" id="customFileLang">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                            </div>
                        </div>
                        <div class="form-group mt-4 ml-md-5 text-center">
                            <button type="button" id="eliminar-pdf" class="btn btn-sm btn-danger mr-3" style="border-radius:8px;">
                                <i class="fa-solid fa-trash fa-xl"></i>
                                Eliminar
                            </button>
                            <button type="button" id="cambiar-pdf" class="btn btn-sm btn-success" style="border-radius:8px;">
                                <i class="fa-solid fa-circle-check fa-xl"></i>
                                Cambiar
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="pdf mt-2 mt-md-0 ml-md-5 editportada">
                            <!-- Aquí se cargará las portadas por AJAX -->
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            $(document).ready(function() {
                idbook = <?php echo $_POST['idbook']; ?>;

                function getBinarios() {
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
                                        <img src="../../views/frontpage/${portada}" width="50%" height="450">
                                    `;
                            $(".editportada").append(nuevaFila);
                        }
                    });
                }

                //Funciones de carga automatica
                getBinarios();
            });
        </script>