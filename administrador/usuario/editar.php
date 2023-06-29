<?php
include("../../bd.php");

//aqui resivimos los datos del index la cual nos pasa el id a editar por el link
if(isset( $_GET['txtID'] )){
    //pasamos ese dato ala variable
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    //realizamos una sentecias para buscar el puesto por la id
    $sentencia=$conexion->prepare("SELECT * FROM usuario WHERE idusuario=:idusuario");
    $sentencia->bindParam(":idusuario",$txtID);
    $sentencia->execute();
    //aqui sacamos la descricion del puesto y lo pasamos ala variable
    $resgistro= $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre=$resgistro["nombre"];
    $correo=$resgistro["correo"];
    $usuario=$resgistro["usuario"];
    $clave=$resgistro["clave"];
    $rol=$resgistro["rol"];
}

if($_POST){
    print_r($_POST);
    
    //Recoletamos datos de metodo post
    $txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
    $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
    $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
    $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
    $clave=(isset($_POST["clave"])?$_POST["clave"]:"");
    $rol=(isset($_POST["rol"])?$_POST["rol"]:"");
    
    
    //preparar la inserccion de datos
    $sentencia=$conexion->prepare("UPDATE usuario SET nombre = :nombre, correo = :correo, usuario = :usuario, clave = :clave, rol = :rol WHERE idusuario = :idusuario");
    //asignado los valores que vienen del metodo post (Los qie vienes del formulario)
    $sentencia->bindParam(":idusuario",$txtID);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":clave",$clave);
    $sentencia->bindParam(":rol",$rol);
    
    $sentencia->execute();
    header("Location:index.php");
    }
?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Editar usuario
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
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    value="<?php echo $nombre;?>"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="text"
                    value="<?php echo $correo;?>"
                    class="form-control" name="correo" idapellido aria-describedby="helpId" placeholder="correo">
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario
                    </label>
                    <input type="text"
                    value="<?php echo $usuario;?>"
                        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">   
                </div>

                <div class="mb-3">
                    <label for="clave" class="form-label">Clave
                    </label>
                    <input type="text"
                    value="<?php echo $clave;?>"
                        class="form-control" name="clave" id="clave" aria-describedby="helpId" placeholder="clave">   
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol
                    </label>
                    <input type="text"
                    value="<?php echo $rol;?>"
                        class="form-control" name="rol" id="rol" aria-describedby="helpId" placeholder="rol">   
                </div>

                

                <button type="submit" class="btn btn-success">Editar usuario</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


