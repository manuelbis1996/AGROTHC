<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM tbl_articulos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);

 
    $tipo=$resgistro["tipo"];
    $cantidad=$resgistro["cantidad"];
    $costo=$resgistro["costo"];
    $fecha=$resgistro["fecha"];
}

if($_POST){
    print_r($_POST);

    //Recoletamos datos de metodo post
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $tipo=(isset($_POST["tipo"])?$_POST["tipo"]:"");
    $cantidad=(isset($_POST["cantidad"])?$_POST["cantidad"]:"");
    $costo=(isset($_POST["costo"])?$_POST["costo"]:"");
    $fecha=(isset($_POST["fecha"])?$_POST["fecha"]:"");
    //preparar la inserccion de datos
    $sentencia=$conexion->prepare("UPDATE tbl_articulos SET 
    tipo=:tipo, cantidad =:cantidad, costo=:costo, fecha=:fecha WHERE id=:id");
    //asignado los valores que vienen del metodo post (Los qie vienes del formulario)
    $sentencia->bindParam(":id",$txtID);
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
                    <label for="txtID" class="form-label">ID:</label>
                    <input type="text"
                    value="<?php echo $txtID;?>"
                    class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text"
                    value="<?php echo $tipo;?>"
                    class="form-control" name="tipo" id="tipo" aria-describedby="helpId" placeholder="Tipo">
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text"
                    value="<?php echo $cantidad;?>"
                    class="form-control" name="cantidad" id="cantidad" apellido aria-describedby="helpId" placeholder="Cantidad">
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label">Costo
                    </label>
                    <input type="text"
                    value="<?php echo $costo;?>"
                        class="form-control" name="costo" id="costo" aria-describedby="helpId" placeholder="Costo">   
                </div>

                <div class="mb-3">      
                    <label for="fecha" class="form-label">Fecha de ingreso</label>
                    <input type="date"
                    value="<?php echo $fecha;?>"
                    class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Actualizar articulos</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


