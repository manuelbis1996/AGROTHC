<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM producto WHERE idproducto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);

    $descripcion=$resgistro["descripcion"];
    $proveedor=$resgistro["proveedor"];
    $precio=$resgistro["precio"];
    $existencia=$resgistro["existencia"];
}

if($_POST){
    print_r($_POST);

    // Recoletamos datos de metodo post
    $txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
    $descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");
    $proveedor=(isset($_POST["proveedor"])?$_POST["proveedor"]:"");
    $precio=(isset($_POST["precio"])?$_POST["precio"]:"");
    $existencia=(isset($_POST["existencia"])?$_POST["existencia"]:"");

    // Preparar la actualización de datos
    $sentencia=$conexion->prepare("UPDATE producto SET descripcion = :descripcion, proveedor= :proveedor, precio = :precio, existencia = :existencia WHERE idproducto=:idproducto");

    // Asignar los valores que vienen del método POST (Los que vienen del formulario)
    $sentencia->bindParam(":idproducto",$txtID);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":proveedor",$proveedor);
    $sentencia->bindParam(":precio",$precio);
    $sentencia->bindParam(":existencia",$existencia);
    $sentencia->execute();
    header("Location:index.php");
}
?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Editar producto
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="txtID" class="form-label">ID:</label>
                    <input type="text"
                    value="<?php echo $txtID;?>"
                    class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text"
                    value="<?php echo $descripcion;?>"
                    class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                </div>

                <div class="mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <input type="text"
                    value="<?php echo $proveedor;?>"
                    class="form-control" name="proveedor" id="proveedor" apellido aria-describedby="helpId" placeholder="Proveedor">
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio
                    </label>
                    <input type="text"
                    value="<?php echo $precio;?>"
                        class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="precio">   
                </div>

                <div class="mb-3">      
                    <label for="existencia" class="form-label">Existencia</label>
                    <input type="text"
                    value="<?php echo $existencia;?>"
                    class="form-control" name="existencia" id="existencia" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Editar producto</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


