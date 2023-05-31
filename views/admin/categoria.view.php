<?php

require_once 'permisos.php'; 

/*if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
    header("location:login.php");
}*/
?>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                
                <!-- FIN PERFIL -->

                <div class="container-fluid">
                    <div class="card shadow">                                      
                            <!-- Datatable  -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center">
                                    <div class="btn-group " role="group">
                                        <button class="btn btn-success btn-sm d-none d-sm-inline-block" role="button" data-toggle="modal" data-target="#modal-categorias" data-target="#modal-libros-categorias" id="mostrar-modal-registro">
                                            <i class="fa-solid fa-book fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Registrar Categoría
                                        </button>
                                        <button class="btn btn-danger btn-sm d-none d-sm-inline-block" role="button" href="#"  style="margin-left: 50px;">
                                            <i class="fas fa-download fa-sm text-black-50 fa-xl"></i>
                                            &nbsp;Generar Reporte
                                        </button>
                                    </div>                                
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <table class="table display responsive" id="tabla-categoria" width="85%" cellspacing="0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Categoría</th>
                                                    <th>Fecha de registro</th>
                                                    <th>Comandos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Zona Modales registro-->
                            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="modal-categorias" tabindex="-1" aria-labelledby="titulo-modal-categorias" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-light">
                                            <h5 class="modal-title" id="titulo-modal-categorias">Registrar Categoría</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="text-light" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" id="formulario-categorias" autocomplete="off">
                                                <!-- Creación de controles -->
                                                <div class="form-group">
                                                    <label for="categoryname">Nombre de Categoría:</label>
                                                    <input type="text" id="categoryname" class="form-control form-control-sm" >
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="cancelar-modal" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="guardar-categoria"
                                                class="btn btn-sm btn-success" type="button">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- Footer -->
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright">
                            <span>Copyright © IA Tech 2023</span>
                        </div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>

<!-- Mis funciones y eventos javascript -->
<script>
    $(document).ready(function(){
        var datosNuevos = true;
        var datos={
            'operacion'     : "",
            'idcategorie'   : "",
            'categoryname'  : ""
        };

        function alertar(textoMensaje = ""){
            Swal.fire({
                title   : 'Categorias',
                text    :  textoMensaje,
                icon    :  'info',
                footer  :   'Horacio Zeballos Gámez',
                timer   :   2000,
                confirmButtonText   :   'Aceptar'
            });
        }
        
        function alertarToast(titulo = "",textoMensaje = "", icono = ""){
            Swal.fire({
                title   : titulo,
                text    : textoMensaje,
                icon    : icono,
                toast   : true,
                position : 'bottom-end',
                showConfirmButton   : false,
                timer   : 1500,
                timerProgressBar    : true
            });
        }


        function reiniciarFormulario(){
            $("#formulario-categorias")[0].reset();
        }

        function ListarCategoria(){
            $.ajax({
                url:'../../controllers/categoria.controller.php',
                type:'GET',
                data:'operacion=listarCategoria',
                success:function(result){
                    let registros = JSON.parse(result);
                    let nuevaFila = ``;

                    let tabla = $("#tabla-categoria").DataTable();
                    tabla.destroy();
                    $("#tabla-categoria tbody").html("");
                    registros.forEach(registro =>{
                        nuevaFila =  `
                        <tr>
                            <td>${registro['idcategorie']}</td>
                            <td>${registro['categoryname']}</td>
                            <td>${registro['registrationdate']}</td>
                            <td>
                                <a href='#' data-idcategorie='${registro['idcategorie']}' class = ' eliminar'><i class="fa-solid fa-user-xmark fa-lg" style="color: #e00000;"></i></a>
                                <a href='#' data-idcategorie='${registro['idcategorie']}' class = ' editar'><i class="fa-solid fa-user-pen fa-lg" style="color: #1959c8;"></i></a>
                            </td>
                        </tr>   
                        `;
                        $("#tabla-categoria tbody").append(nuevaFila);
                    });
                        $('#tabla-categoria').DataTable({
                            language:{ 
                            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                            }
                        });
                }
            });

        }

        function abrirModalRegistro(){
            datosNuevos = true;

            //Le indicimas el titulo del modal y su clase
            $(".modal-header").removeClass("bg-info");
            $(".modal-header").addClass("bg-success");
            $("#titulo-modal-categorias").html("Registrar Categoria");

            //Button
            $("#guardar-categoria").removeClass("bg-info");
            $("#guardar-categoria").addClass("bg-success");

            reiniciarFormulario();
        }

        function RegistrarCategoria(){
            datos['categoryname'] = $("#categoryname").val();

            if(datosNuevos){
                datos['operacion'] = "registrarCategoria";

            }else{
                datos['operacion'] = "actualizarCategoria";
                datos['idcategorie'] = idcategorie;
            }
            

            if(datos['categoryname'] == ""){
                alertar("Complete el formulario por favor")
            }else{
                Swal.fire({
                        title   : "Registro Categoría",
                        text    : "¿Los datos ingresados son correctos?",
                        icon    : "question",
                        footer  : "Horacio Zeballos Gámez",
                        confirmButtonText   : "Aceptar",
                        confirmButtonColor  : "#38AD4D",
                        showCancelButton    : true,
                        cancelButtonText    : "Cancelar",
                        cancelButtonColor   : "#D3280A"
                    }).then(result => {
                        if(result.isConfirmed){
                            $.ajax({
                                url: '../../controllers/categoria.controller.php',
                                type: 'GET',
                                data: datos,
                                success: function(result){
                                    alertarToast("Proceso completado","La categoría ha sido registrado correctamente", "success")
                                    setTimeout(function(){
                                        reiniciarFormulario();
                                        $('#modal-categorias').modal('hide');
                                        ListarCategoria();                       
                                    }, 1800)
                                }
                            });
                        }
                    });
            }
        }

        $("#tabla-categoria tbody").on("click",".editar",function(){
            idcategorie = $(this).data("idcategorie");

            $.ajax({
                url:'../../controllers/categoria.controller.php',
                type:'GET',
                dataType:'JSON',
                data:{
                    'operacion'     : 'getCategoria',
                    'idcategorie'   : idcategorie
                },
                success: function(result){
                    $("#categoryname").val(result['categoryname']);

                    //Canbiando la configuracion modal
                    $("#titulo-modal-categorias").html("Actualizar datos");
                    $(".modal-header").removeClass("bg-success");
                    $(".modal-header").addClass("bg-info");
                    //Button
                    $("#guardar-categoria").removeClass("bg-success");
                    $("#guardar-categoria").addClass("bg-info");

                    $("#modal-categorias").modal("show");   
                    datosNuevos = false;
                }
            });

        });

        
        $("#guardar-categoria").click(RegistrarCategoria);
        $("#mostrar-modal-registro").click(abrirModalRegistro);
        $("#cancelar-modal").click(reiniciarFormulario);
        ListarCategoria();
    });
   
</script>