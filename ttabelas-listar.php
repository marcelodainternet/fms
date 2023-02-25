<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'tTabelas'; $ttabela = 'ttabelas'; $aarquivo = 'ttabelas';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"tTabelas" cadastrados(as)';
include('inc.head.php');
?>
</head>
<body>
<?php
if(!$_POST['modal']){
include('inc.menu.php');
?>
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<h1>tTabelas</h1>
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
if(!$_POST['modal']){
include('inc.relatorios.php');
}
include('inc.duplicar.php');
if($_GET['excluir'] && $_SESSION['permissao']['ttabelas']['excluir']){
if(filhos($a, $base, 'ttabelas', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'tTabelas', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `ttabelas` WHERE'.sql_subordinacao($a, 'ttabelas').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;tTabelas&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `ttabelas` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$ttabelas = mysqli_fetch_array($res);
if($ttabelas['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;tTabelas&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['ttabelas']['cadastrar']){
$sql = permissao_campos('INSERT INTO `ttabelas` SET 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`relacionamentos` = \''.ai($a, $_POST['relacionamentos']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> tTabelas cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['ttabelas']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `ttabelas` SET 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`relacionamentos` = \''.ai($a, $_POST['relacionamentos']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> tTabelas alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'ttabelas';
if(!$_POST['modal']){
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
Filtros
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="row">
<form id="form1" name="form1" method="get" action="ttabelas-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php

if($_SESSION['id_pperfis'] == 1){
include('ajax.filtro-propriedade.php');
}
//
include('inc.filtro-busca.php');
?>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<?php
$_SESSION['tabela'] = 'ttabelas';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `ttabelas`.`id` DESC';
}
$sql = 'SELECT 
`ttabelas`.`id`, 
`ttabelas`.`nome`, 
`ttabelas`.`relacionamentos` 
FROM `ttabelas`  
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'tTabelas';
?>
<h2 style="margin:15px;">&quot;tTabelas&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'ttabelas-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($ttabelas = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $ttabelas[primeiro_campo_nativo($a, 'ttabelas')]).'\',
url: \'ttabelas-cadastrar.php?editar='.$ttabelas['id'].'\',
start: \''.$ttabelas[primeiro_campo_data($a, 'ttabelas')].'\',
end: \''.$ttabelas[primeiro_campo_data($a, 'ttabelas')].'\',
color: \'#337ab7\'
}';
}
}
else if($_GET['exibir'] == 'tabular'){
include('inc.limpa-colunas.php');
?>
</div>
<div class="table-responsive">
<table class="table table-striped table-condensed">
<tr>
<?php if($_SESSION['permissao']['ttabelas']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`ttabelas`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['ttabelas']['relacionamentos']['visualizar']){ ?>
<td><?php ordenar($url, '`ttabelas`.`relacionamentos`'); ?><strong>relacionamentos</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($ttabelas = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['ttabelas']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $ttabelas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['ttabelas']['relacionamentos']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'relacionamentos', 'texto-grande', $ttabelas, 'tabular'); ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'tTabelas: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['ttabelas']['imprimir']){ ?><a href="imprimir-registro.php?tabela=ttabelas&id=<?php echo $ttabelas['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['duplicar']){ ?><a href="ttabelas-listar.php?duplicar=<?php echo $ttabelas['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['editar']){ ?><a href="ttabelas-cadastrar.php?editar=<?php echo $ttabelas['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['excluir']){ ?><a href="ttabelas-listar.php?excluir=<?php echo $ttabelas['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</td>
</tr>
<?php
}
?>
</table>
</div>
<div class="row">
<?php
}
else {
while($ttabelas = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['ttabelas']['imprimir']){ ?><a href="imprimir-registro.php?tabela=ttabelas&id=<?php echo $ttabelas['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['duplicar']){ ?><a href="ttabelas-listar.php?duplicar=<?php echo $ttabelas['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['editar']){ ?><a href="ttabelas-cadastrar.php?editar=<?php echo $ttabelas['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['ttabelas']['excluir']){ ?><a href="ttabelas-listar.php?excluir=<?php echo $ttabelas['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['ttabelas']['nome']['visualizar'] && $ttabelas['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`ttabelas`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $ttabelas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['ttabelas']['relacionamentos']['visualizar'] && $ttabelas['relacionamentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`ttabelas`.`relacionamentos`', $exibiu); ?><strong>relacionamentos</strong> <?php echo edicao_expressa($ttabela, 'relacionamentos', 'texto-grande', $ttabelas); ?></div>
<?php } ?>

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'tTabelas: ';
include('inc.relacionamentos.php');
?>
</div>
</div>
</div>
<?php
$exibiu = true;
include('inc.modulos-assimetricos.php');
}
}
include('inc.paginacao.php');
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['ttabelas']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=ttabelas-cadastrar.php"> 
<?php
}
?>
</div>
<?php } ?>
<div style="clear:both"></div>
<?php include('inc.rodape.php'); ?>
</div>
</body>
</html>