<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header("location:login.php");
}
?>

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
    <link rel="shortcut icon" href="../assets/img/favicon.ico"/>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; background-color: #f7f0f1;">
    <!-- navbar -->
    <nav class="navbar navbar-dark navbar-expand-md sticky-top bg-danger py-3">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="index.php"><img src="../assets/img/Logo.svg?h=caf877a66b61baa8840eb2b50b02740e" width="70" height="70"><span style="font-family: 'Archivo Black', sans-serif;font-size: 22px;">Horacio Zeballos</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-5"><span class="sr-only"></span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5" style="font-size: 20px;">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link active text-dark" href="../index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active text-dark" href="#"><?php echo $_SESSION['ses_namess'];?></a></li>
                    <li class="nav-item"><a class="nav-link active text-dark" href="register.php">Crea tu Cuenta</a></li>
                    <li class="nav-item"><a class="nav-link active text-dark" href="views/login.php">Ingresa</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Obras Chinchanas</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="card w-50 mt-2 mb-5">
            <div class="card-header text-center">
                <h5 class="modal-title" id="titulo-modal-libros">Solicitud de Prestamo</h5>
            </div>
            <div class="card-body">
                <form action="" id="formulario-libros" autocomplete="off">
                    <!-- Creación de controles -->
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="nombrecompleto">Nombre Completo:</label>
                            <input type="text" id="nombrecompleto" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="nivel">Nivel:</label>
                            <select name="nivel" id="nivel" class="form-control form-control-sm">
                                <option selected value="">Seleccione:</option>
                                <option value="">Inicial</option>
                                <option value="">Primaria</option>
                                <option value="">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="grado">Grado:</label>
                            <input type="number" id="grado" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="seccion">Sección:</label>
                            <input type="text" id="seccion" class="form-control form-control-sm">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" id="titulo" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" id="autor" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="disponibles">Disponibles:</label>
                            <input type="number" id="disponibles" class="form-control form-control-sm" readonly>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fecha1">Fecha Recojo:</label>
                            <input type="date" class="form-control form-control-sm" id="fecha1" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")));?>" max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 10 days"));?>"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="fecha2">Fecha Devolución:</label>
                            <input type="date" class="form-control form-control-sm" id="fecha2" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")));?>" max="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 15 days"));?>"/>
                        </div>
                    </div>      
                </form>
            </div>
            <div class="card-footer text-center">
                <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardar-libro" class="btn btn-sm btn-primary">Solicitar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white bg-dark" style="padding: 1em 0; text-align:center; margin-top: auto;">
        <div class="container text-center py-4 py-lg-5">
            <p class="text-white-50 mb-0">Copyright © 2023 Desarrollado por IA TECH</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    
<script>
    $(document).ready(function(){
        idbook3 = <?php echo $_GET["prestamo"];?>

        function DatosLibros(){
                $.ajax({
                    url: '../controllers/biblioteca.controller.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        'operacion' : 'getLibro', 
                        'idbook': idbook3
                    },
                    success: function(result){
                        $("#titulo").val(result['descriptions']);
                        $("#autor").val(result['author']);
                        $("#disponibles").val(result['amount']);
                    }
                });
        }

        DatosLibros();

    });
</script>
</body>
</html>