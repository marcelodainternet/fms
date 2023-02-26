<?php
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php
$ttitulo = 'Meu cadastro';
include('inc.head.php');
?>
</head>
<body>
<?php
include('inc.menu.php');
?>
<div class="container">
<div class="row">
<div align="center" class="col-md-12" style="margin-top:80px;">
<h1><i class="fas fa-user"></i> Meu cadastro</h1>
<p>Mantenha seu cadastro sempre atualizado!</p>
</div>
</div>
</div>

<div class="container">
<ol class="breadcrumb">
<li><a href="inicial.php">Inicial</a></li>
<li class="active">Meu cadastro</li>
</ol>
<?php
if($_POST){
$sql = 'UPDATE usuarios SET 
nome = \''.ai($a, $_POST['nome']).'\', 
e_mail = \''.ai($a, $_POST['e_mail']).'\', 
senha = \''.ai($a, md5($_POST['senha'])).'\' WHERE id = \''.ai($a, $_SESSION['id_usuarios']).'\'';
$res = log_mysqli_query($a, $sql);
?>
<div class="alert alert-success" role="alert"><strong>OK!</strong> Cadastro atualizado com sucesso!</div>
<?php
}
$sql = 'SELECT * FROM usuarios WHERE id = \''.ai($a, $_SESSION['id_usuarios']).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
?>
<form id="form1" name="form1" method="post" action="meu-cadastro.php">
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 bloco">
<div class="well">
<label for="nome">Nome <i class="fas fa-asterisk"></i></label>
<input autocomplete="<?php echo rand(); ?>" type="text" required="required" name="nome" id="nome" class="form-control" value="<?php echo $usuarios['nome'] ?>">
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 bloco">
<div class="well">
<label for="e_mail">E-mail <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-envelope"></i></span>
<input autocomplete="<?php echo rand(); ?>" type="email" required="required" name="e_mail" id="e_mail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $usuarios['e_mail'] ?>"/>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 bloco">
<div class="well">
<label for="senha">Senha <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-lock"></i></span>
<input autocomplete="<?php echo rand(); ?>" type="password" required="required" name="senha" id="senha" class="form-control">
</div>
</div>
</div>
<div style="clear:both"></div>
<div align="center" class="col-md-12">
<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</div>
</div>
</form>
<?php include('inc.rodape.php'); ?>
</div>
</body>
</html>