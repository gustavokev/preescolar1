
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

<div class="container">

        <?php
        if(isset($id)){
            $cedula = $alumnos->cedula;
            $cedula_escolar = $alumnos->cedula_escolar;
            $nombre_al = $alumnos->nombre_al;
            $apellido_al = $alumnos->apellido_al;
            $fecha_nac = $alumnos->fecha_nac;
            $nombre_re = $alumnos->nombre_re;
            $sexo = $alumnos->sexo;
            $estado = $alumnos->estado;
            $municipio = $alumnos->municipio;
            ?>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <?php
        }
        ?>

    <div style="background-color: rgba(0, 0, 200, 0.4)" class="row"><br>
    	<div class="col-md-4">
            <div class="form-group has-success bg-info text-center">
                <label for="nombre_al" class="control-label">Cédula Escolar: 
                    <h3><?php echo $cedula_escolar."-".$cedula?></h3>
                </label>    
            </div>

            <div class="form-group has-success bg-danger text-center">
                <label for="nombre_al" class="control-label">Nombre y Apellido: 
                    <h3><?php echo mayusculas1($nombre_al)?> <?php echo mayusculas($apellido_al)?></h3>
                </label>    
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group has-error bg-danger text-center">
                <label for="fecha_nac" class="control-label"><small>Fecha de Nacimiento: </small>
                    <h3><?php echo dateformat($fecha_nac)?></h3>
                </label>
            </div>

            <div class="form-group has-error bg-info text-center">
                <label for="nombre_re" class="control-label"><small>Nombre de Representante: </small>
                    <h3><?php echo mayusculas($nombre_re)?></h3>
                </label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group has-success bg-warning text-center">
                <label for="sexo" class="control-label">Sexo: 
                    <h3><?php echo $sexo?></h3>
                </label>
            </div>
          
            <div class="form-group has-success bg-danger text-center">
                <label for="estados_id" class="control-label">Lugar de Nacimiento: 
                    <h4><?php echo "Estado ".mayusculas1($estado)?></h4>
                    <h4><?php echo "Municipio ".mayusculas1($municipio)?></h4>
                </label>
            </div>
        </div>

    	<div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-block" href="<?php echo base_url('alumnos/Alumnos')?>"><img width="170" src="<?php echo base_url('imagenes/BOTON_VOLVER_MENU3.png') ?>" alt=""></a>
            </div>
        </div>
    </div>
</div>



