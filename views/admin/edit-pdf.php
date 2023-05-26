<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editar PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="../../assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient"
        style="margin-bottom: 5px;padding-bottom: 11px;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <img src="../../assets/img/Insignia.png" width="50" height="65">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="text-center">Edición de PDF</li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page" >

        <div class="modal-body text-center" style="display: grid; grid-template-columns: repeat(2, 1fr);">
            
            <div class="col-md-9 mt-5">
                <div class="form-group">
                    <input id="pdf" class="form-control" type="file" name="pdf">
                    <br>
                    <button type="button" id="cancelar-modal-portada" class="btn btn-sm btn-secondary" class="close"data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" id="guardar-portada-editar" class="btn btn-sm btn-primary">
                        Modificar
                    </button>
                </div>
            </div>
            <div class="pdf mt-5">
                <iframe src="../../views/PDF/Guia instalacion project.pdf" width="850" height="450"></iframe>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.min2.js"></script>
</body>

</html>