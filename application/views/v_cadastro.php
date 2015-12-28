<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo ?> - Mini-Crud com Bootstrap e CodeIgniter 3.0</title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
	<style>
		.erro {
			color: #f00;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center"><?= $titulo ?></h1>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<?= form_open('cadastro/store')  ?>
					<div class="form-group">
						<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>
					<div class="form-group">
						<label for="telefone">Telefone</label><span class="erro"><?php echo form_error('telefone') ?  : ''; ?></span>
						<input type="text" name="telefone" id="telefone" class="form-control" value="<?= set_value('telefone') ? : (isset($telefone) ? $telefone : ''); ?>" />
					</div>
					<div class="form-group">
						<label for="email">E-mail</label><span class="erro"><?php echo form_error('email') ?  : ''; ?></span>
						<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ? : (isset($email) ? $email : '') ; ?>" />
					</div>
					<div class="form-group">
						<label for="observacoes">Observações</label><span class="erro"><?php echo form_error('observacoes') ?  : ''; ?></span>
						<textarea name="observacoes" id="observacoes" class="form-control" /><?= set_value('observacoes') ? : (isset($observacoes) ? $observacoes : ''); ?></textarea>
					</div>
					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
				<?= form_close(); ?>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<?= anchor('', 'Página Inicial') ?>
			</div>
		</div>	
	</div>
</body>
</html>