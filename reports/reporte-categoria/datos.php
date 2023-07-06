<div class="mb-3">
  <h2 class="text-lg">Reportes de Categorías</h2>
  <p>I.E HORACIO ZEBALLOS GÁMEZ</p>
</div>

<div>
<?php
        function crearTabla(){
            $nuevaTabla = "
            <h4 class='mb-2 mt-5'>Categorías</h4>
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
                  <td>{$arreglo['idcategorie']}</td>
                  <td>{$arreglo['categoryname']}</td>
                  <td>{$arreglo['registrationdate']}</td>
              </tr>
          ";
      }
      
        function reportPublisher($registrosCategoria) {
            echo "<h3 class='mt-3'>Número de registros de categorías:</h3>";
            echo "<ul>";
            
            foreach ($registrosCategoria as $id => $numRegistros) {
                echo "<li> Total de registros de Categorías: {$numRegistros} registros</li>";
            }
            echo "</ul>";
        }

        if (count($datos) > 0){
            $categoria = $datos[0]["categoryname"];
            $registrosCategoria = array($categoria => 0);
            crearTabla($categoria);
            foreach($datos as $registro){
                agregarFila($registro);
                $registrosCategoria[$categoria]++;
            }
            cerrarTabla();
            // Llamamos las funciones
            reportPublisher($registrosCategoria);
        }else{
            echo "<h3 class='mt-3'>No encontramos registros</h3>";
        }
?>
</div>