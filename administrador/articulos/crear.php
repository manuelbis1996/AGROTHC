<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Datos del articulos
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text"
                    class="form-control" name="tipo" id="tipo" aria-describedby="helpId" placeholder="Tipo">
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text"
                    class="form-control" name="cantidad" idapellido aria-describedby="helpId" placeholder="Cantidad">
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label">Costo
                    </label>
                    <input type="text"
                        class="form-control" name="costo" id="costo" aria-describedby="helpId" placeholder="Costo">   
                </div>

                <div class="mb-3">      
                    <label for="fechaingroso" class="form-label">Fecha de ingreso</label>
                    <input type="date"
                    class="form-control" name="fechaingroso" id="fechaingroso" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Agregar articulos</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>


