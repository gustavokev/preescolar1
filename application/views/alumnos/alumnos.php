
<div class="container">
	<section style="background-color: rgba(0, 0, 200, 0.3)" class="bg-info main row"><br>
		<div class="col-md-2">
			<aside class="">
				<div id="aside" class="col-md-12 text-center"><br>
					<p><img width="100" src="<?php echo base_url('imagenes/Menu_Normal.gif')?>" alt=""></p>
					<p><a class="btn btn-block btn-success" href="<?php echo base_url('docentes/Docentes') ?>">Docentes</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('representantes/Representantes') ?>"><small>Representantes</small></a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('grados/Grados') ?>">Grados</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('secciones/Secciones') ?>">Secciones</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('municipios/Municipios') ?>">Municipios</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p><br>
				</div>
			</aside>
		</div>

	<div class="col-md-10">
		<div class="form-group">
			<p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
			<a class="btn btn-success" href="<?php echo base_url('alumnos/Alumnos/registrar') ?>" title="">Registrar Alumnos</a></p>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed">
		
				<tr class="danger">
					<th class="text-center"># ID</th>
					<th class="text-center">Nombre y Apellido</th>
					<th class="text-center">Grado y Seccion</th>
					<th class="text-center">Año</th>
					<th class="text-center">Detalles</th>
					<th class="text-center">Editar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			
				<?php
				$i=1;
		            foreach ($listar as $alumnos) {
		                ?>

				<tr class="">
		            <td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
					<td class="success"><?php echo mayusculas1($alumnos->nombre_al)." ".mayusculas($alumnos->apellido_al)?></td>
					<td class="active"><?php echo mayusculas1($alumnos->grado)." ".mayusculas($alumnos->seccion)?></td>
					<td class="success text-right"><?php echo $alumnos->anio?></td>
					<td class="active"><a class="btn bg-warning" href="<?php echo base_url('alumnos/Alumnos/detalles/'.$alumnos->id) ?>">Detalles</a></td>
					<td class="active"><a class="btn bg-warning" href="<?php echo base_url('alumnos/Alumnos/modificar/'.$alumnos->id) ?>">Editar</a></td>
					<td class="active"><a class="btn bg-danger" href="<?php echo base_url('alumnos/Alumnos/eliminar/'.$alumnos->id) ?>">Eliminar</a></td>
				</tr>
			
					<?php
					$i++;
		                }
		                ?>

			</table>
				<div class="col-md-4 col-md-offset-4">
					<a class="btn-block" href="<?php echo base_url('alumnos/Alumnos')?>">
					<img width="130" src="<?php echo base_url('imagenes/subir-boton.png') ?>" alt=""></a>
				</div>
			</div><br>
		</div>
	</section>
</div>
	
