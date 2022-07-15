<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//funciones para ejecutar las sentencias obtenidas de la carpeta Query's
function consulta($sql, $ObjCn){
    $query = $sql;
    $conexion = $ObjCn;
    $query_info = $conexion->prepare($query);
    $query_info->execute();
    $result = $query_info->fetchAll(PDO::FETCH_OBJ);
    return $result;
}


function actualizar_insertar($sql, $ObjCn){
    $query = $sql;
    $conexion = $ObjCn;
    $query_info = $conexion->prepare($query);
    if($query_info->execute()){
        return true;
    }else{
        return false ;
    }
}