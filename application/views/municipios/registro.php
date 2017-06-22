
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
<h2>Municipios:</h2>
<div class="container">
    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $municipio = '';
        if(isset($id)){
            $municipio = $municipios->municipio;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>


    <div class="form-group has-success">
        <label for="grado" class="control-label col-md-4">Estado: </label>
        <div class="col-md-4">
            <select name="estado_id" id="estado_id" class="form-control">
                    <option value="0">Seleccione</option>
                    <?php
                    foreach ($estados as $estado) {
                        ?>
                        <option value="<?php echo $estado->id; ?>"><?php echo $estado->estado; ?></option>
                        <?php

                    }
                    ?>
            </select>
        </div>
    </div>


    <div class="form-group has-success">
        <label for="municipio" class="control-label col-md-4">Municipio: </label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $municipio?>" placeholder="">
            </div>
    </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('municipios/municipios')?>">Principal</a>
        </div>
    </div>

    </form>
    
    <?php
    if(isset($error)){
        ?>
        <p>Hubo un error</p>
        <?php

       }
    ?>

</div>




