<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>

<?php

$current_year = date("Y");

$con = new mysqli("localhost", "admin_appivcar", "Gaston2001", "admin_appivcar");
$sql_01 = 'SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 1 AND YEAR(created_at) =' . $current_year;
$sql_02 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 2 AND YEAR(created_at) = $current_year
";
$sql_03 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 3 AND YEAR(created_at) = $current_year
";
$sql_04 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 4 AND YEAR(created_at) = $current_year
";
$sql_05 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 5 AND YEAR(created_at) = $current_year
";
$sql_06 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 6 AND YEAR(created_at) = $current_year
";
$sql_07 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 7 AND YEAR(created_at) = $current_year
";
$sql_08 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 8 AND YEAR(created_at) = $current_year
";
$sql_09 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 9 AND YEAR(created_at) = $current_year
";
$sql_10 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 10 AND YEAR(created_at) = $current_year
";
$sql_11 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 11 AND YEAR(created_at) = $current_year
";
$sql_12 = "SELECT COUNT(*) AS `numrows` FROM devices WHERE MONTH(created_at) = 12 AND YEAR(created_at) = $current_year
";

$query_01 = $con->query($sql_01);
$query_02 = $con->query($sql_02);
$query_03 = $con->query($sql_03);

$query_04 = $con->query($sql_04);
$query_05 = $con->query($sql_05);
$query_06 = $con->query($sql_06);

$query_07 = $con->query($sql_07);
$query_08 = $con->query($sql_08);
$query_09 = $con->query($sql_09);

$query_10 = $con->query($sql_10);
$query_11 = $con->query($sql_11);
$query_12 = $con->query($sql_12);

//var_dump($query_01->fetch_object()->numrows);



?>

<div class="padding">
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        </p>
    </figure>

</div>

<script>
    var fecha = new Date();
    var ano = fecha.getFullYear();


    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<h1>Ventas <strong>MENSUALES</strong> de módulos en </h1>' + ano
        },


        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de módulos'
            }

        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> ventas<br/>'
        },

        series: [{
            name: "Ventas mensuales 2022",
            colorByPoint: false,
            data: [{
                    name: "Enero",
                    y: <?= $query_01->fetch_object()->numrows ?>,

                },
                {
                    name: "Febrero",
                    y: <?= $query_02->fetch_object()->numrows ?>,

                },
                {
                    name: "Marzo",
                    y: <?= $query_03->fetch_object()->numrows ?>,

                },
                {
                    name: "Abril",
                    y: <?= $query_04->fetch_object()->numrows ?>,

                },
                {
                    name: "Mayo",
                    y: <?= $query_05->fetch_object()->numrows ?>,

                },
                {
                    name: "Junio",
                    y: <?= $query_06->fetch_object()->numrows ?>,

                },
                {
                    name: "Julio",
                    y: <?= $query_07->fetch_object()->numrows ?>,

                },
                {
                    name: "Agosto",
                    y: <?= $query_08->fetch_object()->numrows ?>,

                }, {
                    name: "Septiembre",
                    y: <?= $query_09->fetch_object()->numrows ?>,

                }, {
                    name: "Octubre",
                    y: <?= $query_10->fetch_object()->numrows ?>,

                }, {
                    name: "Noviembre",
                    y: <?= $query_11->fetch_object()->numrows ?>,

                }, {
                    name: "Diciembre",
                    y: <?= $query_12->fetch_object()->numrows ?>,

                }
            ]
        }],

    });
</script>
<?= $this->endSection() ?>