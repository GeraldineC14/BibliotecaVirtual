<page orientation="landscape">
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 100%; font-weight: bold;">
                <div class="center" style="font-size: 18pt;">
                    REPORTE DE PRÉSTAMOS
                </div>
            </td>
        </tr>
    </table>
    <div>
        <table class="mt-3" cellspacing="0" style="width: 100%; justify-content: center;">
            <tr>
                <td style="width: 100%; ">
                    <table cellspacing="0" style="width: 100%; border: solid 2px #000000; ">
                        <tr>
                            <td class="pl-3 pt-1" style="width: 8%;">
                                <img style="width: 6%" src="../../assets/img/Insignia.png" alt="Logo Html2Pdf">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 98%; font-size: 12pt;  padding-top: 10px;">
                                <div class="center">
                                    <span style="font-size: 16pt; font-weight: bold;">JEC Horacio Zeballos
                                        Gámez<br></span>
                                    <span style="margin-top: 3px; font-size: 12pt;">BIBLIOTECA VIRTUAL</span>
                                </div>
                                <div class="end" style="margin-right: 15px; margin-bottom: 5px;">
                                    <b> Fecha : </b>
                                    <?php echo date('d/m/Y'); ?><br>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div>
            <?php
            function crearTabla($libro = "")
            {
                $nuevaTabla = "
                <p class='mb-2 mt-5'><b>LIBRO:</b> {$libro}</p>
                <table class='table table-border mb-3'>
                    <colgroup>
                        <col style= 'width: 1%;'>
                        <col style= 'width: 8%;'>
                        <col style= 'width: 8%;'>
                        <col style= 'width: 12%;'>
                        <col style= 'width: 12%;'>
                        <col style= 'width: 12%;'>
                        <col style= 'width: 12%;'>
                        <col style= 'width: 10%;'>
                        <col style= 'width: 10%;'>
                        <col style= 'width: 12%;'>
                    </colgroup>
                    <thead>
                        <tr class='bg-danger'>
                            <th>#</th>
                            <th class='center'>Usuario</th>
                            <th class='center'>Cantidad</th>
                            <th class='center'>Registro</th>
                            <th class='center'>Recojo</th>
                            <th class='center'>Retorno</th>
                            <th class='center'>Cancelado</th>
                            <th class='center'>Observación</th>
                            <th class='center'>Reporte</th>
                            <th class='center'>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                echo  $nuevaTabla;
            }

            function cerrarTabla()
            {
                $cerrarTabla = "
                </tbody>
                </table>
                ";
                echo $cerrarTabla;
            }

            function agregarFila($arreglo = [],$i)
            {
                $estadoColor = '';
                $estadoTexto = '';
                if($arreglo['Estado'] === '1'){
                    $estadoColor = 'color: #6c757d;';
                    $estadoTexto = '<b>PENDIENTE</b>';
                }else if($arreglo['Estado'] === '2'){
                    $estadoColor = 'color: #007bff;';
                    $estadoTexto = '<b>ENTREGADO</b>';
                }else if($arreglo['Estado'] === '3'){
                    $estadoColor = 'color: #dc3545;';
                    $estadoTexto = '<b>CANCELADO</b>';
                }else{
                    $estadoColor = 'color: #28a745;';
                    $estadoTexto = '<b>DEVUELTO</b>';
                }

                echo "
                    <tr>
                        <td>$i</td>
                        <td class='center'>{$arreglo['Usuario']}</td>
                        <td class='center'>{$arreglo['Cantidad']}</td>
                        <td class='center'>{$arreglo['F_Registro']}</td>
                        <td class='center'>{$arreglo['F_Recojo']}</td>
                        <td class='center'>{$arreglo['F_Retorno']}</td>
                        <td class='center'>{$arreglo['F_Cancelacion']}</td>
                        <td>{$arreglo['Observacion']}</td>
                        <td>{$arreglo['Perdida']}</td>
                        <td class='center' style= '{$estadoColor}'>{$estadoTexto}</td>
                    </tr>
                ";
            }

            function reporteSubcategoria($registrosLibros)
            {
                echo "<h3 class='mt-3'>Número de Prestamos por Libros:</h3>";
                echo "<ul>";

                foreach ($registrosLibros as $id => $numRegistros) {
                    echo "<li>{$id}: {$numRegistros} prestamos</li>";
                }
                echo "</ul>";
            }

            if (count($datos) > 0) {
                $i = 1;
                $libro = $datos[0]["Titulo"];
                $registrosLibros = array($libro => 0);
                crearTabla($libro);
                foreach ($datos as $registro) {
                    if ($libro == $registro["Titulo"]) {
                        agregarFila($registro,$i);
                        $registrosLibros[$libro]++;
                        $i++;
                    } else {
                        $i=1;
                        $libro = $registro["Titulo"];
                        cerrarTabla();
                        crearTabla($libro);
                        agregarFila($registro,$i);
                        $registrosLibros[$libro] = 1;
                        $i++;
                    }
                }
                cerrarTabla();
                // Llamamos las funciones
                reporteSubcategoria($registrosLibros);
            } else {
                echo "<h3 class='mt-3'>No encontramos registros</h3>";
            }
            ?>
        </div>
    </div>
</page>
