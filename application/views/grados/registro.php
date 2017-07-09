<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
    <form id="frmgrado" class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">
        <h2>Grado:</h2>
        <?php
        $anios_id = '';
        $anio = '';
        $grado = '';
        if (isset($id)) {
            $anios_id = $grados->anios_id;
            $anio = $grados->anio;
            $grado = $grados->grado;
            ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <?php
        }
        ?>

        <div class="row">
            <div class="form-group has-success">
                <label for="anios_id" class="control-label col-md-4">Año: </label>
                <div class="col-md-4">
                    <select name="anios_id" id="anio" class="form-control">
                        <option value="<?php echo $anios_id?>">Seleccione: <?php echo $anio?></option>
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
                        <option value=""><?php echo $grado?></option>
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
                    <button style="background-color: rgba(0, 0, 200, 0)" type="button" id="guardar" class="btn btn-block"><img width="150" src="<?php echo base_url('imagenes/botonGuardar.png') ?>" alt=""></button>
                    <a class="btn btn-block" href="<?php echo base_url('grados/Grados')?>"><img width="170" src="<?php echo base_url('imagenes/BOTON_VOLVER_MENU3.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </form>
</div>

    <?php
    if (isset($error)) {
        ?>
        <p>Hubo un error</p>
        <?php

    }
    ?>

<script type="text/javascript">
    $('#guardar').click(function()
    {
        if($('#anio').val() == ''){
            alert('Debe ingresar el Año');
            $('#anio').focus();
        }else if($('#grado').val() == ''){
                alert('Debe ingresar el Grado');
                $('#grado').focus();
        }else{
            //alert('Enviar');
            $('#frmgrado').submit();
        }
    })
</script>


