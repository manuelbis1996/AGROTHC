<?php
include("../../bd.php");


//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM cliente WHERE idcliente=:idcliente");
    $sentencia->bindParam(":idcliente",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre=$resgistro["nombre"];
    $telefono=$resgistro["telefono"];
    $direccion=$resgistro["direccion"];
}


if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post
$txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
$nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
$telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
$direccion=(isset($_POST["direccion"])?$_POST["direccion"]:"");

//preparar la inserccion de datos
$sentencia=$conexion->prepare("UPDATE cliente set nombre=:nombre, telefono=:telefono, direccion=:direccion WHERE idcliente=:idcliente ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":idcliente",$txtID);
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
            Editar clientes
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                    <label for="txtID" class="form-label">ID</label>
                    <input type="text"
                    value="<?php echo $txtID;?>"
                    class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
                </div>


                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    value="<?php echo $nombre;?>"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono
                    </label>
                    <input type="text"
                    value="<?php echo $telefono;?>"
                        class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefeno">   
                </div>

                <div class="mb-3">      
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text"
                    value="<?php echo $direccion;?>"
                    class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Direccion">
                </div>

                <button type="submit" class="btn btn-success">Editar cliente</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>



