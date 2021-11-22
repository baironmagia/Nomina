<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $id = $_POST["id"];
    $cedula = $_POST["cedula"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $salario = $_POST["salario"];
    $cargo = $_POST["cargo"];
    $departamento = $_POST["departamento"];

    $sql = "UPDATE empleado SET cedula='$cedula',nombres='$nombres',apellidos='$apellidos',telefono='$telefono',direccion='$direccion',email='$email',salario='$salario',idcargo='$cargo',iddepartamento='$departamento' WHERE id='$id'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaEmpleado.php?mensaje=Actualizado');// redireccion
    }
    else{
        header('Location: listaEmpleado.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>