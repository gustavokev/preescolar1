
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
<h2>Parroquias:</h2>

<div class="container">
    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">

    <?php
        $parroquia = '';
        if (isset($id)) {
            $parroquia = $parroquias->parroquia;
            ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <?php
        }
        ?>

        <div class="form-group has-success">
            <label for="estados_id" class="control-label col-md-4">Estados: </label>
            <div class="col-md-4">
                <select name="estados_id" id="estados_id" class="form-control">
                <option value="0">Seleccione</option>
                <?php
                foreach ($estados as $estado) {
                   ?>
                   <option value="<?php echo $estado->id?>"><?php echo $estado->estado?></option>
                   <?php
                }
                ?>
            </select>
            </div>
        </div>

        <div class="form-group has-success">
            <label for="municipios_id" class="control-label col-md-4">Municipios: </label>
            <div class="col-md-4">
                <select name="municipios_id" id="municipios_id" class="form-control">
                <option value="0">Seleccione</option>
            </select>
            </div>
        </div>

         <div class="form-group has-success">
            <label for="parroquia" class="control-label col-md-4">Parroquia: </label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="parroquia" name="parroquia" value="<?php echo $parroquia?>" placeholder="">
            </div>
        </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('parroquias/parroquias')?>">Principal</a>
        </div>
    </div>

    </form>

</div>



