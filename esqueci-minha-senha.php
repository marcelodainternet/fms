<?php
session_start();
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php
$ttitulo = 'Esqueci minha senha';
include('inc.head.php');
?>
</head>
<body>
<div class="container">
<div class="row">
<div align="center" class="col-12">
<br><a href="./"><?php include('inc.logotipo.php'); ?></a>
<h3><i class="fas fa-life-ring"></i> Esqueci minha senha</h3> 
<p>Para receber instruções para você alterar sua senha preencha o formulário abaixo.<br></p>
</div>
</div>
</div><br>
<div class="container">
<?php
if($_POST){
$sql = 'SELECT id, nome, e_mail, senha FROM usuarios WHERE e_mail = \''.ai($a, $_POST['e_mail']).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
if(!$usuarios['id']){
?>
<div align="center" class="alert alert-danger" role="alert"><strong>Erro!</strong> E-mail não encontrado!</div> 
<?php
}
else {
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'localhost';
$mail->Port = 587;
$mail->Username = 'admin@educadmin.com.br';
$mail->Password = 'emMARILETEea@';
$mail->setFrom('admin@educadmin.com.br', 'EducAdmin');
$mail->addReplyTo('admin@educadmin.com.br', 'EducAdmin');
$mail->addAddress($usuarios['e_mail'], utf8_decode($usuarios['nome']));
$mail->Subject = utf8_decode('Esqueci minha senha');
$mensagem = utf8_decode($usuarios['nome'].', 
<a href="https://educadmin.com.br/alterar-minha-senha.php?id='.$usuarios['id'].'&s='.$usuarios['senha'].'">Clique aqui para alterar sua senha.</a>
<br><img src="imgs/logo.fw.png" width="130" >
www.educadmin.com.br
');
$mail->msgHTML(nl2br($mensagem));
$mail->AltBody = $mensagem;
if(!$mail->send()) {
?>
<div align="center" class="alert alert-danger" role="alert"><strong>Erro!</strong> Erro ao enviar e-mail: <?php echo $mail->ErrorInfo; ?></div>
<?php
} else {
?>
<div align="center" class="alert alert-success" role="alert"><strong>OK!</strong> As instruções para você alterar sua senha foram enviadas para o seu e-mail!</div>
<?php
}
}
}
else {
?>
<div class="row">
<form id="form1" name="form1" method="post" action="esqueci-minha-senha.php">

<div class="hidden-xs col-sm-2 col-md-3 col-lg-4"></div>
<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
<div class="well">
<label for="e_mail">E-mail <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-envelope"></i></span>
<input autocomplete="<?php echo rand(); ?>" type="email" required="required" name="e_mail" id="e_mail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
</div>
</div>
</div>
<div class="hidden-xs col-sm-2 col-md-3 col-lg-4"></div>

<div style="clear:both"></div>
<div align="center" class="col-12 bloco">
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