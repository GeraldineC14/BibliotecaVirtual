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
    <link rel="stylesheet" href="../assets/css/prueba.css">
    
</head>
<body>   
    <!-- navbar -->
    <?php include './navbar.php'; ?>
    <div class="container">
        <div class="carousel slide carousel-fade" data-ride="carousel" id="carousel-1" style="margin-right: 0px;padding-bottom: 0px;">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/Portada1.png" alt="Slide Image" style="padding-left: 0px;"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="../assets/img/Portada2.png" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="../assets/img/Portada3.png" alt="Slide Image"></div>
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
            <form action="./buscador.view.php" class="text-center" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar libro" name="look" required>
                    <select class="form-control" name="type" required>
                        <option value="n">Nombre de libro</option>
                        <option value="a">Autor</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn" type="submit" style="background-color: #39a2db; border-color: #39a2db;">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <div class="container" style="margin-top: 20px; margin-bottom: 39px;">
        <div class="row">
            <div class="col-md-2">
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
            <div class="col-md-10">
                <div class="container mt-2" style="background-color: #FFF;">
                    <div class="catalogo datos">

                    </div><!-- ./Fin catálogo -->
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <h2 class="text-center" style="font-family: 'Archivo Black', sans-serif;margin-bottom: 25px;">Enlaces de apoyo</h2>
    <div class="container" style="margin-bottom: 39px;">
        <div class="row">
            <div class="col-md-4"><img src="../assets/img/descarga.jpeg?h=af99d1441c9d8351687e5c17113001eb" width="250" height="147" style="width: 330px;height: 180px;"><a href="https://www.perueduca.pe/#/home/materiales-educativos/10" target="_blank">Ingresa Aquí ✏&nbsp;</a></div>
            <div class="col-md-4"><img src="../assets/img/descarga%20(1).jpeg?h=a661cf6326af9f6bfae9677f0b3bfebe" width="218" height="146" style="width: 330px;height: 180px;"><a href="https://repositorio.perueduca.pe/centro-de-herramientas-pedagogicas/" target="_blank"><br><span style="text-decoration: underline; color: rgb(0, 86, 179);">Ingresa Aquí 📒</span></a></div>
            <div class="col"><img src="../assets/img/Nivel-Secundaria-San-Benito-de-Palermo.jpg?h=0b1e73908bd9b999a3c376d0058601fa" style="width: 330px;height: 180px;"><a href="https://www.perueduca.pe/#/home/materiales-educativos/11" target="_blank"><br><span style="text-decoration: underline; color: rgb(0, 86, 179);">Ingresa Aquí 📝</span></a></div>
        </div>
    </div>
    <section style="margin-left: 42px;margin-top: 29px;margin-bottom: 33px;width: 300px;margin-right: -2px;padding-right: 1px;"></section>
    <footer class="text-white bg-dark">
        <div class="container text-center py-4 py-lg-5">
            <p class="text-white-50 mb-0">Copyright © ARFECAS 2023</p>
        </div>
    </footer>

    <a id="scroll-top" href="#" class="btn btn-primary btn-scroll-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Script de Fontawesome -->
    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    
<script>
    $(document).ready(function(){

        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
            $('#scroll-top').addClass('active');
            } else {
            $('#scroll-top').removeClass('active');
            }
        });

        $('#scroll-top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 300);
        });

        function mostrarVistaLibros(){
            $.ajax({
                url:'../controllers/biblioteca.controller.php',
                type:'GET',
                data:'operacion=listarVistaLibros',
                success: function(result){
                let registros = JSON.parse(result);
                let nuevaFila = ``;

                registros.forEach(registro => {  
                    let estrellasHTML = generarEstrellasHTML(registro['total']);
                    let commentPreview = registro['descriptions'].split(' ').slice(0, 3).join(' ');
                    commentPreview += '...'
                    portada = (registro['frontpage']== null) ? 'noimagen.png' :registro['frontpage'];
                    
                    nuevaFila = ` 
                        <ul class='list-group contenedor'>
                            <li class='list-group-item bg-danger' style='color: #ffffff; font-weight: bold; font-size: 12px;'>
                                <div class='row'>
                                    <div class='col-md-12 titulo'>${commentPreview}</div>
                                </div>
                            </li>
                            <li class='list-group-item'>
                                <div class='text-center'>
                                    <img class='img' src='./frontpage/${portada}'>
                                </div>
                                <div class='descripcion mt-2 text-center'>
                                    ${registro["descriptions"]}
                                    <p class='mt-3' style='font-size: 12px;'>${registro["author"]}</p>
                                </div>
                            </li>
                            <li class='list-group-item'>
                                <a href='./detalle.view.php?resumen=${registro['idbook']}' class='btn btn-block btn-sm mb-2' style='background-color: #39a2db; border-color: #39a2db; color: #ffffff;'>¡Vamos a aprender!</a>
                                <div class="estrellas">${estrellasHTML}</div>
                            </li>
                        </ul>               
                    `;
                    $(".datos").append(nuevaFila);
                });
                }
            });
        }

        function generarEstrellasHTML(score) {
            // Inicializamos la variable
            // La variable estrellasHTML es una cadena que contiene codigo HTML para la clasificacion
            let estrellasHTML = '';
            // Recorre en bucle los numero 1a5
            for (let i = 1; i <= 5; i++) {
                // Si el numero actual es menor o igual a la puntuacion cambia a amarillo
                if (i <= score) {
                    estrellasHTML += '<i class="fas fa-star" style="color: #ffc800;"></i>';
                    // Caso contrario se cambia a otro color
                } else {
                    estrellasHTML += '<i class="fas fa-star" style="color: #a29e90;"></i>';
                }
            }
            return estrellasHTML;
        }

        function VistaprincipalCategoria(){
            $.ajax({
                url:'../controllers/categoria.controller.php',
                type:'GET',
                data: 'operacion=VistaprincipalCategoria',
                success: function(result){
                    let registros = JSON.parse(result);
                    let nuevaFila2 = ``;
                    registros.forEach(registro => {  
                        nuevaFila2 = ` 
                        <li class="nav-item">
                            <a href="./subcategoria.view.php?sub1=${registro['idsubcategorie']}" class="nav-link">
                                <i class="fa fa-book" aria-hidden="true"></i>${registro['subcategoryname']}
                            </a>
                        </li>                             
                        `
                        $(".categorias").append(nuevaFila2);
                    });
                }
            });
        }

        $('#stars i').click(function() {
                var rating = $(this).data('rating');
                $('#rating').val(rating);
                $('#stars i').removeClass('fas').addClass('far');
                $(this).prevAll().addBack().removeClass('far').addClass('fas');
                $('#rating-text').text(rating + ' estrella(s).');
            });
        //Funciones de carga automatica
        mostrarVistaLibros();
        VistaprincipalCategoria();
    });
</script>
</body>
</html>