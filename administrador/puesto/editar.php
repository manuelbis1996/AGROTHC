<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM tbl_puesto WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$resgistro["descripción"];
}

if($_POST){
    print_r($_POST);

    //Recoletamos datos de metodo post
    $puesto=(isset($_POST["puesto"])?$_POST["puesto"]:"");
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    //preparar la inserccion de datos
    $sentencia=$conexion->prepare("UPDATE tbl_puesto SET descripción=:puesto
    WHERE id=:id");
    //asignado los valores que vienen del metodo post (Los qie vienes del formulario)
    $sentencia->bindParam(":id",$txtID);
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
                    <label for="txtID" class="form-label">ID:</label>
                    <input type="text"
                    value="<?php echo $txtID;?>"
                    class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
                </div>


                <div class="mb-3">
                    <label for="puesto" class="form-label">Descricion:</label>
                    <input type="text"
                    value="<?php echo $nombredelpuesto;?>"
                    class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">
                </div>




                <button type="submit" class="btn btn-success">Actualizar puesto</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>
<?php include("../../template/footer.php"); ?>