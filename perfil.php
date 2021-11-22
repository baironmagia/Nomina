<?php include 'template/header.php'?>
<?php  
    $id=$_SESSION['id'];  
    include("modelo/conexion.php");
    $bd = conectar();
    $sql = "SELECT *from perfil where eid=$id";
    $result = mysqli_query($bd,$sql);
    $perfil = mysqli_fetch_row($result);
?>
<div class="container-fluid">
    <div class="row center py-3">
        <div class="col-5 ">
          <?php
              if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Error</strong> vuelve a intentarlo..
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
              }
          ?> 
          <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='Actualizado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Actualizacion</strong> se hizo con exito..
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>       
          <div class="card" style="width: 35rem;">
            <div class="card-header">Perfil</div>
              <div class="card-body">
                  <form action="editarPerfilSQL.php" enctype="multipart/form-data" method="POST">
                  <div class="conten-perfil">
                    <div class="columna1">
                      <table>
                          <tr>
                            <td><label for="cedula" class="form-label">Cedula</label></td>
                            <td><input type="text" id="cedula" value="<?php echo $perfil[1] ?>" name="cedula" placeholder="Cedula" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="nombre" class="form-label">Nombres</label></td>
                            <td><input placeholder="Nombres" value="<?php echo $perfil[2] ?>" type="text" id="nombres" name="nombres" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="apellido" class="form-label">Apellido</label></td>
                            <td><input placeholder="Apellidos" value="<?php echo $perfil[3] ?>" type="text" id="apellidos" name="apellidos" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="telefono" class="form-label">Telefono</label></td>
                            <td><input placeholder="Telefono" value="<?php echo $perfil[4] ?>" type="text" id="telefono" name="telefono" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="direccion" class="form-label">Direccion</label></td>
                            <td><input placeholder="Direccion" value="<?php echo $perfil[5] ?>" type="text" id="direccion" name="direccion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="email" class="form-label">Email</label></td>
                            <td><input placeholder="Email" value="<?php echo $perfil[6] ?>" type="text" id="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                          </tr>
                          <tr>
                            <td><label for="cargo" class="form-label">Cargo</label></td>
                            <td>
                              <select class="form-select select-perfil" name="cargo" aria-label="Default select example">
                                <?php
                                    $sql = "SELECT *FROM cargo";
                                    $result = mysqli_query($bd,$sql);
                                    "<option selected>$perfil[7]</option>";
                                    while($cargo= mysqli_fetch_array($result)){ 
                                      echo "<option value='$cargo[0]'>$cargo[1]</option>";
                                    }
                                ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                          <td><label for="departemento" class="form-label">Departamento</label></td>
                          <td>
                            <select class="form-select select-perfil" name="departamento" aria-label="Default select example">
                              <?php
                                  $sql = "SELECT *FROM departamento";
                                  $result = mysqli_query($bd,$sql);

                                  "<option selected>$perfil[8]</option>";
                                  while($departamento= mysqli_fetch_array($result)){ 
                                      echo "<option value='$departamento[0]'>$departamento[1]</option>";
                                  }
                                  mysqli_close($bd);
                              ?>
                            </select>
                          </td>
                          </tr>
                      </table>
                    </div>
                    <div class="columna2">

                    <?php 
                    echo "<div id='img-perfil'><img src='fotos/$perfil[0].jpg'></div>";
                    ?>  
                    <input type="file" class="form-control" name="txtImagen" id="inputGroupFile01">
                    <table>
                        <tr>
                        <td><label for="usuario" class="form-label">Usuario</label></td>
                        </tr>
                        <tr>
                        <td><input type="text" id="usuario" value="<?php echo $perfil[9] ?>" name="usuario" placeholder="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                        </tr>
                        <tr><td><label for="clave" class="form-label">Contraseña</label></td></tr>
                        <tr> <td><input type="password" id="clave" value="<?php echo $perfil[10] ?>" name="clave" placeholder="Contraseña" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td></tr>
                    </table>
                  </div>
                  </div>
                  <div class="fil">
                    <input type="hidden" name="id" value="<?php echo $perfil[0] ?>">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                  </form>
              </div>
            </div>
        </div>  
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>



