<!doctype html>
<html lang="es">
    <head>
            <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="libs/iconos/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>

    <title>Gestion | Actas Calificaciones</title>
        <?php include 'includes-html/head-html.php' ?>
    
  </head>
  <body>
      
    
       
      <div class="container border-1 mt-4">
          <div class="row">
              <div>
                  <br>
                  <div class="card bg-none">
                      <div style="background: #7952B3 ">
                          <h4 style="color: white;"><i class="bi bi-pencil-square fst-normal fs-2 mx-2"></i>Gestion | Actas Calificaciones</h4>
                      </div>
                          <div class="form-control border-0" id="formularioDatos">
                          <div class="container mt-5 mb-5">
                              <div id="cabecera" class="row">

                              </div>
                              <div id="hid">
                                  
                              </div>
                              
                              <div class="justify-content-end d-flex align-items-center pt-4 pb-5 border-bottom">
                                  
                               
                                  <div class="col-lg-4 col-md-6 justify-content-end d-flex align-items-center me-2">
                                      <form name="frmSubircsv" method="POST" enctype="multipart/form-data" id="frmSubircsv" >
                                          <input type="hidden" name="VarAct" id="VarAct">
                                          <div id="divForm" class="input-group">
                                              
                                              <span class="archivo_csv">
                                                  <input type="file" name="archivo_csv" id="archivo_csv" class="border-0" id="archivo_csv">
                                              </span>
                                              
                                              <label for="archivo_csv" id="label" class="btn btn-outline-success border-end-0" style="border-bottom-left-radius: 4px;border-top-left-radius: 4px;"><i class="bi bi-filetype-csv me-2"></i><span>Importar Archivo CSV</span></label>
                                              
                                              <input class="enviar_archivo btn btn-success" type="submit" id="envio" value="subir">
                                              
                                              
<!--                                              <input type="file" name="archivo_csv" class="upload-box" id="archivo_csv" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                              <input class="enviar_archivo btn btn-secondary" type="submit" id="envio" value="subir">-->
                                              
                                          </div>
                                    </form>
                                    
                                  </div>
                                  <button type="button" name="ImprAct" class="btn btn-secondary me-2" onclick="pasarReporte()"><i class="bi bi-printer-fill me-2"></i>Imprimir Acta</button>
                                  <button type="button" class="btn btn-primary" id="G" style="background: #7311F4; border-color:#7311F4;" onclick="Generar_Acta()"><i class="bi bi-file-text-fill me-2"></i>Generar Acta</button>

                              </div>
                              
                           
                                  
                                  <div class="align-items-center mt-5">
                                      <button type="button" class="btn btn-danger" onclick="EliminarActa()"><i class="bi bi-trash3-fill mx-2"></i>Eliminar</button>
                                      <button type="button" class="btn btn-outline-success" onclick="Generar_Grafica()"><i class="bi bi-cloud-arrow-up-fill mx-2"></i>Generar Grafico Esadistico</button>
                                     

                                  </div> 
                                  
                              <div class="col mt-5 mb-5">
                                  <h3>Lista de Alumnos:</h3>
                                  <div id="mensaje"></div>

                              </div>
<!--                              <form name="formAct" id="formAct" method="POST" action="reportePHP.php">
                                  <input type="hidden" name="variableActa" id="variableActa" value="1">
                                  <input type="submit" value="enviar"></form>-->
                                <div id="tabla_Datos">

                                </div>
                              
                              
                             
                          </div>
                      </div>
                      
                      
                      
                  </div>
                  
              </div>
                 
          </div>
      </div>
      
      <div class="container-fluid " >
          <?php include 'includes-html/footer-html.php' ?>
      </div>
      <script src="js/cargar.js"></script>
      
      
      
  </body>
  
</html>