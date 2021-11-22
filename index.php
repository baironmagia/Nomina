<?php
    session_start();
    include("modelo/conexion.php");
    $bd = conectar();
    
    if($_POST){
        $username = $_POST["username"];
        $password=$_POST["password"];
       
        $sql = "SELECT count(id),id,cedula,nombres,idRol,rol from sesion WHERE usuario='$username' AND clave='$password'";
        $result = mysqli_query($bd,$sql);
        $usu = mysqli_fetch_row($result);

        if($usu[0]==1){ 
            $_SESSION['id']=$usu[1];    
            $_SESSION['cedula']=$usu[2];
            $_SESSION['nombres']=$usu[3];
            $_SESSION['rol']=$usu[4];
            $_SESSION['rolNombre']=$usu[5];
            header('Location: inicio.php');// redireccion
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilosLogin.css">
    <title>Login</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-xxl-10 col-xl-11 col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                <div class="my-4">
                    <?php
                        if(
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='noRol') ||
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='existe') ||
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='registrado') ||
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='usuario') ||
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='clave') ||
                            (isset($_GET['mensaje']) && $_GET['mensaje']=='Noregistro')

                        ){
                        switch($_GET['mensaje']){
                            case 'noRol':
                                $color='alert-danger';
                                $texto1='Error';
                                $texto2=' Seleccione un rol y vuelva a intentarlo ..';
                                        break;
                            case 'registrado':
                                $color='alert-success';
                                $texto1='Registrado';
                                $texto2=' se agrego con exito..';
                                        break;
                            case 'existe':
                                $color='alert-warning';
                                $texto1='Cuenta';
                                $texto2=' ya existe..';
                                        break;
                            case 'usuario':
                                $color='alert-warning';
                                $texto1='Nombre usuario';
                                $texto2=' ya existe ingrese otro..';
                                        break;
                            case 'clave':
                                $color='alert-warning';
                                $texto1='Contraseña';
                                $texto2=' ya existe ingese otra..';
                                    break;
                            case 'Noregistro':
                                $color='alert-warning';
                                $texto1='Usuario';
                                $texto2=' No registrado contacta al administrador del sistema...';
                                break;
                            default:  
                            $color='alert-danger';
                            $texto1='Error interno';
                                $texto2=' Algo salio mal informe al administrador...';
                        }
                        echo '<div class="alert '.$color.' alert-dismissible fade show" role="alert">
                        <strong>'.$texto1.'</strong>'.$texto2.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
     
                </div>       
                <div class="login">
                   <div class="conten-login">  
                       <div class="conten-btn1">
                           <div class="conten1">
                            <h3>Ingresa al Sistema</h3>
                            <div class="conten-btn">
                                <button type="button" class="btn btn-outline-light"  id="btn1">Iniciar Sesion</button>
                            </div>
                           </div>
                           <div class="conten2">
                               <h3>Formulario de Registro</h3>
                            <div class="conten-btn" >
                                <button type="button" class="btn btn-outline-light" id="btn2">Registrarse</button>
                            </div>
                           </div>
                       </div> 
                        <div class="conten-carro" id="carro">
                            <div class="mostrar-sesion" id="sesion">
                                <form action="#" class="frm-sesion" method="POST">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>Login</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3 conten-card-sesion">
                                                <div class="caja">
                                                    <label for="usuario" class="form-label label-sesion"><i class="bi bi-person">Nombre usuario</i></label>
                                                    <input type="text" class="form-control" placeholder="usuario" name="username" aria-label="Example text with button addon" aria-describedby="button-addon1" id="usuario">
                                                </div>
                                                <div class="caja">
                                                    <label for="password" class="form-label label-sesion"><i class="bi bi-shield-lock">Contreseña</i></label>
                                                    <input type="password" class="form-control" placeholder="password" name="password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="password">
                                                </div> 
                                              </div>
                                        </div>
                                        <div class="conten-btn">
                                            <button type="submit" class="btn btn-outline-primary">Entrar</button>
                                        </div>
                                            
                                      </div>
                                </form>
                            </div>
                            <div class="ocultar-registro" id="registro">
                                <form action="addLoginSQL.php" class="frm-registro"  method="post">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Login</h3>
                                        </div>
                                        <div class="card-body">
                                        <div class="conten-caja">
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-gear py-0"></i></span>
                                                <select class="form-select py-1" name="rol" aria-label="Default select example">
                                                    <option selected>Seleccionar</option>
                                                        <?php
                                                            $sql = "SELECT *FROM rol";
                                                            $result = mysqli_query($bd,$sql);
                                                            while($rol= mysqli_fetch_array($result)){ 
                                                                echo "<option value='$rol[0]'>$rol[1]</option>";
                                                            }
                                                            mysqli_close($bd);
                                                        ?>
                                                </select>
                                            </div>
                                        </div>        
                                        <div class="conten-caja">
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                                                <input type="email" class="form-control" name="email" placeholder="Correo electronico" 
                                                    aria-describedby="inputGroupPrepend" required>
                                            </div>
                                        </div>
                                        <div class="conten-caja">
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control" name="username" placeholder="Nombre usuario"
                                                    aria-describedby="inputGroupPrepend" required>
                                            </div>
                                        </div> 
                                        <div class="conten-caja">
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-shield-lock"></i></span>
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="conten-btn">
                                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>  
                        </div> 
                    </div>        
                </div> 
            </div>
        </div>        
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
        <script src="js/login.js"></script>
</body>
</html>