
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
<h2>Año:</h2>
<div class="container">
    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $anio = '';
        if(isset($id)){
            $anio = $anios->anio;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>

    <div class="form-group has-success">
        <label for="anio" class="control-label col-md-4">Año Escolar: </label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $anio?>" placeholder="">
            </div>
    </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('anio/Anio')?>">Principal</a>
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



