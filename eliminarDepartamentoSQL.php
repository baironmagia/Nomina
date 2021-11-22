<?php
    if(!isset($_GET['departamento'])){
        header('Location: listaDespartamento.php?mensaje=Error');// redireccion
        exit();
    }
    include("modelo/conexion.php");
    $bd = conectar();
    $departamento = $_GET["departamento"];
    $sql = "DELETE FROM departamento WHERE id='$departamento'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaDepartamento.php?mensaje=Eliminado');// redireccion
    }
    else{
        header('Location: listaDepartamento.php?mensaje=Error');// redireccion
        exit();
    }
?>