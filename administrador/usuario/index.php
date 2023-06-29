<?php
include("../../bd.php");

//codigo para borrar registros
if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM usuario WHERE idusuario=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location:index.php");
}

// codigo para mostrar registros
$sentancia=$conexion->prepare("SELECT *, (SELECT rol FROM rol Where rol.idrol = usuario.rol limit 1) as rol FROM `usuario`");
$sentancia->execute();
$lista_tbl_articulos=$sentancia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../template/header.php"); ?>
    <br/>

    <h5>Usuarios</h5>
    <div class="card">
        <div class="card-header"> 
            <a name="" id="" class="btn btn-primary" 
            href="crear.php" role="button">
            Agregar
            </a> 
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">nombre</th>
                            <th scope="col">correo</th>
                            <th scope="col">usuario</th>
                            <th scope="col">clave</th>
                            <th scope="col">rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($lista_tbl_articulos as $registro) {?>

                        <tr class="">
                            <td scope="row"><?php echo $registro['idusuario'] ?></td>
                            <td><?php echo $registro['nombre'] ?></td>
                            <td><?php echo $registro['correo'] ?></td>
                            <td><?php echo $registro['usuario'] ?></td>
                            <td><?php echo $registro['clave'] ?></td>
                            <td><?php echo $registro['rol'] ?></td>
                            <td>
                                <a class="btn btn-info" href="editar.php?txtID=<?php echo $registro['idusuario'] ?>" role="button">Editar</a>

                                <a class="btn btn-danger" href="index.php?txtID=<?php echo $registro['idusuario'] ?>" role="button">Borrar</a>
                            </td>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>

    <?php include("../../template/footer.php"); ?>


