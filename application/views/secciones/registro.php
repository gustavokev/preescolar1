
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<div class="container text-center">
<h2>Secciones:</h2>

    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $seccion = '';
        if(isset($id)){
            $seccion = $secciones->seccion;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>

    <div class="form-group has-success">
        <label for="seccion" class="control-label col-md-4">Seccion: </label>
            <div class="col-md-4">
                <select name="seccion" id="seccion" class="form-control">
                    <option value="0"><?php echo $seccion?></option>
                    <option value="a">a</option>
                    <option value="b">b</option>e
                    <option value="c">c</option>
                    <option value="d">d</option>
                    <option value="e">e</option>
                    <option value="f">f</option>
                </select>
            </div>
    </div>

    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
            <a class="btn btn-primary btn-block" href="<?php echo base_url('secciones/Secciones')?>">Principal</a>
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
    



