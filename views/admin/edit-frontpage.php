<?php
require_once 'permisos.php'; 
 
?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                
                <!-- FIN PERFIL -->
                <div class="container-fluid">
                    <main class="app-content ml-5 mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" id="cancelar-pdf" class="btn btn-sm btn-black">
                                    <a href="index.php?view=libros.view.php">
                                        <i class="fa-solid fa-circle-arrow-left fa-2xl" style="color: #000000;"></i>                                    
                                    </a>
                                </button>
                                <div class="form-group mt-5 ml-5">
                                    <div class="custom-file" lang="es">
                                        <input type="file" class="custom-file-input" id="customFileLang">
                                        <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                                    </div>
                                </div>
                                <div class="form-group mt-4 ml-5 text-center">
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
                                <div class="pdf mt-2 ml-5">
                                    <img src="../../views/frontpage/80800719ad75ad6290190dd1bc1fa25ad7a0e04b.jpg" width="50%" height="450">
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

