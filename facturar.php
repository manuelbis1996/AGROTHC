
<?php include("template/header.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<title>Facturación</title>
<script>
  $(document).ready(function() {
    var total = 0;
    var factura = [];

    // Obtener el precio del producto seleccionado
    function obtenerPrecioProducto(idProducto) {
      $.ajax({
        url: 'obtener_precio_producto.php',
        method: 'POST',
        data: { idProducto: idProducto },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            var precio = response.precio;
            $('#precio').val(precio);
          } else {
            console.log(response.message);
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    }

    function actualizarTotal() {
      var nuevoTotal = 0;
      for (var i = 0; i < factura.length; i++) {
        nuevoTotal += factura[i].subtotal;
      }
      total = nuevoTotal;
      $('#total').text(total.toFixed(2));
    }

    function cancelarProducto(index) {
      if (index >= 0 && index < factura.length) {
        var productoCancelado = factura.splice(index, 1)[0];
        actualizarTotal();
        $('#productosTable tr').eq(index).remove();
      }
    }

    $('#agregarProducto').click(function() {
      var producto = $('#rol').val();
      var cantidad = $('#cantidad').val();
      var precio = $('#precio').val();

      if (producto && cantidad && precio) {
        var subtotal = parseFloat(precio) * parseInt(cantidad);
        total += subtotal;

        var productoObj = {
          nombre: producto,
          cantidad: cantidad,
          precio: precio,
          subtotal: subtotal
        };

        factura.push(productoObj);

        var cancelarBtn = $('<button type="button" class="btn btn-danger btn-sm">Cancelar</button>');
        cancelarBtn.click(function() {
          var index = $(this).closest('tr').index();
          cancelarProducto(index);
        });

        var row = $('<tr>').append(
          $('<td>').text(producto),
          $('<td>').text(cantidad),
          $('<td>').text(precio),
          $('<td>').append(cancelarBtn)
        );

        $('#productosTable').append(row);

        $('#rol').val('');
        $('#cantidad').val('');
        $('#precio').val('');

        $('#total').text(total.toFixed(2));
      }
    });

    $('#generarFactura').click(function() {
      if (factura.length > 0) {
        var formData = {
          productos: factura.map(function(item) { return item.nombre; }),
          cantidades: factura.map(function(item) { return item.cantidad; }),
          precios: factura.map(function(item) { return item.precio; })
        };

        $.post('factura.php', formData, function(response) {
          $('#facturaContainer').html(response);
        });
      }
    });

    // Obtener el precio cuando se selecciona un producto
    $('#rol').change(function() {
      var idProducto = $(this).val();
      obtenerPrecioProducto(idProducto);
    });
  });
</script>
</head>

<?php
include("bd.php");
// código para mostrar registros
$sentencia = $conexion->prepare("SELECT * FROM `producto`");
$sentencia->execute();
$lista_tbl_producto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
  <div class="container">
    <h1 class="text-center">Facturación</h1>

    <div class="mb-3">
      <label for="rol" class="form-label">Producto</label>
      <select class="form-select form-select-lg" name="rol" id="rol">

        <?php foreach ($lista_tbl_producto as $registro) { ?>

          <option value="<?php echo $registro['idproducto'] ?>">
            <?php echo $registro['descripcion'] ?></option>

        <?php } ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad:</label>
      <input type="number" class="form-control" id="cantidad" min="1" required>
    </div>
    <div class="mb-3">
      <label for="precio" class="form-label">Precio:</label>
      <input type="number" class="form-control" id="precio" min="0" step="0.01" required readonly>
    </div>

    <button type="button" id="agregarProducto" class="btn btn-primary">Agregar producto</button>
    <button type="button" id="generarFactura" class="btn btn-primary">Generar Factura</button>

    <table class="table mt-4">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="productosTable"></tbody>
    </table>

    <div class="d-flex justify-content-end">
      <h4>Total: <span id="total">0.00</span></h4>
    </div>

    <div id="facturaContainer"></div>
  </div>
</body>

</html>
