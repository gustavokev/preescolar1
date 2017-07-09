
    <div class="container">
    <section class="bg-info main row">
    
    <aside class="col-md-2 text-center">
    <h2 class="bg-danger">MENU</h2>
    <br>
            <a class="btn btn-block btn-success" href="<?php echo base_url('alumnos/Alumnos') ?>">Alumnos</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('grados/Grados') ?>">Grados</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('secciones/Secciones') ?>">Secciones</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('municipios/Municipios') ?>">Municipios</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p>
    </aside>

    <div class="col-md-10"><br>
    <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
    <a class="btn btn-success" href="<?php echo base_url('docentes/Docentes/registrar') ?>" title="">Registrar Docente</a>
    <a class="btn btn-primary" href="<?php echo base_url('docentes/Docentes')?>">Volver</a></p>

        <div class="table-responsive"><br>
            <table class="table table-bordered table-hover table-condensed">
    
        <tr class="danger">
            <th class="text-center"># ID</th>
            <th class="text-center">Cedula</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Apellido</th>
            
            <th class="text-center">Editar</th>
            <th class="text-center">Editar</th>
        </tr>
    
        <?php
        $i=1;
            foreach ($docentes as $docentes) {
                ?>

        <tr class="">
            <td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
            <td class="success text-right"><?php echo unidad($docentes->cedula)?></td>
            <td class="info"><?php echo mayusculas1($docentes->nombre_re)?></td>
            <td class="active"><?php echo mayusculas($docentes->apellido_re)?></td>
            
            <td class="active text-center"><a class="btn bg-warning" href="<?php echo base_url('docentes/Docentes/modificar/'.$docentes->id) ?>">Editar</a></td>
            <td class="active text-center"><a class="btn bg-danger" href="<?php echo base_url('docentes/Docentes/eliminar/'.$docentes->id) ?>">Eliminar</a></td>
        </tr>

            <?php
            $i++;
                }
                ?>
    
        
    </table>
    
</div>

</div>
</div>
