<?php 
    if(isset($_POST['cedula'])){
        $cedula=$_POST['cedula'];
        
        include("modelo/conexion.php");
        $bd = conectar();
        $cedula=$_POST['cedula'];
        $sql = "SELECT  count(id),id,concat(nombres,' ',apellidos),telefono,direccion from empleado WHERE cedula='$cedula'";
        $result = mysqli_query($bd,$sql);
        $empleado = mysqli_fetch_row($result);
        
        if($empleado[0]==1){
            $sql = "SELECT  count(id) from sueldo WHERE idempleado='$empleado[1]'";
            $res = mysqli_query($bd,$sql);
            $sueldo = mysqli_fetch_row($res);
            if($sueldo[0]==1){
                echo 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Empleado</strong> ya tiene registrada la pre nomina..
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                echo 
                '<form action="addNominaSQL.php" id="frm-addnomina" method="POST">
                    <div class="card" style="width: 50rem;">
                        <div class="card-header">Empleado</div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>'.$empleado[2].'</td><td>'.$empleado[3].'</td><td>'.$empleado[4].'</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>';
            }
            else{
                echo 
                '<form action="addNominaSQL.php" method="POST">
                <div class="card" style="width: 50rem;">
                    <div class="card-header">Empleado</div>
                    <div class="card-body p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>'.$empleado[2].'</td>
                                    <td>'.$empleado[3].'</td>
                                    <td>'.$empleado[4].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card" style="width: 50rem;">
                    <div class="card-header">Informacion correspondiente el mes laborado</div>
                    <div class="card-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="horasMes" placeholder="N° horas mes" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                                    <td><input type="text" name="horasExtra" placeholder="N° horas extras" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                                    <td><input type="text" name="vhora" placeholder="Valor hora mes" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                                    <td><input type="text" name="bono" placeholder="Valor bono mes" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="center">
                    <input type="hidden" name="id" value='.$empleado[1].'>
                    <button type="submit" class="btn btn-primary btn-dsdv">Registrar</button>
                </div>
            </form>';
        }
    }
    else{
        echo 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Empleado</strong> Empleado no existe..
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
    }
    mysqli_close($bd);
    }   
?>