<page orientation="portrait">
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 100%; font-weight: bold;">
                <div class="center" style="font-size: 20pt;">
                    REPORTE DE SUBCATEGORÍA
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
                                function crearTabla($categoria = "")
                                {
                                    $nuevaTabla = "
                                        <h4 class='mb-2 mt-5'>{$categoria}</h4>
                                        <table class='table table-border mb-3 custom-table'>
                                            <colgroup>
                                                  <col width='5%'>
                                                  <col class='col-categoria'>
                                                  <col class='col-fecha'>
                                              </colgroup>
                                              <thead>
                                                  <tr class='bg-danger'>
                                                      <th>#</th>
                                                      <th>Sub Categoría</th>
                                                      <th class='center'>Fecha de Registro</th>
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
                                            <b><td>{$arreglo['idsubcategorie']}</td></b>
                                              <td>{$arreglo['subcategoryname']}</td>
                                              <td class='center'>{$arreglo['registrationdate']}</td>
                                          </tr>
                                      ";
                                }

                                function reporteSubcategoria($registrosCategoria)
                                {
                                    echo "<h3 class='mt-4 mb-2'>RESUMEN DE INFORME</h3>";
                                    echo "<table class='table'>";
                                    echo "<thead><tr><th>Categoría</th><th>Número de Registros</th></tr></thead>";
                                    echo "<tbody>";

                                    foreach ($registrosCategoria as $id => $numRegistros) {
                                        echo "<tr><td>{$id}</td><td class='center'>{$numRegistros}</td></tr>";
                                    }

                                    echo "</tbody>";
                                    echo "</table>";
                                }


                                if (count($datos) > 0) {
                                    $categoria = $datos[0]["categoryname"];
                                    $registrosCategoria = array($categoria => 0);
                                    crearTabla($categoria);
                                    foreach ($datos as $registro) {
                                        if ($categoria == $registro["categoryname"]) {
                                            agregarFila($registro);
                                            $registrosCategoria[$categoria]++;
                                        } else {
                                            $categoria = $registro["categoryname"];
                                            cerrarTabla();
                                            crearTabla($categoria);
                                            agregarFila($registro);
                                            $registrosCategoria[$categoria] = 1;
                                        }
                                    }
                                    cerrarTabla();
                                    // Llamamos las funciones
                                    reporteSubcategoria($registrosCategoria);
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