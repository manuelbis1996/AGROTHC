<?php
include("../../bd.php");

//codigo para borrar registros
if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM producto WHERE idproducto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT *,(SELECT proveedor FROM proveedor Where proveedor.idproveedor = producto.proveedor limit 1) as proveedor FROM `producto`");
$sentancia->execute();
$lista_tbl_articulos=$sentancia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../template/header.php"); ?>
    <br/>

    <h5>Producto</h5>
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
                            <th scope="col">descripcion</th>
                            <th scope="col">proveedor</th>
                            <th scope="col">precio</th>
                            <th scope="col">existencia</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($lista_tbl_articulos as $registro) {?>

                        <tr class="">
                            <td scope="row"><?php echo $registro['idproducto'] ?></td>
                            <td><?php echo $registro['descripcion'] ?></td>
                            <td><?php echo $registro['proveedor'] ?></td>
                            <td><?php echo $registro['precio'] ?></td>
                            <td><?php echo $registro['existencia'] ?></td>
                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['idproducto'] ?>" role="button">Editar</a>

                                <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['idproducto'] ?>" role="button">Borrar</a>
                            </td>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>

    <?php include("../../template/footer.php"); ?>


