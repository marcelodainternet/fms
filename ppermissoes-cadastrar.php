<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'pPermissões'; $ttabela = 'ppermissoes'; $aarquivo = 'ppermissoes';
if((!$_SESSION['permissao']['ppermissoes']['cadastrar'] && !$_SESSION['permissao']['ppermissoes']['editar']) || (!$_SESSION['permissao']['ppermissoes']['cadastrar'] && !$_GET['editar'])){
header('Location: ./?sair=true');
exit;
}
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Cadastro de "pPermissões"';
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
<h1>pPermissões</h1>
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
<h2 style="margin:15px;">Cadastro de "pPermissões"</h2>
<form id="form1" name="form1" method="post" action="ppermissoes-listar.php" enctype="multipart/form-data">
<?php
$llabel = 'Perfil'; $cclasse = 'pperfis'; $ppropriedade = 'nome';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Tabela'; $cclasse = 'ttabelas'; $ppropriedade = 'nome';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Campo'; $cclasse = 'ccampos'; $ppropriedade = 'nome';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Ação'; $cclasse = 'aacoes'; $ppropriedade = 'nome';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Permissão';
include('inc.componente-sim-nao.php');
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