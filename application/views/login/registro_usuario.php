

<div class="container" id="">
	<h1>Registro de Usuario</h1>

	<?php if (isset($mensaje)){ ?>
		
		<h2><?php echo $mensaje?></h2>

	<?php } ?>

	<form name="form_reg" action="<?php echo base_url('login/Usuarios/registrar/') ?>" method="POST">
	
	<label class="label-info control-label" for="Nombre">Nombre:
		<input class="form-group bg-danger has-warning" type="text" id="aqui" name="nombre" value="<?php echo @set_value('nombre') ?>"></label>

	<label class="label-info control-label" for="Correo">Correo:
		<input class="form-group bg-danger has-warning" type="text" id="aqui" name="correo" value="<?php echo @set_value('correo') ?>"></label>

	<label class="label-info control-label" for="Usuario">Usuario:
		<input class="form-group bg-danger has-warning" type="text" id="aqui" name="usuario" value="<?php echo @set_value('usuario') ?>"></label>

	<label class="label-info control-label" for="Contraseña">Contraseña:
		<input class="form-group bg-danger has-warning" type="password" id="aqui" name="pass" value="<?php echo @set_value('pass') ?>"></label>

	<label class="label-info control-label" for="Contraseña">Confirme Contraseña:
		<input class="form-group bg-danger has-warning" type="password" id="aqui" name="pass2" value="<?php echo @set_value('pass2') ?>"></label>

		<input class="form-group" type="submit" name="submit_reg" onclick="enviar_datos_ajax();" value="Registrar">
	</form>
		<a href="<?php echo base_url('login/Usuarios')?>" title="Iniciar Sesión">Inicio</a>

		<hr/>
			<?php echo validation_errors(); ?>
	</div>
	<div class="form-group">
            <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a></p>
        </div>

	<div id="mostrardatos"></div>



	