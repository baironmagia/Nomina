<?php include 'template/header.php'?>
<div class="container-fluid">
    <div class="row center py-4">
        <div class="col-3 ">
            <div class="card">
                <div class="card-header">
                    Agregar Departamento
                </div>
                <div class="card-body">
                    <form id="frm_departamentos" action="addDepartamentoSQL.php" name="frm_departamentos" method="POST">
                        <div class="mb-3">
                            <label for="departamento" class="form-label">Departamtento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" aria-describedby="emailHelp" required>
                        </div>
                        <div class="center py-1">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div> 
                    </form>
                </div>
            </div>
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
        </div> 
        </div>  
    </div>
</div>
<?php include 'template/footer.php'?>

