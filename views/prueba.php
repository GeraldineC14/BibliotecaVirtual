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
    <link rel="shortcut icon" href="../assets/img/favicon.ico" />
    <link rel="stylesheet" href="../assets/css/prueba.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/csshake/1.7.0/csshake.min.css" integrity="sha512-Kd+SEhBK155eAi26GMJymGkvztAnpEGA/PsJc9OKxRwkhJGblvtVv5Fv1R8zYvPq7dbsy+3o4QJco6hzBdxVjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <?php include './navbar.php'; ?>
    <div class="container">

        <!-- Portada -->
        <div class="carousel slide carousel-fade" data-ride="carousel" id="carousel-1" style="margin-right: 0px;padding-bottom: 0px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 d-block" src="../assets/img/Portada1.png">
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="../assets/img/Portada2.png">
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="../assets/img/Portada3.png">
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators" style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 1px;">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>

        <!-- Botones -->
        <div class="row mt-4 mb-4">
            <div class="col-sm-4 mb-3">
                <button class="btn btn-info btn-block hvr-float-shadow"><b>INICIAL</b></button>
            </div>
            <div class="col-sm-4 mb-3">
                <button class="btn btn-warning btn-block hvr-float-shadow"><b>PRIMARIA</b></button>
            </div>
            <div class="col-sm-4 mb-3">
                <button class="btn btn-success btn-block hvr-float-shadow"><b>SECUNDARIA</b></button>
            </div>
        </div>

        <div class="dropdown-divider mt-4" style="color:black;"></div>
        <!-- Contenido -->
        <div class="row mt-4">
            <div class="col-md-6 mt-3" data-aos="fade-up">
                <img src="../assets/img/Muestra1.jpg" alt="" style="max-width: 100%; height: auto; border-radius: 25px;">
            </div>
            <div class="col-md-6 mt-3" data-aos="fade-up">
                <p class="text-justify" style="font-family: 'Montserrat Alternates', sans-serif;" data-aos="fade-left">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                </p>
            </div>
        </div>
        <div class="dropdown-divider mt-4" style="color:black;"></div>
        <div class="row mt-4">
            <div class="col-md-6 order-md-last mt-3" data-aos="fade-down">
                <img src="../assets/img/Muestra1.jpg" alt="" style="max-width: 100%; height: auto; border-radius: 25px;">
            </div>
            <div class="col-md-6 order-md-first mt-3">
                <p class="text-justify" style="font-family: 'Montserrat Alternates', sans-serif;" data-aos="fade-right">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Reiciendis cupiditate fuga quis, ab autem tempora recusandae
                    natus officiis ut! Cupiditate velit dicta exercitationem illum,
                    quidem asperiores ipsam tempore dolorum quia?
                </p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <h2 class="text-center mt-4" style="font-family: 'Rowdies', cursive; margin-bottom: 25px;">ENLACES DE APOYO</h2>
    <div class="container" style="margin-bottom: 39px;">
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <img src="../assets/img/descarga.jpeg?h=af99d1441c9d8351687e5c17113001eb" width="250" height="147" style="width: 330px;height: 180px;">
                <a href="https://www.perueduca.pe/#/home/materiales-educativos/10" target="_blank">Ingresa Aquí ✏</a>
            </div>
            <div class="col-md-4 text-center mb-3">
                <img src="../assets/img/descarga%20(1).jpeg?h=a661cf6326af9f6bfae9677f0b3bfebe" width="218" height="146" style="width: 330px;height: 180px;">
                <a href="https://repositorio.perueduca.pe/centro-de-herramientas-pedagogicas/" target="_blank">Ingresa Aquí 📒</a>
            </div>
            <div class="col-md-4 text-center mb-3">
                <img src="../assets/img/Nivel-Secundaria-San-Benito-de-Palermo.jpg?h=0b1e73908bd9b999a3c376d0058601fa" style="width: 330px;height: 180px;">
                <a href="https://www.perueduca.pe/#/home/materiales-educativos/11" target="_blank">Ingresa Aquí 📝</a>
            </div>
        </div>
    </div>
    <section style="margin-left: 42px;margin-top: 29px;margin-bottom: 33px;width: 300px;margin-right: -2px;padding-right: 1px;"></section>
    <footer class="text-white bg-dark">
        <div class="container text-center py-4 py-lg-5">
            <p class="text-white-50 mb-0">Copyright © ARFECAS 2023</p>
        </div>
    </footer>

    <!-- CDN JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CDN Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Script de Fontawesome -->
    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>