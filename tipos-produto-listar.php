<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Tipos Produto'; $ttabela = 'tipos_produto'; $aarquivo = 'tipos-produto';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Tipos Produto" cadastrados(as)';
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
<h1>Tipos Produto</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['tipos_produto']['excluir']){
if(filhos($a, $base, 'tipos_produto', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Tipos Produto', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `tipos_produto` WHERE'.sql_subordinacao($a, 'tipos_produto').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Tipos Produto&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `tipos_produto` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$tipos_produto = mysqli_fetch_array($res);
if($tipos_produto['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Tipos Produto&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['tipos_produto']['cadastrar']){
$sql = permissao_campos('INSERT INTO `tipos_produto` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Tipos Produto cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['tipos_produto']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `tipos_produto` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Tipos Produto alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'tipos_produto';
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
<form id="form1" name="form1" method="get" action="tipos-produto-listar.php">
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
$_SESSION['tabela'] = 'tipos_produto';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `tipos_produto`.`id` DESC';
}
$sql = 'SELECT 
`tipos_produto`.`id`, 
`site`.`site` AS `site`, 
`tipos_produto`.`nome` 
FROM `tipos_produto` 
LEFT JOIN `site` ON `site`.`id` = `tipos_produto`.`id_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Tipos Produto';
?>
<h2 style="margin:15px;">&quot;Tipos Produto&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'tipos-produto-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($tipos_produto = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $tipos_produto[primeiro_campo_nativo($a, 'tipos_produto')]).'\',
url: \'tipos-produto-cadastrar.php?editar='.$tipos_produto['id'].'\',
start: \''.$tipos_produto[primeiro_campo_data($a, 'tipos_produto')].'\',
end: \''.$tipos_produto[primeiro_campo_data($a, 'tipos_produto')].'\',
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
<?php if($_SESSION['permissao']['tipos_produto']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_produto']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`tipos_produto`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($tipos_produto = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['tipos_produto']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $tipos_produto, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_produto']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $tipos_produto); ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Tipos Produto: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['tipos_produto']['imprimir']){ ?><a href="imprimir-registro.php?tabela=tipos_produto&id=<?php echo $tipos_produto['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['duplicar']){ ?><a href="tipos-produto-listar.php?duplicar=<?php echo $tipos_produto['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['editar']){ ?><a href="tipos-produto-cadastrar.php?editar=<?php echo $tipos_produto['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['excluir']){ ?><a href="tipos-produto-listar.php?excluir=<?php echo $tipos_produto['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($tipos_produto = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['tipos_produto']['imprimir']){ ?><a href="imprimir-registro.php?tabela=tipos_produto&id=<?php echo $tipos_produto['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['duplicar']){ ?><a href="tipos-produto-listar.php?duplicar=<?php echo $tipos_produto['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['editar']){ ?><a href="tipos-produto-cadastrar.php?editar=<?php echo $tipos_produto['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tipos_produto']['excluir']){ ?><a href="tipos-produto-listar.php?excluir=<?php echo $tipos_produto['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['tipos_produto']['id_site']['visualizar'] && $tipos_produto['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $tipos_produto, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tipos_produto']['nome']['visualizar'] && $tipos_produto['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tipos_produto`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $tipos_produto); ?></div>
<?php } ?>

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Tipos Produto: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['tipos_produto']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=tipos-produto-cadastrar.php"> 
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