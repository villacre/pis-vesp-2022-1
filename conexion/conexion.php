<?php

/* CONEXION AL SERVIDOR
 * FUNCION MYSQLI_CONNECT -> permite conectarme a mi servidor / base de datos.
 * 
 */

// LLAMAR/INCLUIR EL ARCHIVO DE PARAMETROS
    require_once 'parametros.php';

 //CONEXION CON PDO
    $connectionString = "mysql:host=".$host.";dbname=".$database.";charset=utf8";
    $ObjCn = new PDO($connectionString, $user, $password );


