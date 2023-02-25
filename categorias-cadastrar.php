<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Categorias'; $ttabela = 'categorias'; $aarquivo = 'categorias';
if((!$_SESSION['permissao']['categorias']['cadastrar'] && !$_SESSION['permissao']['categorias']['editar']) || (!$_SESSION['permissao']['categorias']['cadastrar'] && !$_GET['editar'])){
header('Location: ./?sair=true');
exit;
}
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Cadastro de "Categorias"';
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
<h1>Categorias</h1>
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
<h2 style="margin:15px;">Cadastro de "Categorias"</h2>
<form id="form1" name="form1" method="post" action="categorias-listar.php" enctype="multipart/form-data">
<?php include('ajax.categorias.php'); ?>
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