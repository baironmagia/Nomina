<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $id = $_POST["id"];
    $alimentacion = $_POST["alimentacion"];
    $vivienda = $_POST["vivienda"];
    $transporte = $_POST["transporte"];
    $hextra = $_POST["hextra"];
    $fecha = $_POST["fecha"];
    

    $sql = "UPDATE devengado SET alimetacion='$alimentacion',vivienda='$vivienda',transporte='$transporte',hextra='$hextra',fecha='$fecha' WHERE id='$id'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaDevengado.php?mensaje=Actualizado');// redireccion
    }
    else{
        header('Location: listaDevengado.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>