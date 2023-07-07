<page orientation="portrait">
    <bookmark title="Document" level="0"></bookmark>
    <a name="document_reprise"></a>
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 10%;">
                <img style="width: 100%" src="../../assets/img/Insignia.png" alt="Logo Html2Pdf">
            </td>
            <td style="width: 80%; font-weight: bold;">
                <span style="font-size: 10pt"><br></span>
                <div class="center" style="font-size: 20pt;">
                    REPORTE DE USUARIOS
                </div>
            </td>
            <td style="width: 10%;">
            </td>
        </tr>
    </table>
    <table class="mt-3" cellspacing="0" style="width: 100%; justify-content: center;">
        <tr>
            <td style="width: 55%; ">
                <table cellspacing="0" style="width: 95%; border: solid 2px #000000; ">
                    <tr>
                        <td style="width: 100%; font-size: 12pt; padding-left:10px; padding-top: 10px;">
                            <div class="center">
                                <span style="font-size: 16pt; font-weight: bold;">JEC Horacio Zeballos Gámez<br></span>
                                <span style="margin-top: 3px; font-size: 12pt;">BIBLIOTECA VIRTUAL</span>
                            </div>
                            <br>
                            <b>Encargado de Biblioteca :</b> Richard<br>
                            <b>Tel :</b> 999 999 999<br>
                            <b>Email :</b> admin@gmail.com<br>
                            <div class="end" style="margin-right: 15px; margin-bottom: 5px;">
                                <b> Fecha : </b><?php echo date('d/m/Y'); ?><br>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width:55%;">
                
                <br>
                <!-- Header -->
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt">
                    <tr>
                        <td style="width: 100%">
                            <div>
                                <?php
                                    function crearTabla($accesslevel = ""){
                                        if($accesslevel == 'A'){
                                            $accesslevel = 'Administrador';
                                          }else if( $accesslevel == 'E'){
                                            $accesslevel = 'Estudiante';
                                          }else{
                                            $accesslevel = 'Docente';
                                          }
                                        $nuevaTabla = "
                                        <h4 class='mb-2 mt-5'>{$accesslevel}</h4>
                                        <table class='table table-border mb-3'>
                                            <colgroup>
                                                  <col width='5%'>
                                                  <col width='25%'>
                                                  <col width='20%'>
                                                  <col width='20%'>
                                                  <col width='15%'>
                                                  <col width='15%'>
                                              </colgroup>
                                              <thead>
                                                  <tr class='bg-primary'>
                                                      <th>ID</th>
                                                      <th>Nombres</th>
                                                      <th>Apellidos</th>
                                                      <th>Nombre Usuario</th>
                                                      <th>Email</th>
                                                      <th>Nivel Acceso</th>
                                                  </tr>
                                              </thead>
                                            <tbody>
                                        ";
                                    echo  $nuevaTabla;
                                    }
                            
                                    function cerrarTabla(){
                                        $cerrarTabla = "
                                        </tbody>
                                        </table>
                                        ";
                                    echo $cerrarTabla;
                                    }
                            
                                    function agregarFila($arreglo = []) {
                                      echo "
                                          <tr>
                                              <td>{$arreglo['idusers']}</td>
                                              <td>{$arreglo['namess']}</td>
                                              <td>{$arreglo['surnames']}</td>
                                              <td>{$arreglo['username']}</td>
                                              <td>{$arreglo['email']}</td>
                                              <td>{$arreglo['accesslevel']}</td>
                                          </tr>
                                      ";
                                  }
                                  
                                    function reportUser($registrosAccesslevel) {
                                        echo "<h3 class='mt-3'>Número de registros por Usuario:</h3>";
                                        echo "<ul>";
                                        
                                        foreach ($registrosAccesslevel as $id => $numRegistros) {
                                            if($id == 'A'){
                                                $id = 'Administrador';
                                              }else if( $id == 'E'){
                                                $id = 'Estudiante';
                                              }else{
                                                $id = 'Docente';
                                              }
                                            echo "<li>{$id}: {$numRegistros} registros</li>";
                                        }
                                        echo "</ul>";
                                    }
                            
                                    if (count($datos) > 0){
                                        
                                        $rolActual = $datos[0]["accesslevel"];
                                        $registrosAccesslevel = array($rolActual => 0);
                                        crearTabla($rolActual);
                                        foreach($datos as $registro){
                                            if($rolActual == $registro["accesslevel"]){
                                                agregarFila($registro);
                                                $registrosAccesslevel[$rolActual]++;
                                            }else{
                                                $rolActual = $registro["accesslevel"];
                                                cerrarTabla();
                                                crearTabla($rolActual);
                                                agregarFila($registro);
                                                $registrosAccesslevel[$rolActual] = 1;
                                            }
                                        }
                                        cerrarTabla();
                                        // Llamamos las funciones
                                        reportUser($registrosAccesslevel);
                                    }else{
                                        echo "<h3 class='mt-3'>No encontramos registros</h3>";
                                    }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                <!-- Footer  -->
               
            </td>
            <td style="width: 4%"></td>
              
        </tr>
    </table>
</page>

