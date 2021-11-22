<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $username = $_POST["username"];
    $password=$_POST["password"];

    $sql = "SELECT * from sesion WHERE usuario='$username' AND clave='$password'";
    $result = mysqli_query($bd,$sql);
    $usu = mysqli_fetch_row($result);

    if($usu[0]==1){
        header('Location: inicio.php?');// redireccion
    }
    else{
        header('Location: index.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>