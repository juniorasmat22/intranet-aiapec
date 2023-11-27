<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-1 mb-3">Asistencia</h4>
                <div class="table-responsive">
                    <table class="table table-sm table-centered mb-0 font-14">
                        <thead class="table-light">
                            <tr>
                                <th>Estado</th>
                                <th>Abreviatura</th>
                                <th style="text-align: center;">Cantidad</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Asistencia</td>
                                <td>A</td>
                                <td style="text-align: center;"><?php echo $mi_reporte->resultado->cantidad_asistencias; ?></td>
                            </tr>
                            <tr>
                                <td>Tardanza</td>
                                <td>T</td>
                                <td style="text-align: center;"><?php echo $mi_reporte->resultado->cantidad_tardanza; ?></td>
                            </tr>
                            <tr>
                                <td>Tardanza Justificada</td>
                                <td>TJ</td>
                                <td style="text-align: center;"><?php echo $mi_reporte->resultado->cantidad_asistencias; ?></td>
                            </tr>
                            <tr>
                                <td>Falta</td>
                                <td>F</td>
                                <td style="text-align: center;"><?php echo $mi_reporte->resultado->cantidad_faltas; ?></td>
                            </tr>
                            <tr>
                                <td>Falta Justificada</td>
                                <td>FJ</td>
                                <td style="text-align: center;"><?php echo $mi_reporte->resultado->cantidad_fj; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-1 mb-3">Porcentaje de Asistencia</h4>
                <!-- Contenedor para el gráfico -->
                <div id="chart"></div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>


<!-- Script para generar el gráfico -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            series: [<?php echo $mi_reporte->resultado->cantidad_asistencias; ?>, <?php echo $mi_reporte->resultado->cantidad_faltas; ?>, <?php echo $mi_reporte->resultado->cantidad_tardanza; ?>, <?php echo $mi_reporte->resultado->cantidad_fj; ?>,<?php echo $mi_reporte->resultado->cantidad_tj; ?>],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Asistencias', 'Faltas', 'Tardanzas', 'Falta Justificada','Tardanza Justificada'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>