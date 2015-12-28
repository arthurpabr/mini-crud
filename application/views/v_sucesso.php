<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aviso - Mini-Crud com Bootstrap e CodeIgniter 3.0</title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Mensagem</h1>
		<div class="col-md-12">
			<div class="row">
				<div class="alert alert-success text-center">
					<?= $mensagem; ?>
				</div>
			</div>
			<div class="row text-center">
				<?= anchor('', 'Página Inicial');  ?>
			</div>
		</div>	
	</div>
</body>
</html>