<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM rol WHERE idrol=:idrol");
    $sentencia->bindParam(":idrol",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$resgistro["rol"];
}

if($_POST){
    print_r($_POST);

    //Recoletamos datos de metodo post
    $puesto=(isset($_POST["puesto"])?$_POST["puesto"]:"");
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    //preparar la inserccion de datos
    $sentencia=$conexion->prepare("UPDATE rol SET rol=:rol
    WHERE idrol=:idrol");
    //asignado los valores que vienen del metodo post (Los qie vienes del formulario)
    $sentencia->bindParam(":idrol",$txtID);
    $sentencia->bindParam(":rol",$puesto);
    $sentencia->execute();
    header("Location:index.php");
    }

?>


<?php include("../../template/header.php"); ?>
<br/>

    <div class="card">
        <div class="card-header">
            Editar rol
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




                <button type="submit" class="btn btn-success">Editar rol</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>
<?php include("../../template/footer.php"); ?>