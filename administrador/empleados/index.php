<?php include("../../template/header.php"); ?>
    <br/>
    <h5>Empleados</h5>
    <div class="card">
        <div class="card-header">
        
            <a name="" id="" class="btn btn-primary" 
            href="crear.php" role="button">
            Agregar
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                            <td><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a>
                            <a name="" id="" class="btn btn-info" href="#" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a> </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        
    </div>

    <?php include("../../template/footer.php"); ?>
