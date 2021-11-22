<?php include 'template/header.php'?>
<?php  
    $id=$_SESSION['id'];
    $rol=$_SESSION['rolNombre'];
    $cedula=$_SESSION['cedula'];  

    include("modelo/conexion.php");
    $bd = conectar();
   
    if($rol==='Administrador'){
        $sql = "SELECT  *FROM nominaEmpleado";
    }
    else{
        $sql = "SELECT  *FROM nominaEmpleado where id=$id";
    }
    function opciones($id,$rol){
        switch($rol){ 
            case 'Administrador':return "<td><a class='text-success' href='editarSueldo.php?sueldo=$id'><i class='bi bi-pencil-square'></i> </a></td>";
            default:return "";
        }  
    }    
?>

<div class="container-fluid">
    <div class="row center py-2">
    <div class="col-md-7">
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
        <div class="card" style="width: 50rem;">
            <div class="card-header">
                lista Nomina
            </div>
            <div class="p-4">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Sueldo Neto</th>
                            <th scope="col" colspan="2">Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $n=1;
                            $result = mysqli_query($bd,$sql);
                            while($neto= mysqli_fetch_array($result)){  
                                echo "<tr><td scope='row'>$n</td><td>$neto[2]</td><td>$neto[3]</td><td>$neto[4]</td><td>$$neto[5]</td>".opciones($neto[0],$rol)."<td><a class='text-danger' href='reportes/report.php?id=$neto[1]'><i class='bi bi-file-pdf'></i></a></td></tr>";
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