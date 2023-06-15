<?php include("../../template/header.php"); ?>
    <br/>

    <div class="card">
        <div class="card-header">
            Datos del empleado
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
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file"
                    class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="Foto">
                </div>

                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <select class="form-select form-select-lg" name="puesto" id="puesto">
                        <option selected>Select one</option>
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
                    </select>
                </div>

                <div class="mb-3">      
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date"
                    class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="">
                </div>

                <button type="submit" class="btn btn-success">Agregar registro</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            </form>
        </div>

       

        


        <div class="card-footer text-muted"></div>
    </div>


<?php include("../../template/footer.php"); ?>
