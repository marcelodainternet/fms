<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'lLogs'; $ttabela = 'llogs'; $aarquivo = 'llogs';
if((!$_SESSION['permissao']['llogs']['cadastrar'] && !$_SESSION['permissao']['llogs']['editar']) || (!$_SESSION['permissao']['llogs']['cadastrar'] && !$_GET['editar'])){
header('Location: ./?sair=true');
exit;
}
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Cadastro de "lLogs"';
include('inc.head.php');
?>
</head>
<body>
<?php
if(!$_GET['modal']){
include('inc.menu.php');
?>
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<h1>lLogs</h1>
<p><?php include('inc.link-graficos-subordinacao.php'); ?></p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
<?php include('inc.logotipo.php'); ?>
</div>
</div>
</div>
</div>
<?php include('inc.alerta.php'); ?>
<?php } ?>
<div class="container">
<?php
include('inc.abas.php');
include('inc.cadastrar.php');
?>
<div class="row">
<h2 style="margin:15px;">Cadastro de "lLogs"</h2>
<form id="form1" name="form1" method="post" action="llogs-listar.php" enctype="multipart/form-data">
<?php
$llabel = 'Usuário'; $cclasse = 'usuarios'; $ppropriedade = 'nome';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'IP';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'URL';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Arquivos';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Data Hora';
include('inc.componente-data-hora-atual-sugerida.php');
?>
<?php
$llabel = 'SQL Executado';
include('inc.componente-html.php');
?>
<?php
$llabel = 'Parâmetros';
include('inc.componente-html.php');
?>

<div style="clear:both"></div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<input type="hidden" name="modal" value="<?php echo strip_tags($_GET['modal']); ?>">
<input type="hidden" name="editar" value="<?php echo strip_tags($_GET['editar']); ?>">

<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enviar</button>
</div>
<div style="clear:both"></div>
</form>

<script>
var botaoFechar = document.querySelector('.modal [data-dismiss="modal"]');
botaoFechar.addEventListener('click', function (event) {
carrega_campos('<?php echo $aarquivo ?>');
});
</script>

</div>
<?php include('inc.rodape.php'); ?>
</div>
</body>
</html>