<?php
    include("modelo/conexion.php");
    $bd = conectar();
    $idempleado = $_POST["id"];
    $horasMes = $_POST["horasMes"];
    $horasExtra = $_POST["horasExtra"];
    $vhora = $_POST["vhora"];
    $bono = $_POST["bono"];

    $sql = "INSERT INTO sueldo (horasMes,horasExtra,vhora,bono,idempleado) values('$horasMes','$horasExtra','$vhora','$bono','$idempleado')";
    $result = mysqli_query($bd,$sql);

    if($result==TRUE){
        header('Location: addNomina.php?mensaje=registrado');// redireccion
    }
    else{
        header('Location: addNomina.php?mensaje=Error');// redireccion
        exit();
    }
    mysqli_close($bd);
?>
