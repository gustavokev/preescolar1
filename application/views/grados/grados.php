<div class="container">
<section style="background-color: rgba(0, 0, 200, 0.3)" class="bg-info main row">
    
    <aside class="col-md-2 text-center">
    <h2 class="bg-danger">MENU</h2>
    <br>
            <p><a class="btn btn-block btn-success" href="<?php echo base_url('alumnos/Alumnos') ?>">Alumnos</a>
        	<a class="btn btn-block btn-success" href="<?php echo base_url('representantes/Representantes') ?>">Representantes</a>
        	<a class="btn btn-block btn-success" href="<?php echo base_url('docentes/Docentes') ?>">Docentes</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('secciones/Secciones') ?>">Secciones</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('municipios/Municipios') ?>">Municipios</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p>
    </aside>

    <div class="col-md-8"><br>
    <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
    <a class="btn btn-success" href="<?php echo base_url('grados/Grados/registrar') ?>" title="">Registrar Grado</a>

		
		<div class="table-fluid"><br>
			<table class="table table-responsive table-bordered table-hover table-condensed text-center">
	
		<tr class="danger">
			<th class=" text-center"># ID</th>
			<th class=" text-center">Grados</th>
			<th class=" text-center">Año escolar</th>
			<th class=" text-center">Editar</th>
			<th class=" text-center">Eliminar</th>
			
		</tr>
	
		<?php
		$i=1;
            foreach ($listar as $grados) {
                ?>

		<tr class="">
            <td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
			<td class="success"><?php echo $grados->grado?></td>
			<td class="info"><?php echo $grados->anio?></td>

			<td class="active"><a class="btn bg-warning" href="<?php echo base_url('grados/Grados/modificar/'.$grados->id) ?>">Editar</a></td>
			<td class="active"><a class="btn bg-danger" href="<?php echo base_url('grados/Grados/eliminar/'.$grados->id) ?>">Eliminar</a></td>
		</tr>
	
			<?php
			$i++;
                }
                ?>

	</table>
	</div>
</div>

</div>
	
