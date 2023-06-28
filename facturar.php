<<?php
// Archivo: facturar.php

// Incluir el archivo de configuración de la base de datos
require_once 'config.php';

// Verificar si se envió el formulario de facturación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $clienteId = $_POST['cliente'];
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];

    // Calcular el total de la factura
    $totalFactura = 0;
    foreach ($productos as $key => $producto) {
        $cantidad = $cantidades[$key];
        $precio = obtenerPrecioProducto($producto); // Función a implementar para obtener el precio del producto desde la base de datos
        $subtotal = $precio * $cantidad;
        $totalFactura += $subtotal;
    }

    // Generar un número de factura único
    $numeroFactura = generarNumeroFactura();

    // Insertar la información de la factura en la tabla 'factura'
    $fechaFactura = date('Y-m-d H:i:s');
    $query = "INSERT INTO factura (nofactura, fecha, usuario, codcliente, totalfactura) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('isiii', $numeroFactura, $fechaFactura, $usuarioId, $clienteId, $totalFactura);
    $stmt->execute();
    $stmt->close();

    // Insertar los detalles de la factura en la tabla 'detallefactura'
    foreach ($productos as $key => $producto) {
        $cantidad = $cantidades[$key];
        $precio = obtenerPrecioProducto($producto); // Función a implementar para obtener el precio del producto desde la base de datos
        $preciototal = $precio * $cantidad;

        $query = "INSERT INTO detallefactura (nofactura, codproducto, cantidad, preciototal) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('iiid', $numeroFactura, $producto, $cantidad, $preciototal);
        $stmt->execute();
        $stmt->close();

        // Actualizar la existencia del producto en la tabla 'producto'
        actualizarExistenciaProducto($producto, $cantidad); // Función a implementar para actualizar la existencia del producto en la base de datos
    }

    // Redireccionar a una página de éxito o mostrar un mensaje de éxito
    header('Location: factura_exitosa.php');
    exit();
}

// Obtener la lista de clientes desde la base de datos
$query = "SELECT idcliente, nombre FROM cliente";
$resultado = $mysqli->query($query);
$clientes = $resultado->fetch_all(MYSQLI_ASSOC);

// Obtener la lista de productos desde la base de datos
$query = "SELECT codproducto, descripcion FROM producto";
$resultado = $mysqli->query($query);
$productos = $resultado->fetch_all(MYSQLI_ASSOC);

// Función para obtener el precio de un producto desde la base de datos
function obtenerPrecioProducto($productoId)
{
    // Implementa la lógica para obtener el precio del producto desde la base de datos
    // Puedes usar una consulta SELECT para recuperar el precio del producto según su ID
    // y luego retornar el precio obtenido.
}

// Función para generar un número de factura único
function generarNumeroFactura()
{
    // Implementa la lógica para generar un número de factura único
    // Puedes usar la función uniqid() para generar un ID único basado en la hora actual
    // y luego retornar el número de factura formateado según tus necesidades.
}

// Función para actualizar la existencia de un producto en la base de datos
function actualizarExistenciaProducto($productoId, $cantidad)
{
    // Implementa la lógica para actualizar la existencia del producto en la base de datos
    // Puedes realizar una consulta UPDATE para restar la cantidad vendida del producto.
}
?>

<!-- Archivo: factura.php (HTML + PHP) -->
<!DOCTYPE html>
<html>
<head>
    <title>Facturación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Facturación</h1>
        <form method="POST" action="facturar.php">
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <select id="cliente" name="cliente" class="form-select" required>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['idcliente']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Productos:</label>
                <div class="row">
                    <div class="col-md-4">
                        <label for="producto1" class="form-label">Producto 1:</label>
                        <select id="producto1" name="productos[]" class="form-select" required>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?php echo $producto['codproducto']; ?>"><?php echo $producto['descripcion']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad1" class="form-label">Cantidad:</label>
                        <input type="number" id="cantidad1" name="cantidades[]" class="form-control" min="1" required>
                    </div>
                </div>
                <!-- Agregar más productos según tus necesidades -->
            </div>
            <button type="submit" class="btn btn-primary">Facturar</button>
        </form>
    </div>
</body>
</html>
