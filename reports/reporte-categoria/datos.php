<page orientation="portrait">
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 100%; font-weight: bold;">
                <div class="center" style="font-size: 20pt;">
                    REPORTE DE CATEGORÍA
                </div>
            </td>
        </tr>
    </table>
    <table class="mt-3" cellspacing="0" style="width: 100%; justify-content: center;">
        <tr>
            <td style="width: 100%; ">
                <table cellspacing="0" style="width: 98%; border: solid 2px #000000; ">
                    <tr>
                        <td class="pl-3 pt-1" style="width: 10%;">
                            <img style="width: 8%" src="../../assets/img/Insignia.png" alt="Logo Html2Pdf">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; font-size: 12pt;  padding-top: 10px;">
                            <div class="center">
                                <span style="font-size: 16pt; font-weight: bold;">JEC Horacio Zeballos Gámez<br></span>
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
        <tr>
            <td style="width:100%;">
                <!-- Header -->
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8pt">
                    <tr>
                        <td style="width: 100%">
                            <div>
                                <?php
                                function crearTabla()
                                {
                                    $nuevaTabla = "
                                                <h4 class='mb-2 mt-5'>Categorías</h4>
                                                <table class='table table-border mb-3 custom-table'>
                                                    <colgroup>
                                                        <col width='5%'>
                                                        <col class='col-categoria'>
                                                        <col class='col-fecha'>
                                                    </colgroup>
                                                    <thead>
                                                        <tr class='bg-danger'>
                                                            <th>ID</th>
                                                            <th>Categoria</th>
                                                            <th class='center'>Fecha</th>
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

                                function agregarFila($arreglo = [])
                                {
                                    echo "
                                            <tr>
                                                <b><td>{$arreglo['idcategorie']}</td></b>
                                                <td>{$arreglo['categoryname']}</td>
                                                <td class='center'>{$arreglo['registrationdate']}</td>
                                            </tr>
                                        ";
                                }

                                function reportPublisher($registrosCategoria)
                                {
                                    echo "<h3 class='mt-4 mb-2'>RESUMEN DE INFORME</h3>";
                                    echo "<ul>";

                                    foreach ($registrosCategoria as $id => $numRegistros) {
                                        echo "<li> <b>Total de registros de Categorías:</b> {$numRegistros} registros</li>";
                                    }
                                    echo "</ul>";
                                }

                                if (count($datos) > 0) {
                                    $categoria = $datos[0]["categoryname"];
                                    $registrosCategoria = array($categoria => 0);
                                    crearTabla($categoria);
                                    foreach ($datos as $registro) {
                                        agregarFila($registro);
                                        $registrosCategoria[$categoria]++;
                                    }
                                    cerrarTabla();
                                    // Llamamos las funciones
                                    reportPublisher($registrosCategoria);
                                } else {
                                    echo "<h3 class='mt-3'>No encontramos registros</h3>";
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <page_footer>
        <table cellspacing="0" style="width: 100%;">
            <tr>
                <td style="font-size: 9pt;">
                    <div class="end mt-1">
                        [[page_cu]]/[[page_nb]]
                    </div>
                </td>
            </tr>
        </table>
    </page_footer>
</page>