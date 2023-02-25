<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'E-mails Captados'; $ttabela = 'e_mails_captados'; $aarquivo = 'e-mails-captados';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"E-mails Captados" cadastrados(as)';
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
<h1>E-mails Captados</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['e_mails_captados']['excluir']){
if(filhos($a, $base, 'e_mails_captados', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'E-mails Captados', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `e_mails_captados` WHERE'.sql_subordinacao($a, 'e_mails_captados').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;E-mails Captados&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `e_mails_captados` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$e_mails_captados = mysqli_fetch_array($res);
if($e_mails_captados['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;E-mails Captados&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['e_mails_captados']['cadastrar']){
$sql = permissao_campos('INSERT INTO `e_mails_captados` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`empresa` = \''.ai($a, $_POST['empresa']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`fonte` = \''.ai($a, $_POST['fonte']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> E-mails Captados cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['e_mails_captados']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `e_mails_captados` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`empresa` = \''.ai($a, $_POST['empresa']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`fonte` = \''.ai($a, $_POST['fonte']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> E-mails Captados alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'e_mails_captados';
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
<form id="form1" name="form1" method="get" action="e-mails-captados-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'status_site'; $propriedade = 'nome';
include('inc.filtro.php');
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
$_SESSION['tabela'] = 'e_mails_captados';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `e_mails_captados`.`id` DESC';
}
$sql = 'SELECT 
`e_mails_captados`.`id`, 
`site`.`site` AS `site`, 
`e_mails_captados`.`nome`, 
`e_mails_captados`.`empresa`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`e_mails_captados`.`telefone`, 
`e_mails_captados`.`e_mail`, 
`e_mails_captados`.`fonte`, 
`e_mails_captados`.`obs`, 
`e_mails_captados`.`historico`, 
`e_mails_captados`.`data_cadastro` 
FROM `e_mails_captados` 
LEFT JOIN `site` ON `site`.`id` = `e_mails_captados`.`id_site`
LEFT JOIN `status_site` ON `status_site`.`id` = `e_mails_captados`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'E-mails Captados';
?>
<h2 style="margin:15px;">&quot;E-mails Captados&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'e-mails-captados-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($e_mails_captados = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $e_mails_captados[primeiro_campo_nativo($a, 'e_mails_captados')]).'\',
url: \'e-mails-captados-cadastrar.php?editar='.$e_mails_captados['id'].'\',
start: \''.$e_mails_captados[primeiro_campo_data($a, 'e_mails_captados')].'\',
end: \''.$e_mails_captados[primeiro_campo_data($a, 'e_mails_captados')].'\',
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
<?php if($_SESSION['permissao']['e_mails_captados']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['empresa']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`empresa`'); ?><strong>Empresa</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['fonte']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`fonte`'); ?><strong>Fonte</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`e_mails_captados`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($e_mails_captados = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['e_mails_captados']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $e_mails_captados, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $e_mails_captados); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['empresa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'empresa', 'texto', $e_mails_captados); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $e_mails_captados, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $e_mails_captados); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $e_mails_captados); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['fonte']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'fonte', 'texto', $e_mails_captados); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $e_mails_captados, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $e_mails_captados, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $e_mails_captados); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'E-mails Captados: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['e_mails_captados']['imprimir']){ ?><a href="imprimir-registro.php?tabela=e_mails_captados&id=<?php echo $e_mails_captados['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['duplicar']){ ?><a href="e-mails-captados-listar.php?duplicar=<?php echo $e_mails_captados['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['editar']){ ?><a href="e-mails-captados-cadastrar.php?editar=<?php echo $e_mails_captados['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['excluir']){ ?><a href="e-mails-captados-listar.php?excluir=<?php echo $e_mails_captados['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($e_mails_captados = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['e_mails_captados']['imprimir']){ ?><a href="imprimir-registro.php?tabela=e_mails_captados&id=<?php echo $e_mails_captados['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['duplicar']){ ?><a href="e-mails-captados-listar.php?duplicar=<?php echo $e_mails_captados['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['editar']){ ?><a href="e-mails-captados-cadastrar.php?editar=<?php echo $e_mails_captados['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['e_mails_captados']['excluir']){ ?><a href="e-mails-captados-listar.php?excluir=<?php echo $e_mails_captados['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['e_mails_captados']['id_site']['visualizar'] && $e_mails_captados['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $e_mails_captados, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['nome']['visualizar'] && $e_mails_captados['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['empresa']['visualizar'] && $e_mails_captados['empresa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`empresa`', $exibiu); ?><strong>Empresa</strong> <?php echo edicao_expressa($ttabela, 'empresa', 'texto', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['id_status_site']['visualizar'] && $e_mails_captados['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $e_mails_captados, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['telefone']['visualizar'] && $e_mails_captados['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['e_mail']['visualizar'] && $e_mails_captados['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['fonte']['visualizar'] && $e_mails_captados['fonte']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`fonte`', $exibiu); ?><strong>Fonte</strong> <?php echo edicao_expressa($ttabela, 'fonte', 'texto', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['obs']['visualizar'] && $e_mails_captados['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['historico']['visualizar'] && $e_mails_captados['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $e_mails_captados); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['e_mails_captados']['data_cadastro']['visualizar'] && $e_mails_captados['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`e_mails_captados`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $e_mails_captados); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'E-mails Captados: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['e_mails_captados']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=e-mails-captados-cadastrar.php"> 
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