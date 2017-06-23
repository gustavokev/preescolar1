

<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div style="background-color: rgba(0, 0, 200, 0.3)" class="container text-center">
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
                $('#frmrepresentante').submit();
            }
        })
    </script>