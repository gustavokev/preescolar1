<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
<h2>Grado:</h2>
<div class="container">

    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $grado = '';
        if (isset($id)) {
            $grado = $grados->grado;
            ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <?php
        }
        ?>

        <div class="form-group has-success">
            <label for="grado" class="control-label col-md-4">Año: </label>
            <div class="col-md-4">
                <select name="anios_id" id="anios_id" class="form-control">
                    <option value="0">Seleccione</option>
                    <?php
                    foreach ($anios as $anio) {
                        ?>
                        <option value="<?php echo $anio->id; ?>"><?php echo $anio->anio; ?></option>
                        <?php

                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group has-success">
            <label for="grado" class="control-label col-md-4">Grado: </label>
            <div class="col-md-4">
                <select name="grado" id="grado" class="form-control">
                    <option value="0"><?php echo $grado?></option>
                    <option value="maternal">maternal</option>
                    <option value="primer nivel">primer nivel</option>
                    <option value="segundo nivel">segundo nivel</option>
                    <option value="tercer nivel">tercer nivel</option>
                    <option value="primer grado">primer grado</option>
                    <option value="segundo grado">segundo grado</option>e
                    <option value="tercer grado">tercer grado</option>
                    <option value="cuarto grado">cuarto grado</option>
                    <option value="quinto grado">quinto grado</option>
                    <option value="sexto grado">sexto grado</option>
                </select>
            </div>
        </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('grados/Grados')?>">Principal</a>
        </div>
    </div>

    </form>

    <?php
    if (isset($error)) {
        ?>
        <p>Hubo un error</p>
        <?php

    }
    ?>

</div>




