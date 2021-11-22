<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-3">
        <div class="col-6 ">
            <div class="card" style="width: 40rem;">
              <div class="card-header">
                Etidar Empleado
              </div>
              <div class="card-body ">
              <?php
                    include("modelo/conexion.php");
                    $id=$_GET['empleado'];
                    $bd = conectar();
                    $sql = "SELECT * FROM empleado WHERE id='$id'";
                    $result = mysqli_query($bd,$sql);
                    $empleado=mysqli_fetch_row($result);
                ?>
              
              <form action="editarEmpleadoSQL.php" method="POST">
                    <table class="tdEmpleado">
                      <tr>
                        <td><input type="text" id="cedula" value="<?php echo $empleado[1] ?>" name="cedula" placeholder="Cedula" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                        <td><input placeholder="Nombres" value="<?php echo $empleado[2] ?>" type="text" id="nombres" name="nombres" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                        <td><input placeholder="Apellidos" value="<?php echo $empleado[3] ?>" type="text" id="apellidos" name="apellidos" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                      </tr>
                      <tr>
                      <td><input placeholder="Telefono" value="<?php echo $empleado[5] ?>" type="text" id="telefono" name="telefono" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                      <td colspan="2"><input placeholder="Direccion" value="<?php echo $empleado[6] ?>" type="text" id="direccion" name="direccion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                      </tr>
                      <tr>
                        <td colspan="3"><input placeholder="Email" value="<?php echo $empleado[7] ?>" type="text" id="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                      </tr>
                      <tr>
                        <td>
                            <input placeholder="Salario" type="text" value="<?php echo $empleado[4] ?>" id="salario" name="salario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <input type="hidden" name="id" value="<?php echo $empleado[0] ?>">
                        </td>
                          <td>
                              <select class="form-select" name="cargo" aria-label="Default select example"> 
                                <?php
                                    $sql = "SELECT  nombre from cargo WHERE id='$empleado[9]'";
                                    $result = mysqli_query($bd,$sql);
                                    $seleCargo = mysqli_fetch_row($result);

                                    "<option selected>$seleCargo[0]</option>";

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
                                  <?php
                                        $sql = "SELECT  nombre from departamento WHERE id='$empleado[8]'";
                                        $result = mysqli_query($bd,$sql);
                                        $seleDepartamento = mysqli_fetch_row($result);

                                        "<option selected>$seleDepartamento[0]</option>";

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
                        <td class="center"><button type="submit" class="btn btn-primary">Actualizar</button></td>
                        <td></td>
                      </tr>
                    </table>
                  </form>
              </div>
            </div>
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>