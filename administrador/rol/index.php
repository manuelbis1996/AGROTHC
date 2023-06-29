<?php
include("../../bd.php");

//codigo para borrar registros
if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM rol WHERE idrol=:idrol");
    $sentencia->bindParam(":idrol",$txtID);
    $sentencia->execute();
    header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT * FROM rol ");
$sentancia->execute();
$lista_tbl_puesto=$sentancia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../template/header.php"); ?>
    <br/>

    <h5>Rol</h5>
    <div class="card">
        <div class="card-header"> 

            <a name="" id="" class="btn btn-primary" 
            href="crear.php" role="button">
            Agregar
            </a> 
            
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Descricion</th>
                            <th scope="col">Acciones</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($lista_tbl_puesto as $registro) {?>
                    
                        <tr class="">

                            <td scope="row"><?php echo $registro['idrol'] ?></td>
                            <td scope="row"><?php echo $registro['rol'] ?></td>

                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['idrol'] ?>" role="button">Editar</a>

                                <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['idrol'] ?>" role="button">Borrar</a>
                            </td>
                            
                        </tr>

                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>

    <?php include("../../template/footer.php"); ?>