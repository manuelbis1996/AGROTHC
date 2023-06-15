<?php include("../../template/header.php"); ?>
    <br/>

    <h5>Articulos</h5>
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
                            <th scope="col">Tipo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                            <td>R1C3</td>
                            <td><input name="btneditar" id="btneditar" class="btn btn-primary" type="button" value="Editar">|
                            <input name="btnBorrar" id="btnBorrar" class="btn btn-info" type="button" value="Borrar"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>

    manuelbis

   
    


    <?php include("../../template/footer.php"); ?>


