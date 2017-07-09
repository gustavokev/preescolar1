<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('css/estilos.css') ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
</head>
<body background="<!-- <?php //echo base_url('imagenes/chicos.jpg') ?> -->" id="fondo">

<header>
	<div class="container-fluid text-center">
		<h1 class="bg-warning">Estas en: <?php echo $titulo ?>   
		<video class="video-responsive img-circle" height="" width="70" autoplay="true" loop="true">
			<source src="//perform.tcsrv.com/video/28/283812b2-ca77-4bfb-b4da-97e1ee150dda.mp4" type="video/mp4">
		</video></h1>
	</div>
</header>
