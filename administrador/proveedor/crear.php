<?php 

include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post

$proveedor=(isset($_POST["proveedor"])?$_POST["proveedor"]:"");
$telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
$direccion=(isset($_POST["direccion"])?$_POST["direccion"]:"");

//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO proveedor (idproveedor, proveedor, telefono, direccion)
VALUES (null, :proveedor, :telefono, :direccion ) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":proveedor",$proveedor);
$sentencia->bindParam(":telefono",$telefono);
$sentencia->bindParam(":direccion",$direccion);

$sentencia->execute();
header("Location:index.php");
}


?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Agregar proveedor
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <input type="text"
                    class="form-control" name="proveedor" id="proveedor" aria-describedby="helpId" placeholder="proveedor">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text"
                    class="form-control" name="telefono" idapellido aria-describedby="helpId" placeholder="telefono">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion
                    </label>
                    <input type="text"
                        class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="direccion">   
                </div>

                

                <button type="submit" class="btn btn-success">Agregar proveedor</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


