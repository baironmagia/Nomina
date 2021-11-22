<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-2">
        <div class="col-3 ">
            <?php
                include("modelo/conexion.php");
                $id=$_GET['descuento'];
                $bd = conectar();
                $sql = "SELECT * FROM descuento WHERE id='$id'";
                $result = mysqli_query($bd,$sql);
                $descuento=mysqli_fetch_array($result);
            ?>
             <form id="frmDescuento" action="editarDescuentoSQL.php" method="POST">
                <div class="mb-3">
                    <label for="arl" class="form-label">ARL</label>
                    <input type="number" class="form-control" id="arl" name="arl" value="<?php echo $descuento[1] ?>" aria-describedby="emailHelp" required>

                    <label for="salud" class="form-label">Salud</label>
                    <input type="number" class="form-control" id="salud" name="salud" value="<?php echo $descuento[2] ?>" aria-describedby="emailHelp" required>

                    <label for="s" class="form-label">Pension</label>
                    <input type="number" class="form-control" id="pension" name="pension" value="<?php echo $descuento[3] ?>" aria-describedby="emailHelp" required>

                    <label for="parafiscal" class="form-label">Parafiscal</label>
                    <input type="number" class="form-control" id="parafiscal" name="parafiscal" value="<?php echo $descuento[4] ?>" aria-describedby="emailHelp" require> 
                    <input type="hidden" name="id" value="<?php echo $descuento[0] ?>">

                    <label for="parafiscal" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="parafiscal" name="fecha" value="<?php echo $descuento[5] ?>" aria-describedby="emailHelp" require> 
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>