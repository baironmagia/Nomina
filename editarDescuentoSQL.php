<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $id = $_POST["id"];
    $arl = $_POST["arl"];
    $salud = $_POST["salud"];
    $pension = $_POST["pension"];
    $parafiscal = $_POST["parafiscal"];
    $fecha = $_POST["fecha"];
    

    $sql = "UPDATE descuento SET arl='$arl',salud='$salud',pension='$pension',parafiscal='$parafiscal',fecha='$fecha' WHERE id='$id'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaDescuento.php?mensaje=Actualizado');// redireccion
    }
    else{
        header('Location: listaDescuento.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>