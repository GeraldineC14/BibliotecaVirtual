<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Biblioteca Virtual</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-Dark-icons.css?h=6374f842801eca4c964d319ee1808973">
    <link rel="stylesheet" href="../assets/css/Sidebar-navbar.css?h=dbde5f7cd08c3af294ce34870a0e649f">
    <link rel="stylesheet" href="../assets/css/Sidebar.css?h=221a6cfc6c7eea8872b679d3e5f73dc4">
    <!-- LightBox -->
    <link rel="stylesheet" href="../vendor/lightbox/css/lightbox.min.css">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" />
</head>
<body>
    <!-- HEADER -->
    <nav class="navbar navbar-dark navbar-expand-md sticky-top bg-danger py-3">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="../index.php"><img src="../assets/img/Logo.svg?h=caf877a66b61baa8840eb2b50b02740e" width="92" height="96"><span style="font-family: 'Archivo Black', sans-serif;font-size: 22px;">Horacio Zeballos</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-5"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5" style="font-size: 20px;">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active text-dark" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active text-dark" href="login.php">Ingresa</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Obras Chinchanas</a></li>
                </ul>
            </div>
        </div>
    </nav>
            
    <div class="container" style="margin-top: 48px;padding-right: 0px;padding-left: 0px;margin-bottom: 53px;"> 
        <!-- Resumen de los libros -->
        <div class="row col-xl-12 resumen"> 
            <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i>Volver</a>  
        </div>
    </div>
        

    <!-- FOOTER -->
    <footer class="text-white bg-dark">
        <div class="container text-center py-4 py-lg-5">
            
            <p class="text-white-50 mb-0">Copyright © 2023 By IA TECH</p>
        </div>
    </footer>

<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- BOOTSTRAP-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
<!-- FONTWASOME -->
<script src="https://kit.fontawesome.com/9b57fc34f2.js" crossorigin="anonymous"></script>
<!-- Lightbox -->
<script src="../vendor/lightbox/js/lightbox.min.js"></script>

<!-- Mis funciones y eventos javascript -->
<script>
    $(document).ready(function(){
        idbook2 = <?php echo $_GET["resumen"];?>
        
        function VistaResumen(){
                $.ajax({
                    url: '../controllers/biblioteca.controller.php',
                    type: 'GET',
                    data: {'operacion':'VistaResumen','idbook':idbook2},
                    success: function(result){
                        let registros = JSON.parse(result);
                        let nuevaFila = ``;
                        
                        portada = (registros['frontpage']== null) ? 'noimagen.png' :registros['frontpage'];
                        resumen = (registros['summary']== null) ? 'Resumen no disponible' :registros['summary'];
                        pdf = (registros['url']== null) ? 'sin-pdf.png' :registros['url'];
                            nuevaFila = 
                                `
                                <div class="col-md-6">

                                    <h5 class="text-center">${registros['descriptions']}</h3>
                                    <div class="text-center">
                                        <img src="frontpage/${portada}" width="293" height="452">                                    </div>
                                    </div>
                                <div class="col-md-5">
                                    <p style="margin-top: 40px;margin-bottom: 0px;"> Autor: ${registros['author']}</p>
                                    <p>Libros disponibles</p>
                                    <p class="text-justify" style="margin-bottom: 61px;margin-top: 30px;">
                                        <span style="color: rgb(34, 34, 34);">${resumen}</span>
                                    </p>
                                    <div class="text-center">
                                        <div class="btn-group" role="group">
                                        <a href="PDF/${pdf}" target="_blank" class="btn btn-success" type="button">Ver PDF <i class="fa-solid fa-file-pdf"></i></a>
                                        <a href="PDF/${pdf}" download="${registros['descriptions']}.pdf" class="btn btn-warning" type="button">Descargar <i class="fa-solid fa-download"></i></a>
                                        <a href='prestamos.view.php?prestamo=${registros['idbook']}' class="btn btn-primary prestamos"  type="button">Prestamo <i class="fa-solid fa-book-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                            `;
                        $(".resumen").append(nuevaFila);      
                    }
                });
        }


        //Funciones de carga automatica
        VistaResumen();
    });
</script>
</body>
</html>