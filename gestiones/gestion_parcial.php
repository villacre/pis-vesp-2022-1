<?php                       


//Query

//incluye el archivo donde se ubican los querys para la consulta
include 'querys_consultas.php';

?>

<!doctype html>
<html lang="en">
    <?php $title = "Gestion | Parcial"; include 'head_gestion.php'; ?>
    <body>
        <div class="container border-1 mt-5 mb-5">
            <div class="row mb-5">
                <div class="card bg-none border-0 mb-5">
                    <div class="container mt-5 mb-5">
                      <div style="background: #7952B3 ">
                          <h4 style="color: white;"><i class="bi bi-pencil-square fst-normal fs-2 mx-2"></i>Gestion | Parciales</h4>
                      </div>                        
                        <div class="col mt-5 mb-5">
                            <h3>Lista de Parciales:</h3>
                            <div id="mensaje"></div>

                        </div>
                        <table  class="table table-striped align- table-hover container">


                            <thead class="text-center">
                                <tr class=" bg-body " >
                                    <th class="text-start">Id</th>
                                    <th class="text-start">Descripcion parcial</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" >
                                <?php
                                if ($result) {
                                    if ($result > 0) {
                                        foreach ($result as $datos) {
                                            $Id_Pc = $datos->idtb_parcial;
                                            $Descripcion = $datos->descripcion;
                                            $Estado = $datos->estado;
                                            ?>
                                            <tr>
                                                <td class="text-start"><?php echo $Id_Pc ?></td>
                                                <td class="text-start"><?php echo $Descripcion ?></td>
                                                <td><?php echo $Estado ?></td>
                                            </tr> 

                                            <?php
                                        }// fin ciclo foreach
                                    }
                                }
                                ?>
                        </table>
                        <div class="align-items-center mt-5">
                            <button type="button" class="btn btn-danger" onclick=""><i class="bi bi-trash3-fill mx-2"></i>Eliminar</button>
                            <button type="button" class="btn btn-outline-success" onclick=""><i class="bi bi-cloud-arrow-up-fill mx-2"></i>Actualizar Datos</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <div class="container-fluid " >
<?php include '../includes-html/footer-html.php' ?>
    </div>
</html>


