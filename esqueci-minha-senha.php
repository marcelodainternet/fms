<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
session_start();
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Esqueci minha senha';
include('inc.head.php');
?>
</head>
<body>
<?php include('inc.menu.php'); ?>
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<h1><i class="fas fa-life-ring"></i> Esqueci minha senha</h1> 
<p>Para receber instruções para você alterar sua senha preencha o formulário abaixo.</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
<?php include('inc.logotipo.php'); ?>
</div>
</div>
</div>
</div>
<div class="container">
<ol class="breadcrumb">
<li><a href="./">Home</a></li>
<li class="active">Esqueci minha senha</li>
</ol>
<?php
if($_POST){
$sql = 'SELECT id, nome, e_mail, senha FROM usuarios WHERE e_mail = \''.ai($a, $_POST['e_mail']).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
if(!$usuarios['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> E-mail não encontrado!</div> 
<?php
}
else {
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'seuhost';
$mail->Port = 587;
$mail->Username = 'seuemail@seudominio.com';
$mail->Password = 'suasenha';
$mail->setFrom('seuemail@seudominio.com', 'Seu Nome');
$mail->addReplyTo('seuemail@seudominio.com', 'Seu Nome');
$mail->addAddress($usuarios['e_mail'], utf8_decode($usuarios['nome']));
$mail->Subject = utf8_decode('Esqueci minha senha');
$mensagem = utf8_decode($usuarios['nome'].', 
<a href="http://www.seudominio.com.br/alterar-minha-senha.php?id='.$usuarios['id'].'&s='.$usuarios['senha'].'">Clique aqui para alterar sua senha.</a>
Seu Sistema
www.seudominio.com.br
');
$mail->msgHTML(nl2br($mensagem));
$mail->AltBody = $mensagem;
if(!$mail->send()) {
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Erro ao enviar e-mail: <?php echo $mail->ErrorInfo; ?></div>
<?php
} else {
?>
<div class="alert alert-success" role="alert"><strong>OK!</strong> As instruções para você alterar sua senha foram enviadas para o seu e-mail!</div>
<?php
}
}
}
else {
?>
<div class="row">
<form id="form1" name="form1" method="post" action="esqueci-minha-senha.php">
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<label for="e_mail">E-mail <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-envelope"></i></span>
<input autocomplete="<?php echo rand(); ?>" type="email" required="required" name="e_mail" id="e_mail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
</div>
</div>
</div>
<div style="clear:both"></div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button>
</div>
<div style="clear:both"></div>
</form>
</div>
<?php
}
?>
<?php include('inc.rodape.php'); ?>
</div>
</body>
</html>