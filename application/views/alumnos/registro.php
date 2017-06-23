
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   

<div style="background-color: rgba(0, 0, 200, 0.4)" class="container">

<div class="container text-center">
    <h2 class="text-danger"><u>Alumno:</u></h2>
</div> 


    <form class="form-horizontal" id="frmalumno" action="<?php echo base_url($action) ?>" method="post">
        <?php
        $nombre_al = '';
        $apellido_al = '';
        $fecha_nac = '';
        $sexo = '';
        $estado = '';
        $estados_id = '';
        $municipio = '';
        $municipios_id = '';
        $grado_id = '';
        $seccion_id = '';
        $anio_id = '';
        if(isset($id)){
            $nombre_al = $alumnos->nombre_al;
            $apellido_al = $alumnos->apellido_al;
            $fecha_nac = $alumnos->fecha_nac;
            $sexo = $alumnos->sexo;
            $estados_id = $alumnos->estados_id;
            $estado = $alumnos->estado;
            $municipio = $alumnos->municipio;
            $municipios_id = $alumnos->municipios_id;
            $grado_id = $alumnos->grado_id;
            $seccion_id = $alumnos->seccion_id;
            $anio_id = $alumnos->anio_id;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>

    <div class="row">
        <div class="col-md-3 col-md-offset-2">
            <label for="nombre_al" class="control-label text-danger">Nombre: </label>
                <div class="form-group">
                    <em><input type="text" class="form-control" id="nombre_al" name="nombre_al" value="<?php echo $nombre_al?>" placeholder="Nombre:"></em>
                </div>

            <label for="apellido_al" class="control-label text-danger">Apellido: </label>
                <div class="form-group">
                    <em><input type="text" class="form-control" id="apellido_al" name="apellido_al" value="<?php echo $apellido_al?>" placeholder="Apellido"></em>
                </div>

            <label for="fecha_nac" class="control-label text-danger">Fecha de Nacimiento: </label>
                <div class="form-group">
                    <em><input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $fecha_nac?>" placeholder="Fecha de Nacimiento"></em>
                </div>
            </div>

        <div class="col-md-3 col-md-offset-2">
            <label for="sexo" class="control-label text-danger">Sexo: </label>
                <div class="form-group">
                    <em><select name="sexo" id="sexo" class="form-control">
                        <option class="text-primary bg-success" value="">Selecionar: <?php echo $sexo?></option>
                        <option class="bg-danger text-center text-danger" value="femenino">femenino</option>
                        <option class="bg-danger text-center text-info" value="masculino">masculino</option>
                    </select></em>
                </div>

            <label for="estados_id" class="control-label text-danger"><small>Lugar de Nacimiento: </small></label>
                <div class="form-group">
                    <em><select name="estados_id" id="estados_id" class="form-control">
                        <option class="text-primary bg-success" value="<?php echo $estados_id?>">Selecciona: <?php echo $estado?></option>
                            <option class="bg-danger text-center text-danger" value="">Seleccionar Nuevo Estado:</option>
                        <?php
                        foreach ($estados as $estado) {
                            ?>
                            <option class="bg-warning" value="<?php echo $estado->id; ?>"><?php echo $estado->estado ?></option>
                            <?php
                            }
                        ?>
                    </select></em>
                 </div>

            <label for="municipios_id" class="control-label text-danger"></label>
                <div class="form-group">
                    <em><select name="municipios_id" id="municipios_id" class="form-control">
                        <option class="text-primary bg-success" value="<?php echo $municipios_id?>">Selecciona: <?php echo $municipio?></option>
                        </select></em>
                    </div>
                </div>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button style="background-color: rgba(0, 0, 200, 0)" type="button" id="guardar" class="btn btn-block"><img width="150" src="<?php echo base_url('imagenes/botonGuardar.png') ?>" alt=""></button>
                    <a class="btn btn-block" href="<?php echo base_url('alumnos/Alumnos')?>"><img width="170" src="<?php echo base_url('imagenes/BOTON_VOLVER_MENU3.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </form>
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
            if($('#nombre_al').val() == ''){
                alert('Debe ingresar el Nombre');
                $('#nombre_al').focus();
            }else if($('#apellido_al').val() == ''){
                alert('Debe ingresar el Apellido');
                $('#apellido_al').focus();
            }else if($('#sexo').val() == ''){
                alert('Debe ingresar el Sexo');
                $('#sexo').focus();
            }else if($('#estados_id').val() == ''){
                alert('Debe ingresar el Estado');
                $('#estados_id').focus();
            }else if($('#municipios_id').val() == ''){
                alert('Debe ingresar el Municipio');
                $('#municipios_id').focus();
            }else if($('#fecha_nac').val() == ''){
                alert('Debe ingresar la Fecha de Nacimiento');
                $('#fecha_nac').focus();
            }else{
                //alert('Enviar');
                $('#frmalumno').submit();
            }
        })
    </script>

