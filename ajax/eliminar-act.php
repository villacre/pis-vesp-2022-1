<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../conexion/conexion.php';
require_once 'funcion_consulta.php';

if(!empty($_POST['varAct'])){
    $ValidaActa = $_POST['varAct'];
//$id_select_Pc = $_POST['select_Pc'];


    $sql_Acta = "update acta_imformacion set tb_notaGF = '0', "
            . "tb_notaGP = '0', tb_notaAV = '0', "
            . "tb_calificacionTotal = '0' "
            . "where Idtb_calificaciones = '$ValidaActa';";
    
    $rpta_archivo = $obj = actualizar_insertar($sql_Acta, $ObjCn);
    
    if (!$rpta_archivo) {
        echo "<div class='alert alert-danger'>un problema</div>";
    } else {
        echo "<div class='alert alert-success'>Datos procesados correctamente</div>";
    }

    
}
