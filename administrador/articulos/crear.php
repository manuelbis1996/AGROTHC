<?php 

include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post
$tipo=(isset($_POST["tipo"])?$_POST["tipo"]:"");
$cantidad=(isset($_POST["cantidad"])?$_POST["cantidad"]:"");
$costo=(isset($_POST["costo"])?$_POST["costo"]:"");
$fecha=(isset($_POST["fecha"])?$_POST["fecha"]:"");
//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO tbl_articulos(id,tipo,cantidad,costo,fecha)
VALUES (null, :tipo,:cantidad ,:costo ,:fecha ) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":tipo",$tipo);
$sentencia->bindParam(":cantidad",$cantidad);
$sentencia->bindParam(":costo",$costo);
$sentencia->bindParam(":fecha",$fecha);
$sentencia->execute();
header("Location:index.php");
}


?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Datos del articulos
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text"
                    class="form-control" name="tipo" id="tipo" aria-describedby="helpId" placeholder="Tipo">
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Cantidad</label>
                    <input type="text"
                    class="form-control" name="cantidad" idapellido aria-describedby="helpId" placeholder="Cantidad">
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label">Costo
                    </label>
                    <input type="text"
                        class="form-control" name="costo" id="costo" aria-describedby="helpId" placeholder="Costo">   
                </div>

                <div class="mb-3">      
                    <label for="fecha" class="form-label">Fecha de ingreso</label>
                    <input type="date"
                    class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Agregar articulos</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


