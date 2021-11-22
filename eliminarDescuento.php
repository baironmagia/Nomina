<?php
    if(!isset($_GET['descuento'])){
        header('Location: listaDescuento.php?mensaje=Error');// redireccion
        exit();
    }
    include("modelo/conexion.php");
    $bd = conectar();
    $descuento = $_GET["descuento"];
    $sql = "DELETE FROM descuento WHERE id='$descuento'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaDescuento.php?mensaje=Eliminado');// redireccion
    }
    else{
        header('Location: listaDescuento.php?mensaje=Error');// redireccion
        exit();
    }
?>