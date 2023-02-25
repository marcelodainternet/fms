<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Subcategorias'; $ttabela = 'subcategorias'; $aarquivo = 'subcategorias';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Subcategorias" cadastrados(as)';
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
<h1>Subcategorias</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['subcategorias']['excluir']){
if(filhos($a, $base, 'subcategorias', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Subcategorias', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `subcategorias` WHERE'.sql_subordinacao($a, 'subcategorias').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Subcategorias&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `subcategorias` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$subcategorias = mysqli_fetch_array($res);
if($subcategorias['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Subcategorias&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['subcategorias']['cadastrar']){
$sql = permissao_campos('INSERT INTO `subcategorias` SET 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'subcategorias/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Subcategorias cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['subcategorias']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `subcategorias` SET 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'subcategorias/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_propriedade_nome']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Subcategorias alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'subcategorias';
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
<form id="form1" name="form1" method="get" action="subcategorias-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'categorias'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'subcategorias';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `subcategorias`.`id` DESC';
}
$sql = 'SELECT 
`subcategorias`.`id`, 
`categorias`.`nome` AS `categoria`, 
`subcategorias`.`nome`, 
`subcategorias`.`imagem`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`subcategorias`.`data_expira`, 
`subcategorias`.`ordem`, 
`subcategorias`.`titulo`, 
`subcategorias`.`subtitulo`, 
`subcategorias`.`descricao`, 
`subcategorias`.`obs`, 
`subcategorias`.`background`, 
`subcategorias`.`cortxt`, 
`subcategorias`.`container`, 
`subcategorias`.`borda`, 
`subcategorias`.`borda_cor`, 
`subcategorias`.`borda_sombra`, 
`subcategorias`.`arredondado`, 
`subcategorias`.`parallax`, 
`subcategorias`.`historico`, 
`subcategorias`.`data_cadastro` 
FROM `subcategorias` 
LEFT JOIN `categorias` ON `categorias`.`id` = `subcategorias`.`id_categorias`
LEFT JOIN `status_site` ON `status_site`.`id` = `subcategorias`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Subcategorias';
?>
<h2 style="margin:15px;">&quot;Subcategorias&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'subcategorias-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($subcategorias = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $subcategorias[primeiro_campo_nativo($a, 'subcategorias')]).'\',
url: \'subcategorias-cadastrar.php?editar='.$subcategorias['id'].'\',
start: \''.$subcategorias[primeiro_campo_data($a, 'subcategorias')].'\',
end: \''.$subcategorias[primeiro_campo_data($a, 'subcategorias')].'\',
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
<?php if($_SESSION['permissao']['subcategorias']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php ordenar($url, '`categorias`.`nome`'); ?><strong>Categoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['subcategorias']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['ordem']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`ordem`'); ?><strong>Ordem</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['background']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`background`'); ?><strong>Background</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['cortxt']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`cortxt`'); ?><strong>CorTxt</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['container']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`container`'); ?><strong>Container</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`borda`'); ?><strong>Borda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_cor']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`borda_cor`'); ?><strong>Borda Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_sombra']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`borda_sombra`'); ?><strong>Borda Sombra</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['arredondado']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`arredondado`'); ?><strong>Arredondado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['parallax']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`parallax`'); ?><strong>Parallax</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`subcategorias`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($subcategorias = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['subcategorias']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $subcategorias, 'categoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['imagem']['visualizar']){ ?>
<td><?php echo $subcategorias['imagem'] ?></td>
<?php
if(strtolower($subcategorias['imagem']) == 'jpg' || strtolower($subcategorias['imagem']) == 'jpeg' || strtolower($subcategorias['imagem']) == 'gif' || strtolower($subcategorias['imagem']) == 'png' || strtolower($subcategorias['imagem']) == 'bmp'){
?>
<td><?php if(is_file('subcategorias/imagem/'.$subcategorias['id'].'.'.$subcategorias['imagem'])){ ?><a href="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" target="_blank"><img src="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('subcategorias/imagem/'.$subcategorias['id'].'.'.$subcategorias['imagem'])){ ?><a href="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" target="_blank">subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['subcategorias']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $subcategorias, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $subcategorias); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['ordem']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $subcategorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $subcategorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['background']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'background', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['cortxt']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['container']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_sombra']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['arredondado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['parallax']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $subcategorias); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $subcategorias, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $subcategorias); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Subcategorias: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['subcategorias']['imprimir']){ ?><a href="imprimir-registro.php?tabela=subcategorias&id=<?php echo $subcategorias['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['duplicar']){ ?><a href="subcategorias-listar.php?duplicar=<?php echo $subcategorias['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['editar']){ ?><a href="subcategorias-cadastrar.php?editar=<?php echo $subcategorias['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['excluir']){ ?><a href="subcategorias-listar.php?excluir=<?php echo $subcategorias['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($subcategorias = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['subcategorias']['imprimir']){ ?><a href="imprimir-registro.php?tabela=subcategorias&id=<?php echo $subcategorias['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['duplicar']){ ?><a href="subcategorias-listar.php?duplicar=<?php echo $subcategorias['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['editar']){ ?><a href="subcategorias-cadastrar.php?editar=<?php echo $subcategorias['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['excluir']){ ?><a href="subcategorias-listar.php?excluir=<?php echo $subcategorias['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['subcategorias']['id_categorias']['visualizar'] && $subcategorias['categoria']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`nome`', $exibiu); ?><strong>Categoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $subcategorias, 'categoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['nome']['visualizar'] && $subcategorias['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['imagem']['visualizar'] && $subcategorias['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $subcategorias['imagem'] ?></div>
<?php
if(is_file('subcategorias/imagem/'.$subcategorias['id'].'.'.$subcategorias['imagem'])){
if(strtolower($subcategorias['imagem']) == 'jpg' || strtolower($subcategorias['imagem']) == 'jpeg' || strtolower($subcategorias['imagem']) == 'gif' || strtolower($subcategorias['imagem']) == 'png' || strtolower($subcategorias['imagem']) == 'bmp'){
?>
<div class="linha"><a href="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" target="_blank"><img src="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?>" target="_blank">subcategorias/imagem/<?php echo $subcategorias['id'] ?>.<?php echo $subcategorias['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['subcategorias']['id_status_site']['visualizar'] && $subcategorias['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $subcategorias, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_expira']['visualizar'] && $subcategorias['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $subcategorias); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['subcategorias']['ordem']['visualizar'] && $subcategorias['ordem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`ordem`', $exibiu); ?><strong>Ordem</strong> <?php echo edicao_expressa($ttabela, 'ordem', 'numero-inteiro', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['titulo']['visualizar'] && $subcategorias['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['subtitulo']['visualizar'] && $subcategorias['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['descricao']['visualizar'] && $subcategorias['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['obs']['visualizar'] && $subcategorias['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['background']['visualizar'] && $subcategorias['background']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`background`', $exibiu); ?><strong>Background</strong> <?php echo edicao_expressa($ttabela, 'background', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['cortxt']['visualizar'] && $subcategorias['cortxt']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`cortxt`', $exibiu); ?><strong>CorTxt</strong> <?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['container']['visualizar'] && $subcategorias['container']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`container`', $exibiu); ?><strong>Container</strong> <?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda']['visualizar'] && $subcategorias['borda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`borda`', $exibiu); ?><strong>Borda</strong> <?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_cor']['visualizar'] && $subcategorias['borda_cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`borda_cor`', $exibiu); ?><strong>Borda Cor</strong> <?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['borda_sombra']['visualizar'] && $subcategorias['borda_sombra']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`borda_sombra`', $exibiu); ?><strong>Borda Sombra</strong> <?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['arredondado']['visualizar'] && $subcategorias['arredondado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`arredondado`', $exibiu); ?><strong>Arredondado</strong> <?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['parallax']['visualizar'] && $subcategorias['parallax']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`parallax`', $exibiu); ?><strong>Parallax</strong> <?php echo edicao_expressa($ttabela, 'parallax', 'sim-nao', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['historico']['visualizar'] && $subcategorias['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $subcategorias); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['subcategorias']['data_cadastro']['visualizar'] && $subcategorias['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $subcategorias); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Subcategorias: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['subcategorias']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=subcategorias-cadastrar.php"> 
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