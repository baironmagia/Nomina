<?php
    include("modelo/conexion.php");
    $bd = conectar();

    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $salario = $_POST["salario"];
    $iddepartamento = $_POST["departamento"];
    $idcargo = $_POST["cargo"];


    // echo "$cedula $nombre $apellido $salario $telefono $direccion $email $iddepartamento $idcargo $iddescuento $iddevengado";
    $sql = "INSERT INTO empleado(cedula,nombres,apellidos,salario,telefono,direccion,email,iddepartamento,idcargo) values ('$cedula','$nombre','$apellido','$salario','$telefono','$direccion','$email','$iddepartamento','$idcargo')";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: addEmpleado.php?mensaje=registrado');// redireccion
    }
    else{
        echo  mysqli_error($bd);
        header('Location: addEmpleado.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>
