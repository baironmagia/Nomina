<?php include 'template/header.php'?>

<div class="container-fluid">
    <div class="row center py-2">
    <div class="col-md-7">
    <div class="my-4">
        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Eliminado'){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Eliminado</strong> departamento con exito..
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            }
        ?> 

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
            </div>
        <div class="card" style="width: 50rem;">
                <div class="card-header">
                    Devengado
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Alimentacion %</th>
                                <th scope="col">Aux Vivienda %</th>
                                <th scope="col">Aux Transporte %</th>
                                <th scope="col">Horas Extras %</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("modelo/conexion.php");
                                $bd = conectar();
                                $sql = "SELECT id,alimentacion,vivienda,transporte,hextra,fecha from devengado";
                                $result = mysqli_query($bd,$sql);
                                $devengado = mysqli_fetch_row($result);
                                echo "<tr><td>$devengado[1]</td><td>$devengado[2]</td><td>$devengado[3]</td><td>$devengado[4]</td><td>$devengado[5]<td><a class='text-success' href='editarDevengado.php?devengado=$devengado[0]'><i class='bi bi-pencil-square'></i> </a></td></tr>";
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include 'template/footer.php'?>