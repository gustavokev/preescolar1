

<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div class="container text-center bg-success">
    <h2 class="text-danger">Representante:</h2>
    <div class="container">

        <form class="form-horizontal" id="frmrepresentante" action="<?php echo base_url($action) ?>" method="post">

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
                $cedula = $representantes->cedula;
                $nombre_re = $representantes->nombre_re;
                $apellido_re = $representantes->apellido_re;
                $telefono = $representantes->telefono;
                $telefono = $representantes->telefono;
                $email = $representantes->email;
                $estatus = $representantes->estatus;
                $estados_id = $representantes->estados_id;
                $estado = $representantes->estado;
                $municipios_id = $representantes->municipios_id;
                $municipio = $representantes->municipio;
                $parroquias_id = $representantes->parroquias_id;
                $parroquia = $representantes->parroquia;
                $direccion = $representantes->direccion;

                ?>
                <input type="hidden" name="id" value="<?php echo $id?>">

                <?php
            }
            ?>

            <div class="row">

                <div class="col-md-3 col-md-offset-2">
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

                <div class="col-md-1"></div>

                <div class="col-md-3">
                    <label for="nombre_re" class="control-label text-info">Nombre: </label>
                    <div class="form-group has-success">
                        <em><input type="text" class="form-control" id="nombre_re" name="nombre_re" value="<?php echo $nombre_re?>" placeholder="Nombre:"></em>
                    </div>

                    <label for="estatus" class="control-label text-info">Estatus: <?php echo $estatus ?></label>
                    <div class="form-group has-success">
                        <em><select name="estatus" id="estatus" class="form-control">
                            <option value="<?php echo $estatus ?>">Selecciona: </option>
                            <option value="r1">Representante Principal</option>
                            <option value="r2">Representante Secundario</option>
                            <option value="r3">Representante Autorizado</option>
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

                <div class="row">

                    <div class="col-md-3 col-md-offset-2">
                        <button type="button"  id="guardar" class="btn btn-success btn-block active">Guardar</button>
                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <a class="btn btn-primary btn-block active" href="<?php echo base_url('representantes/Representantes')?>">Volver</a>
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
            }else{
                //alert('Enviar');
                $('#frmrepresentante').submit();
            }
        })
    </script>