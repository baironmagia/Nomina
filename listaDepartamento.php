<?php include 'template/header.php'?>
<?php  
    $rol=$_SESSION['rolNombre'];

    include("modelo/conexion.php");
    $bd = conectar();

    function opciones($id,$rol){
        $confirmacion='return confirm("Estas seguro?")';
        switch($rol){ 
            case 'Administrador':return "<td><a onclick='$confirmacion' class='text-danger' href='eliminarDepartamentoSQL.php?departamento=$id'><i class='bi bi-trash'></i> </a></td><td><a class='text-success' href='editarDepartamento.php?departamento=$id'><i class='bi bi-pencil-square'></i> </a></td></tr>";
            default:return "";
        }  
    }    
?>
<div class="container-fluid">
    <div class="row center py-2">
    <div class="col-md-4">
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
        <div class="card">
                <div class="card-header">
                    lista de Deapartamentos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <?php if($rol=='Administrador') echo '<th scope="col" colspan="2">Opciones</th>';?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n=1;
                                $sql = "SELECT *FROM departamento";
                                $result = mysqli_query($bd,$sql);
                                while($departamento= mysqli_fetch_array($result)){  
                                    echo "<tr><td scope='row'>$n</td><td>$departamento[1]</td>".opciones($departamento[0],$rol);
                                    $n++;
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
<?php include 'template/footer.php'?>