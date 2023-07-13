function listarPrestamos() {
    $.ajax({
        url: '../../controllers/prestamo.controller.php',
        type: 'GET',
        data: {
            'operacion': 'listarPrestamos',
            'idusers': idusers,
            'accesslevel': accesslevel
        },
        success: function(result) {
            let registros = JSON.parse(result);
            let nuevaFila = '';

            let tabla = $("#tabla-prestamos").DataTable();
            tabla.destroy();
            $("#tabla-prestamos tbody").html("");
            registros.forEach(registro => {
                let observacion = (registro['observation'] == null || registro['observation'] == '') ? '<em>No cuenta con observación</em>' : registro['observation'];
                let estado = '';
                let colorCampo = '';
                let disabled = '';

                if (registro['state'] == 1) {
                    estado = '<strong>Pendiente</strong>';
                    colorCampo = 'gold';
                    // Mostrar solo botones "Entregar" y "Cancelar"
                    nuevaFila = `
        <tr>
            <td>${registro['idloan']}</td>
            <td>${registro['descriptions']}</td>
            <td>${registro['Usuario']}</td>
            <td>${observacion}</td>
            <td>${registro['loan_date']}</td>
            <td>${registro['return_date']}</td>
            <td>${registro['amount']}</td>
            <td style="color: ${colorCampo}">${estado}</td>
            <td>
                <button id='entregar' class='btn btn-success' data-id="" title='Entregar'>
                    <a style='color: black; font-weight:bold;'>
                    <i class="fa-solid fa-hand-holding-hand" style="color: #000000;"></i>
                    </a>
                </button>
                <button id='cancelar' class='btn btn-danger' data-id="" title='Cancelar'>
                    <a style='color: black; font-weight:bold;'>
                        <i class="fa-solid fa-ban" style="color: #000000;"></i>
                    </a>
                </button>
            </td>
        </tr>
    `;
                } else if (registro['state'] == 2) {
                    estado = '<strong>Entregado</strong>';
                    colorCampo = 'blue';
                    // Mostrar botones "Devolver", "Cancelar" y "Observado"
                    nuevaFila = `
        <tr>
            <td>${registro['idloan']}</td>
            <td>${registro['descriptions']}</td>
            <td>${registro['Usuario']}</td>
            <td>${observacion}</td>
            <td>${registro['loan_date']}</td>
            <td>${registro['return_date']}</td>
            <td>${registro['amount']}</td>
            <td style="color: ${colorCampo}">${estado}</td>
            <td>
                <button id='devolver' class='btn btn-warning' data-id="" title='Devolver'>
                    <a style='color: black; font-weight:bold;'>
                        <i class="fa-solid fa-rotate-left" style="color: #000000;"></i>
                    </a>
                </button>
                <button id='observado' class='btn' style='background:#154360;' data-id="" title='Observado'>
                    <a style='color: black; font-weight:bold;'>
                    <i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i>
                    </a>
                </button>
            </td>
        </tr>
    `;
                } else if (registro['state'] == 3 || registro['state'] == 4 || registro['state'] == 5) {
                    if (registro['state'] == 3) {
                        estado = '<strong>Devuelto</strong>';
                        colorCampo = 'green';
                    } else if (registro['state'] == 4) {
                        estado = '<strong>Cancelado</strong>';
                        colorCampo = 'red';
                    } else if (registro['state'] == 5988) {
                        estado = '<strong>Observado</strong>';
                        colorCampo = 'orange';
                    }
                    // Mostrar solo botón "Alerta"
                    nuevaFila = `
        <tr>
            <td>${registro['idloan']}</td>
            <td>${registro['descriptions']}</td>
            <td>${registro['Usuario']}</td>
            <td>${observacion}</td>
            <td>${registro['loan_date']}</td>
            <td>${registro['return_date']}</td>
            <td>${registro['amount']}</td>
            <td style="color: ${colorCampo}">${estado}</td>
            <td>
                <button id='alerta' class='btn btn-info' data-id="" title='Alerta'>
                    <a style='color: black; font-weight:bold;'>
                    <i class="fa-solid fa-eye" style="color: #000000;"></i>
                    </a>
                </button>
            </td>
        </tr>
    `;
                }

                $("#tabla-prestamos tbody").append(nuevaFila);
            });

            $('#tabla-prestamos').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                }
            });

            // Ocultar botón y columna "Comandos" si el accesslevel es "D" o "E"
            if (accesslevel === 'D' || accesslevel === 'E') {
                $('.cambiar-estado-btn').hide();
                tabla.column(8).visible(false);
            } else {
                // Agregar evento de clic a los botones "Devolver"
                $(".cambiar-estado-btn").click(function() {
                    let idPrestamo = $(this).data("id");
                    cambiarEstado(idPrestamo, 'Devuelto');
                });
            }
        }
    });
}

listarPrestamos();