<?php
require_once 'permisos.php';
?>
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <!-- INICIO PERFIL -->

        <!-- FIN PERFIL -->
        <div class="container-fluid">
            <div class="container">
                <!-- Cabecera -->
                <!-- Botón de retroceso -->
                <div class="text-left">
                    <a href="javascript:history.back()" class="btn btn-primary btn-sm d-inline-block" role="button">
                        <i class="fas fa-chevron-left"></i>
                        &nbsp;Volver
                    </a>
                </div>
                <div class="d-grid gap-2 col-12 col-md-6 mx-auto">
                    <!-- Título oculto para pc y laptop -->
                    <div class="d-inline-block d-md-none text-center">
                        <h3 class="title-tablas2">Gráfico</h3>
                    </div>
                    <!-- Título oculto para móvil y tablet -->
                    <div class="row mt-3 d-none d-md-inline-block text-center">
                        <h3 class="title-tablas">Gráfico Préstamos</h3>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        Seleccione el mes que desea generar gráfico:
                    </div>
                    <div class="card-body text-center">
                        <input type="month" id="month-year-input" name="month-year" style="width: 300px; border-radius: 6px; height: 40px; font-size: 16px;" />
                    </div>
                    <div class="card-footer text-muted text-center">
                        <button class="btn btn-warning text-black" type="button" id="mostrar"><b>Mostrar</b></button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <canvas id="prestamos-chart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        $('#mostrar').click(function() {
            var monthYearInput = $('#month-year-input');
            var selectedDate = new Date(monthYearInput.val() + '-01'); // Obtener la fecha seleccionada (primero del mes)
            var selectedMonth = selectedDate.getMonth() + 1; // Obtener el mes (ajustar a partir de 0)
            var selectedYear = selectedDate.getFullYear(); // Obtener el año

            $.ajax({
                url: '../../controllers/prestamo.controller.php',
                type: 'GET',
                data: {
                    operacion: 'graficoPrestamos',
                    selectedMonth: selectedMonth,
                    selectedYear: selectedYear
                },
                dataType: 'json',
                success: function(data) {
                    // Crear un array para los nombres de los libros
                    var bookTitles = $.map(data, function(item) {
                        return item.Titulo;
                    });

                    // Crear un array para las cantidades de los préstamos
                    var loanAmounts = $.map(data, function(item) {
                        return item.Cantidad;
                    });

                    // Configurar los datos y opciones del gráfico Doughnut
                    var chartData = {
                        labels: bookTitles,
                        datasets: [{
                            data: loanAmounts,
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56',
                                '#8A2BE2',
                                '#FF4500'
                                // Agrega más colores si es necesario
                            ]
                        }]
                    };

                    var chartOptions = {
                        responsive: true,
                        maintainAspectRatio: false
                    };

                    // Obtener el contexto del elemento canvas del gráfico
                    var ctx = document.getElementById('prestamos-chart').getContext('2d');

                    // Destruir el gráfico existente si existe
                    if (window.prestamosChart) {
                        window.prestamosChart.destroy();
                    }

                    // Crear el gráfico Doughnut
                    window.prestamosChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: chartData,
                        options: chartOptions
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        });
    });
</script>
