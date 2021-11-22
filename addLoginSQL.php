<?php
    include("modelo/conexion.php");
    $bd = conectar();

    $rol = $_POST["rol"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(!is_numeric($rol)){
        header('Location: index.php?mensaje=noRol');// redireccion
        exit();
    }

    $sql = "SELECT count(id),id from empleado where email='$email'";
    $result = mysqli_query($bd,$sql);
    $empleado = mysqli_fetch_row($result);

    if($empleado[0]==0){
       header('Location: index.php?mensaje=Noregistro');// redireccion
       exit();
    }
    else{
        validadDatos($username,$password,$email);
        //valida la informacion
        // echo "$rol,$username,$password,$email";
        $sql = "INSERT INTO cuenta(idrol,usuario,clave,estado,email) VALUES ('$rol','$username','$password','1','$email')";
        $result = mysqli_query($bd,$sql);
        if($result==TRUE){
            $sql = "select max(id) from cuenta;";
            $result = mysqli_query($bd,$sql);
            $idcuenta = mysqli_fetch_row($result);

            $sql = "INSERT INTO cuentaEmpleado(idempleado,idcuenta) VALUES ('$empleado[1]','$idcuenta[0]')";
            $result = mysqli_query($bd,$sql);
            if($result==TRUE){
                header('Location: index.php?mensaje=registrado');// redireccion
            }
            else{
                header('Location: index.php?mensaje=Error');// redireccion
            }    
        } 
        else{
            header('Location: index.php?mensaje=Error');// redireccion
        }
    }
    mysqli_close($bd);  
    
    function validadDatos($usu,$clv,$email){

        $bd = conectar();
        $sql = "SELECT count(id) from cuenta where email='$email'";
        $result = mysqli_query($bd,$sql);
        $cuenta = mysqli_fetch_row($result);

        if($cuenta[0]==0){
            $sql = "SELECT count(id) from cuenta where usuario='$usu'";
            $result = mysqli_query($bd,$sql);
            $usuario = mysqli_fetch_row($result);
            if($usuario[0]!=0){
                header('Location: index.php?mensaje=usuario');// redireccion
                exit();
            }
            $sql = "SELECT count(id) from cuenta where clave='$clv'";
            $result = mysqli_query($bd,$sql);
            $clave = mysqli_fetch_row($result);
            if($clave[0]!=0){
                header('Location: index.php?mensaje=clave');// redireccion
                exit();
            }
        }
        else{
            header('Location: index.php?mensaje=existe');// redireccion
            exit();
        }
        echo "registra los datos";
    
    }
?>
