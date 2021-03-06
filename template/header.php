<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location: index.php');// redireccion
  }
  $rol=$_SESSION['rolNombre'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nomina</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>   
    <link rel='stylesheet' type='text/css' media='screen' href='css/Stilos.css'>   
</head>
<body>
  <div class="container">
    <div class="row nav-img">
        <img src="imagen/logo.png" id="imgPrincipal">    
        <h1>SISTEMA DE NOMINA</h1>     
    </div>
    <div class="row py-0">
      <div class="col-md">
        <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown conten-dropdown">
                  <a class="nav-link dropdown-toggle conten-perfil" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle perfil">&nbsp;</i><?php echo $rol?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="perfil.php">Mi perfil</a></li>
                    <li><a class="dropdown-item" href="cerrarSesion.php">Salir</a></li>
                  </ul>
                </li>
              </ul>
            </div>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                  </li>
                  <?php
                    if($rol==='Administrador'){
                      echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                            Configuracion
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="listaDevengado.php">Devengado</a></li>
                          <li><a class="dropdown-item" href="listaDescuento.php">Descuento</a></li>
                        </ul>
                      </li>';
                    }
                  ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                        Departamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <?php
                        if($rol==='Administrador')echo '<li><a class="dropdown-item" href="addDepartamento.php">Agregar</a></li>';
                      ?>
                      <li><a class="dropdown-item" href="listaDepartamento.php">Listado</a></li>
                    </ul>
                  </li>                 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Empleado
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <?php if($rol==='Administrador')echo '<li><a class="dropdown-item" href="addEmpleado.php">Agregar</a></li>'; ?>
                      <li><a class="dropdown-item" href="listaEmpleado.php">Listado</a></li>
                      <?php if($rol==='Administrador')echo '<li><a class="dropdown-item" href="addNomina.php">Nomina parcial</a></li>';?>
                      <li><a class="dropdown-item" href="listaNomina.php">Nomina</a></li>
                    </ul>
                  </li>
                </ul>
              </div>  
            </div>
          </nav>
        </header>
      </div>
    </div>
  </div>