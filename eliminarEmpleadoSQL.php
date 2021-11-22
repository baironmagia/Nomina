<?php
    if(!isset($_GET['empleado'])){
        header('Location: listaEmpleado.php?mensaje=Error');// redireccion
        exit();
    }
    include("modelo/conexion.php");
    $bd = conectar();
    $empleado = $_GET["empleado"];

    echo $empleado;
    $sql = "DELETE FROM empleado WHERE id='$empleado'";
    $result = mysqli_query($bd,$sql);
  
    if($result==TRUE){
        header('Location: listaEmpleado.php?mensaje=Eliminado');// redireccion
    }
    else{
        header('Location: listaEmpleado.php?mensaje=Error');// redireccion
        exit();
    }
?>