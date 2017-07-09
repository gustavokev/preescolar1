<div class="container">
	<section style="background-color: rgba(0, 0, 200, 0.3)" class="bg-info main row">
		<div class="col-md-2">
			<aside class=""><br>
				<div id="aside" class="col-md-12 text-center">
					<h2 class=""><img width="100" src="<?php echo base_url('imagenes/Menu_Normal.gif')?>" alt=""></h2>
					<a class="btn btn-block btn-success" href="<?php echo base_url('alumnos/Alumnos') ?>">Alumnos</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('representantes/Representantes') ?>"><small>Representantes</small></a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('grados/Grados') ?>">Grados</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('secciones/Secciones') ?>">Secciones</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('municipios/Municipios') ?>">Municipios</a>
					<a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p>
				</div>
			</aside>
		</div>

		<div class="col-md-10"><br>

			<div class="form-group has-success">
				<form class="form-horizontal" action="<?php echo base_url('docentes/Docentes/buscar') ?>" method="post">

					<p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
						<a class="btn btn-success" href="<?php echo base_url('docentes/Docentes/registrar') ?>" title="">Registrar Docente</a>

						<input class="btn btn-success" type="submit" value="buscar">
						<input class="form-control-static" type="text" name="busqueda">

					</form>
				</div>

			<div class="text-center">
				<h3 class="text-danger"><u>Docentes Principales: </u></h3>
			</div>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
						<tr class="danger">
							<th class="text-center"># ID</th>
							<th class="text-center">Cedula</th>
							<th class="text-center">Nombre y Apellido</th>
							<th class="text-center">Nombre de Alumno</th>
							<th class="text-center">Telefonos</th>
							<th class="text-center">Correo Electrónico</th>
							<th class="text-center">Estatus</th>
							<th class="text-center">Direccion</th>
							<th class="text-center">Editar</th>
							<th class="text-center">Editar</th>
						</tr>

						<?php
						$i=1;
						foreach ($listar1 as $docentes) {
							?>

							<tr class="">
								<td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
								<td class="success text-right"><?php echo unidad($docentes->cedula)?></td>
								<td class="info"><?php echo mayusculas1($docentes->nombre_re)." ".mayusculas($docentes->apellido_re)?></td>
								<td class="success text-right"><?php echo $docentes->nombre_al?></td>
								<td class="success text-right"><?php echo $docentes->telefono?>, <?php echo $docentes->celular?></td>
								<td class="info text-center"><?php echo $docentes->email?></td>
								<td class="info text-center"><?php echo $docentes->estatus?></td>
								<td class="info text-center"><?php echo "Estado ".$docentes->estado?>, <?php echo "Municipio ".$docentes->municipio?>, <?php echo $docentes->parroquia?></td>
								<td class="active text-center"><a class="btn bg-warning" href="<?php echo base_url('docentes/Docentes/modificar/'.$docentes->id) ?>">Editar</a></td>
								<td class="active text-center"><a class="btn bg-danger" href="<?php echo base_url('docentes/Docentes/eliminar/'.$docentes->id) ?>">Eliminar</a></td>
							</tr>

							<?php
							$i++;
						}
						?>

					</table>
				<div class="col-md-4 col-md-offset-4">
					<a class="btn-block" href="<?php echo base_url('docentes/Docentes')?>">
					<img width="130" src="<?php echo base_url('imagenes/subir-boton.png') ?>" alt=""></a>
				</div>
			</div><br>
		</div>
	</section>
</div>
