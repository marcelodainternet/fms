<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Postagens'; $ttabela = 'postagens'; $aarquivo = 'postagens';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Postagens" cadastrados(as)';
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
<h1>Postagens</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['postagens']['excluir']){
if(filhos($a, $base, 'postagens', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Postagens', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `postagens` WHERE'.sql_subordinacao($a, 'postagens').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Postagens&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `postagens` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$postagens = mysqli_fetch_array($res);
if($postagens['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Postagens&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['anexos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['postagens']['cadastrar']){
for($x=0;$x<count($_FILES['anexos']['tmp_name']);$x++){
$sql = 'INSERT INTO `postagens` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_postagem` = \''.ai($a, $_POST['id_etiquetas_postagem']).'\', 
`anexos` = \''.ai($a, extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`link` = \''.ai($a, $_POST['link']).'\', 
`fonte` = \''.ai($a, $_POST['fonte']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`background` = \''.ai($a, $_POST['background']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'postagens/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_anexos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Postagens cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['postagens']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `postagens` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_postagem` = \''.ai($a, $_POST['id_etiquetas_postagem']).'\', 
`anexos` = \''.ai($a, extensao_arquivo($_FILES['anexos']['name'][$x], $_POST['arquivo_anexos'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`link` = \''.ai($a, $_POST['link']).'\', 
`fonte` = \''.ai($a, $_POST['fonte']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`background` = \''.ai($a, $_POST['background']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'postagens/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_anexos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Postagens alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'postagens';
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
<form id="form1" name="form1" method="get" action="postagens-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'secoes'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'categorias'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'subcategorias'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'status_site'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'destaque';
include('inc.filtro-sn.php');
//
$filtrar = 'etiquetas_postagem'; $propriedade = 'nome';
include('inc.filtro.php');
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
$_SESSION['tabela'] = 'postagens';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `postagens`.`id` DESC';
}
$sql = 'SELECT 
`postagens`.`id`, 
`secoes`.`nome` AS `secao`, 
`categorias`.`nome` AS `categoria`, 
`subcategorias`.`nome` AS `subcategoria`, 
`postagens`.`nome`, 
`postagens`.`imagem`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`postagens`.`data_expira`, 
`postagens`.`destaque`, 
`etiquetas_postagem`.`nome` AS `etiqueta`, 
`etiquetas_postagem`.`label` AS `label_etiqueta`, 
`postagens`.`anexos`, 
`postagens`.`video`, 
`postagens`.`titulo`, 
`postagens`.`subtitulo`, 
`postagens`.`descricao`, 
`postagens`.`link`, 
`postagens`.`fonte`, 
`postagens`.`obs`, 
`postagens`.`background`, 
`postagens`.`cortxt`, 
`postagens`.`container`, 
`postagens`.`borda`, 
`postagens`.`borda_cor`, 
`postagens`.`borda_sombra`, 
`postagens`.`arredondado`, 
`postagens`.`historico`, 
`postagens`.`data_cadastro` 
FROM `postagens` 
LEFT JOIN `secoes` ON `secoes`.`id` = `postagens`.`id_secoes`
LEFT JOIN `categorias` ON `categorias`.`id` = `postagens`.`id_categorias`
LEFT JOIN `subcategorias` ON `subcategorias`.`id` = `postagens`.`id_subcategorias`
LEFT JOIN `status_site` ON `status_site`.`id` = `postagens`.`id_status_site`
LEFT JOIN `etiquetas_postagem` ON `etiquetas_postagem`.`id` = `postagens`.`id_etiquetas_postagem` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Postagens';
?>
<h2 style="margin:15px;">&quot;Postagens&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'postagens-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($postagens = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $postagens[primeiro_campo_nativo($a, 'postagens')]).'\',
url: \'postagens-cadastrar.php?editar='.$postagens['id'].'\',
start: \''.$postagens[primeiro_campo_data($a, 'postagens')].'\',
end: \''.$postagens[primeiro_campo_data($a, 'postagens')].'\',
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
<?php if($_SESSION['permissao']['postagens']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php ordenar($url, '`secoes`.`nome`'); ?><strong>Seção</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php ordenar($url, '`categorias`.`nome`'); ?><strong>Categoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php ordenar($url, '`subcategorias`.`nome`'); ?><strong>Subcategoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['postagens']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['postagens']['destaque']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`destaque`'); ?><strong>Destaque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_etiquetas_postagem']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_postagem_usuarios']){ ?>
<td><?php ordenar($url, '`etiquetas_postagem`.`nome`'); ?><strong>Etiqueta</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['anexos']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`anexos`'); ?><strong>Anexo(s)</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['postagens']['video']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`video`'); ?><strong>Vídeo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['link']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`link`'); ?><strong>Link</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['fonte']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`fonte`'); ?><strong>Fonte</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['background']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`background`'); ?><strong>Background</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['cortxt']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`cortxt`'); ?><strong>CorTxt</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['container']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`container`'); ?><strong>Container</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`borda`'); ?><strong>Borda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_cor']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`borda_cor`'); ?><strong>Borda Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_sombra']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`borda_sombra`'); ?><strong>Borda Sombra</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['arredondado']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`arredondado`'); ?><strong>Arredondado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`postagens`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($postagens = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['postagens']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $postagens, 'secao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $postagens, 'categoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $postagens, 'subcategoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['imagem']['visualizar']){ ?>
<td><?php echo $postagens['imagem'] ?></td>
<?php
if(strtolower($postagens['imagem']) == 'jpg' || strtolower($postagens['imagem']) == 'jpeg' || strtolower($postagens['imagem']) == 'gif' || strtolower($postagens['imagem']) == 'png' || strtolower($postagens['imagem']) == 'bmp'){
?>
<td><?php if(is_file('postagens/imagem/'.$postagens['id'].'.'.$postagens['imagem'])){ ?><a href="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" target="_blank"><img src="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('postagens/imagem/'.$postagens['id'].'.'.$postagens['imagem'])){ ?><a href="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" target="_blank">postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['postagens']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $postagens, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $postagens); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['postagens']['destaque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_etiquetas_postagem']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_postagem_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'etiquetas_postagem', 'selecao', $postagens, 'etiqueta', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['anexos']['visualizar']){ ?>
<td><?php echo $postagens['anexos'] ?></td>
<?php
if(strtolower($postagens['anexos']) == 'jpg' || strtolower($postagens['anexos']) == 'jpeg' || strtolower($postagens['anexos']) == 'gif' || strtolower($postagens['anexos']) == 'png' || strtolower($postagens['anexos']) == 'bmp'){
?>
<td><?php if(is_file('postagens/anexos/'.$postagens['id'].'.'.$postagens['anexos'])){ ?><a href="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" target="_blank"><img src="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('postagens/anexos/'.$postagens['id'].'.'.$postagens['anexos'])){ ?><a href="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" target="_blank">postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['postagens']['video']['visualizar']){ ?>
<td><?php $codigo_youtube = codigo_youtube($postagens['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $postagens, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['link']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'link', 'url', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['fonte']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'fonte', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $postagens, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['background']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'background', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['cortxt']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['container']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_sombra']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['arredondado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $postagens); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $postagens, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $postagens); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Postagens: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['postagens']['imprimir']){ ?><a href="imprimir-registro.php?tabela=postagens&id=<?php echo $postagens['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['duplicar']){ ?><a href="postagens-listar.php?duplicar=<?php echo $postagens['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['editar']){ ?><a href="postagens-cadastrar.php?editar=<?php echo $postagens['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['excluir']){ ?><a href="postagens-listar.php?excluir=<?php echo $postagens['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($postagens = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['postagens']['imprimir']){ ?><a href="imprimir-registro.php?tabela=postagens&id=<?php echo $postagens['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['duplicar']){ ?><a href="postagens-listar.php?duplicar=<?php echo $postagens['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['editar']){ ?><a href="postagens-cadastrar.php?editar=<?php echo $postagens['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['postagens']['excluir']){ ?><a href="postagens-listar.php?excluir=<?php echo $postagens['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['postagens']['id_secoes']['visualizar'] && $postagens['secao']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`nome`', $exibiu); ?><strong>Seção</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $postagens, 'secao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_categorias']['visualizar'] && $postagens['categoria']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`nome`', $exibiu); ?><strong>Categoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $postagens, 'categoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_subcategorias']['visualizar'] && $postagens['subcategoria']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`nome`', $exibiu); ?><strong>Subcategoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $postagens, 'subcategoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['nome']['visualizar'] && $postagens['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['imagem']['visualizar'] && $postagens['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $postagens['imagem'] ?></div>
<?php
if(is_file('postagens/imagem/'.$postagens['id'].'.'.$postagens['imagem'])){
if(strtolower($postagens['imagem']) == 'jpg' || strtolower($postagens['imagem']) == 'jpeg' || strtolower($postagens['imagem']) == 'gif' || strtolower($postagens['imagem']) == 'png' || strtolower($postagens['imagem']) == 'bmp'){
?>
<div class="linha"><a href="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" target="_blank"><img src="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?>" target="_blank">postagens/imagem/<?php echo $postagens['id'] ?>.<?php echo $postagens['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['postagens']['id_status_site']['visualizar'] && $postagens['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $postagens, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_expira']['visualizar'] && $postagens['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $postagens); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['postagens']['destaque']['visualizar'] && $postagens['destaque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`destaque`', $exibiu); ?><strong>Destaque</strong> <?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['id_etiquetas_postagem']['visualizar'] && $postagens['etiqueta']){ ?>
<?php if(!$_SESSION['id_etiquetas_postagem_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_postagem`.`nome`', $exibiu); ?><strong>Etiqueta</strong> <?php echo edicao_expressa_label($ttabela, 'etiquetas_postagem', 'selecao', $postagens, 'etiqueta', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['anexos']['visualizar'] && $postagens['anexos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`anexos`', $exibiu); ?><strong>Anexo(s)</strong> <?php echo $postagens['anexos'] ?></div>
<?php
if(is_file('postagens/anexos/'.$postagens['id'].'.'.$postagens['anexos'])){
if(strtolower($postagens['anexos']) == 'jpg' || strtolower($postagens['anexos']) == 'jpeg' || strtolower($postagens['anexos']) == 'gif' || strtolower($postagens['anexos']) == 'png' || strtolower($postagens['anexos']) == 'bmp'){
?>
<div class="linha"><a href="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" target="_blank"><img src="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?>" target="_blank">postagens/anexos/<?php echo $postagens['id'] ?>.<?php echo $postagens['anexos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['postagens']['video']['visualizar'] && $postagens['video']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`video`', $exibiu); ?><strong>Vídeo</strong><br>
<?php $codigo_youtube = codigo_youtube($postagens['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a>
</div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['titulo']['visualizar'] && $postagens['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['subtitulo']['visualizar'] && $postagens['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['descricao']['visualizar'] && $postagens['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['link']['visualizar'] && $postagens['link']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`link`', $exibiu); ?><strong>Link</strong> <?php echo edicao_expressa($ttabela, 'link', 'url', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['fonte']['visualizar'] && $postagens['fonte']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`fonte`', $exibiu); ?><strong>Fonte</strong> <?php echo edicao_expressa($ttabela, 'fonte', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['obs']['visualizar'] && $postagens['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['background']['visualizar'] && $postagens['background']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`background`', $exibiu); ?><strong>Background</strong> <?php echo edicao_expressa($ttabela, 'background', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['cortxt']['visualizar'] && $postagens['cortxt']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`cortxt`', $exibiu); ?><strong>CorTxt</strong> <?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['container']['visualizar'] && $postagens['container']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`container`', $exibiu); ?><strong>Container</strong> <?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda']['visualizar'] && $postagens['borda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`borda`', $exibiu); ?><strong>Borda</strong> <?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_cor']['visualizar'] && $postagens['borda_cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`borda_cor`', $exibiu); ?><strong>Borda Cor</strong> <?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['borda_sombra']['visualizar'] && $postagens['borda_sombra']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`borda_sombra`', $exibiu); ?><strong>Borda Sombra</strong> <?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['arredondado']['visualizar'] && $postagens['arredondado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`arredondado`', $exibiu); ?><strong>Arredondado</strong> <?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['historico']['visualizar'] && $postagens['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $postagens); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['postagens']['data_cadastro']['visualizar'] && $postagens['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`postagens`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $postagens); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Postagens: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['postagens']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=postagens-cadastrar.php"> 
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