<?php

//Query que seleciona toda los campos de la base de datos, usando el id de los campos Select

$sqlReport = "select PL.descripcion as descpPl, TC.descripcion as descpCr, TJ.descripcion as descpJn,  
PA.descripcion, TP.descripcion as descpPrl, TA.descripcion as descpAs, TPr.descripcion as descpPrc,
concat_ws(' ', TD.apellido, TD.nombre) as docente
from tb_periodo_lectivo PL, tb_carrera TC, tb_jornada TJ, 
tb_periodo_academico PA, tb_paralelo TP, tb_asignatura TA,
tb_parcial TPr, tb_docentes TD
where idperiodo_lectivo = '$select_PL'
and idtb_carrera = '$selec_CA'
and idtb_jornada = '$select_JN'
and idtb_periodo_academico = '$select_PA' 
and idtb_paralelo = '$select_Pr' 
and idtb_asignatura = '$select_AS'
and idtb_parcial = '$select_Pc'
and idtb_docentes = '$select_Dc';";
  

//Query para la consulta del promedio del curso
$queryPromedio = "SELECT round(avg(tb_calificacionTotal),2) as promedio FROM bd_notas.acta_imformacion where Idtb_calificaciones = '$id_Acta' and tb_calificacionTotal != '0' and tb_calificacionTotal != ' - ';";
