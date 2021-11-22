<?php include 'template/header.php'?>
<?php 
    $id=$_SESSION['id'];  
    $rol=$_SESSION['rolNombre'];

    include("modelo/conexion.php");
    $bd = conectar();

    if($rol==='Administrador'){
        $sql = "SELECT e.id,e.cedula,e.nombres,e.apellidos,e.telefono,c.nombre,d.nombre,e.direccion,e.email
        FROM empleado AS e inner join departamento AS d ON e.iddepartamento=d.id inner join cargo AS c ON e.idcargo = c.id;";
    }
    else{
        $sql = "SELECT e.id,e.cedula,e.nombres,e.apellidos,e.telefono,c.nombre,d.nombre,e.direccion,e.email
        FROM empleado AS e inner join departamento AS d ON e.iddepartamento=d.id inner join cargo AS c ON e.idcargo =c.id and e.id=$id;"; 
    }
    function opciones($id,$rol){
        $confirmacion='return confirm("Estas seguro?")'; 
        switch($rol){
            case 'Administrador':return "<td><a onclick='$confirmacion' class='text-danger' href='eliminarEmpleadoSQL.php?empleado=$id'><i class='bi bi-trash'></i> </a></td>";
            default:return "";
        }  
    }    
?>

<div class="container-fluid">
    <div class="row center py-2">
        <div class="col-md-10">
            <div class="my-2">
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
                <strong>Error</strong> Este empleado no se puede eleminar..
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
        <div class="card" style="width: 70rem;">
                <div class="card-header">
                    lista de Empleados
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Email</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $n=1;  
                                $result = mysqli_query($bd,$sql);
                                while($empleado= mysqli_fetch_array($result)){  
                                    if($empleado[0]!=0){
                                        echo "<tr><td scope='row'>$n</td><td>$empleado[1]</td><td>$empleado[2]</td><td>$empleado[3]</td><td>$empleado[4]</td><td>$empleado[5]</td><td>$empleado[6]</td><td>$empleado[7]</td><td>$empleado[8]</td>".opciones($empleado[0],$rol)."<td><a class='text-success' href='editarEmpleado.php?empleado=$empleado[0]'><i class='bi bi-pencil-square'></i> </a></td></tr>";
                                        $n++;
                                    }   
                                }
                            ?>
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
<?php include 'template/footer.php'?>