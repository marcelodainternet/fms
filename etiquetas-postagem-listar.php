<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Etiquetas Postagem'; $ttabela = 'etiquetas_postagem'; $aarquivo = 'etiquetas-postagem';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Etiquetas Postagem" cadastrados(as)';
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
<h1>Etiquetas Postagem</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['etiquetas_postagem']['excluir']){
if(filhos($a, $base, 'etiquetas_postagem', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Etiquetas Postagem', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `etiquetas_postagem` WHERE'.sql_subordinacao($a, 'etiquetas_postagem').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Etiquetas Postagem&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `etiquetas_postagem` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$etiquetas_postagem = mysqli_fetch_array($res);
if($etiquetas_postagem['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Etiquetas Postagem&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['etiquetas_postagem']['cadastrar']){
$sql = permissao_campos('INSERT INTO `etiquetas_postagem` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`label` = \''.ai($a, $_POST['label']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Etiquetas Postagem cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['etiquetas_postagem']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `etiquetas_postagem` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`label` = \''.ai($a, $_POST['label']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Etiquetas Postagem alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'etiquetas_postagem';
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
<form id="form1" name="form1" method="get" action="etiquetas-postagem-listar.php">
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
$_SESSION['tabela'] = 'etiquetas_postagem';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `etiquetas_postagem`.`id` DESC';
}
$sql = 'SELECT 
`etiquetas_postagem`.`id`, 
`site`.`site` AS `site`, 
`etiquetas_postagem`.`nome`, 
`etiquetas_postagem`.`label` 
FROM `etiquetas_postagem` 
LEFT JOIN `site` ON `site`.`id` = `etiquetas_postagem`.`id_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Etiquetas Postagem';
?>
<h2 style="margin:15px;">&quot;Etiquetas Postagem&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'etiquetas-postagem-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($etiquetas_postagem = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $etiquetas_postagem[primeiro_campo_nativo($a, 'etiquetas_postagem')]).'\',
url: \'etiquetas-postagem-cadastrar.php?editar='.$etiquetas_postagem['id'].'\',
start: \''.$etiquetas_postagem[primeiro_campo_data($a, 'etiquetas_postagem')].'\',
end: \''.$etiquetas_postagem[primeiro_campo_data($a, 'etiquetas_postagem')].'\',
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
<?php if($_SESSION['permissao']['etiquetas_postagem']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`etiquetas_postagem`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['label']['visualizar']){ ?>
<td><?php ordenar($url, '`etiquetas_postagem`.`label`'); ?><strong>Label</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($etiquetas_postagem = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['etiquetas_postagem']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $etiquetas_postagem, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $etiquetas_postagem); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['label']['visualizar']){ ?>
<td><?php echo label($etiquetas_postagem['label']); ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Etiquetas Postagem: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['etiquetas_postagem']['imprimir']){ ?><a href="imprimir-registro.php?tabela=etiquetas_postagem&id=<?php echo $etiquetas_postagem['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['duplicar']){ ?><a href="etiquetas-postagem-listar.php?duplicar=<?php echo $etiquetas_postagem['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['editar']){ ?><a href="etiquetas-postagem-cadastrar.php?editar=<?php echo $etiquetas_postagem['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['excluir']){ ?><a href="etiquetas-postagem-listar.php?excluir=<?php echo $etiquetas_postagem['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($etiquetas_postagem = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['etiquetas_postagem']['imprimir']){ ?><a href="imprimir-registro.php?tabela=etiquetas_postagem&id=<?php echo $etiquetas_postagem['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['duplicar']){ ?><a href="etiquetas-postagem-listar.php?duplicar=<?php echo $etiquetas_postagem['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['editar']){ ?><a href="etiquetas-postagem-cadastrar.php?editar=<?php echo $etiquetas_postagem['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['etiquetas_postagem']['excluir']){ ?><a href="etiquetas-postagem-listar.php?excluir=<?php echo $etiquetas_postagem['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['etiquetas_postagem']['id_site']['visualizar'] && $etiquetas_postagem['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $etiquetas_postagem, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['nome']['visualizar'] && $etiquetas_postagem['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_postagem`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $etiquetas_postagem); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['etiquetas_postagem']['label']['visualizar'] && $etiquetas_postagem['label']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_postagem`.`label`', $exibiu); ?><strong>Label</strong> <?php echo label($etiquetas_postagem['label']); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Etiquetas Postagem: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['etiquetas_postagem']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=etiquetas-postagem-cadastrar.php"> 
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