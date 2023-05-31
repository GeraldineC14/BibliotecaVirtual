<?php
require_once 'permisos.php'; 
 
?>
  <div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
      <div id="content">
        <!-- INICIO PERFIL -->
                
        <!-- FIN PERFIL -->

        <div class="container">
          <div class="row flex-lg-nowrap">
            <div class="col">
              <div class="row">
                <div class="col mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="e-profile">
                        <div class="row">
                          <div class="col-12 col-sm-auto mb-3">
                          </div>
                          <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                              <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Nombre y Apellido</h4>
                            </div>
                            <div class="text-center text-sm-right">
                              <span class="badge badge-secondary">ROL(docente)</span>
                              <div class="text-muted"><small>Fecha Actual - 09 Dec 2017</small></div>
                            </div>
                          </div>
                        </div>
                        <ul class="nav nav-tabs">
                          <li class="nav-item"><a href="" class="active nav-link">Configuración</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                          <div class="tab-pane active">
                            <form class="form" novalidate="">
                              <div class="row">
                                <div class="col">

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="names" id="namess" placeholder="nombre">
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Apellido</label>
                                        <input class="form-control" type="text" name="surnames" id="surnames" placeholder="apellido">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Correo</label>
                                        <input class="form-control" type="email" name="email"  id="email" placeholder="Correo" readonly>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Nivel de Acceso</label>
                                        <input class="form-control" type="text" name="accesslevel" id="accesslevel" placeholder="Docente" readonly>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="mb-2"><b>Cambiar Contraseña</b></div>

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" type="password"  id="accesskey" placeholder="*****" readonly>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Confirmar Contraseña</label>
                                        <input class="form-control" type="password" id="repetir" placeholder="*****" readonly>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>                                
                              </div>
                              <div class="row">
                                <div class="col d-flex justify-content-end">
                                  <button class="btn btn-warning" type="submit">
                                    <i class="fa-solid fa-key"></i>
                                    <span>Cambiar Contraseña</span> 
                                  </button>
                                </div>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-12 col-md-3 mb-3">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="px-xl-3">
                        <button class="btn btn-block btn-danger">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                          <span>Cancelar</span>
                        </button>
                        <button class="btn  btn-block btn-success mt-3" type="submit">
                          <i class="fa-solid fa-floppy-disk"></i>
                          <span> Guardar</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="bg-white sticky-footer">
            <div class="container my-auto">
              <div class="text-center my-auto copyright"><span>Copyright © IA Tech 2023</span></div>
            </div>
          </footer>
        </div>  
      </div>
    </div>
  </div>
 

  <script>

    // Script para el cambio de Titulo
    let isTitle = document.title;
    let titleTimeout;

    const starChangeTitle = () => {
      titleTimeout = setInterval(function () {
        document.title = document.title === isTitle ? "Horacio Zeballos Gamez" : isTitle;
      }, 1800);
    };
    window.addEventListener("load", starChangeTitle);

    $(document).ready(function () {
      function Vistadatos() {
        idusers = <?= $_SESSION['login']['idusers'] ?>;
        $.ajax({
          url: '../../controllers/usuario.controller.php',
          type: 'GET',
          dataType: 'JSON',
          data: {
            'operacion': 'getUsers',
            'idusers': idusers
          },
          success: function (result) {
            console.log(result);
            $("#namess").val(result['namess']);
            $("#surnames").val(result['surnames']);
            $("#email").val(result['email']);
            $("#accesskey").val(result['accesskey']);
            $("#repetir").val(result['accesskey']);
            $("#accesslevel").val(result['accesslevel']);

          }
        });
      }

      Vistadatos();

    });
  </script>
</body>

</html>