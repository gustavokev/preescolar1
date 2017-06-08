<div class="container">
<section class="bg-info main row">
    
    <aside class="col-md-2 text-center">
    <h2 class="bg-danger">MENU</h2>
    <br>
            <p><a class="btn btn-block btn-success" href="<?php echo base_url('alumnos/Alumnos') ?>">Alumnos</a>
        	<a class="btn btn-block btn-success" href="<?php echo base_url('representantes/Representantes') ?>">Representantes</a>
        	<a class="btn btn-block btn-success" href="<?php echo base_url('docentes/Docentes') ?>">Docentes</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('anio/Anio') ?>">Año Escolar</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('grados/Grados') ?>">Grados</a>
			<a class="btn btn-block btn-success" href="<?php echo base_url('estados/Estados') ?>">Estados</a>
            <a class="btn btn-block btn-success" href="<?php echo base_url('parroquias/Parroquias') ?>">Parroquias</a></p>
    </aside>

    <div class="col-md-8"><br>
    <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a>
    <a class="btn btn-success" href="<?php echo base_url('municipios/Municipios/registrar') ?>" title="">Registrar Municipio</a>

		
		<div class="table-responsive"><br>
			<table class="table table-responsive table-bordered table-hover table-condensed">
	
		<tr class="danger">
			<th class=" text-center"># ID</th>
			<th class=" text-center">Municipio</th>
			<th class=" text-center">Estado</th>
			<th class=" text-center">Editar</th>
			<th class=" text-center">Eliminar</th>
			
		</tr>
	
		<?php
		$i=1;
            foreach ($listar as $municipios) {
                ?>

		<tr class="">
            <td class="active text-right"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></td>
			<td class="success"><?php echo $municipios->municipio?></td>
			<td class="info"><?php echo $municipios->estado?></td>
			
			<td class="active text-center"><a class="btn bg-warning" href="<?php echo base_url('municipios/Municipios/modificar/'.$municipios->id) ?>">Editar</a></td>
			<td class="active text-center"><a class="btn bg-danger" href="<?php echo base_url('municipios/Municipios/eliminar/'.$municipios->id) ?>">Eliminar</a></td>
		</tr>
	
			<?php
			$i++;
                }
                ?>

	</table>
	</div>
		<div class="col-md-4 col-md-offset-4">
    		<a class="btn btn-primary btn-block" href="<?php echo base_url('municipios/Municipios')?>">Arriba</a>
		</div>
	</div>
</div>
	
