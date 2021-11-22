<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/Stilos.css">
    <title>Login</title>
</head>

<body class="fondo">
    <div class="container-fluid">
        <div class="row centrar">
            <div class="col-xxl-4 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6 col-9">
                <div class="my-4">
                    <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado</strong> se agrego con exito..
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        }
                    ?> 
                    <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        }
                    ?>
                     <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje']=='Noregistro'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>No autorizado</strong> Informar al administrador de la plataforma..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        }
                    ?>  
                </div> 
                <form action="addLoginSQL.php" class="conten-login" method="post">
                    <div class="conten-header">
                        <h1>Login</h1>
                    </div>
                    <div class="conten-body">
                    <div class="conten-caja">
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-gear py-0"></i></span>
                            <select class="form-select py-1" name="rol" aria-label="Default select example">
                                <option selected>Seleccionar</option>
                                    <?php
                                        include("modelo/conexion.php");
                                        $bd = conectar();
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
                                <input type="email" class="form-control" name="email" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        
                        <div class="conten-caja">
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" name="username" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div class="conten-caja">
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i
                                        class="bi bi-shield-lock"></i></span>
                                <input type="password" class="form-control" name="password" id="inputPassword">
                            </div>
                        </div>
                        <div class="conten-caja">
                            <button type="submit" class="btn btn-primary mb-3">Registrar</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>