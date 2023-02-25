<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Taxa de Entrega'; $ttabela = 'taxa_de_entrega'; $aarquivo = 'taxa-de-entrega';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Taxa de Entrega" cadastrados(as)';
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
<h1>Taxa de Entrega</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['taxa_de_entrega']['excluir']){
if(filhos($a, $base, 'taxa_de_entrega', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Taxa de Entrega', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `taxa_de_entrega` WHERE'.sql_subordinacao($a, 'taxa_de_entrega').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Taxa de Entrega&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `taxa_de_entrega` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$taxa_de_entrega = mysqli_fetch_array($res);
if($taxa_de_entrega['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Taxa de Entrega&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['taxa_de_entrega']['cadastrar']){
$sql = permissao_campos('INSERT INTO `taxa_de_entrega` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`tarifa` = \''.ai($a, moeda_mysql($_POST['tarifa'])).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Taxa de Entrega cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['taxa_de_entrega']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `taxa_de_entrega` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`tarifa` = \''.ai($a, moeda_mysql($_POST['tarifa'])).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Taxa de Entrega alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'taxa_de_entrega';
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
<form id="form1" name="form1" method="get" action="taxa-de-entrega-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'status_site'; $propriedade = 'nome';
include('inc.filtro.php');
//

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
$_SESSION['tabela'] = 'taxa_de_entrega';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `taxa_de_entrega`.`id` DESC';
}
$sql = 'SELECT 
`taxa_de_entrega`.`id`, 
`site`.`site` AS `site`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`taxa_de_entrega`.`bairro`, 
`taxa_de_entrega`.`tarifa` 
FROM `taxa_de_entrega` 
LEFT JOIN `site` ON `site`.`id` = `taxa_de_entrega`.`id_site`
LEFT JOIN `status_site` ON `status_site`.`id` = `taxa_de_entrega`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Taxa de Entrega';
?>
<h2 style="margin:15px;">&quot;Taxa de Entrega&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'taxa-de-entrega-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($taxa_de_entrega = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $taxa_de_entrega[primeiro_campo_nativo($a, 'taxa_de_entrega')]).'\',
url: \'taxa-de-entrega-cadastrar.php?editar='.$taxa_de_entrega['id'].'\',
start: \''.$taxa_de_entrega[primeiro_campo_data($a, 'taxa_de_entrega')].'\',
end: \''.$taxa_de_entrega[primeiro_campo_data($a, 'taxa_de_entrega')].'\',
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
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`taxa_de_entrega`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['tarifa']['visualizar']){ ?>
<td><?php ordenar($url, '`taxa_de_entrega`.`tarifa`'); ?><strong>Tarífa</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($taxa_de_entrega = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $taxa_de_entrega, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $taxa_de_entrega, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $taxa_de_entrega); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['tarifa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tarifa', 'moeda', $taxa_de_entrega); $totais[] = 'tarifa'; $total['tarifa'] += $taxa_de_entrega['tarifa']; ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Taxa de Entrega: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['taxa_de_entrega']['imprimir']){ ?><a href="imprimir-registro.php?tabela=taxa_de_entrega&id=<?php echo $taxa_de_entrega['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['duplicar']){ ?><a href="taxa-de-entrega-listar.php?duplicar=<?php echo $taxa_de_entrega['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['editar']){ ?><a href="taxa-de-entrega-cadastrar.php?editar=<?php echo $taxa_de_entrega['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['excluir']){ ?><a href="taxa-de-entrega-listar.php?excluir=<?php echo $taxa_de_entrega['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($taxa_de_entrega = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['taxa_de_entrega']['imprimir']){ ?><a href="imprimir-registro.php?tabela=taxa_de_entrega&id=<?php echo $taxa_de_entrega['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['duplicar']){ ?><a href="taxa-de-entrega-listar.php?duplicar=<?php echo $taxa_de_entrega['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['editar']){ ?><a href="taxa-de-entrega-cadastrar.php?editar=<?php echo $taxa_de_entrega['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['taxa_de_entrega']['excluir']){ ?><a href="taxa-de-entrega-listar.php?excluir=<?php echo $taxa_de_entrega['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_site']['visualizar'] && $taxa_de_entrega['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $taxa_de_entrega, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['id_status_site']['visualizar'] && $taxa_de_entrega['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $taxa_de_entrega, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['bairro']['visualizar'] && $taxa_de_entrega['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`taxa_de_entrega`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $taxa_de_entrega); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['taxa_de_entrega']['tarifa']['visualizar'] && $taxa_de_entrega['tarifa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`taxa_de_entrega`.`tarifa`', $exibiu); ?><strong>Tarífa</strong> <?php echo edicao_expressa($ttabela, 'tarifa', 'moeda', $taxa_de_entrega); $totais[] = 'tarifa'; $total['tarifa'] += $taxa_de_entrega['tarifa']; ?></div>
<?php } ?>

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Taxa de Entrega: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['taxa_de_entrega']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=taxa-de-entrega-cadastrar.php"> 
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