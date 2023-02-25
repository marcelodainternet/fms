<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Seções'; $ttabela = 'secoes'; $aarquivo = 'secoes';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Seções" cadastrados(as)';
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
<h1>Seções</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['secoes']['excluir']){
if(filhos($a, $base, 'secoes', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Seções', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `secoes` WHERE'.sql_subordinacao($a, 'secoes').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Seções&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `secoes` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$secoes = mysqli_fetch_array($res);
if($secoes['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Seções&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['secoes']['cadastrar']){
$sql = permissao_campos('INSERT INTO `secoes` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`ordem` = \''.ai($a, $_POST['ordem']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`background` = \''.ai($a, $_POST['background']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`parallax` = \''.ai($a, $_POST['parallax']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'secoes/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Seções cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['secoes']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `secoes` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`ordem` = \''.ai($a, $_POST['ordem']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`background` = \''.ai($a, $_POST['background']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`parallax` = \''.ai($a, $_POST['parallax']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'secoes/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Seções alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'secoes';
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
<form id="form1" name="form1" method="get" action="secoes-listar.php">
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
$filtrar = 'container';
include('inc.filtro-sn.php');
//
$filtrar = 'borda';
include('inc.filtro-sn.php');
//
$filtrar = 'borda_sombra';
include('inc.filtro-sn.php');
//
$filtrar = 'arredondado';
include('inc.filtro-sn.php');
//
$filtrar = 'parallax';
include('inc.filtro-sn.php');
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
$_SESSION['tabela'] = 'secoes';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `secoes`.`id` DESC';
}
$sql = 'SELECT 
`secoes`.`id`, 
`site`.`site` AS `site`, 
`secoes`.`nome`, 
`secoes`.`imagem`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`secoes`.`data_expira`, 
`secoes`.`ordem`, 
`secoes`.`titulo`, 
`secoes`.`subtitulo`, 
`secoes`.`descricao`, 
`secoes`.`obs`, 
`secoes`.`background`, 
`secoes`.`cortxt`, 
`secoes`.`container`, 
`secoes`.`borda`, 
`secoes`.`borda_cor`, 
`secoes`.`borda_sombra`, 
`secoes`.`arredondado`, 
`secoes`.`parallax`, 
`secoes`.`historico`, 
`secoes`.`data_cadastro` 
FROM `secoes` 
LEFT JOIN `site` ON `site`.`id` = `secoes`.`id_site`
LEFT JOIN `status_site` ON `status_site`.`id` = `secoes`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Seções';
?>
<h2 style="margin:15px;">&quot;Seções&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'secoes-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($secoes = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $secoes[primeiro_campo_nativo($a, 'secoes')]).'\',
url: \'secoes-cadastrar.php?editar='.$secoes['id'].'\',
start: \''.$secoes[primeiro_campo_data($a, 'secoes')].'\',
end: \''.$secoes[primeiro_campo_data($a, 'secoes')].'\',
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
<?php if($_SESSION['permissao']['secoes']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['secoes']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['secoes']['ordem']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`ordem`'); ?><strong>Ordem</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['background']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`background`'); ?><strong>Background</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['cortxt']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`cortxt`'); ?><strong>CorTxt</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['container']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`container`'); ?><strong>Container</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`borda`'); ?><strong>Borda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_cor']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`borda_cor`'); ?><strong>Borda Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_sombra']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`borda_sombra`'); ?><strong>Borda Sombra</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['arredondado']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`arredondado`'); ?><strong>Arredondado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['parallax']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`parallax`'); ?><strong>Parallax</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`secoes`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($secoes = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['secoes']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $secoes, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['imagem']['visualizar']){ ?>
<td><?php echo $secoes['imagem'] ?></td>
<?php
if(strtolower($secoes['imagem']) == 'jpg' || strtolower($secoes['imagem']) == 'jpeg' || strtolower($secoes['imagem']) == 'gif' || strtolower($secoes['imagem']) == 'png' || strtolower($secoes['imagem']) == 'bmp'){
?>
<td><?php if(is_file('secoes/imagem/'.$secoes['id'].'.'.$secoes['imagem'])){ ?><a href="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" target="_blank"><img src="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('secoes/imagem/'.$secoes['id'].'.'.$secoes['imagem'])){ ?><a href="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" target="_blank">secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['secoes']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $secoes, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $secoes); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['secoes']['ordem']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $secoes, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $secoes, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['background']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'background', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['cortxt']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['container']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_sombra']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['arredondado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['parallax']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $secoes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $secoes, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $secoes); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Seções: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['secoes']['imprimir']){ ?><a href="imprimir-registro.php?tabela=secoes&id=<?php echo $secoes['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['duplicar']){ ?><a href="secoes-listar.php?duplicar=<?php echo $secoes['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['editar']){ ?><a href="secoes-cadastrar.php?editar=<?php echo $secoes['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['excluir']){ ?><a href="secoes-listar.php?excluir=<?php echo $secoes['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($secoes = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['secoes']['imprimir']){ ?><a href="imprimir-registro.php?tabela=secoes&id=<?php echo $secoes['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['duplicar']){ ?><a href="secoes-listar.php?duplicar=<?php echo $secoes['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['editar']){ ?><a href="secoes-cadastrar.php?editar=<?php echo $secoes['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['secoes']['excluir']){ ?><a href="secoes-listar.php?excluir=<?php echo $secoes['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['secoes']['id_site']['visualizar'] && $secoes['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $secoes, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['nome']['visualizar'] && $secoes['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['imagem']['visualizar'] && $secoes['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $secoes['imagem'] ?></div>
<?php
if(is_file('secoes/imagem/'.$secoes['id'].'.'.$secoes['imagem'])){
if(strtolower($secoes['imagem']) == 'jpg' || strtolower($secoes['imagem']) == 'jpeg' || strtolower($secoes['imagem']) == 'gif' || strtolower($secoes['imagem']) == 'png' || strtolower($secoes['imagem']) == 'bmp'){
?>
<div class="linha"><a href="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" target="_blank"><img src="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?>" target="_blank">secoes/imagem/<?php echo $secoes['id'] ?>.<?php echo $secoes['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['secoes']['id_status_site']['visualizar'] && $secoes['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $secoes, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_expira']['visualizar'] && $secoes['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $secoes); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['secoes']['ordem']['visualizar'] && $secoes['ordem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`ordem`', $exibiu); ?><strong>Ordem</strong> <?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['titulo']['visualizar'] && $secoes['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['subtitulo']['visualizar'] && $secoes['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['descricao']['visualizar'] && $secoes['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['obs']['visualizar'] && $secoes['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['background']['visualizar'] && $secoes['background']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`background`', $exibiu); ?><strong>Background</strong> <?php echo edicao_expressa($ttabela, 'background', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['cortxt']['visualizar'] && $secoes['cortxt']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`cortxt`', $exibiu); ?><strong>CorTxt</strong> <?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['container']['visualizar'] && $secoes['container']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`container`', $exibiu); ?><strong>Container</strong> <?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda']['visualizar'] && $secoes['borda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`borda`', $exibiu); ?><strong>Borda</strong> <?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_cor']['visualizar'] && $secoes['borda_cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`borda_cor`', $exibiu); ?><strong>Borda Cor</strong> <?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['borda_sombra']['visualizar'] && $secoes['borda_sombra']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`borda_sombra`', $exibiu); ?><strong>Borda Sombra</strong> <?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['arredondado']['visualizar'] && $secoes['arredondado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`arredondado`', $exibiu); ?><strong>Arredondado</strong> <?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['parallax']['visualizar'] && $secoes['parallax']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`parallax`', $exibiu); ?><strong>Parallax</strong> <?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['historico']['visualizar'] && $secoes['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $secoes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['secoes']['data_cadastro']['visualizar'] && $secoes['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $secoes); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Seções: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['secoes']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=secoes-cadastrar.php"> 
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