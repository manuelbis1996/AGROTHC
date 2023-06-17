<?php
include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post
$puesto=(isset($_POST["puesto"])?$_POST["puesto"]:"");
//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO tbl_puesto(id,descripción)
VALUES (null, :puesto) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":puesto",$puesto);
$sentencia->execute();
header("Location:index.php");
}


?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Datos del puesto
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="puesto" class="form-label">Descricion</label>
                    <input type="text"
                    class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">
                </div>




                <button type="submit" class="btn btn-success">Agregar puesto</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>