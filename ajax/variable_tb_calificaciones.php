<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../conexion/conexion.php';
require_once 'funcion_consulta.php';

//recogiendo variable enviadas de javaScript
$id_selectPL = $_POST['select_PL'];
$id_selecCA = $_POST['selec_CA'];
$id_selectJN = $_POST['select_JN'];
$id_selectPA = $_POST['select_PA'];
$id_selectPr = $_POST['select_Pr'];
$id_selectAS = $_POST['select_AS'];
$id_selectPc = $_POST['select_Pc'];
$id_selectDc = $_POST['select_Dc'];

//sentencia Query que seleciona toda los campos de la base de datos
$sql1="select idtb_calificaciones from tb_calificaciones, tb_periodo_lectivo, tb_periodo_academico, 
tb_jornada, tb_asignatura, tb_paralelo, tb_parcial, tb_carrera, tb_docentes where
 '$id_selectPL' = tb_calificaciones.idtb_periodo_lectivo and
 '$id_selectPA' = tb_calificaciones.idtb_periodo_academico and
 '$id_selectJN' = tb_calificaciones.idtb_jornada and
 '$id_selectAS' = tb_calificaciones.idtb_asignatura and
 '$id_selectPr' = tb_calificaciones.idtb_paralelo and
 '$id_selectPc' = tb_calificaciones.idtb_parcial and
 '$id_selecCA' = tb_calificaciones.idtb_carrera and
 '$id_selectDc' = tb_calificaciones.idtb_docentes;";

//asignamos en una variable los dato del query que se traen del objeto de conexion.
$query_inf = $ObjCn->prepare($sql1);
$query_inf->execute();
$id_relacion = $query_inf->fetchColumn(0);

if(!empty($id_relacion)){
    
    ?>
    <input type="hidden" name="variableActa" id="variableActa" value="<?php echo $id_relacion?>">
    
    
<?php
    }else{
        ?>
    <input type="hidden" name="variableActa" id="variableActa" value="<?php echo '0'?>">
        <?php
    }





