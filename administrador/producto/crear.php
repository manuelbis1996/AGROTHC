<?php 

include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post
$descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");
$proveedor=(isset($_POST["proveedor"])?$_POST["proveedor"]:"");
$precio=(isset($_POST["precio"])?$_POST["precio"]:"");
$existencia=(isset($_POST["existencia"])?$_POST["existencia"]:"");
//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO producto(idproducto, descripcion, proveedor, precio, existencia)
VALUES (null, :descripcion, :proveedor, :precio ,:existencia ) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":descripcion",$descripcion);
$sentencia->bindParam(":proveedor",$proveedor);
$sentencia->bindParam(":precio",$precio);
$sentencia->bindParam(":existencia",$existencia);
$sentencia->execute();
header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT * FROM `proveedor`");
$sentancia->execute();
$lista_tbl_proveedor=$sentancia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Agregar del producto
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text"
                    class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Proveedor</label>
                    <select class="form-select form-select-lg" name="rol" id="rol">

                    <?php foreach ($lista_tbl_proveedor as $registro) {?>
                    <option value="<?php echo $registro['idproveedor'] ?>">
                    <?php echo $registro['proveedor'] ?></option>

                    <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio
                    </label>
                    <input type="text"
                        class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio">   
                </div>

                <div class="mb-3">
                    <label for="existencia" class="form-label">Existencia
                    </label>
                    <input type="text"
                        class="form-control" name="existencia" id="existencia" aria-describedby="helpId" placeholder="Existencia">   
                </div>

                <button type="submit" class="btn btn-success">Agregar producto</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


