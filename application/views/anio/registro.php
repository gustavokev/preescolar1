<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
    <h2>Año:</h2>
    <div class="container">
        <form id="frmanio" class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
            
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
                <div class="col-md-4 col-md-offset-4">
                    <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $anio?>" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button style="background-color: rgba(0, 0, 200, 0)" type="button" id="guardar" class=""><img width="150" src="<?php echo base_url('imagenes/botonGuardar.png') ?>" alt=""></button>
                    <a class="" href="<?php echo base_url('anio/Anio')?>"><img width="170" src="<?php echo base_url('imagenes/BOTON_VOLVER_MENU3.png') ?>" alt=""></a>
                </div>
            </div>
        </form>
    </div>
</div>    
        <?php
        if(isset($error)){
            ?>
            <p>Hubo un error</p>
            <?php

           }
        ?>

    

<script type="text/javascript">
    $('#guardar').click(function(){
        if($('#anio').val() == ''){
            alert('Debe ingresar el Año');
            $('#anio').focus();
        }else{
            $('#frmanio').submit();
        }
    })
</script>

