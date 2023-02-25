<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Tarefas'; $ttabela = 'tarefas'; $aarquivo = 'tarefas';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Tarefas" cadastrados(as)';
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
<h1>Tarefas</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['tarefas']['excluir']){
if(filhos($a, $base, 'tarefas', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Tarefas', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `tarefas` WHERE'.sql_subordinacao($a, 'tarefas').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Tarefas&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `tarefas` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$tarefas = mysqli_fetch_array($res);
if($tarefas['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Tarefas&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['anexos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['tarefas']['cadastrar']){
for($x=0;$x<count($_FILES['anexos']['tmp_name']);$x++){
$sql = 'INSERT INTO `tarefas` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`id_status_tarefa` = \''.ai($a, $_POST['id_status_tarefa']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`executada_de` = \''.ai($a, $_POST['executada_de']).'\', 
`executada_ate` = \''.ai($a, $_POST['executada_ate']).'\', 
`lembrete_por_email` = \''.ai($a, $_POST['lembrete_por_email']).'\', 
`repeticoes` = \''.ai($a, $_POST['repeticoes']).'\', 
`anexos` = \''.ai($a, extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos'])).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`motivo` = \''.ai($a, $_POST['motivo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`observacao` = \''.ai($a, $_POST['observacao']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['anexos']['tmp_name'][$x])){
grava_e_redimensiona_arquivo($_FILES['anexos']['tmp_name'][$x], 'tarefas/anexos/'.$id.'.'.extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos']), 1920);
log_arquivos($a, 'PUT');
}
}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Tarefas cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['tarefas']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `tarefas` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`id_status_tarefa` = \''.ai($a, $_POST['id_status_tarefa']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`executada_de` = \''.ai($a, $_POST['executada_de']).'\', 
`executada_ate` = \''.ai($a, $_POST['executada_ate']).'\', 
`lembrete_por_email` = \''.ai($a, $_POST['lembrete_por_email']).'\', 
`repeticoes` = \''.ai($a, $_POST['repeticoes']).'\', 
`anexos` = \''.ai($a, extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos'])).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`motivo` = \''.ai($a, $_POST['motivo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`observacao` = \''.ai($a, $_POST['observacao']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['anexos']['tmp_name'][$x])){
grava_e_redimensiona_arquivo($_FILES['anexos']['tmp_name'][$x], 'tarefas/anexos/'.$id.'.'.extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos']), 1920);
log_arquivos($a, 'PUT');
}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Tarefas alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'tarefas';
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
<form id="form1" name="form1" method="get" action="tarefas-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'status_tarefa'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'destaque';
include('inc.filtro-sn.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'Executada De';
include('inc.filtro-data-hora.php');
//
$filtrar = 'Executada Até';
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
$_SESSION['tabela'] = 'tarefas';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `tarefas`.`id` DESC';
}
$sql = 'SELECT 
`tarefas`.`id`, 
`site`.`site` AS `site`, 
`tarefas`.`nome`, 
`status_tarefa`.`nome` AS `status`, 
`status_tarefa`.`label` AS `label_status`, 
`tarefas`.`destaque`, 
`tarefas`.`data_expira`, 
`tarefas`.`executada_de`, 
`tarefas`.`executada_ate`, 
`tarefas`.`lembrete_por_email`, 
`tarefas`.`repeticoes`, 
`tarefas`.`anexos`, 
`tarefas`.`titulo`, 
`tarefas`.`detalhe`, 
`tarefas`.`motivo`, 
`tarefas`.`descricao`, 
`tarefas`.`observacao`, 
`tarefas`.`historico`, 
`tarefas`.`data_cadastro` 
FROM `tarefas` 
LEFT JOIN `site` ON `site`.`id` = `tarefas`.`id_site`
LEFT JOIN `status_tarefa` ON `status_tarefa`.`id` = `tarefas`.`id_status_tarefa` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Tarefas';
?>
<h2 style="margin:15px;">&quot;Tarefas&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'tarefas-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($tarefas = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $tarefas[primeiro_campo_nativo($a, 'tarefas')]).'\',
url: \'tarefas-cadastrar.php?editar='.$tarefas['id'].'\',
start: \''.$tarefas[primeiro_campo_data($a, 'tarefas')].'\',
end: \''.$tarefas[primeiro_campo_data($a, 'tarefas')].'\',
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
<?php if($_SESSION['permissao']['tarefas']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['id_status_tarefa']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_tarefa_usuarios']){ ?>
<td><?php ordenar($url, '`status_tarefa`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['destaque']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`destaque`'); ?><strong>Destaque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_de']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`executada_de`'); ?><strong>Executada De</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_ate']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`executada_ate`'); ?><strong>Executada Até</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['lembrete_por_email']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`lembrete_por_email`'); ?><strong>Lembrete por Email</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['repeticoes']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`repeticoes`'); ?><strong>Repetições</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['anexos']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`anexos`'); ?><strong>Anexos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['tarefas']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['detalhe']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`detalhe`'); ?><strong>Detalhe</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['motivo']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`motivo`'); ?><strong>Motivo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['observacao']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`observacao`'); ?><strong>Observação</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`tarefas`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($tarefas = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['tarefas']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $tarefas, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['id_status_tarefa']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_tarefa_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_tarefa', 'selecao', $tarefas, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['destaque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $tarefas); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_de']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'executada_de', 'data-hora', $tarefas); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_ate']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'executada_ate', 'data-hora', $tarefas); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['lembrete_por_email']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'lembrete_por_email', 'e-mail', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['repeticoes']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'repeticoes', 'numero-inteiro', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['anexos']['visualizar']){ ?>
<td><?php echo $tarefas['anexos'] ?></td>
<?php
if(strtolower($tarefas['anexos']) == 'jpg' || strtolower($tarefas['anexos']) == 'jpeg' || strtolower($tarefas['anexos']) == 'gif' || strtolower($tarefas['anexos']) == 'png' || strtolower($tarefas['anexos']) == 'bmp'){
?>
<td><?php if(is_file('tarefas/anexos/'.$tarefas['id'].'.'.$tarefas['anexos'])){ ?><a href="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" target="_blank"><img src="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('tarefas/anexos/'.$tarefas['id'].'.'.$tarefas['anexos'])){ ?><a href="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" target="_blank">tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['tarefas']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['detalhe']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['motivo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'motivo', 'texto', $tarefas); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $tarefas, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['observacao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'observacao', 'texto-grande', $tarefas, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $tarefas, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $tarefas); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Tarefas: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['tarefas']['imprimir']){ ?><a href="imprimir-registro.php?tabela=tarefas&id=<?php echo $tarefas['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['duplicar']){ ?><a href="tarefas-listar.php?duplicar=<?php echo $tarefas['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['editar']){ ?><a href="tarefas-cadastrar.php?editar=<?php echo $tarefas['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['excluir']){ ?><a href="tarefas-listar.php?excluir=<?php echo $tarefas['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($tarefas = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['tarefas']['imprimir']){ ?><a href="imprimir-registro.php?tabela=tarefas&id=<?php echo $tarefas['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['duplicar']){ ?><a href="tarefas-listar.php?duplicar=<?php echo $tarefas['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['editar']){ ?><a href="tarefas-cadastrar.php?editar=<?php echo $tarefas['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['excluir']){ ?><a href="tarefas-listar.php?excluir=<?php echo $tarefas['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['tarefas']['id_site']['visualizar'] && $tarefas['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $tarefas, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['nome']['visualizar'] && $tarefas['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['id_status_tarefa']['visualizar'] && $tarefas['status']){ ?>
<?php if(!$_SESSION['id_status_tarefa_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_tarefa`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_tarefa', 'selecao', $tarefas, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['destaque']['visualizar'] && $tarefas['destaque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`destaque`', $exibiu); ?><strong>Destaque</strong> <?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_expira']['visualizar'] && $tarefas['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $tarefas); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_de']['visualizar'] && $tarefas['executada_de'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`executada_de`', $exibiu); ?><strong>Executada De</strong> <?php echo edicao_expressa($ttabela, 'executada_de', 'data-hora', $tarefas); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['executada_ate']['visualizar'] && $tarefas['executada_ate'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`executada_ate`', $exibiu); ?><strong>Executada Até</strong> <?php echo edicao_expressa($ttabela, 'executada_ate', 'data-hora', $tarefas); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['tarefas']['lembrete_por_email']['visualizar'] && $tarefas['lembrete_por_email']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`lembrete_por_email`', $exibiu); ?><strong>Lembrete por Email</strong> <?php echo edicao_expressa($ttabela, 'lembrete_por_email', 'e-mail', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['repeticoes']['visualizar'] && $tarefas['repeticoes']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`repeticoes`', $exibiu); ?><strong>Repetições</strong> <?php echo edicao_expressa($ttabela, 'repeticoes', 'numero-inteiro', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['anexos']['visualizar'] && $tarefas['anexos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`anexos`', $exibiu); ?><strong>Anexos</strong> <?php echo $tarefas['anexos'] ?></div>
<?php
if(is_file('tarefas/anexos/'.$tarefas['id'].'.'.$tarefas['anexos'])){
if(strtolower($tarefas['anexos']) == 'jpg' || strtolower($tarefas['anexos']) == 'jpeg' || strtolower($tarefas['anexos']) == 'gif' || strtolower($tarefas['anexos']) == 'png' || strtolower($tarefas['anexos']) == 'bmp'){
?>
<div class="linha"><a href="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" target="_blank"><img src="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?>" target="_blank">tarefas/anexos/<?php echo $tarefas['id'] ?>.<?php echo $tarefas['anexos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['tarefas']['titulo']['visualizar'] && $tarefas['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['detalhe']['visualizar'] && $tarefas['detalhe']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`detalhe`', $exibiu); ?><strong>Detalhe</strong> <?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['motivo']['visualizar'] && $tarefas['motivo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`motivo`', $exibiu); ?><strong>Motivo</strong> <?php echo edicao_expressa($ttabela, 'motivo', 'texto', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['descricao']['visualizar'] && $tarefas['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['observacao']['visualizar'] && $tarefas['observacao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`observacao`', $exibiu); ?><strong>Observação</strong> <?php echo edicao_expressa($ttabela, 'observacao', 'texto-grande', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['historico']['visualizar'] && $tarefas['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $tarefas); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['tarefas']['data_cadastro']['visualizar'] && $tarefas['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tarefas`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $tarefas); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Tarefas: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['tarefas']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=tarefas-cadastrar.php"> 
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