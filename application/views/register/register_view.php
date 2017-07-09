<!DOCTYPE html>
<html>
    <head>
        <title><?=$titulo?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/funciones.js"></script>
    </head>
    <body>
    <div class="form-group">
            <p><a class="btn btn-info" href="<?php echo base_url() ?>">Inicio</a></p>
        </div>
        
        <?php
           $nombre = array(
                'name' => 'nombre',
                'id' => 'nombre',
                'value'=> set_value('nombre')
            );
            $apellido = array(
                'name' => 'apellido',
                'id' => 'apellido',
                'value'=> set_value('apellido')
            );
            $username = array(
                'name' => 'username',
                'id' => 'username',
                'value'=> set_value('username')
            );
            $password = array(
                'name' => 'password',
                'id' => 'password',
                'value'=> ''
            );
            $email = array(
                'name' => 'email',
                'id' => 'email',
                'value'=> set_value('email')
            );
            $submit = array(
                'value'=> 'Registrarme',
                'name' => 'registro',
                'id' => 'registro'
            );
        ?>
        <div class="container" id="contenedor">
            <div class="">
                <div class="" id="formulario">
                    <h2 id="logo">Formulario de registro</h2><br />
                    <?=validation_errors('<div id="error">', '</div>')?><br />
                    <?=form_open(base_url().'register/register/validar')?>
                    <?=form_label('Nombre')?>
                    <?=form_input($nombre)?><br /><br />
                    <?=form_label('Apellidos')?>
                    <?=form_input($apellido)?><br /><br />
                    <?=form_label('Email')?>
                    <span id="msgEmail"></span>
                    <?=form_input($email)?><br /><br />
                    <?=form_label('Usuario')?>
                    <span id="msgUsuario"></span>
                    <?=form_input($username)?><br /><br />
                    <?=form_label('Password')?>
                    <?=form_password($password)?><br /><br />
                    <?=form_submit($submit)?>
                    <?=form_close()?>
                    <?php
                    $registrado = $this->session->flashdata('registrado');
					if($registrado)
					{
					?>
						<div class="" id="registro_correcto"><?=$registrado?></div>
                        
					<?php
					}
                    ?>    
                </div>
            </div>
        </div>
    </body>
</html>