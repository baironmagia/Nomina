<?php 
    function conectar(){
        //parametros: servidor, usuario, clave, BD
        $bd = mysqli_connect("localhost","root","1234","nomina");   
        //echo "mysqli_error($bd)";      
        return $bd;
    }
?>