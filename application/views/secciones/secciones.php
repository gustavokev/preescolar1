<div class="container">
<section class="bg-info main row">
	
	<aside class="col-md-2 text-center">
	<h2 class="bg-danger">MENU</h2>
	<br>
			<p><a class="btn btn-block btn-success" href="<?php echo base_url('alumnos/Alumnos') ?>">Alumnos</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('representantes/Representantes') ?>">Representantes</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('docentes/Docentes') ?>">Docentes</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('grados/Grados') ?>">Grados</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('municipios/Municipios') ?>">Municipios</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p>
			<br>
	</aside>

	<div class="col-md-8"><br>
	<p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
	<a class="btn btn-success" href="<?php echo base_url('secciones/Secciones/registrar') ?>" title="">Registrar Seccion</a>

		
		<div class="table-responsive"><br>
			<table class="table table-responsive table-bordered table-hover table-condensed">
	
		<tr class="danger text-center">
			<th class="text-center"># ID</th>
			<th class="text-center">Seccion</th>
			<th class="text-center">Editar</th>
			<th class="text-center">Eliminar</th>
			
		</tr>
	
		<?php
		$i=1;
            foreach ($listar as $secciones) {
                ?>

		<tr class="">
            <td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
			<td class="success"><?php echo mayusculas($secciones->seccion)?></td>
			
			<td class="active text-center"><a class="btn bg-warning" href="<?php echo base_url('secciones/Secciones/modificar/'.$secciones->id) ?>">Editar</a></td>
			<td class="active text-center"><a class="btn bg-danger" href="<?php echo base_url('secciones/Secciones/eliminar/'.$secciones->id) ?>">Eliminar</a></td>
		</tr>
	
			<?php
			$i++;
                }
                ?>

	</table>
	</div>

</div>
</div>
	
