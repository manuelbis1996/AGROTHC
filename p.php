<?php include("template/header.php"); ?>
    <br/>

    ?>
    <div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container">
                
                    <div class="row">
                                <div class="col-xl-12">
                                        <div class="breadcrumb-holder">
                                                <h1 class="main-title float-left">Generar Venta</h1>
                                                <div class="clearfix">
                                                
                                                </div>
                                        </div>
                                </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                       <!-- Button trigger modal -->
                       
                        <div class="col-lg-5">
                        <label>Cliente</label>
                        <input id="txtcliente" name="txtcliente" class="form-control"/>
                        </div>
                        <div class="col-lg-3">
                        <label>Tipo</label>
                        <select name="txttipo" id="txttipo" class="form-control">
                            <option id="boleta">Boleta</option>
                            <option id="factura">Factura</option>
                            <option id="orden">Orden de Compra</option>
                        </select>
                        </div>
                        <div class="col-lg-2">
                        <label>Numero</label>
                        <input id="txtnumero" name="txtnumero" class="form-control"/>
                        </div>
                        <div class="col-lg-2">
                        <label>Fecha</label>
                        <?php date_default_timezone_set("America/Lima"); $fecha = date("Y-m-d");?>
                        <input type="date" class="form-control" value="<?= $fecha ?>">
                        </div>
                        
                    </div>
                    
                    <hr>
                    <form id="frmventa">
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Producto</label>
                            
                            <select id="txtproducto" name="txtproducto" class="form-control">
                                <option value="A">Seleccione</option>
                                <?php
                                    require_once '../clases/Producto.php';
                                    require_once '../clases/Conexion.php';
                                    $obj1 = new Producto();
                                    $producto = $obj1->mostrar();
                                    while($pro=mysqli_fetch_row($producto))
                                    {
                                ?>
                                <option value="<?php echo $pro[0] ?>" ><?php echo $pro[1] ?></option>
                                <?php
                                    }

                                ?>               
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Stock</label>
                            <input readonly class="form-control" id="txtstock" name="txtstock" type="number"/>
                        </div>
                        <div class="col-lg-2">
                            <label>Precio</label>
                            <input readonly  class="form-control" id="txtprecio" name="txtprecio" type="number"/>
                        </div>
                        <div class="col-lg-2">
                            <label>Cantidad</label>
                            <input  class="form-control" id="txtcantidad" name="txtcantidad" type="number"/>
                        </div>
                        <div class="col-lg-2">
                           <label>´</label>
                            <input type="button" Value="Agregar" id="btnagregar" name="btnagregar" class="form-control btn btn-primary"/>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div  class="col-lg-12">
                            <div id="tabla_temporal">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                           <center>
                            <span class="btn btn-danger" id="btncancelar">Cancelar</span>
                            <span class="btn btn-success" id="btnguardar">Guardar Venta</span>
                            </center>
                        </div>
                    </div>



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->


                        
    <?php include("template/footer.php"); ?>