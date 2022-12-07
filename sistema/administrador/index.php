<?php include "home.php"; ?>

<!-- APEXCHARTS -->
<script src="js/apexChart/apexcharts.min.js"></script>
<!-- demo app -->
<script src="js/apexChart/dashboard.js"></script>
<!-- <script src="js/controller.js"></script> -->

<!-- SCRIPT CHART RADIAL -->
<script>
    var options = {

        series: [<?php porcentaje($TotalCategoriaParrillas, $TotalProductos); ?>, <?php porcentaje($TotalCategoriaCajaChina, $TotalProductos); ?>, <?php porcentaje($TotalCategoriaCilindro, $TotalProductos); ?>],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function(w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return <?php echo $TotalProductos; ?>
                        }
                    }
                }
            }
        },

        labels: ['<?php echo $data[0][0]; ?>', '<?php echo $data[1][0]; ?>', '<?php echo $data[2][0]; ?>'],
    };

    var chart = new ApexCharts(document.querySelector("#radial-chart"), options);
    chart.render();

    var options = {
        series: [{
            titlee: 'Cantidad de Ventas',
            data: [
                <?php if(is_null($TotalVentasAgosto)) { echo 0; }
                else { echo $TotalVentasAgosto; }?>,
                <?php if(is_null($TotalVentasSetiembre)) { echo 0; }
                else { echo $TotalVentasSetiembre; }?>,
                <?php if(is_null($TotalVentasOctubre)) { echo 0; }
                else { echo $TotalVentasOctubre; }?>,
                <?php if(is_null($TotalVentasMesAnterior)) { echo 0; }
                else { echo $TotalVentasMesAnterior; }?>,
                <?php if(is_null($TotalVentasMesActual)) { echo 0; }
                else { echo $TotalVentasMesActual; }?>
            ]
        }],
        chart: {
            type: 'bar',
            height: 350
        },

        annotations: {
            xaxis: [{
                x: 5000,
                borderColor: '#00E396',
                label: {
                    borderColor: '#00E396',
                    style: {
                        color: '#fff',
                        background: '#00E396',
                    },
                    text: 'Cantidad de Ventas',
                }
            }],
            yaxis: [{
                y: 'August',
                y2: 'November',
                label: {
                    borderColor: '#00E396',
                    style: {
                        color: '#fff',
                        background: '#00E396',
                    },
                    text: 'Meses'
                }
            }]
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: true
        },
        xaxis: {
            categories: ['<?php  echo $mesAnterior3 ; ?>', '<?php  echo $mesAnterior2 ; ?>', '<?php  echo $mesAnterior1 ; ?>', '<?php  echo $mesAnterior ; ?>', '<?php  echo $mesActual; ?>'],
        },
        grid: {
            xaxis: {
                lines: {
                    show: true
                }
            }
        },
        yaxis: {
            reversed: true,
            axisTicks: {
                show: true
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#grafico-ventas"), options);
    chart.render();

    var options = {
        series: [<?php porcentaje($CantidadDeUserCliente, $TotalUsuarios); ?>,
                <?php porcentaje($CantidadDeUserAdmin, $TotalUsuarios); ?>],
        labels: ['Clientes', 'Administradores'],
        chart: {
            type: 'donut',
        },
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

    var chart = new ApexCharts(document.querySelector("#grafico-circular-usuarios"), options);
    chart.render();

    var options = {
        series: [{
            name: 'Inflation',
            data: [
                <?php if(is_null($CantidadDeComprasActivas)) { echo 0; }
                else {  porcentaje($CantidadDeComprasActivas, $TotalDeCompras); }?>,
                <?php if(is_null($CantidadDeComprasInactivas)) { echo 0; }
                else {  porcentaje($CantidadDeComprasInactivas, $TotalDeCompras); }?>
            ]
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val + "%";
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },

        xaxis: {
            categories: ["Activos", "Inactivos"],
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function(val) {
                    return val + "%";
                }
            }

        },
    
    };

    var chart = new ApexCharts(document.querySelector("#grafico-compras-estado"), options);
    chart.render();
</script>

</body>

</html>