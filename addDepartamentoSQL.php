<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $departamento = $_POST["departamento"];
    $sql = "insert into departamento(nombre) values('$departamento')";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: addDepartamento.php?mensaje=registrado');// redireccion
    }
    else{
        header('Location: addDepartamento.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>
