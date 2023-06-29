<?php
$url_base="http://localhost/AGROTHC/";

session_start();

if(!isset($_SESSION['usuario'])){
    header("location:".$url_base."login.php");
}
else{
    
}
?>


<!doctype html>
<html lang="es">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <header>
    <!-- place navbar here -->
    </header>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">

            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base; ?>" aria-current="page">AGROTHC<span class="visually-hidden">(current)</span></a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Administracion
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="<?php echo $url_base; ?>administrador/producto">Producto</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base; ?>administrador/clientes">Clientes</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base; ?>administrador/rol">Rol</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base; ?>administrador/proveedor">Proveedor</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base; ?>administrador/usuario">Usuario</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base; ?>facturar.php" aria-current="page">Facturacion<span class="visually-hidden">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?php echo $url_base; ?>cerrar.php">Cerrar sesion</a>
            </li>
        </ul>
    </nav>

    

    <main class="container">
