    <head>
            <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../libs/iconos/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    
    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
    
    <title> <?php 
                if ($id_campo == 1){echo $title;} else if($id_campo == 2) {echo $title;}else 
                if ($id_campo == 3){echo $title;} else if($id_campo == 4) {echo $title;}else 
                if ($id_campo == 5){echo $title;} else if($id_campo == 6) {echo $title;}  
            ?> 
    </title>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3" style="padding-left:15px; padding-right: 15px;">
      <div class="container-fluid">
          <a class="navbar-brand" href="../index.php">
              <img src="../images/bootstrap-logo.svg" alt="" width="34" height="28" class="d-inline-block align-text-top"> Gestion Academica
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                  <li class="nav-item active">
                      <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Gestiones
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="../gestiones/gestion_peracademico.php?id=<?php echo'1'; ?>">Gestion | academico</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_perlectivo.php?id=<?php echo'2'; ?>">Gestion | Periodo Lectivo</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_carrera.php?id=<?php echo'3'; ?>">Gestion | Carrera</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_jornada.php?id=<?php echo'4'; ?>">Gestion | Jornada</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_asignatura.php?id=<?php echo'5'; ?>">Gestion | Asignatura</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_parcial.php?id=<?php echo'6'; ?>">Gestion | Parcial</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="../gestiones/gestion_docentes.php?id=<?php echo'7'; ?>">Gestion | Docentes</a></li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled">Reportes</a>
                  </li>
              </ul>
              <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <ul class="navbar-nav ms-2 mb-2 mb-lg-0">
                  <li class="nav-item "><a href="../login.php" class="nav-link active"><i class="bi bi-box-arrow-left btn btn-outline-secondary"></i></a></li>
              </ul>
          </div>
      </div>
      </div>
    </nav>
    
  </head>
