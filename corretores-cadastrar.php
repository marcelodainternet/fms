<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Corretores'; $ttabela = 'corretores'; $aarquivo = 'corretores';
if((!$_SESSION['permissao']['corretores']['cadastrar'] && !$_SESSION['permissao']['corretores']['editar']) || (!$_SESSION['permissao']['corretores']['cadastrar'] && !$_GET['editar'])){
header('Location: ./?sair=true');
exit;
}
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Cadastro de "Corretores"';
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
<h1>Corretores</h1>
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
<h2 style="margin:15px;">Cadastro de "Corretores"</h2>
<form id="form1" name="form1" method="post" action="corretores-listar.php" enctype="multipart/form-data">
<?php include('ajax.corretores.php'); ?>
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