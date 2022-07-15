<?php 




//Incluimos la plantilla para el reporte
include 'plantilla.php';

// La conexion
require_once '../conexion/conexion.php';
require_once '../ajax/funcion_consulta.php';






//INSTANCIA DEL OBJETO DE LA CLASE HEREDADA
//$pdf = new PDF();
//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//
//$pdf->SetFillColor(232,232,232);
//$pdf->cell(30,6,'Apellidos',1,0,'C',1);
//$pdf->cell(20,6,'Nombres',1,0,'C',1);
//$pdf->cell(40,6,'Gestion Formativa (3 puntos)',1,1,'C',1);
//$pdf->cell(40,6,'Gestion Formativa (3 puntos)',1,1,'C',1);
//
//$pdf->Output();



//Recibe la variable del index para generar el reporte correcto
$id_Acta = $_GET['id'];
$select_PL = $_GET['Pl'];
$selec_CA = $_GET['Ca'];
$select_JN = $_GET['Jn'];
$select_PA = $_GET['Pa'];
$select_Pr = $_GET['Pr'];
$select_AS = $_GET['As'];
$select_Pc = $_GET['Pc'];
$select_Dc = $_GET['Dc'];

//Fecha Actual
$dateTimeNow = date('Y-m-d');

//$id_jornada = $_POST['selectJN'];

    //Query que genera el reporte
    $sql = "select * from acta_imformacion ac
where ac.Idtb_calificaciones = '$id_Acta'
group by ac.idActa_imformacion 
order by ac.idActa_imformacion;";
    
  $result_Acta = $obj =consulta($sql, $ObjCn);
  
  
  
 //Query para las consultas de los campos select
 include '../querys/query-select.php';
 $info_report = $obj = consulta($sqlReport, $ObjCn);

 foreach ($info_report as $result_report) {
    


$pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(5, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Times", "B", 12);
    
    $pdf->Cell(204, 7, utf8_decode($result_report->descpPl), 0, 1, 'C');
    $pdf->Cell(204, 7, utf8_decode(strtoupper($result_report->descpPrc)), 0, 1, 'C');
    $pdf->Ln(4);
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode('MATERIA: '), 0, 0, 'L');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(130, 5, utf8_decode($result_report->descpAs), 0, 0, 'L');
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode('FECHA: '), 0, 0, 'L');
    $pdf->Cell(30, 5, utf8_decode($dateTimeNow), 0, 1, 'L');
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode('CARRERA: '), 0, 0, 'L');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(200, 5, utf8_decode($result_report->descpCr), 0, 1, 'L');
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(20, 5, utf8_decode('DOCENTE: '), 0, 0, 'L');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(200, 5, utf8_decode(strtoupper($result_report->docente)), 0, 1, 'L');
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(22, 5, utf8_decode('PARALELO: '), 0, 0, 'L');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(200, 5, utf8_decode(strtoupper($result_report->descpPrl)), 0, 1, 'L');
    $pdf->Ln(8);
    }
    
    $pdf->SetFillColor(232,232,232);
    $pdf->Cell(42, 5, "Apellido", null, 0, "L");
    $pdf->Cell(42, 5, "Nombres", null, 0, "L");
    $pdf->Cell(30, 5, "Gest-F", 1, 0, "C",true);
    $pdf->Cell(30, 5, "Gest-P", 1, 0, "C", true);
    $pdf->Cell(30, 5, "Nta-AV", 1, 0, "C", true);
    $pdf->Cell(30, 5, "Total numeros", 1, 1, "C", true);
    $pdf->Ln(8);

    $pdf->SetFont("Arial", "", 9);

    foreach($result_Acta as $usuario) {
        $pdf->Cell(42, 5, utf8_decode($usuario ->tb_apellidos), 1, 0, "L");
        $pdf->Cell(42, 5, utf8_decode($usuario ->tb_nombres), 1, 0, "L");
        $pdf->Cell(30, 5, $usuario ->tb_notaGF, 1, 0, "C");
        $pdf->Cell(30, 5, $usuario ->tb_notaGP, 1, 0, "C");
        $pdf->Cell(30, 5, $usuario ->tb_notaAV, 1, 0, "C");
        $pdf->Cell(30, 5, $usuario ->tb_calificacionTotal, 1, 1, "C");       
    }
//consulta de promedio del curso    
$query_prom = $ObjCn->prepare($queryPromedio);
$query_prom->execute();
$promedio = $query_prom->fetchColumn(0);

$pdf->Ln(12);
    $pdf->Cell(144, 5, "", 0, 0, "L");
    $pdf->SetFont("Times", "", 9);
    $pdf->Cell(30, 5, "PROMEDIO CURSO ", 1, 0, "L", true);
    $pdf->Cell(30, 5, $promedio, 1, 0, "C");
    
    $pdf->SetFont("Times", "B", 10);
    $pdf->Ln(45);
    $pdf->Cell(60, 5, "__________________________", null, 0, "C");
    $pdf->Cell(80, 1, "", 0, 0);
    $pdf->Cell(60, 5, "__________________________", null, 1, "C");
    $pdf->Cell(60, 5, "Firma: 1", null, 0, "C");
    $pdf->Cell(80, 1, "", 0, 0);
    $pdf->Cell(60, 5, "Firma: 2", null, 1, "C");
    
    

    $pdf->Output();
