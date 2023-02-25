<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Categorias'; $ttabela = 'categorias'; $aarquivo = 'categorias';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Categorias" cadastrados(as)';
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
<h1>Categorias</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['categorias']['excluir']){
if(filhos($a, $base, 'categorias', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Categorias', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `categorias` WHERE'.sql_subordinacao($a, 'categorias').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Categorias&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `categorias` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$categorias = mysqli_fetch_array($res);
if($categorias['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Categorias&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['categorias']['cadastrar']){
$sql = permissao_campos('INSERT INTO `categorias` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'categorias/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Categorias cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['categorias']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `categorias` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'categorias/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Categorias alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'categorias';
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
<form id="form1" name="form1" method="get" action="categorias-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'secoes'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'categorias';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `categorias`.`id` DESC';
}
$sql = 'SELECT 
`categorias`.`id`, 
`secoes`.`nome` AS `secao`, 
`categorias`.`nome`, 
`categorias`.`imagem`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`categorias`.`data_expira`, 
`categorias`.`ordem`, 
`categorias`.`titulo`, 
`categorias`.`subtitulo`, 
`categorias`.`descricao`, 
`categorias`.`obs`, 
`categorias`.`background`, 
`categorias`.`cortxt`, 
`categorias`.`container`, 
`categorias`.`borda`, 
`categorias`.`borda_cor`, 
`categorias`.`borda_sombra`, 
`categorias`.`arredondado`, 
`categorias`.`parallax`, 
`categorias`.`historico`, 
`categorias`.`data_cadastro` 
FROM `categorias` 
LEFT JOIN `secoes` ON `secoes`.`id` = `categorias`.`id_secoes`
LEFT JOIN `status_site` ON `status_site`.`id` = `categorias`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Categorias';
?>
<h2 style="margin:15px;">&quot;Categorias&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'categorias-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($categorias = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $categorias[primeiro_campo_nativo($a, 'categorias')]).'\',
url: \'categorias-cadastrar.php?editar='.$categorias['id'].'\',
start: \''.$categorias[primeiro_campo_data($a, 'categorias')].'\',
end: \''.$categorias[primeiro_campo_data($a, 'categorias')].'\',
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
<?php if($_SESSION['permissao']['categorias']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php ordenar($url, '`secoes`.`nome`'); ?><strong>Seção</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['categorias']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['categorias']['ordem']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`ordem`'); ?><strong>Ordem</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['background']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`background`'); ?><strong>Background</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['cortxt']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`cortxt`'); ?><strong>CorTxt</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['container']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`container`'); ?><strong>Container</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`borda`'); ?><strong>Borda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_cor']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`borda_cor`'); ?><strong>Borda Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_sombra']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`borda_sombra`'); ?><strong>Borda Sombra</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['arredondado']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`arredondado`'); ?><strong>Arredondado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['parallax']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`parallax`'); ?><strong>Parallax</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`categorias`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($categorias = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['categorias']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $categorias, 'secao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['imagem']['visualizar']){ ?>
<td><?php echo $categorias['imagem'] ?></td>
<?php
if(strtolower($categorias['imagem']) == 'jpg' || strtolower($categorias['imagem']) == 'jpeg' || strtolower($categorias['imagem']) == 'gif' || strtolower($categorias['imagem']) == 'png' || strtolower($categorias['imagem']) == 'bmp'){
?>
<td><?php if(is_file('categorias/imagem/'.$categorias['id'].'.'.$categorias['imagem'])){ ?><a href="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" target="_blank"><img src="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('categorias/imagem/'.$categorias['id'].'.'.$categorias['imagem'])){ ?><a href="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" target="_blank">categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['categorias']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $categorias, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $categorias); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['categorias']['ordem']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $categorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $categorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['background']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'background', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['cortxt']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['container']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_sombra']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['arredondado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['parallax']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $categorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $categorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $categorias); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Categorias: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['categorias']['imprimir']){ ?><a href="imprimir-registro.php?tabela=categorias&id=<?php echo $categorias['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['duplicar']){ ?><a href="categorias-listar.php?duplicar=<?php echo $categorias['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['editar']){ ?><a href="categorias-cadastrar.php?editar=<?php echo $categorias['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['excluir']){ ?><a href="categorias-listar.php?excluir=<?php echo $categorias['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($categorias = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['categorias']['imprimir']){ ?><a href="imprimir-registro.php?tabela=categorias&id=<?php echo $categorias['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['duplicar']){ ?><a href="categorias-listar.php?duplicar=<?php echo $categorias['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['editar']){ ?><a href="categorias-cadastrar.php?editar=<?php echo $categorias['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['categorias']['excluir']){ ?><a href="categorias-listar.php?excluir=<?php echo $categorias['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['categorias']['id_secoes']['visualizar'] && $categorias['secao']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`nome`', $exibiu); ?><strong>Seção</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $categorias, 'secao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['nome']['visualizar'] && $categorias['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['imagem']['visualizar'] && $categorias['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $categorias['imagem'] ?></div>
<?php
if(is_file('categorias/imagem/'.$categorias['id'].'.'.$categorias['imagem'])){
if(strtolower($categorias['imagem']) == 'jpg' || strtolower($categorias['imagem']) == 'jpeg' || strtolower($categorias['imagem']) == 'gif' || strtolower($categorias['imagem']) == 'png' || strtolower($categorias['imagem']) == 'bmp'){
?>
<div class="linha"><a href="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" target="_blank"><img src="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?>" target="_blank">categorias/imagem/<?php echo $categorias['id'] ?>.<?php echo $categorias['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['categorias']['id_status_site']['visualizar'] && $categorias['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $categorias, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_expira']['visualizar'] && $categorias['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $categorias); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['categorias']['ordem']['visualizar'] && $categorias['ordem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`ordem`', $exibiu); ?><strong>Ordem</strong> <?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['titulo']['visualizar'] && $categorias['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['subtitulo']['visualizar'] && $categorias['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['descricao']['visualizar'] && $categorias['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['obs']['visualizar'] && $categorias['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['background']['visualizar'] && $categorias['background']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`background`', $exibiu); ?><strong>Background</strong> <?php echo edicao_expressa($ttabela, 'background', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['cortxt']['visualizar'] && $categorias['cortxt']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`cortxt`', $exibiu); ?><strong>CorTxt</strong> <?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['container']['visualizar'] && $categorias['container']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`container`', $exibiu); ?><strong>Container</strong> <?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda']['visualizar'] && $categorias['borda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`borda`', $exibiu); ?><strong>Borda</strong> <?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_cor']['visualizar'] && $categorias['borda_cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`borda_cor`', $exibiu); ?><strong>Borda Cor</strong> <?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['borda_sombra']['visualizar'] && $categorias['borda_sombra']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`borda_sombra`', $exibiu); ?><strong>Borda Sombra</strong> <?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['arredondado']['visualizar'] && $categorias['arredondado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`arredondado`', $exibiu); ?><strong>Arredondado</strong> <?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['parallax']['visualizar'] && $categorias['parallax']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`parallax`', $exibiu); ?><strong>Parallax</strong> <?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['historico']['visualizar'] && $categorias['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $categorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['categorias']['data_cadastro']['visualizar'] && $categorias['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $categorias); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Categorias: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['categorias']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=categorias-cadastrar.php"> 
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