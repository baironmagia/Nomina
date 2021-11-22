<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-2">
        <div class="col-3 ">
            <?php
                include("modelo/conexion.php");
                $id=$_GET['devengado'];
                $bd = conectar();
                $sql = "SELECT * FROM devengado WHERE id='$id'";
                $result = mysqli_query($bd,$sql);
                $devengado=mysqli_fetch_array($result);
            ?>
             <form id="frmDescuento" action="editarDescuentoSQL.php" method="POST">
                <div class="mb-3">
                    <label for="arl" class="form-label">Alimentacion</label>
                    <input type="number" class="form-control" id="arl" name="alimentacion" value="<?php echo $devengado[1] ?>" aria-describedby="emailHelp" required>

                    <label for="salud" class="form-label">Vivienda</label>
                    <input type="number" class="form-control" id="salud" name="vivienda" value="<?php echo $devengado[2] ?>" aria-describedby="emailHelp" required>

                    <label for="s" class="form-label">Transporte</label>
                    <input type="number" class="form-control" id="pension" name="transporte" value="<?php echo $devengado[3] ?>" aria-describedby="emailHelp" required>

                    <label for="parafiscal" class="form-label">Horas Extras</label>
                    <input type="number" class="form-control" id="parafiscal" name="hextra" value="<?php echo $devengado[4] ?>" aria-describedby="emailHelp" require> 
                    <input type="hidden" name="id" value="<?php echo $devengado[0] ?>">

                    <label for="parafiscal" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="parafiscal" name="fecha" value="<?php echo $devengado[5] ?>" aria-describedby="emailHelp" require> 
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>