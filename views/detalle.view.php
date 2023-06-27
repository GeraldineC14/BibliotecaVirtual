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
    <!-- navbar -->
    <?php include './navbar.php'; ?>
            
    <div class="container" style="margin-top: 48px;padding-right: 0px;padding-left: 0px;margin-bottom: 53px;"> 
        <!-- Resumen de los libros -->
        <div class="row col-xl-12 resumen"> 
            <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i>Volver</a>  
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header  text-center">
                        <h3>Comentarios</h3>
                    </div>
                    <div class="datos">

                    </div>
                    
                    <!-- Agregar comentarios -->
                    <div class="card-footer text-muted">
                        <form action="">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label for="comentario">Escribe un comentario:</label>
                                    <textarea class="form-control" name="" id="comentario"></textarea>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Puntuación</label>
                                    <div id="stars">
                                        <i class="far fa-star" data-rating="1"></i>
                                        <i class="far fa-star" data-rating="2"></i>
                                        <i class="far fa-star" data-rating="3"></i>
                                        <i class="far fa-star" data-rating="4"></i>
                                        <i class="far fa-star" data-rating="5"></i>
                                        <input type="hidden" name="rating" id="rating">
                                    </div>
                                    <p class="text-muted" id="rating-text"></p>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary mt-5" >Enviar</a>
                                </div>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
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
        idbook2 = <?php echo $_GET["resumen"];?>;
        idusuario = <?php echo  $_SESSION['login']['idusers'];?>;  
        
        function VistaResumen() {
            $.ajax({
                url: '../controllers/biblioteca.controller.php',
                type: 'GET',
                data: {
                    'operacion': 'VistaResumen',
                    'idbook': idbook2
                },
                success: function(result) {
                    let registros = JSON.parse(result);
                    let nuevaFila = `
                        <div class="col-md-6">
                            <h5 class="text-center">${registros['descriptions']}</h3>
                            <div class="text-center">
                                <img src="frontpage/${registros['frontpage'] || 'noimagen.png'}" width="293" height="452">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <p style="margin-top: 40px;margin-bottom: 0px;"> Autor: ${registros['author']}</p>
                            <p>Libros disponibles: ${registros['amount']}</p>
                            <p class="text-justify" style="margin-bottom: 61px;margin-top: 30px;">
                                <span style="color: rgb(34, 34, 34);">${registros['summary'] || 'Resumen no disponible'}</span>
                            </p>
                            <div class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="PDF/${registros['url'] || 'sin-pdf.png'}" target="_blank" class="btn btn-success mr-3" type="button">Ver PDF <i class="fa-solid fa-file-pdf"></i></a>
                                    <a href="PDF/${registros['url'] || 'sin-pdf.png'}" download="${registros['descriptions']}.pdf" class="btn btn-warning mr-3" type="button">Descargar <i class="fa-solid fa-download"></i></a>
                                    <a href='./prestamos.view.php?prestamo=${registros['idbook']}' class="btn btn-primary prestamos"  type="button">Prestamo <i class="fa-solid fa-book-open"></i></a>
                                </div>
                            </div>
                        </div>
                    `;

                    $(".resumen").append(nuevaFila);

                    // Verificar si el idusuario es igual a -1
                    if (idusuario === -1) {
                        $(".prestamos").attr("href", "login.php");
                    }
                }
            });
        }

        function listarComentarios(){
            $.ajax({
                url: '../controllers/biblioteca.controller.php',
                type: 'GET',
                data: {'operacion':'listarComentarios','idbook' : idbook2},
                success: function(result){
                    let registros = JSON.parse(result);
                    let nuevaFila2 = ``;

                    registros.forEach(registro => {
                        nuevaFila2 = `
                            <div class="card-body">
                                <h5 class="card-title">${registro['Usuario']}</h5>
                                <p class="card-text">${registro['commentary']}</p>
                                <p class="card-text">${registro['commentary_date']}</p>
                            </div>
                        `;
                        $(".datos").append(nuevaFila2);
                    });
                }
            });
        }

        function registrarComentario(){
            $.ajax({
                url: '../controllers/biblioteca.controller.php',
                type: 'GET',
                data: {
                        'operacion':'registrarComentario',
                        'idbook' : idbook2 ,
                        'idusers': idusuario ,
                        'commentary' : 'comentario',
                        'score' : 'rating'},
                success: function(result){
                    //Por definir
                }
            });
        }
            
        $('#stars i').click(function() {
            var rating = $(this).data('rating');
            $('#rating').val(rating);
            $('#stars i').removeClass('fas').addClass('far');
            $(this).prevAll().addBack().removeClass('far').addClass('fas');
            $('#rating-text').text( rating + ' estrella(s).');
        });


        //Funciones de carga automatica
        VistaResumen();
        listarComentarios();
    });
</script>
</body>
</html>