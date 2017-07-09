

<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center bg-success">
<h2 class="text-danger">Docente:</h2>
<div class="container">

    <form class="form-horizontal" id="frmdocente" action="<?php echo base_url($action) ?>" method="post">

        <?php
        $cedula = '';
        $nombre_re = '';
        $apellido_re = '';
        $telefono = '';
        $celular = '';
        $email = '';
        $estatus = '';
        $estados_id = '';
        $estado = '';
        $municipios_id = '';
        $municipio = '';
        $parroquias_id = '';
        $parroquia = '';
        $direccion = '';

        if(isset($id)){
            $cedula = $docentes->cedula;
            $nombre_re = $docentes->nombre_re;
            $apellido_re = $docentes->apellido_re;
            $telefono = $docentes->telefono;
            $telefono = $docentes->telefono;
            $email = $docentes->email;
            $estatus = $docentes->estatus;
            $estados_id = $docentes->estados_id;
            $estado = $docentes->estado;
            $municipios_id = $docentes->municipios_id;
            $municipio = $docentes->municipio;
            $parroquias_id = $docentes->parroquias_id;
            $parroquia = $docentes->parroquia;
            $direccion = $docentes->direccion;

            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">

            <?php
        }
        ?>

    <div class="row">
    <div class="bg-info col-md-3 col-md-offset-3">
        <div class="col-md-12">
            <label for="cedula" class="control-label text-info">Cedula: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula?>" placeholder="Cedula:"></em>
                </div>

            <label for="apellido_re" class="control-label text-info">Apellido: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="apellido_re" name="apellido_re" value="<?php echo $apellido_re?>" placeholder="Apellido"></em>
                </div>

            <label for="telefono" class="control-label text-info">Teléfono Local: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono?>" placeholder="Teléfono Local:"></em>
                </div>

            <label for="estados_id" class="control-label text-info">Estado: </label>
                <div class="form-group has-success">
                    <em><select name="estados_id" id="estados_id" class="form-control">
                        <option class="text-primary bg-success" value="<?php echo $estados_id?>">Selecciona: <?php echo $estado?></option>
                            <option class="bg-danger text-center text-danger" value="">Nuevo Estado:</option>
                                <?php
                                 foreach ($estados as $estado) {
                                ?>
                            <option class="bg-warning" value="<?php echo $estado->id; ?>"><?php echo $estado->estado ?></option>
                            <?php
                            }
                        ?>
                    </select></em>
                </div>

            <label for="municipios_id" class="control-label text-info">Municipio: </label>
                <div class="form-group has-success">
                    <em><select name="municipios_id" id="municipios_id" class="form-control">
                        <option class="text-primary bg-success" value="<?php echo $municipios_id?>">Selecciona: <?php echo $municipio?></option>
                    </select></em>
                </div>

            <label for="parroquias_id" class="control-label text-info">Sector: </label>
                <div class="form-group has-success">
                    <em><select name="parroquias_id" id="parroquias_id" class="form-control">
                        <option class="text-primary bg-success" value="<?php echo $parroquias_id?>">Selecciona: <?php echo $parroquia?></option>
                    </select></em>
                </div>
            </div>
        </div>

    <div class="bg-info col-md-3">
        <div class="col-md-12">
            <label for="nombre_re" class="control-label text-info">Nombre: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="nombre_re" name="nombre_re" value="<?php echo $nombre_re?>" placeholder="Nombre:"></em>
                </div>

            <label for="estatus" class="control-label text-info">Estatus: <?php echo $estatus ?></label>
                <div class="form-group has-success">
                    <em><select name="estatus" id="estatus" class="form-control">
                        <option value="<?php echo $estatus ?>">Selecciona: </option>
                        <option value="d1">Docente Principal</option>
                        <option value="d2">Docente Secundario</option>
                        <option value="d3">Docente Terceario</option>
                    </select></em>
                </div>

            <label for="celular" class="control-label text-info">Teléfono Celular: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="celular" name="celular" value="<?php echo $celular?>" placeholder="Teléfono Celular"></em>
                </div>

            <label for="direccion" class="control-label text-info">Direccion:</label>
                <div class="form-group has-success">
                    <em><textarea rows="5" name="direccion" id="direccion" class="form-control" placeholder="Escriba nombre de Calle y N° de casa:"><?php echo $direccion?></textarea></em>
                </div>

            <label for="email" class="control-label text-info">Correo: </label>
                <div class="form-group has-success">
                    <em><input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>" placeholder="Correo:"></em>
                </div>
            </div>
        </div>

    <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button style="background-color: rgba(0, 0, 200, 0)" type="button" id="guardar" class="btn btn-block"><img width="150" src="<?php echo base_url('imagenes/botonGuardar.png') ?>" alt=""></button>
                    <a class="btn btn-block" href="<?php echo base_url('alumnos/Alumnos')?>"><img width="170" src="<?php echo base_url('imagenes/BOTON_VOLVER_MENU3.png') ?>" alt=""></a>
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

        <br></div>
    </div>
</div>

<script type="text/javascript">
        $('#guardar').click(function(){
            if($('#cedula').val() == ''){
                alert('Debe ingresar la Cedula');
                $('#cedula').focus();
            }else if($('#nombre_re').val() == ''){
                alert('Debe ingresar el Nombre');
                $('#nombre_re').focus();
            }else if($('#apellido_re').val() == ''){
                alert('Debe ingresar el Apellido');
                $('#apellido_re').focus();
            }else if($('#estados_id').val() == ''){
                alert('Debe ingresar el Estado');
                $('#estados_id').focus();
            }else if($('#municipios_id').val() == ''){
                alert('Debe ingresar el Municipio');
                $('#municipios_id').focus();
            }else if($('#parroquias_id').val() == ''){
                alert('Debe ingresar el Sector');
                $('#parroquias_id').focus();
            }else if($('#direccion').val() == ''){
                alert('Debe ingresar Nombre de calle y N° de casa');
                $('#direccion').focus();
            }else{
                //alert('Enviar');
                $('#frmdocente').submit();
            }
        })
    </script>