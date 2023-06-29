<?php 

include("../../bd.php");

if($_POST){
print_r($_POST);

//Recoletamos datos de metodo post

$nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
$correo=(isset($_POST["correo"])?$_POST["correo"]:"");
$usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
$clave=(isset($_POST["clave"])?$_POST["clave"]:"");
$rol=(isset($_POST["rol"])?$_POST["rol"]:"");


//preparar la inserccion de datos
$sentencia=$conexion->prepare("INSERT INTO usuario (idusuario, nombre, correo, usuario, clave, rol)
VALUES (null, :nombre, :correo, :usuario, :clave, :rol) ");
//asignado los valores que vienen del metodo post (Los qie vienes del formulario)
$sentencia->bindParam(":nombre",$nombre);
$sentencia->bindParam(":correo",$correo);
$sentencia->bindParam(":usuario",$usuario);
$sentencia->bindParam(":clave",$clave);
$sentencia->bindParam(":rol",$rol);

$sentencia->execute();
header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT * FROM rol ");
$sentancia->execute();
$lista_tbl_puesto=$sentancia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Agregar usuario
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="text"
                    class="form-control" name="correo" idapellido aria-describedby="helpId" placeholder="correo">
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario
                    </label>
                    <input type="text"
                        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">   
                </div>

                <div class="mb-3">
                    <label for="clave" class="form-label">Clave
                    </label>
                    <input type="password"
                        class="form-control" name="clave" id="clave" aria-describedby="helpId" placeholder="clave">   
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select form-select-lg" name="rol" id="rol">

                    <?php foreach ($lista_tbl_puesto as $registro) {?>

                        <option value="<?php echo $registro['idrol'] ?>">
                        <?php echo $registro['rol'] ?></option>
                        
                        <?php } ?>
                    </select>
                </div>
                

                <button type="submit" class="btn btn-success">Agregar usuarios</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


