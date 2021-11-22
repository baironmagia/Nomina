<?php include 'template/header.php'?>
    <div class="container">
        <div class="row py-2">
            <div class="col-3">
                <form action="addNominaAJAX.php" method="POST" id="frmaddN">
                    <div class="card" style="width: 17rem;">
                        <div class="card-header">
                            Registrar nomina
                        </div>
                        <div class="card-body card-flex">
                            <input type="text" name="cedula" id="input-cedula" placeholder="Cedula" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <button type="submit" class="btn btn-primary btn-buscar" id="btn-buscar">Buscar</button>
                        </div> 
                    </div>
                </form>  
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
            <div class="col-9" id="divNomina">
            
            </div> 
        </div>   
    </div>

<?php include 'template/footer.php'?>

