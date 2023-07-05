<div class="mb-3">
  <h2 class="text-lg">
    Reportes por tipo de usuarios
  </h2>
  <hr>
</div>

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
      
        // ----------------------------------------------
        /*function crearTablaReport($registrosAccesslevel){
            $nuevaTablaReport = "
            <h3 class='mt-3'>Número de registros por Nivel de Usuario:</h3>
            <table class='table table-border mb-3'>
                <colgroup>
                    <col style='width: 15%;'>
                    <col style='width: 15%;'>
                </colgroup>
                <thead>
                    <tr class='bg-success'>
                        <th>Usuario</th>
                        <th>Numero de Registros</th>
                    </tr>
                </thead>
                <tbody>
            ";

            foreach ($registrosAccesslevel as $id => $numRegistros) {
                echo "
                <tr>
                    <td>{$id}</td>
                    <td>{$numRegistros}</td>
                </tr>";
            }

        echo  $nuevaTablaReport;
        }*/

        /*function cerrarTablaReport(){
            $cerrarTablaReport = "
            </tbody>
            </table>
            ";
        echo $cerrarTablaReport;
        }*/
        // ----------------------------------------------

        function reportPublisher($registrosAccesslevel) {
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
            reportPublisher($registrosAccesslevel);
        }else{
            echo "<h3 class='mt-3'>No encontramos registros</h3>";
        }
    ?>
</div>