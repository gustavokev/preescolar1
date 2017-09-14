

<div class="container" id="">
	<h1>Iniciar Sesión</h1>

	<?php if (isset($mensaje)){ ?>
		
		<h2><?php echo $mensaje?></h2>

	<?php } ?>

	<form action="<?php echo base_url('login/Usuarios/sesion/') ?>" method="POST">
	<label class="label-info control-label" for="Usuario">Usuario:</label>
		<input class="form-group bg-danger has-warning" type="text" id="aqui" name="usuario" value="<?php echo @set_value('usuario') ?>">

	<label class="label-info control-label" for="Contraseña">Contraseña:</label>
		<input class="form-group bg-danger has-warning" type="password" id="aqui" name="pass" value="<?php echo @set_value('pass') ?>">

		<input class="form-group" type="submit" name="submit" onclick="enviar_datos_ajax();" value="Entrar">
	</form>
		<a href="<?php echo base_url('login/Usuarios/registro') ?>" title="Deseo Registrarme">Registrarme</a>

	</div>
	<div class="form-group">
            <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a></p>
        </div>

	<div id="mostrardatos"></div>



	