<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM proveedor WHERE idproveedor=:idproveedor");
    $sentencia->bindParam(":idproveedor",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);

    $proveedor=$resgistro["proveedor"];
    $telefono=$resgistro["telefono"];
    $direccion=$resgistro["direccion"];
}

if($_POST){
    print_r($_POST);
    
    //Recoletamos datos de metodo post
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $proveedor=(isset($_POST["proveedor"])?$_POST["proveedor"]:"");
    $telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
    $direccion=(isset($_POST["direccion"])?$_POST["direccion"]:"");
    
    //preparar la inserccion de datos
    $sentencia=$conexion->prepare("UPDATE proveedor SET proveedor = :proveedor, telefono = :telefono, direccion = :direccion WHERE idproveedor = :idproveedor");
    //asignado los valores que vienen del metodo post (Los qie vienes del formulario)
    $sentencia->bindParam(":idproveedor",$txtID);
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
            Datos del Proveedor
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
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <input type="text"
                    value="<?php echo $proveedor;?>"
                    class="form-control" name="proveedor" id="proveedor" aria-describedby="helpId" placeholder="proveedor">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text"
                    value="<?php echo $telefono;?>"
                    class="form-control" name="telefono" idapellido aria-describedby="helpId" placeholder="telefono">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion
                    </label>
                    <input type="text"
                    value="<?php echo $direccion;?>"
                        class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="direccion">   
                </div>

                

                <button type="submit" class="btn btn-success">Agregar articulos</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


