<page orientation="landscape">
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 100%; font-weight: bold;">
                <div class="center" style="font-size: 20pt;">
                    REPORTE DE LIBROS
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

            $cabecera = "
                <p class='mb-2 mt-5'><b>Categoría:</b> {$titulo_Categoria}</p>
                <p class='mb-2 ml-3'><b>Sub Categoría:</b> {$titulo_Subcategoria}</p>
            ";
            echo $cabecera;

            function crearTabla()
            {

                $nuevaTabla = "
                <table class='table table-border mb-3'>
                    <colgroup>
                        <col width='5%'>
                        <col style='width: 6%;'>
                        <col style='width: 10%;'>
                        <col  style='width: 50%;'>
                    </colgroup>
                    <thead>
                        <tr class='bg-danger'>
                            <th>#</th>
                            <th class='center'>Código</th>
                            <th class='center'>Cantidad Disponible</th>
                            <th class='center'>Libro</th>
                            <th class='center'>Autor</th>
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
                echo "
                    <tr>
                        <td>$i</td>
                        <td class='center'>{$arreglo['codes']}</td>
                        <td class='center'>{$arreglo['amount']}</td>
                        <td>{$arreglo['descriptions']}</td>
                        <td>{$arreglo['author']}</td>
                    </tr>
                ";
            }

            function reporteSubcategoria($registrosLibros)
            {
                echo "<h3 class='mt-3'>Número de Libros por Categoría y Sub categoría:</h3>";
                echo "<ul>";

                foreach ($registrosLibros as $id => $numRegistros) {
                    echo "<li>{$id}: {$numRegistros} libros registrados</li>";
                }
                echo "</ul>";
            }

            if (count($datos) > 0) {
                $i = 1;
                $libro = $datos[0]["categoryname"];
                $registrosLibros = array($libro => 0);
                crearTabla($libro);
                foreach ($datos as $registro) {
                    if ($libro == $registro["categoryname"]) {
                        agregarFila($registro,$i);
                        $registrosLibros[$libro]++;
                        $i++;
                    } else {
                        $i=1;
                        $libro = $registro["categoryname"];
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
