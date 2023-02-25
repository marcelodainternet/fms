<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Etiquetas Imóvel'; $ttabela = 'etiquetas_imovel'; $aarquivo = 'etiquetas-imovel';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Etiquetas Imóvel" cadastrados(as)';
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
<h1>Etiquetas Imóvel</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['etiquetas_imovel']['excluir']){
if(filhos($a, $base, 'etiquetas_imovel', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Etiquetas Imóvel', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `etiquetas_imovel` WHERE'.sql_subordinacao($a, 'etiquetas_imovel').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Etiquetas Imóvel&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `etiquetas_imovel` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$etiquetas_imovel = mysqli_fetch_array($res);
if($etiquetas_imovel['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Etiquetas Imóvel&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['etiquetas_imovel']['cadastrar']){
$sql = permissao_campos('INSERT INTO `etiquetas_imovel` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`label` = \''.ai($a, $_POST['label']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Etiquetas Imóvel cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['etiquetas_imovel']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `etiquetas_imovel` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`label` = \''.ai($a, $_POST['label']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Etiquetas Imóvel alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'etiquetas_imovel';
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
<form id="form1" name="form1" method="get" action="etiquetas-imovel-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
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
$_SESSION['tabela'] = 'etiquetas_imovel';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `etiquetas_imovel`.`id` DESC';
}
$sql = 'SELECT 
`etiquetas_imovel`.`id`, 
`site`.`site` AS `site`, 
`etiquetas_imovel`.`nome`, 
`etiquetas_imovel`.`label` 
FROM `etiquetas_imovel` 
LEFT JOIN `site` ON `site`.`id` = `etiquetas_imovel`.`id_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Etiquetas Imóvel';
?>
<h2 style="margin:15px;">&quot;Etiquetas Imóvel&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'etiquetas-imovel-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($etiquetas_imovel = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $etiquetas_imovel[primeiro_campo_nativo($a, 'etiquetas_imovel')]).'\',
url: \'etiquetas-imovel-cadastrar.php?editar='.$etiquetas_imovel['id'].'\',
start: \''.$etiquetas_imovel[primeiro_campo_data($a, 'etiquetas_imovel')].'\',
end: \''.$etiquetas_imovel[primeiro_campo_data($a, 'etiquetas_imovel')].'\',
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
<?php if($_SESSION['permissao']['etiquetas_imovel']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`etiquetas_imovel`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['label']['visualizar']){ ?>
<td><?php ordenar($url, '`etiquetas_imovel`.`label`'); ?><strong>Label</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($etiquetas_imovel = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['etiquetas_imovel']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $etiquetas_imovel, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $etiquetas_imovel); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['label']['visualizar']){ ?>
<td><?php echo label($etiquetas_imovel['label']); ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Etiquetas Imóvel: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['etiquetas_imovel']['imprimir']){ ?><a href="imprimir-registro.php?tabela=etiquetas_imovel&id=<?php echo $etiquetas_imovel['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['duplicar']){ ?><a href="etiquetas-imovel-listar.php?duplicar=<?php echo $etiquetas_imovel['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['editar']){ ?><a href="etiquetas-imovel-cadastrar.php?editar=<?php echo $etiquetas_imovel['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['excluir']){ ?><a href="etiquetas-imovel-listar.php?excluir=<?php echo $etiquetas_imovel['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($etiquetas_imovel = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['etiquetas_imovel']['imprimir']){ ?><a href="imprimir-registro.php?tabela=etiquetas_imovel&id=<?php echo $etiquetas_imovel['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['duplicar']){ ?><a href="etiquetas-imovel-listar.php?duplicar=<?php echo $etiquetas_imovel['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['editar']){ ?><a href="etiquetas-imovel-cadastrar.php?editar=<?php echo $etiquetas_imovel['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_imovel']['excluir']){ ?><a href="etiquetas-imovel-listar.php?excluir=<?php echo $etiquetas_imovel['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['etiquetas_imovel']['id_site']['visualizar'] && $etiquetas_imovel['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $etiquetas_imovel, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['nome']['visualizar'] && $etiquetas_imovel['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_imovel`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $etiquetas_imovel); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_imovel']['label']['visualizar'] && $etiquetas_imovel['label']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_imovel`.`label`', $exibiu); ?><strong>Label</strong> <?php echo label($etiquetas_imovel['label']); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Etiquetas Imóvel: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['etiquetas_imovel']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=etiquetas-imovel-cadastrar.php"> 
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