<?php
    include("modelo/conexion.php");
    $bd = conectar();
    
    $id = $_POST["id"];
    $hmes = $_POST["hmes"];
    $hextra = $_POST["hextra"];
    $vhora = $_POST["vhora"];
    $bono = $_POST["bono"];
    $hmes = $_POST["hmes"];

    $sql = "UPDATE sueldo SET horasMes='$hmes',horasExtra='$hextra',vhora='$vhora',bono='$bono' WHERE id='$id'";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: listaNomina.php?mensaje=Actualizado');// redireccion
    }
    else{
        header('Location: listaNomina.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>