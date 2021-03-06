<?php include 'template/header.php'?>
<div class="container-fluid">
    <div class="row center py-3">
        <div class="col-6 ">
        <div>
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
            </div> 
            <div class="card" style="width: 40rem;">
              <div class="card-header">
                Registro de Empleado
              </div>
              <div class="card-body ">
                  <form action="addEmpleadoSQL.php" method="POST">
                    <table class="tdEmpleado">
                      <tr>
                        <td>
                             <input type="text" id="cedula" name="cedula" placeholder="Cedula" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                        <td>
                             <input placeholder="Nombres" type="text" id="nombres" name="nombres" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                        <td>
                             <input placeholder="Apellidos" type="text" id="apellidos" name="apellidos" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                      </tr>
                      <tr>
                      <td>
                          <input placeholder="Telefono" type="text" id="telefono" name="telefono" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                        <td colspan="2">
                             <input placeholder="Direccion" type="text" id="direccion" name="direccion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">
                             <input placeholder="Email" type="text" id="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </td>
                      </tr>
                      <tr>
                          <td>
                            <input placeholder="Salario" type="text" id="salario" name="salario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                          </td>
                          <td>
                              <select class="form-select" name="cargo" aria-label="Default select example">
                                <option selected>Selec cargo</option>
                                  <?php
                                        include("modelo/conexion.php");
                                        $bd = conectar();
                                        $sql = "SELECT *FROM cargo";
                                        $result = mysqli_query($bd,$sql);
                                        while($cargo= mysqli_fetch_array($result)){ 
                                            echo "<option value='$cargo[0]'>$cargo[1]</option>";
                                        }
                                    ?>
                              </select>
                          </td>
                          <td>
                          <select class="form-select" name="departamento" aria-label="Default select example">
                                <option selected>Selec Departamento</option>
                                  <?php
                                        $sql = "SELECT *FROM departamento";
                                        $result = mysqli_query($bd,$sql);
                                        while($departamento= mysqli_fetch_array($result)){ 
                                            echo "<option value='$departamento[0]'>$departamento[1]</option>";
                                        }
                                        mysqli_close($bd);
                                    ?>
                              </select>
                          </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="center"><button type="submit" class="btn btn-primary">Agregar</button></td>
                        <td></td>
                      </tr>
                    </table>
                  </form>
              </div>
            </div>
        </div>  
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>

