<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="libs/iconos/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
        
    
        <title>Login</title>
        <nav class="container-fluid d-flex flex-wrap justify-content-end align-items-center" style="background: #7952B3; height: 40px; margin-bottom: 90px"></nav>

    </head>
    
    
    </style>
    
    <body>
            
            <div class="row container-fluid d-flex justify-content-center align-items-center">
                
                <div class="col-md-6 col-lg-8 col-sm-6 col-xl-6">
                    <div class="container border-0 card ">
                    <div class="card-body" border-0>
                        <h1 class="card-title" style="font-size: 70px" >Iniciar Sesion</h1>
                        
                        <form class="form-control mb-4" action="index.php">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label fs-4" >Correo Electronico</label>
                                <input type="email" required="true" class="form-control form-control-lg" id="usuarioTxt" name="Usuario"/>
                                
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label fs-4">Contraseña</label>
                                <input type="password" required="true" class="form-control form-control-lg" id="claveTxt" name="clave" />
                                
                            </div>
                            
                            <div class="d-flex align-items-center mb-5">
                                <!-- Checkbox -->
                                <div class="form-check fs-5">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="false"
                                        id="form1Example3"
                                        checked
                                        />
                                    <label class="form-check-label" > Recuerdame </label>
                                </div>
                                <a class="mx-5 fs-5" href="#">¿Olvidó Contraseña?</a>
                            </div>
                            
                            <!-- Submit button -->
                            <button id="ingresar_btn" name="Ingresar"   type="submit" class="btn btn-primary btn-lg btn-block container-fluid mb-3 fw-bold" style="background: #7952B3; border-color: #7952B3;">Ingresar</button>
                             
                        </form>
						<div class="col-12">
							<?php
								include 'conexion/verifica-conexion.php'
							?>
						</div>
                    </div>
                    </div>
                </div>
            
                <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center mx-auto ">
                    <img  src="images/login-modified.png" class="img-fluid " alt="...">
                </div>
                
            </div>
        </div>
        
        
        
        
    </body>
</html>
