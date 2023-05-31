<?php
session_start();

/*if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header("location:login.php");
}*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/popups.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
    <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
</head>

<body id="page-top">
<div id="wrapper">
<?php include "./template/slider.general.php"; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                
                <!-- FIN PERFIL -->
                <div class="container-fluid">
                    <main class="app-content ml-5 mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-5 mb-5">
                                    <div class="custom-file" lang="es">
                                        <input type="file" class="custom-file-input" id="customFileLang">
                                        <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" id="cancelar-pdf" class="btn btn-sm btn-secondary" class="close">
                                        Cancelar
                                    </button>
                                    <button type="submit" id="guardar-pdf" class="btn btn-sm btn-primary">
                                        Modificar
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="pdf mt-5 ml-5">
                                    <iframe src="../../views/PDF/0e4aaa4dfe0bdaf1a67476f85e99329219502f1c.pdf" width="80%" height="500"></iframe>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © IA Tech 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>

    <script>
    </script>
</body>

</html>