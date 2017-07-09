
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
<h2>Estado:</h2>
<div class="container">
    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $estado = '';
        if(isset($id)){
            $estado = $estados->estado;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>

    <div class="form-group has-success">
        <label for="estado" class="control-label col-md-4">Estado: </label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado?>" placeholder="">
            </div>
    </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('estados/Estados')?>">Principal</a>
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



