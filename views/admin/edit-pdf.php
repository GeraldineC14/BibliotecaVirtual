<?php
require_once 'permisos.php'; 
 
?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                
                <!-- FIN PERFIL -->
                <div class="container-fluid">
    <main class="app-content ml-2 ml-md-5 mt-3">
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
                <div class="pdf mt-2 mt-md-0 ml-md-5">
                    <iframe src="../../views/PDF/0e4aaa4dfe0bdaf1a67476f85e99329219502f1c.pdf" width="100%" height="500"></iframe>
                </div>
            </div>
        </div>
    </main>
</div>


