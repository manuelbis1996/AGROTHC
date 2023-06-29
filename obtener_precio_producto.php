<?php
include("bd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $idProducto = $_POST["idProducto"] ?? null;

  if ($idProducto) {
    $sentencia = $conexion->prepare("SELECT precio FROM producto WHERE idproducto = :idProducto");
    $sentencia->bindParam(":idProducto", $idProducto);
    $sentencia->execute();

    $producto = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
      $response = [
        "success" => true,
        "precio" => $producto["precio"]
      ];
    } else {
      $response = [
        "success" => false,
        "message" => "No se encontró el precio del producto."
      ];
    }
  } else {
    $response = [
      "success" => false,
      "message" => "ID de producto no válido."
    ];
  }

  echo json_encode($response);
}
?>
