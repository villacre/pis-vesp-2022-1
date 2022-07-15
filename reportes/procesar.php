<?php 
require_once '../conexion/conexion.php';
require_once '../ajax/funcion_consulta.php';

//$ValidaActa = $_POST['varAct'];
//$ValidaParc = $_POST['Parcial'];



$ValidaActa = $_POST['VarAct'];

if(substr($_FILES['archivo_csv']['name'], -3)=="csv") {
    
    $fecha 	= date('Y-m-d');
    $carpeta 	= "tmp_excel/";
    $n_archivo  = $fecha.'-'.$_FILES['archivo_csv']['name'];

    $row = 1;

    move_uploaded_file($_FILES['archivo_csv']['tmp_name'], $carpeta.$n_archivo);

      $fp = fopen($carpeta.$n_archivo, "r");
 

    while($data = fgetcsv($fp, 1000, ";")){

        // Si la variable $row es diferente a 1, que no registre los titulos en la tabla
        if($row!=1){      
               
            $sql_archivo = "update acta_imformacion set tb_notaGF = '$data[2]', "
                    . "tb_notaGP = '$data[3]', tb_notaAV = '$data[4]', "
                    . "tb_calificacionTotal = '$data[5]' where Idtb_calificaciones = $ValidaActa and tb_nombres = '$data[1]';";
//                   $sql_archivo = "update persona set nota1 = '$data[1]', nota2 = '$data[2]', nota3 = '$data[3]',"
//                           . " totalnumero = '$data[4]' where parcial = 1 and nombres = '$data[0]';";



            $rpta_archivo = $obj = actualizar_insertar($sql_archivo, $ObjCn);

            if(!$rpta_archivo){
                echo "<div class='alert alert-danger'>un problema</div>";
            }
        
        
        }
        $row++;
    }
      fclose($fp);
      
     

        echo "<div class='alert alert-success'>Datos procesados correctamente</div>"; 
       
       
}
