<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Cupons de Descontos'; $ttabela = 'cupons_de_descontos'; $aarquivo = 'cupons-de-descontos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Cupons de Descontos" cadastrados(as)';
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
<h1>Cupons de Descontos</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['cupons_de_descontos']['excluir']){
if(filhos($a, $base, 'cupons_de_descontos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Cupons de Descontos', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `cupons_de_descontos` WHERE'.sql_subordinacao($a, 'cupons_de_descontos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Cupons de Descontos&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `cupons_de_descontos` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$cupons_de_descontos = mysqli_fetch_array($res);
if($cupons_de_descontos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Cupons de Descontos&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['cupons_de_descontos']['cadastrar']){
$sql = permissao_campos('INSERT INTO `cupons_de_descontos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'cupons-de-descontos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Cupons de Descontos cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['cupons_de_descontos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `cupons_de_descontos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'cupons-de-descontos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Cupons de Descontos alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'cupons_de_descontos';
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
<form id="form1" name="form1" method="get" action="cupons-de-descontos-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'status_site'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'Data Cadastro';
include('inc.filtro-data-hora.php');
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
$_SESSION['tabela'] = 'cupons_de_descontos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `cupons_de_descontos`.`id` DESC';
}
$sql = 'SELECT 
`cupons_de_descontos`.`id`, 
`site`.`site` AS `site`, 
`cupons_de_descontos`.`nome`, 
`cupons_de_descontos`.`imagem`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`cupons_de_descontos`.`codigo`, 
`cupons_de_descontos`.`data_expira`, 
`cupons_de_descontos`.`titulo`, 
`cupons_de_descontos`.`descricao`, 
`cupons_de_descontos`.`obs`, 
`cupons_de_descontos`.`historico`, 
`cupons_de_descontos`.`data_cadastro` 
FROM `cupons_de_descontos` 
LEFT JOIN `site` ON `site`.`id` = `cupons_de_descontos`.`id_site`
LEFT JOIN `status_site` ON `status_site`.`id` = `cupons_de_descontos`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Cupons de Descontos';
?>
<h2 style="margin:15px;">&quot;Cupons de Descontos&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'cupons-de-descontos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($cupons_de_descontos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $cupons_de_descontos[primeiro_campo_nativo($a, 'cupons_de_descontos')]).'\',
url: \'cupons-de-descontos-cadastrar.php?editar='.$cupons_de_descontos['id'].'\',
start: \''.$cupons_de_descontos[primeiro_campo_data($a, 'cupons_de_descontos')].'\',
end: \''.$cupons_de_descontos[primeiro_campo_data($a, 'cupons_de_descontos')].'\',
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
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['codigo']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`codigo`'); ?><strong>Código</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`cupons_de_descontos`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($cupons_de_descontos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $cupons_de_descontos, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $cupons_de_descontos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['imagem']['visualizar']){ ?>
<td><?php echo $cupons_de_descontos['imagem'] ?></td>
<?php
if(strtolower($cupons_de_descontos['imagem']) == 'jpg' || strtolower($cupons_de_descontos['imagem']) == 'jpeg' || strtolower($cupons_de_descontos['imagem']) == 'gif' || strtolower($cupons_de_descontos['imagem']) == 'png' || strtolower($cupons_de_descontos['imagem']) == 'bmp'){
?>
<td><?php if(is_file('cupons-de-descontos/imagem/'.$cupons_de_descontos['id'].'.'.$cupons_de_descontos['imagem'])){ ?><a href="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" target="_blank"><img src="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('cupons-de-descontos/imagem/'.$cupons_de_descontos['id'].'.'.$cupons_de_descontos['imagem'])){ ?><a href="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" target="_blank">cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $cupons_de_descontos, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['codigo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'codigo', 'texto', $cupons_de_descontos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $cupons_de_descontos); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $cupons_de_descontos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $cupons_de_descontos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $cupons_de_descontos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $cupons_de_descontos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $cupons_de_descontos); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Cupons de Descontos: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['cupons_de_descontos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=cupons_de_descontos&id=<?php echo $cupons_de_descontos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['duplicar']){ ?><a href="cupons-de-descontos-listar.php?duplicar=<?php echo $cupons_de_descontos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['editar']){ ?><a href="cupons-de-descontos-cadastrar.php?editar=<?php echo $cupons_de_descontos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['excluir']){ ?><a href="cupons-de-descontos-listar.php?excluir=<?php echo $cupons_de_descontos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($cupons_de_descontos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['cupons_de_descontos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=cupons_de_descontos&id=<?php echo $cupons_de_descontos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['duplicar']){ ?><a href="cupons-de-descontos-listar.php?duplicar=<?php echo $cupons_de_descontos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['editar']){ ?><a href="cupons-de-descontos-cadastrar.php?editar=<?php echo $cupons_de_descontos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['excluir']){ ?><a href="cupons-de-descontos-listar.php?excluir=<?php echo $cupons_de_descontos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_site']['visualizar'] && $cupons_de_descontos['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $cupons_de_descontos, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['nome']['visualizar'] && $cupons_de_descontos['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['imagem']['visualizar'] && $cupons_de_descontos['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $cupons_de_descontos['imagem'] ?></div>
<?php
if(is_file('cupons-de-descontos/imagem/'.$cupons_de_descontos['id'].'.'.$cupons_de_descontos['imagem'])){
if(strtolower($cupons_de_descontos['imagem']) == 'jpg' || strtolower($cupons_de_descontos['imagem']) == 'jpeg' || strtolower($cupons_de_descontos['imagem']) == 'gif' || strtolower($cupons_de_descontos['imagem']) == 'png' || strtolower($cupons_de_descontos['imagem']) == 'bmp'){
?>
<div class="linha"><a href="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" target="_blank"><img src="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?>" target="_blank">cupons-de-descontos/imagem/<?php echo $cupons_de_descontos['id'] ?>.<?php echo $cupons_de_descontos['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['id_status_site']['visualizar'] && $cupons_de_descontos['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $cupons_de_descontos, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['codigo']['visualizar'] && $cupons_de_descontos['codigo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`codigo`', $exibiu); ?><strong>Código</strong> <?php echo edicao_expressa($ttabela, 'codigo', 'texto', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_expira']['visualizar'] && $cupons_de_descontos['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $cupons_de_descontos); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['cupons_de_descontos']['titulo']['visualizar'] && $cupons_de_descontos['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['descricao']['visualizar'] && $cupons_de_descontos['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['obs']['visualizar'] && $cupons_de_descontos['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['historico']['visualizar'] && $cupons_de_descontos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $cupons_de_descontos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['cupons_de_descontos']['data_cadastro']['visualizar'] && $cupons_de_descontos['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`cupons_de_descontos`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $cupons_de_descontos); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Cupons de Descontos: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['cupons_de_descontos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=cupons-de-descontos-cadastrar.php"> 
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