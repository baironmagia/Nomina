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
    $cargo = $_POST["cargo"];
    $departamento = $_POST["departamento"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $tmp=$_FILES['txtImagen']['tmp_name'];
    $error=$_FILES['txtImagen']['error'];

    if($error==0){
        move_uploaded_file($tmp,"fotos/$id.jpg");
    }

    $sql = "UPDATE empleado SET cedula='$cedula',nombres='$nombres',apellidos='$apellidos',telefono='$telefono',direccion='$direccion',email='$email',idcargo='$cargo',iddepartamento='$departamento' WHERE id='$id'";
    $result1 = mysqli_query($bd,$sql);

    $sql = "UPDATE cuenta SET usuario='$usuario',clave='$clave' WHERE email='$email'";
    $result2 = mysqli_query($bd,$sql);

    if($result1==false && $result2==false){
        header('Location: perfil.php?mensaje=Error');// redireccion
    }
    else{
        header('Location: perfil.php?mensaje=Actualizado');// redireccion
    }
    mysqli_close($bd);
?>