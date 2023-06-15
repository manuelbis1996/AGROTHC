<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Datos del clientes
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text"
                    class="form-control" name="apellido" idapellido aria-describedby="helpId" placeholder="Apellido">
                </div>

                <div class="mb-3">
                    <label for="telefeno" class="form-label">Telefeno
                    </label>
                    <input type="text"
                        class="form-control" name="telefeno" id="telefeno" aria-describedby="helpId" placeholder="Telefeno">   
                </div>

                <div class="mb-3">      
                    <label for="fechaingroso" class="form-label">Fecha de ingreso</label>
                    <input type="date"
                    class="form-control" name="fechaingroso" id="fechaingroso" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Agregar artigulos</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

    <?php include("../../template/footer.php"); ?>
