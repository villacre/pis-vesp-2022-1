<?php


//conexion
require_once '../conexion/conexion.php';
require_once '../ajax/funcion_consulta.php';

//condicion para que se ejecute el query correcto en su respectiva pagina

//$id_campo = 1;
$id_campo = $_GET['id'];

if($id_campo == 1){

   $sql="select * from bd_notas.tb_periodo_academico;";

$result= $obj = consulta($sql, $ObjCn);

}else if ($id_campo == 2){
    
  $sql="select * from bd_notas.tb_periodo_lectivo;";

$result= $obj = consulta($sql, $ObjCn);  


}else if($id_campo == 3){
    
    $sql="select * from bd_notas.tb_carrera;";

$result= $obj = consulta($sql, $ObjCn);
    
}else if($id_campo == 4){
    
    $sql="select * from bd_notas.tb_jornada;";

$result= $obj = consulta($sql, $ObjCn);
    
}else if ($id_campo == 5) {
    $sql="select * from bd_notas.tb_asignatura;";

$result= $obj = consulta($sql, $ObjCn);


}else if($id_campo == 6){
    
    $sql="select * from bd_notas.tb_parcial;";

$result= $obj = consulta($sql, $ObjCn);


}else if($id_campo == 7){
    
    $sql="select * from bd_notas.tb_docentes;";

$result= $obj = consulta($sql, $ObjCn);


} else {
    echo 'ocurrion un problema';  
}


