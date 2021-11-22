<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $departamento = $_POST["departamento"];
    $id = $_POST["id"];


    $sql = "UPDATE departamento SET nombre='$departamento' WHERE id='$id'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaDepartamento.php?mensaje=Actualizado');// redireccion
    }
    else{
        header('Location: listaDepartamento.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>