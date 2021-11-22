<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-5">
        <div class="col-3 ">
            <?php
                include("modelo/conexion.php");
                $id=$_GET['sueldo'];
                $bd = conectar();
                $sql = "SELECT * FROM sueldo WHERE id='$id'";
                $result = mysqli_query($bd,$sql);
                $sueldo=mysqli_fetch_array($result);
            ?>
            <form action="editarSueldoSQL.php"  method="POST">
                <div class="mb-3">
                    <label for="hmes" class="form-label">N° Horas mes</label>
                    <input type="text" class="form-control" name="hmes" value="<?php echo $sueldo[1] ?>" aria-describedby="emailHelp" required>

                    <label for="hextra" class="form-label">N° Horas extras</label>
                    <input type="text" class="form-control" name="hextra" value="<?php echo $sueldo[2] ?>" aria-describedby="emailHelp" required>

                    <label for="vhora" class="form-label">Valor hora mes</label>
                    <input type="text" class="form-control" name="vhora" value="<?php echo $sueldo[3] ?>" aria-describedby="emailHelp" required>

                    <label for="bono" class="form-label">Valor Bono</label>
                    <input type="text" class="form-control" name="bono" value="<?php echo $sueldo[4] ?>" aria-describedby="emailHelp" required>
                    <input type="hidden" name="id" value="<?php echo $sueldo[0] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>