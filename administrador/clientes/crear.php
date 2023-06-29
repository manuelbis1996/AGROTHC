<?php
include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post
$nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
$telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
$direccion=(isset($_POST["direccion"])?$_POST["direccion"]:"");

//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO cliente(idcliente, nombre, telefono, direccion)
VALUES (null, :nombre, :telefono, :direccion ) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":nombre",$nombre);
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
            Agregar clientes
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono
                    </label>
                    <input type="text"
                        class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefeno">   
                </div>

                <div class="mb-3">      
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text"
                    class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Direccion">
                </div>

                <button type="submit" class="btn btn-success">Agregar cliente</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>
