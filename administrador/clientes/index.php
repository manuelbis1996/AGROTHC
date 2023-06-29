<?php
include("../../bd.php");

//codigo para borrar registros
if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM cliente WHERE idcliente=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT * FROM `cliente`");
$sentancia->execute();
$lista_tbl_articulos=$sentancia->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include("../../template/header.php"); ?>
    <br/>
    <h5>Cliente</h5>
    <div class="card">
        <div class="card-header">
        
            <a name="" id="" class="btn btn-primary" 
            href="crear.php" role="button">
            Agregar
            </a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefeno</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($lista_tbl_articulos as $registro) {?>
                            
                            <tr class="">
                                <td scope="row"><?php echo $registro['idcliente'] ?></td>
                                <td><?php echo $registro['nombre'] ?></td>
                                <td><?php echo $registro['telefono'] ?></td>
                                <td><?php echo $registro['direccion'] ?></td>

                                <td> <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['idcliente'] ?>" role="button">Editar</a>
                                <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['idcliente'] ?>" role="button">Borrar</a> </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
            
        </div>
        
    </div>

    <?php include("../../template/footer.php"); ?>
