<page orientation="portrait">
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 100%; font-weight: bold;">
                <div class="center" style="font-size: 20pt;">
                    REPORTE DE USUARIOS
                </div>
            </td>
        </tr>
    </table>
    <div>
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
            function crearTabla($accesslevel = "")
            {
                if ($accesslevel == 'A') {
                    $accesslevel = 'Administrador';
                } else if ($accesslevel == 'E') {
                    $accesslevel = 'Estudiante';
                } else {
                    $accesslevel = 'Docente';
                }
                $nuevaTabla = "
                    <h4 class='mb-2 mt-5'>{$accesslevel}</h4>
                    <table class='table table-border mb-3 custom-table'>
                        <colgroup>
                            <col class='col-id'>
                            <col class='col-nombres'>
                            <col class='col-apellidos'>
                            <col class='col-nombre-usuario'>
                            <col class='col-email'>
                            <col class='col-nivel-acceso'>
                        </colgroup>
                        <thead>
                            <tr class='bg-danger center'>
                                <th class='center'>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Nivel Acceso</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                echo $nuevaTabla;
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
                        <b><td class='center'>$i</td></b>
                        <td>{$arreglo['namess']}</td>
                        <td>{$arreglo['surnames']}</td>
                        <td >{$arreglo['username']}</td>
                        <td>{$arreglo['email']}</td>
                        <td class='center'>{$arreglo['accesslevel']}</td>
                    </tr>
                ";
            }

            function reportUser($registrosAccesslevel)
            {
                echo "<h3 class='mt-4 mb-2'>RESUMEN DE INFORME</h3>";
                echo "<table class='table'>";
                echo "<thead><tr><th>Usuario</th><th>Número de Registros</th></tr></thead>";
                echo "<tbody>";

                foreach ($registrosAccesslevel as $id => $numRegistros) {
                    if ($id == 'A') {
                        $id = 'Administrador';
                    } else if ($id == 'E') {
                        $id = 'Estudiante';
                    } else {
                        $id = 'Docente';
                    }
                    echo "<tr><td>{$id}</td><td>{$numRegistros} registro(s)</td></tr>";
                }

                echo "</tbody>";
                echo "</table>";
            }


            if (count($datos) > 0) {
                $i = 1;
                $rolActual = $datos[0]["accesslevel"];
                $registrosAccesslevel = array($rolActual => 0);
                crearTabla($rolActual);
                foreach ($datos as $registro) {
                    if ($rolActual == $registro["accesslevel"]) {
                        agregarFila($registro,$i);
                        $registrosAccesslevel[$rolActual]++;
                        $i++;
                    } else {
                        $i=1;
                        $rolActual = $registro["accesslevel"];
                        cerrarTabla();
                        crearTabla($rolActual);
                        agregarFila($registro,$i);
                        $registrosAccesslevel[$rolActual] = 1;
                        $i++;
                    }
                }
                cerrarTabla();
                // Llamamos las funciones
                reportUser($registrosAccesslevel);
            } else {
                echo "<h3 class='mt-3'>No encontramos registros</h3>";
            }
            ?>
        </div>
    </div>
</page>