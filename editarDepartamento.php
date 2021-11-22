<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-5">
        <div class="col-3 ">
            <?php
                include("modelo/conexion.php");
                $id=$_GET['departamento'];
                $bd = conectar();
                $sql = "SELECT * FROM departamento WHERE id='$id'";
                $result = mysqli_query($bd,$sql);
                $departamento=mysqli_fetch_array($result);
            ?>
            <form id="frm_departamentos" action="editarDepartamentoSQL.php" name="frm_departamentos" method="POST">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">Empleado</div>
                    <div class="card-body p-4">
                        <label for="departamento" class="form-label">Departamtento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $departamento[1] ?>" aria-describedby="emailHelp" required>
                        <input type="hidden" name="id" value="<?php echo $departamento[0] ?>">
                    </div>
                    <div class="center py-1">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
                
            </form>
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>