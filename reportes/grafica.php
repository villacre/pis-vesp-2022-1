


<?php
require_once '../conexion/conexion.php';
require_once '../ajax/funcion_consulta.php';




//Recibe la variable del index para generar el reporte correcto
//$id_Acta = $_POST['VarAct'];
$id_Acta = $_GET['id'];
$select_PL = $_GET['Pl'];
$selec_CA = $_GET['Ca'];
$select_JN = $_GET['Jn'];
$select_PA = $_GET['Pa'];
$select_Pr = $_GET['Pr'];
$select_AS = $_GET['As'];
$select_Pc = $_GET['Pc'];
$select_Dc = $_GET['Dc'];


//Query que genera el reporte
$sql = "select * from acta_imformacion ac
where ac.Idtb_calificaciones = '$id_Acta' and tb_calificacionTotal != ' - '
group by ac.idActa_imformacion 
order by ac.idActa_imformacion;";

$result_Acta = $obj =consulta($sql, $ObjCn);


//Query para las consultas de los campos select
include '../querys/query-select.php';

?>



<!DOCTYPE HTML>
<html lang="es">
    <head>
        <!-- Bootstrap CSS -->
        <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../libs/iconos/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Grafica de Promedio por alumno</title>

        <!-- Etiqueta Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3" style="padding-left:15px; padding-right: 15px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="34" height="28" class="d-inline-block align-text-top"> Gestion Academica
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestiones
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../gestiones/gestion_peracademico.php?id=<?php echo'1'; ?>" target="_blank" rel="noopener noreferrer">Gestion | academico</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_perlectivo.php?id=<?php echo'2'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Periodo Lectivo</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_carrera.php?id=<?php echo'3'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Carrera</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_jornada.php?id=<?php echo'4'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Jornada</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_asignatura.php?id=<?php echo'5'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Asignatura</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_parcial.php?id=<?php echo'6'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Parcial</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../gestiones/gestion_docentes.php?id=<?php echo'7'; ?>"target="_blank" rel="noopener noreferrer">Gestion | Docentes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Reportes</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-2 mb-2 mb-lg-0">
                        <li class="nav-item "><a href="../Login.php" class="nav-link active"><i class="bi bi-box-arrow-left btn btn-outline-secondary"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <style type="text/css">
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

    </head>
<body>

    <script src="../graficas-highcharts/code/highcharts.js"></script>
    <script src="../graficas-highcharts/code/modules/data.js"></script>
    <script src="../graficas-highcharts/code/modules/drilldown.js"></script>
    <script src="../graficas-highcharts/code/modules/exporting.js"></script>
    <script src="../graficas-highcharts/code/modules/export-data.js"></script>
    <script src="../graficas-highcharts/code/modules/accessibility.js"></script>
    
    
    <?php 
    //consulta de imformacion cabecera
    $info_grafica = $obj = consulta($sqlReport, $ObjCn);
    foreach ($info_grafica as $value) {
        
    ?>
    
    <div class=" container col mt-5">
        <div class="text-center"><h3><?php echo utf8_decode($value->descpPl) ?> </h3></div>
        <h3>Lista de Alumnos:</h3>
        <div class="container ms-4 mt-4">
            <h5>Materia: <p><small class="text-muted"><?php echo utf8_decode($value->descpAs) ?></small></p></h5>
            <h5>Carrera: <p><small class="text-muted"><?php echo utf8_decode($value->descpCr) ?></small></p></h5>
            <h5>Docente: <p><small class="text-muted"><?php echo utf8_decode(strtoupper($value->docente)) ?></small></p></h5>
        </div>

        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">

            </p>

        </figure>

    </div>





    <script type="text/javascript">
        // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'GRAFICA PROMEDIAL | <?php echo utf8_decode(strtoupper($value->descpPrc)); }?>'
                    },
                    subtitle: {
                        text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Total promedio'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.1f}%'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },

                    series: [
                        {
                            name: "Grafica Promedio",
                            colorByPoint: true,
                            data: [

                <?php
                foreach($result_Acta as $row) {

                    echo "
                        {

                            name: '" . $row->tb_apellidos. "',
                            y: " . $row->tb_calificacionTotal. "

                        },
                        ";
                }
                ?>
                            ]
                        }
                    ]

                });
    </script>

    <div class="container-fluid " >
        <?php include '../includes-html/footer-html.php' ?>
    </div>

</body>

</html>
<?php

