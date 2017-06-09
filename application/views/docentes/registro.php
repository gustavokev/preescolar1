

<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<div class="container text-center">
<h2>Docentes:</h2>
<div class="container">

    <form class="form-horizontal" action="<?php echo base_url($action) ?>" method="post">

        <?php
        $cedula = '';
        $nombre_re = '';
        $apellido_re = '';
        $telefono_1 = '';
        $telefono_2 = '';
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
            $telefono_1 = $docentes->telefono_1;
            $telefono_2 = $docentes->telefono_2;
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

    <div class="col-md-3 col-md-offset-2">
        <label for="cedula" class="control-label">Cedula: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula?>" placeholder="Cedula:"></em>
            </div>

        <label for="apellido_re" class="control-label">Apellido: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="apellido_re" name="apellido_re" value="<?php echo $apellido_re?>" placeholder="Apellido"></em>
            </div>

        <label for="telefono_2" class="control-label">Teléfono Local: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="telefono_2" name="telefono_2" value="<?php echo $telefono_2?>" placeholder="Teléfono Local:"></em>
            </div>

        <label for="estados_id" class="control-label">Estado: </label>
            <div class="form-group"> 
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

        <label for="municipios_id" class="control-label">Municipio: </label>
            <div class="form-group">
                <em><select name="municipios_id" id="municipios_id" class="form-control">
                    <option class="text-primary bg-success" value="<?php echo $municipios_id?>">Selecciona: <?php echo $municipio?></option>
                </select></em>
            </div>

        <label for="parroquias_id" class="control-label">Sector: </label>
            <div class="form-group">
                <em><select name="parroquias_id" id="parroquias_id" class="form-control">
                    <option class="text-primary bg-success" value="<?php echo $parroquias_id?>">Selecciona: <?php echo $parroquia?></option>
                </select></em>
            </div>
        </div>

    <div class="col-md-1"></div>

    <div class="col-md-3">
        <label for="nombre_re" class="control-label">Nombre: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="nombre_re" name="nombre_re" value="<?php echo $nombre_re?>" placeholder="Nombre:"></em>
            </div>

        <label for="estatus" class="control-label">Estatus: </label>
            <div class="form-group">
                <em><select name="estatus" id="estatus" class="form-control">
                    <option value="d">Docente</option>
                </select></em>
            </div>

        <label for="telefono_1" class="control-label">Teléfono Celular: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="telefono_1" name="telefono_1" value="<?php echo $telefono_1?>" placeholder="Teléfono Celular"></em>
            </div>

        <label for="direccion" class="control-label">Direccion:</label>
            <div class="form-group">
                <textarea bg-danger rows="5" name="direccion" id="direccion" class="form-control text-left" placeholder="Escriba nombre de Calle y N° de casa:"><?php echo $direccion?>
                </textarea>
            </div>

        <label for="email" class="control-label">Correo: </label>
            <div class="form-group">
                <em><input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>" placeholder="Correo:"></em>
            </div>
        </div>

    <div class="row">
            
        <div class="col-md-3 col-md-offset-2">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>

        <div class="col-md-3 col-md-offset-1">
            <a class="btn btn-primary btn-block" href="<?php echo base_url('docentes/Docentes')?>">Volver</a>
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


    
      
