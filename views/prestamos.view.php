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
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh; background-color: #f7f0f1;">
    <!-- navbar -->
    <?php include './navbar.php'; ?>
    <div class="d-flex justify-content-center">
        <div class="card w-50 mt-2 mb-5">
            <div class="card-header text-center">
                <h5 class="modal-title" id="titulo-modal-prestamos">Solicitud de Prestamo</h5>
            </div>
            <div class="card-body">
                <form action="" id="formulario-prestamos" autocomplete="off">
                    <!-- Creación de controles -->
                    <div class="form-group">
                        <label for="nombrecompleto">Nombre Completo:</label>
                        <input type="text" id="nombrecompleto" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo de Libro:</label>
                        <input type="text" id="titulo" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="autor">Autor de Libro:</label>
                            <input type="text" id="autor" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="disponibles">Stock:</label>
                            <input type="number" id="disponibles" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control form-control-sm" placeholder="No exceder al stock">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="fecha1">Fecha Recojo:</label>
                            <input type="date" class="form-control form-control-sm" id="fecha1" min="<?php echo date("Y-m-d", strtotime(date("Y-m-d"))); ?>" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . "+ 10 days")); ?>" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="fecha2">Fecha Devolución:</label>
                            <input type="date" class="form-control form-control-sm" id="fecha2" min="" max="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . "+ 15 days")); ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observaciones:</label>
                        <textarea class="form-control" id="observacion" rows="4" placeholder="Ejemplo: Grado: 2do, Seccion: 'B'"></textarea>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <button type="button" id="cancelar" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="solicitar-prestamo" class="btn btn-sm btn-primary">Solicitar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white bg-dark" style="padding: 1em 0; text-align:center; margin-top: auto;">
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
    <!-- FONTWASOME -->
    <script src="https://kit.fontawesome.com/9b57fc34f2.js" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            idbook3 = <?php echo $_GET["prestamo"]; ?>

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

            var datos = {
                'operacion': "",
                'idbook': "",
                'idusers': "",
                'observation': "",
                'loan_date': "",
                'return_date': "",
                'amount': ""
            };

            // Obtener los elementos de entrada de fecha
            var fechaRecojo = $("#fecha1");
            var fechaDevolucion = $("#fecha2");

            function alertar(textoMensaje = "") {
                Swal.fire({
                    title: 'Prestamos',
                    text: textoMensaje,
                    icon: 'info',
                    footer: 'Horacio Zeballos Gámez',
                    timer: 2000,
                    confirmButtonText: 'Aceptar'
                });
            }

            function alertarToast(titulo = "", textoMensaje = "", icono = "") {
                Swal.fire({
                    title: titulo,
                    text: textoMensaje,
                    icon: icono,
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            }

            function DatosLibros() {
                $.ajax({
                    url: '../controllers/biblioteca.controller.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        'operacion': 'getLibro',
                        'idbook': idbook3
                    },
                    success: function(result) {
                        $("#titulo").val(result['descriptions']);
                        $("#autor").val(result['author']);
                        $("#disponibles").val(result['amount']);
                        $("#nombrecompleto").val('<?php echo $_SESSION['login']['namess']; ?> <?php echo $_SESSION['login']['surnames']; ?>');
                    }
                });
            }

            // Establecer un controlador de eventos para el cambio de fecha en el campo de fecha de recojo
            fechaRecojo.on("change", function() {
                // Obtener la fecha seleccionada en el campo de fecha de recojo
                var fechaRecojoValue = new Date($(this).val());

                // Obtener la fecha mínima permitida para el campo de fecha de devolución
                var minFechaDevolucion = new Date(fechaRecojoValue);
                
                fechaDevolucion.prop('readonly', false);

                minFechaDevolucion.setDate(minFechaDevolucion.getDate()); // Incrementar la fecha en 1 día
                
                // Establecer la fecha mínima para el campo de fecha de devolución
                fechaDevolucion.attr("min", minFechaDevolucion.toISOString().split("T")[0]);
            });

            function RegistrarPrestamos() {
                datos['idbook'] = <?php echo $_GET["prestamo"]; ?>;
                datos['idusers'] = <?php echo $_SESSION['login']["idusers"]; ?>;
                datos['observation'] = $("#observacion").val();
                datos['loan_date'] = $("#fecha1").val();
                datos['return_date'] = $("#fecha2").val();
                datos['amount'] = $("#cantidad").val();

                datos['operacion'] = "registrarPrestamos";

                if (datos['loan_date'] == "" || datos['return_date'] == "" || datos['amount'] == "") {
                    alertar("Completa el formulario por favor");
                } else {
                    Swal.fire({
                        title: "Registro de préstamo",
                        text: "¿Los datos ingresados son correctos?",
                        icon: "question",
                        footer: "Horacio Zeballos Gámez",
                        confirmButtonText: "Aceptar",
                        confirmButtonColor: "#38AD4D",
                        showCancelButton: true,
                        cancelButtonText: "Cancelar",
                        cancelButtonColor: "#D3280A"
                    }).then(result => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '../controllers/prestamo.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function(result) {
                                    alertarToast("Proceso completado", "El usuario ha sido registrado correctamente", "success");
                                    setTimeout(function() {
                                        $("#formulario-prestamos")[0].reset();
                                        window.location.href = 'detalle.view.php?resumen=<?php echo $_GET["prestamo"]; ?>';
                                    }, 1500);
                                }
                            });
                        }
                    });
                }
            }


            // Obtener elementos del DOM
            const stockInput = document.getElementById("disponibles");
            const cantidadInput = document.getElementById("cantidad");

            // Agregar evento de entrada al campo "Cantidad"
            cantidadInput.addEventListener("input", verificarCantidad);

            // Función para verificar la cantidad
            function verificarCantidad() {
                const stock = parseInt(stockInput.value);
                let cantidad = parseInt(cantidadInput.value);

                if (cantidad > stock) {
                    cantidad = stock; // Establecer el valor máximo del stock en la variable cantidad
                }

                cantidadInput.value = cantidad; // Actualizar el valor del campo "Cantidad"
            }


            function Cancelar() {
                window.location.href = document.referrer;
            }

            $("#solicitar-prestamo").click(RegistrarPrestamos);
            $("#cancelar").click(Cancelar);
            DatosLibros();

        });
    </script>
</body>

</html>