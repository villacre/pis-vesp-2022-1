<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../conexion/conexion.php';
require_once 'funcion_consulta.php';

if(!empty($_POST['varAct'])){
$id_selectDc = $_POST['varAct'];


$sql2="select * from acta_imformacion ac
where ac.Idtb_calificaciones = '$id_selectDc'
group by ac.idActa_imformacion 
order by ac.idActa_imformacion;";

$result_Acta = $obj = consulta($sql2, $ObjCn);


// Tabla con imformacion 
?>

<table  class="table table-striped align- table-hover container">
                                                
                              
<thead class="text-center">
    <tr class=" bg-body " >
        <th class="text-start">Apellidos</th>
        <th class="text-start">Nombres</th>
        <th>Gestion Formativa (3 puntos)</th>
        <th>Gestion Practica (3 puntos)</th>
        <th>Acreditacion y validacion (4 puntos)</th>
        <th>Total Numero</th>
    </tr>
</thead>
<tbody class="text-center" >

    <?php
    
        if($result_Acta){
            if(($result_Acta)>0){
                foreach ($result_Acta as $usuario) {
                    $ApellidoEst= $usuario->tb_apellidos;
                    $NombresEst = $usuario->tb_nombres;
                    $nota1 = $usuario->tb_notaGF;
                    $nota2 = $usuario->tb_notaGP;
                    $nota3 = $usuario->tb_notaAV;
                    $notaTotal = $usuario->tb_calificacionTotal;
                    ?>
                <tr>
                    <td class="text-start"><?php echo $ApellidoEst ?></td>
                    <td class="text-start"><?php echo $NombresEst ?></td>
                    <td><?php echo $nota1 ?></td>
                    <td><?php echo $nota2 ?></td>
                    <td><?php echo $nota3 ?></td>
                    <td><?php echo $notaTotal?></td>
                </tr> 

                    <?php
                    
                }// fin ciclo foreach
                
                    ?>
</table>              
                    <?php

                //echo '<script> var fila = <div><input type="hidden" name="variableActa" id="variableActa" value="'.$result_idTablaCa[0].'"></div>;  $("#cabecera").after(fila) <script>';
                
            }else{
                echo '<div class="alert alert-info">No exite registro de usuarios en la base de datos</div>';
               
            }
        }else{
            echo '<div class="alert alert-danger">Error al conectarse a la base de datos.</div>';
        }
      ?>

</tbody>
<?php

}else{
    echo '<div class="alert alert-info">No exite registro de usuarios en la base de datos</div>';
}


