<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Biblioteca Virtual</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css?h=6374f842801eca4c964d319ee1808973">
    <link rel="stylesheet" href="assets/css/Sidebar-navbar.css?h=dbde5f7cd08c3af294ce34870a0e649f">
    <link rel="stylesheet" href="assets/css/Sidebar.css?h=221a6cfc6c7eea8872b679d3e5f73dc4">
    <link rel="shortcut icon" href="assets/img/favicon.ico" />
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top bg-danger py-3">
        <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="index.php"><img src="assets/img/Logo.svg?h=caf877a66b61baa8840eb2b50b02740e" width="70" height="70"><span style="font-family: 'Archivo Black', sans-serif;font-size: 22px;">Horacio Zeballos</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-5"><span class="sr-only"></span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5" style="font-size: 20px;">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active text-dark" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#">Obras Chinchanas</a></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-primary ml-lg-2" role="button" href="views/login.php" style="background: rgb(214,153,18);font-size: 20px;">Acceder</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="carousel slide carousel-fade" data-ride="carousel" id="carousel-1" style="margin-right: 0px;padding-bottom: 0px;">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/Portada1.png?h=25952ce41ff7a5938893d74d3b0467c5" alt="Slide Image" style="padding-left: 0px;"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Portada2.png?h=ff9f180286ddfdab6e1e6790b80a6b23" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Portada3.png?h=bdde253e641516f6b6ad168637af87d5" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 1px;">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
        <!-- FORMULARIO DE BUSQUEDA -->
        <div class="container mt-3">
            <form action="views/buscador.view.php">
                <div class="form-row align-items-center ml-5">
                    <div class="col-auto">
                        <input class="form-control form-control-lg" id="inlineFormInputGroup" type="text" placeholder="Buscar libro" name="look">
                    </div>
                    <div class="col-auto">
                    <select class="form-control form-control-lg" id="inlineFormInputGroup" name="type"  required>
                                <option value="">Seleccione:</option>
                                <option value="n">Nombre de libro</option>
                                <option value="a">Autor</option>
                            </select>
                    </div>
                    <div class="col-auto">
                        <input class="form-control form-control-lg" id="inlineFormInputGroup" type="submit" value="Bucar">           
                    </div>
                </div> 
            </form> 
        </div>
    </div>
    <div class="container" style="margin-top: 20px;margin-bottom: 39px;">         
        <div class="row">
            <div class="col-md-6 col-xl-3 offset-xl-0">
                <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate">
                    <div class="sidebar-category sidebar-default">
                        <div class="category-title">
                            <span>CONTENIDOS</span>
                        </div>
                            <!-- LISTA DE SUBCATEGORIAS -->
                        <div class="category-content">
                            <ul id="fruits-nav" class="nav flex-column categorias"></ul>
                        </div>
                    </div>
                </div>   
            </div>     
            <!-- VISTA DE LIBROS PRINCIPALES -->
            <div class="row justify-content-md-center row-cols-1 row-cols-sm-2 col-md-8 row-cols-md-3 datos"></div>    
        </div>
    </div>
    <!-- Footer -->
    <h2 class="text-center" style="font-family: 'Archivo Black', sans-serif;margin-bottom: 25px;">Enlaces de apoyo</h2>
    <div class="container" style="margin-bottom: 39px;">
        <div class="row">
            <div class="col-md-4"><img src="assets/img/descarga.jpeg?h=af99d1441c9d8351687e5c17113001eb" width="250" height="147" style="width: 330px;height: 180px;"><a href="https://www.perueduca.pe/#/home/materiales-educativos/10" target="_blank">Ingresa Aquí ✏&nbsp;</a></div>
            <div class="col-md-4"><img src="assets/img/descarga%20(1).jpeg?h=a661cf6326af9f6bfae9677f0b3bfebe" width="218" height="146" style="width: 330px;height: 180px;"><a href="https://repositorio.perueduca.pe/centro-de-herramientas-pedagogicas/" target="_blank"><br><span style="text-decoration: underline; color: rgb(0, 86, 179);">Ingresa Aquí 📒</span></a></div>
            <div class="col"><img src="assets/img/Nivel-Secundaria-San-Benito-de-Palermo.jpg?h=0b1e73908bd9b999a3c376d0058601fa" style="width: 330px;height: 180px;"><a href="https://www.perueduca.pe/#/home/materiales-educativos/11" target="_blank"><br><span style="text-decoration: underline; color: rgb(0, 86, 179);">Ingresa Aquí 📝</span></a></div>
        </div>
    </div>
    <section style="margin-left: 42px;margin-top: 29px;margin-bottom: 33px;width: 300px;margin-right: -2px;padding-right: 1px;"></section>
    <footer class="text-white bg-dark">
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
        function mostrarVistaLibros(){
            $.ajax({
                url:'controllers/biblioteca.controller.php',
                type:'GET',
                data:'operacion=listarVistaLibros',
                success: function(result){
                let registros = JSON.parse(result);
                let nuevaFila = ``;

                registros.forEach(registro => {  
                    portada = (registro['frontpage']== null) ? 'noimagen.png' :registro['frontpage'];
                    nuevaFila = ` 
                    <div class="card-group">   
                            <div class="card col-md-12"> 
                                <img class="card-img-top w-100 d-block" style="padding-top: 10px;margin: 0px;" src="./views/frontpage/${portada}">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;" id="titulo">${registro['descriptions']}</h5>
                                    <p class="card-text">${registro['author']}</p>
                                    <div>
                                        <a href='./views/detalle.view.php?resumen=${registro['idbook']}' class='btn btn-primary view' type='button' style='margin-left: 51px;'>VER</a>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>                              
                    `;
                    $(".datos").append(nuevaFila);
                });
                }
            });
        }

        function VistaprincipalCategoria(){
            $.ajax({
                url:'controllers/categoria.controller.php',
                type:'GET',
                data: 'operacion=VistaprincipalCategoria',
                success: function(result){
                    let registros = JSON.parse(result);
                    let nuevaFila2 = ``;
                    registros.forEach(registro => {  
                        nuevaFila2 = ` 
                        <li class="nav-item">
                            <a href="./views/subcategoria.view.php?sub1=${registro['idsubcategorie']}" class="nav-link">
                                <i class="fa fa-book" aria-hidden="true"></i>${registro['subcategoryname']}
                            </a>
                        </li>                             
                        `
                        $(".categorias").append(nuevaFila2);
                    });
                }
            });
        }
        //Funciones de carga automatica
        mostrarVistaLibros();
        VistaprincipalCategoria();
    });
</script>
</body>
</html>