<?php// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...  session_start();require_once('inc.iconnect.php');require_once('inc.funcoes.php');?><!doctype html><html><head><?php$ttitulo = 'Alterar minha senha';include('inc.head.php');?></head><body><?php include('inc.menu.php'); ?><div class="jumbotron"><div class="container"><h1>Alterar minha senha</h1><p>Para alterar sua senha preencha o formulário abaixo.</p></div></div><div class="container"><ol class="breadcrumb"><li><a href="./">Home</a></li><li class="active">Alterar minha senha</li></ol><?php$sql = 'SELECT * FROM usuarios WHERE id = \''.ai($a, $_GET['id']).'\' AND senha = \''.ai($a, $_GET['s']).'\'';$res = mysqli_query_erro($a, $sql);$usuarios = mysqli_fetch_array($res);if(!$usuarios['id']){?><div class="alert alert-danger" role="alert"><strong>Erro!</strong> Link inválido!</div><?phpexit;}if($_POST){if($_POST['nova_senha'] != $_POST['repetir_nova_senha']){?><div class="alert alert-danger" role="alert"><strong>Erro!</strong> As senhas não são iguais!</div><?php}else {$sql = 'UPDATE usuarios SET senha = \''.ai($a, md5($_POST['nova_senha'])).'\' WHERE id = \''.ai($a, $_GET['id']).'\' AND senha = \''.ai($a, $_GET['s']).'\'';$res = log_mysqli_query($a, $sql);$sql = 'UPDATE llogs SET sql_executado = \'Senha Alterada em '.date('d/m/Y H:i:s').'\' WHERE sql_executado LIKE \'%Tentativa de login com e-mail ou senha inválidos: '.ai($a, $usuarios['e_mail']).'%\' AND data_hora > \''.date('Y-m-d H:i:s', mktime(date('H')-1,date('i'),date('s'),date('n'),date('j'),date('Y'))).'\'';$res = mysqli_query_erro($a, $sql);?><div class="alert alert-success" role="alert"><strong>OK!</strong> Senha alterada com sucesso! <a href="./"><strong>Faça seu login com a nova senha.</strong></a></div><?php$fim = true;}}if(!$fim){?><div class="row"><form id="form1" name="form1" method="post" action=""><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><div class="well"><label for="nova_senha">Nova senha <i class="fas fa-asterisk"></i></label><div class="input-group"><span class="input-group-addon"><i class="fas fa-lock"></i></span><input autocomplete="<?php echo rand(); ?>" type="password" required="required" name="nova_senha" id="nova_senha" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A senha deve conter 8 ou mais caracteres com pelo menos um número, uma letra maiúscula e uma minúscula."/><span toggle="#nova_senha" class="fa fa-fw fa-eye field-icon toggle-password"></span></div></div></div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><div class="well"><label for="repetir_nova_senha">Repita a nova senha <i class="fas fa-asterisk"></i></label><div class="input-group"><span class="input-group-addon"><i class="fas fa-lock"></i></span><input autocomplete="<?php echo rand(); ?>" type="password" required="required" name="repetir_nova_senha" id="repetir_nova_senha" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A senha deve conter 8 ou mais caracteres com pelo menos um número, uma letra maiúscula e uma minúscula."/><span toggle="#repetir_nova_senha" class="fa fa-fw fa-eye field-icon toggle-password"></span></div></div></div><div style="clear:both"></div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Enviar</button></div><div style="clear:both"></div></form></div><?php}?><?php include('inc.rodape.php'); ?></div><script type="text/javascript">$(".toggle-password").click(function() {$(this).toggleClass("fa-eye fa-eye-slash");var input = $($(this).attr("toggle"));if (input.attr("type") == "password") {input.attr("type", "text");} else {input.attr("type", "password");}});</script><style type="text/css">.field-icon {float: right;margin-right: 10px;margin-top: -23px;position: relative;z-index: 2;}</style></body></html>