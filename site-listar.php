<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Site'; $ttabela = 'site'; $aarquivo = 'site';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Site" cadastrados(as)';
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
<h1>Site</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['site']['excluir']){
if(filhos($a, $base, 'site', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Site', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `site` WHERE'.sql_subordinacao($a, 'site').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Site&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `site` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$site = mysqli_fetch_array($res);
if($site['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Site&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['documentos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['site']['cadastrar']){
for($x=0;$x<count($_FILES['documentos']['tmp_name']);$x++){
$sql = 'INSERT INTO `site` SET 
`site` = \''.ai($a, $_POST['site']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`logo` = \''.ai($a, extensao_arquivo($_FILES['logo']['name'], $_POST['arquivo_logo'])).'\', 
`responsavel` = \''.ai($a, $_POST['responsavel']).'\', 
`cargo` = \''.ai($a, $_POST['cargo']).'\', 
`fone` = \''.ai($a, $_POST['fone']).'\', 
`email` = \''.ai($a, $_POST['email']).'\', 
`aberto` = \''.ai($a, $_POST['aberto']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`palavras_chaves` = \''.ai($a, $_POST['palavras_chaves']).'\', 
`descricao` = \''.ai($a, $_POST['descricao']).'\', 
`logo2` = \''.ai($a, extensao_arquivo($_FILES['logo2']['name'], $_POST['arquivo_logo2'])).'\', 
`logo3` = \''.ai($a, extensao_arquivo($_FILES['logo3']['name'], $_POST['arquivo_logo3'])).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`e_mail2` = \''.ai($a, $_POST['e_mail2']).'\', 
`e_mail3` = \''.ai($a, $_POST['e_mail3']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`telefone2` = \''.ai($a, $_POST['telefone2']).'\', 
`telefone3` = \''.ai($a, $_POST['telefone3']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`endereco2` = \''.ai($a, $_POST['endereco2']).'\', 
`endereco3` = \''.ai($a, $_POST['endereco3']).'\', 
`horario` = \''.ai($a, $_POST['horario']).'\', 
`horario2` = \''.ai($a, $_POST['horario2']).'\', 
`horario3` = \''.ai($a, $_POST['horario3']).'\', 
`textowhats` = \''.ai($a, $_POST['textowhats']).'\', 
`textowhats2` = \''.ai($a, $_POST['textowhats2']).'\', 
`textowhats3` = \''.ai($a, $_POST['textowhats3']).'\', 
`textoauxiliar` = \''.ai($a, $_POST['textoauxiliar']).'\', 
`textoauxiliar2` = \''.ai($a, $_POST['textoauxiliar2']).'\', 
`textoauxiliar3` = \''.ai($a, $_POST['textoauxiliar3']).'\', 
`instagram` = \''.ai($a, $_POST['instagram']).'\', 
`facebook` = \''.ai($a, $_POST['facebook']).'\', 
`linkedin` = \''.ai($a, $_POST['linkedin']).'\', 
`twitter` = \''.ai($a, $_POST['twitter']).'\', 
`youtube` = \''.ai($a, $_POST['youtube']).'\', 
`tiktok` = \''.ai($a, $_POST['tiktok']).'\', 
`kwai` = \''.ai($a, $_POST['kwai']).'\', 
`google` = \''.ai($a, $_POST['google']).'\', 
`google_plus` = \''.ai($a, $_POST['google_plus']).'\', 
`google_maps` = \''.ai($a, $_POST['google_maps']).'\', 
`google_analitics` = \''.ai($a, $_POST['google_analitics']).'\', 
`play_store` = \''.ai($a, $_POST['play_store']).'\', 
`apple_store` = \''.ai($a, $_POST['apple_store']).'\', 
`popup` = \''.ai($a, $_POST['popup'], true).'\', 
`aviso_de_cookies` = \''.ai($a, $_POST['aviso_de_cookies']).'\', 
`politica_de_cookies` = \''.ai($a, $_POST['politica_de_cookies'], true).'\', 
`politica_de_privacidade` = \''.ai($a, $_POST['politica_de_privacidade'], true).'\', 
`termos_de_uso` = \''.ai($a, $_POST['termos_de_uso'], true).'\', 
`contrato` = \''.ai($a, $_POST['contrato'], true).'\', 
`contrato2` = \''.ai($a, $_POST['contrato2']).'\', 
`contrato3` = \''.ai($a, $_POST['contrato3']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`cor` = \''.ai($a, $_POST['cor']).'\', 
`cor2` = \''.ai($a, $_POST['cor2']).'\', 
`cor3` = \''.ai($a, $_POST['cor3']).'\', 
`cor4` = \''.ai($a, $_POST['cor4']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`cortxt2` = \''.ai($a, $_POST['cortxt2']).'\', 
`cortxt3` = \''.ai($a, $_POST['cortxt3']).'\', 
`cortxt4` = \''.ai($a, $_POST['cortxt4']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['logo']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo']['tmp_name'], 'site/logo/'.$id.'.'.extensao_arquivo($_FILES['logo']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}
if(is_uploaded_file($_FILES['logo2']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo2']['tmp_name'], 'site/logo2/'.$id.'.'.extensao_arquivo($_FILES['logo2']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}
if(is_uploaded_file($_FILES['logo3']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo3']['tmp_name'], 'site/logo3/'.$id.'.'.extensao_arquivo($_FILES['logo3']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Site cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['site']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `site` SET 
`site` = \''.ai($a, $_POST['site']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`id_status_site` = \''.ai($a, $_POST['id_status_site']).'\', 
`logo` = \''.ai($a, extensao_arquivo($_FILES['logo']['name'], $_POST['arquivo_logo'])).'\', 
`responsavel` = \''.ai($a, $_POST['responsavel']).'\', 
`cargo` = \''.ai($a, $_POST['cargo']).'\', 
`fone` = \''.ai($a, $_POST['fone']).'\', 
`email` = \''.ai($a, $_POST['email']).'\', 
`aberto` = \''.ai($a, $_POST['aberto']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`palavras_chaves` = \''.ai($a, $_POST['palavras_chaves']).'\', 
`descricao` = \''.ai($a, $_POST['descricao']).'\', 
`logo2` = \''.ai($a, extensao_arquivo($_FILES['logo2']['name'], $_POST['arquivo_logo2'])).'\', 
`logo3` = \''.ai($a, extensao_arquivo($_FILES['logo3']['name'], $_POST['arquivo_logo3'])).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`e_mail2` = \''.ai($a, $_POST['e_mail2']).'\', 
`e_mail3` = \''.ai($a, $_POST['e_mail3']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`telefone2` = \''.ai($a, $_POST['telefone2']).'\', 
`telefone3` = \''.ai($a, $_POST['telefone3']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`endereco2` = \''.ai($a, $_POST['endereco2']).'\', 
`endereco3` = \''.ai($a, $_POST['endereco3']).'\', 
`horario` = \''.ai($a, $_POST['horario']).'\', 
`horario2` = \''.ai($a, $_POST['horario2']).'\', 
`horario3` = \''.ai($a, $_POST['horario3']).'\', 
`textowhats` = \''.ai($a, $_POST['textowhats']).'\', 
`textowhats2` = \''.ai($a, $_POST['textowhats2']).'\', 
`textowhats3` = \''.ai($a, $_POST['textowhats3']).'\', 
`textoauxiliar` = \''.ai($a, $_POST['textoauxiliar']).'\', 
`textoauxiliar2` = \''.ai($a, $_POST['textoauxiliar2']).'\', 
`textoauxiliar3` = \''.ai($a, $_POST['textoauxiliar3']).'\', 
`instagram` = \''.ai($a, $_POST['instagram']).'\', 
`facebook` = \''.ai($a, $_POST['facebook']).'\', 
`linkedin` = \''.ai($a, $_POST['linkedin']).'\', 
`twitter` = \''.ai($a, $_POST['twitter']).'\', 
`youtube` = \''.ai($a, $_POST['youtube']).'\', 
`tiktok` = \''.ai($a, $_POST['tiktok']).'\', 
`kwai` = \''.ai($a, $_POST['kwai']).'\', 
`google` = \''.ai($a, $_POST['google']).'\', 
`google_plus` = \''.ai($a, $_POST['google_plus']).'\', 
`google_maps` = \''.ai($a, $_POST['google_maps']).'\', 
`google_analitics` = \''.ai($a, $_POST['google_analitics']).'\', 
`play_store` = \''.ai($a, $_POST['play_store']).'\', 
`apple_store` = \''.ai($a, $_POST['apple_store']).'\', 
`popup` = \''.ai($a, $_POST['popup'], true).'\', 
`aviso_de_cookies` = \''.ai($a, $_POST['aviso_de_cookies']).'\', 
`politica_de_cookies` = \''.ai($a, $_POST['politica_de_cookies'], true).'\', 
`politica_de_privacidade` = \''.ai($a, $_POST['politica_de_privacidade'], true).'\', 
`termos_de_uso` = \''.ai($a, $_POST['termos_de_uso'], true).'\', 
`contrato` = \''.ai($a, $_POST['contrato'], true).'\', 
`contrato2` = \''.ai($a, $_POST['contrato2']).'\', 
`contrato3` = \''.ai($a, $_POST['contrato3']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`cor` = \''.ai($a, $_POST['cor']).'\', 
`cor2` = \''.ai($a, $_POST['cor2']).'\', 
`cor3` = \''.ai($a, $_POST['cor3']).'\', 
`cor4` = \''.ai($a, $_POST['cor4']).'\', 
`cortxt` = \''.ai($a, $_POST['cortxt']).'\', 
`cortxt2` = \''.ai($a, $_POST['cortxt2']).'\', 
`cortxt3` = \''.ai($a, $_POST['cortxt3']).'\', 
`cortxt4` = \''.ai($a, $_POST['cortxt4']).'\', 
`container` = \''.ai($a, $_POST['container']).'\', 
`borda` = \''.ai($a, $_POST['borda']).'\', 
`borda_cor` = \''.ai($a, $_POST['borda_cor']).'\', 
`borda_sombra` = \''.ai($a, $_POST['borda_sombra']).'\', 
`arredondado` = \''.ai($a, $_POST['arredondado']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['logo']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo']['tmp_name'], 'site/logo/'.$id.'.'.extensao_arquivo($_FILES['logo']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}
if(is_uploaded_file($_FILES['logo2']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo2']['tmp_name'], 'site/logo2/'.$id.'.'.extensao_arquivo($_FILES['logo2']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}
if(is_uploaded_file($_FILES['logo3']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['logo3']['tmp_name'], 'site/logo3/'.$id.'.'.extensao_arquivo($_FILES['logo3']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Site alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'site';
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
<form id="form1" name="form1" method="get" action="site-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'status_site'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'aberto';
include('inc.filtro-sn.php');
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
$_SESSION['tabela'] = 'site';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `site`.`id` DESC';
}
$sql = 'SELECT 
`site`.`id`, 
`site`.`site`, 
`site`.`nome`, 
`status_site`.`nome` AS `status`, 
`status_site`.`label` AS `label_status`, 
`site`.`logo`, 
`site`.`responsavel`, 
`site`.`cargo`, 
`site`.`fone`, 
`site`.`email`, 
`site`.`aberto`, 
`site`.`titulo`, 
`site`.`subtitulo`, 
`site`.`palavras_chaves`, 
`site`.`descricao`, 
`site`.`logo2`, 
`site`.`logo3`, 
`site`.`e_mail`, 
`site`.`e_mail2`, 
`site`.`e_mail3`, 
`site`.`telefone`, 
`site`.`telefone2`, 
`site`.`telefone3`, 
`site`.`cep`, 
`site`.`endereco`, 
`site`.`numero`, 
`site`.`complemento`, 
`site`.`bairro`, 
`site`.`cidade`, 
`site`.`estado`, 
`site`.`endereco2`, 
`site`.`endereco3`, 
`site`.`horario`, 
`site`.`horario2`, 
`site`.`horario3`, 
`site`.`textowhats`, 
`site`.`textowhats2`, 
`site`.`textowhats3`, 
`site`.`textoauxiliar`, 
`site`.`textoauxiliar2`, 
`site`.`textoauxiliar3`, 
`site`.`instagram`, 
`site`.`facebook`, 
`site`.`linkedin`, 
`site`.`twitter`, 
`site`.`youtube`, 
`site`.`tiktok`, 
`site`.`kwai`, 
`site`.`google`, 
`site`.`google_plus`, 
`site`.`google_maps`, 
`site`.`google_analitics`, 
`site`.`play_store`, 
`site`.`apple_store`, 
`site`.`popup`, 
`site`.`aviso_de_cookies`, 
`site`.`politica_de_cookies`, 
`site`.`politica_de_privacidade`, 
`site`.`termos_de_uso`, 
`site`.`contrato`, 
`site`.`contrato2`, 
`site`.`contrato3`, 
`site`.`obs`, 
`site`.`cor`, 
`site`.`cor2`, 
`site`.`cor3`, 
`site`.`cor4`, 
`site`.`cortxt`, 
`site`.`cortxt2`, 
`site`.`cortxt3`, 
`site`.`cortxt4`, 
`site`.`container`, 
`site`.`borda`, 
`site`.`borda_cor`, 
`site`.`borda_sombra`, 
`site`.`arredondado`, 
`site`.`documentos`, 
`site`.`historico`, 
`site`.`data_cadastro` 
FROM `site` 
LEFT JOIN `status_site` ON `status_site`.`id` = `site`.`id_status_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Site';
?>
<h2 style="margin:15px;">&quot;Site&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'site-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($site = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $site[primeiro_campo_nativo($a, 'site')]).'\',
url: \'site-cadastrar.php?editar='.$site['id'].'\',
start: \''.$site[primeiro_campo_data($a, 'site')].'\',
end: \''.$site[primeiro_campo_data($a, 'site')].'\',
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
<?php if($_SESSION['permissao']['site']['site']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php ordenar($url, '`status_site`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`logo`'); ?><strong>Logo</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['site']['responsavel']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`responsavel`'); ?><strong>Responsável</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cargo']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cargo`'); ?><strong>Cargo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['fone']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`fone`'); ?><strong>Fone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['email']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`email`'); ?><strong>Email</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aberto']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`aberto`'); ?><strong>Aberto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['palavras_chaves']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`palavras_chaves`'); ?><strong>Palavras Chaves</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`logo2`'); ?><strong>Logo2</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['site']['logo3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`logo3`'); ?><strong>Logo3</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['site']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`e_mail2`'); ?><strong>E-mail2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`e_mail3`'); ?><strong>E-mail3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`telefone2`'); ?><strong>Telefone2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`telefone3`'); ?><strong>Telefone3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`endereco2`'); ?><strong>Endereço2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`endereco3`'); ?><strong>Endereço3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`horario`'); ?><strong>Horário</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`horario2`'); ?><strong>Horário2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`horario3`'); ?><strong>Horário3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textowhats`'); ?><strong>TextoWhats</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textowhats2`'); ?><strong>TextoWhats2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textowhats3`'); ?><strong>TextoWhats3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textoauxiliar`'); ?><strong>TextoAuxiliar</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textoauxiliar2`'); ?><strong>TextoAuxiliar2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`textoauxiliar3`'); ?><strong>TextoAuxiliar3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['instagram']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`instagram`'); ?><strong>Instagram</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['facebook']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`facebook`'); ?><strong>Facebook</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['linkedin']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`linkedin`'); ?><strong>Linkedin</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['twitter']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`twitter`'); ?><strong>Twitter</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['youtube']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`youtube`'); ?><strong>YouTube</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['tiktok']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`tiktok`'); ?><strong>TikTok</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['kwai']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`kwai`'); ?><strong>Kwai</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`google`'); ?><strong>Google</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_plus']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`google_plus`'); ?><strong>Google Plus</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_maps']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`google_maps`'); ?><strong>Google Maps</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_analitics']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`google_analitics`'); ?><strong>Google Analítics</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['play_store']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`play_store`'); ?><strong>Play Store</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['apple_store']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`apple_store`'); ?><strong>Apple Store</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['popup']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`popup`'); ?><strong>PopUp</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aviso_de_cookies']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`aviso_de_cookies`'); ?><strong>Aviso de Cookies</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_cookies']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`politica_de_cookies`'); ?><strong>Politica de Cookies</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_privacidade']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`politica_de_privacidade`'); ?><strong>Política de Privacidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['termos_de_uso']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`termos_de_uso`'); ?><strong>Termos de Uso</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`contrato`'); ?><strong>Contrato</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`contrato2`'); ?><strong>Contrato2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`contrato3`'); ?><strong>Contrato3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cor`'); ?><strong>Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cor2`'); ?><strong>Cor2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cor3`'); ?><strong>Cor3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor4']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cor4`'); ?><strong>Cor4</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cortxt`'); ?><strong>CorTxt</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt2']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cortxt2`'); ?><strong>CorTxt2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt3']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cortxt3`'); ?><strong>CorTxt3</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt4']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`cortxt4`'); ?><strong>CorTxt4</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['container']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`container`'); ?><strong>Container</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`borda`'); ?><strong>Borda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_cor']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`borda_cor`'); ?><strong>Borda Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_sombra']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`borda_sombra`'); ?><strong>Borda Sombra</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['arredondado']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`arredondado`'); ?><strong>Arredondado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['documentos']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`documentos`'); ?><strong>Documentos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['site']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`site`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($site = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['site']['site']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'site', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['id_status_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $site, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo']['visualizar']){ ?>
<td><?php echo $site['logo'] ?></td>
<?php
if(strtolower($site['logo']) == 'jpg' || strtolower($site['logo']) == 'jpeg' || strtolower($site['logo']) == 'gif' || strtolower($site['logo']) == 'png' || strtolower($site['logo']) == 'bmp'){
?>
<td><?php if(is_file('site/logo/'.$site['id'].'.'.$site['logo'])){ ?><a href="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" target="_blank"><img src="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('site/logo/'.$site['id'].'.'.$site['logo'])){ ?><a href="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" target="_blank">site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['site']['responsavel']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'responsavel', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cargo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cargo', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['fone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'fone', 'telefone', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['email']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'email', 'e-mail', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aberto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'aberto', 'sim-nao', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['palavras_chaves']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'palavras_chaves', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'texto-grande', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo2']['visualizar']){ ?>
<td><?php echo $site['logo2'] ?></td>
<?php
if(strtolower($site['logo2']) == 'jpg' || strtolower($site['logo2']) == 'jpeg' || strtolower($site['logo2']) == 'gif' || strtolower($site['logo2']) == 'png' || strtolower($site['logo2']) == 'bmp'){
?>
<td><?php if(is_file('site/logo2/'.$site['id'].'.'.$site['logo2'])){ ?><a href="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" target="_blank"><img src="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('site/logo2/'.$site['id'].'.'.$site['logo2'])){ ?><a href="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" target="_blank">site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['site']['logo3']['visualizar']){ ?>
<td><?php echo $site['logo3'] ?></td>
<?php
if(strtolower($site['logo3']) == 'jpg' || strtolower($site['logo3']) == 'jpeg' || strtolower($site['logo3']) == 'gif' || strtolower($site['logo3']) == 'png' || strtolower($site['logo3']) == 'bmp'){
?>
<td><?php if(is_file('site/logo3/'.$site['id'].'.'.$site['logo3'])){ ?><a href="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" target="_blank"><img src="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('site/logo3/'.$site['id'].'.'.$site['logo3'])){ ?><a href="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" target="_blank">site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['site']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail2', 'e-mail', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail3', 'e-mail', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone2', 'telefone', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone3', 'telefone', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'horario', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'horario2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'horario3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textowhats', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textowhats2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textowhats3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textoauxiliar', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textoauxiliar2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'textoauxiliar3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['instagram']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'instagram', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['facebook']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'facebook', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['linkedin']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'linkedin', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['twitter']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'twitter', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['youtube']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'youtube', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['tiktok']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tiktok', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['kwai']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'kwai', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'google', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_plus']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'google_plus', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_maps']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'google_maps', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_analitics']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'google_analitics', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['play_store']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'play_store', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['apple_store']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'apple_store', 'url', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['popup']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'popup', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aviso_de_cookies']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'aviso_de_cookies', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_cookies']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'politica_de_cookies', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_privacidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'politica_de_privacidade', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['termos_de_uso']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'termos_de_uso', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'contrato', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'contrato2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'contrato3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cor', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cor2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cor3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor4']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cor4', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt2', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt3']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt3', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt4']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cortxt4', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['container']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_sombra']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['arredondado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $site); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['documentos']['visualizar']){ ?>
<td><?php echo $site['documentos'] ?></td>
<?php
if(strtolower($site['documentos']) == 'jpg' || strtolower($site['documentos']) == 'jpeg' || strtolower($site['documentos']) == 'gif' || strtolower($site['documentos']) == 'png' || strtolower($site['documentos']) == 'bmp'){
?>
<td><?php if(is_file('site/documentos/'.$site['id'].'.'.$site['documentos'])){ ?><a href="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" target="_blank"><img src="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('site/documentos/'.$site['id'].'.'.$site['documentos'])){ ?><a href="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" target="_blank">site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['site']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $site, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['site']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $site); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Site: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['site']['imprimir']){ ?><a href="imprimir-registro.php?tabela=site&id=<?php echo $site['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['duplicar']){ ?><a href="site-listar.php?duplicar=<?php echo $site['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['editar']){ ?><a href="site-cadastrar.php?editar=<?php echo $site['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['excluir']){ ?><a href="site-listar.php?excluir=<?php echo $site['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($site = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['site']['imprimir']){ ?><a href="imprimir-registro.php?tabela=site&id=<?php echo $site['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['duplicar']){ ?><a href="site-listar.php?duplicar=<?php echo $site['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['editar']){ ?><a href="site-cadastrar.php?editar=<?php echo $site['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['site']['excluir']){ ?><a href="site-listar.php?excluir=<?php echo $site['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['site']['site']['visualizar'] && $site['site']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa($ttabela, 'site', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['nome']['visualizar'] && $site['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['id_status_site']['visualizar'] && $site['status']){ ?>
<?php if(!$_SESSION['id_status_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_site`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_site', 'selecao', $site, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo']['visualizar'] && $site['logo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`logo`', $exibiu); ?><strong>Logo</strong> <?php echo $site['logo'] ?></div>
<?php
if(is_file('site/logo/'.$site['id'].'.'.$site['logo'])){
if(strtolower($site['logo']) == 'jpg' || strtolower($site['logo']) == 'jpeg' || strtolower($site['logo']) == 'gif' || strtolower($site['logo']) == 'png' || strtolower($site['logo']) == 'bmp'){
?>
<div class="linha"><a href="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" target="_blank"><img src="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?>" target="_blank">site/logo/<?php echo $site['id'] ?>.<?php echo $site['logo'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['site']['responsavel']['visualizar'] && $site['responsavel']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`responsavel`', $exibiu); ?><strong>Responsável</strong> <?php echo edicao_expressa($ttabela, 'responsavel', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cargo']['visualizar'] && $site['cargo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cargo`', $exibiu); ?><strong>Cargo</strong> <?php echo edicao_expressa($ttabela, 'cargo', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['fone']['visualizar'] && $site['fone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`fone`', $exibiu); ?><strong>Fone</strong> <?php echo edicao_expressa($ttabela, 'fone', 'telefone', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['email']['visualizar'] && $site['email']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`email`', $exibiu); ?><strong>Email</strong> <?php echo edicao_expressa($ttabela, 'email', 'e-mail', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aberto']['visualizar'] && $site['aberto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`aberto`', $exibiu); ?><strong>Aberto</strong> <?php echo edicao_expressa($ttabela, 'aberto', 'sim-nao', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['titulo']['visualizar'] && $site['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['subtitulo']['visualizar'] && $site['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['palavras_chaves']['visualizar'] && $site['palavras_chaves']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`palavras_chaves`', $exibiu); ?><strong>Palavras Chaves</strong> <?php echo edicao_expressa($ttabela, 'palavras_chaves', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['descricao']['visualizar'] && $site['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'texto-grande', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['logo2']['visualizar'] && $site['logo2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`logo2`', $exibiu); ?><strong>Logo2</strong> <?php echo $site['logo2'] ?></div>
<?php
if(is_file('site/logo2/'.$site['id'].'.'.$site['logo2'])){
if(strtolower($site['logo2']) == 'jpg' || strtolower($site['logo2']) == 'jpeg' || strtolower($site['logo2']) == 'gif' || strtolower($site['logo2']) == 'png' || strtolower($site['logo2']) == 'bmp'){
?>
<div class="linha"><a href="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" target="_blank"><img src="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?>" target="_blank">site/logo2/<?php echo $site['id'] ?>.<?php echo $site['logo2'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['site']['logo3']['visualizar'] && $site['logo3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`logo3`', $exibiu); ?><strong>Logo3</strong> <?php echo $site['logo3'] ?></div>
<?php
if(is_file('site/logo3/'.$site['id'].'.'.$site['logo3'])){
if(strtolower($site['logo3']) == 'jpg' || strtolower($site['logo3']) == 'jpeg' || strtolower($site['logo3']) == 'gif' || strtolower($site['logo3']) == 'png' || strtolower($site['logo3']) == 'bmp'){
?>
<div class="linha"><a href="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" target="_blank"><img src="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?>" target="_blank">site/logo3/<?php echo $site['id'] ?>.<?php echo $site['logo3'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['site']['e_mail']['visualizar'] && $site['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail2']['visualizar'] && $site['e_mail2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`e_mail2`', $exibiu); ?><strong>E-mail2</strong> <?php echo edicao_expressa($ttabela, 'e_mail2', 'e-mail', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['e_mail3']['visualizar'] && $site['e_mail3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`e_mail3`', $exibiu); ?><strong>E-mail3</strong> <?php echo edicao_expressa($ttabela, 'e_mail3', 'e-mail', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone']['visualizar'] && $site['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone2']['visualizar'] && $site['telefone2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`telefone2`', $exibiu); ?><strong>Telefone2</strong> <?php echo edicao_expressa($ttabela, 'telefone2', 'telefone', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['telefone3']['visualizar'] && $site['telefone3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`telefone3`', $exibiu); ?><strong>Telefone3</strong> <?php echo edicao_expressa($ttabela, 'telefone3', 'telefone', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cep']['visualizar'] && $site['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco']['visualizar'] && $site['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $site); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['numero']['visualizar'] && $site['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['complemento']['visualizar'] && $site['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['bairro']['visualizar'] && $site['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cidade']['visualizar'] && $site['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['estado']['visualizar'] && $site['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco2']['visualizar'] && $site['endereco2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`endereco2`', $exibiu); ?><strong>Endereço2</strong> <?php echo edicao_expressa($ttabela, 'endereco2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['endereco3']['visualizar'] && $site['endereco3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`endereco3`', $exibiu); ?><strong>Endereço3</strong> <?php echo edicao_expressa($ttabela, 'endereco3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario']['visualizar'] && $site['horario']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`horario`', $exibiu); ?><strong>Horário</strong> <?php echo edicao_expressa($ttabela, 'horario', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario2']['visualizar'] && $site['horario2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`horario2`', $exibiu); ?><strong>Horário2</strong> <?php echo edicao_expressa($ttabela, 'horario2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['horario3']['visualizar'] && $site['horario3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`horario3`', $exibiu); ?><strong>Horário3</strong> <?php echo edicao_expressa($ttabela, 'horario3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats']['visualizar'] && $site['textowhats']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textowhats`', $exibiu); ?><strong>TextoWhats</strong> <?php echo edicao_expressa($ttabela, 'textowhats', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats2']['visualizar'] && $site['textowhats2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textowhats2`', $exibiu); ?><strong>TextoWhats2</strong> <?php echo edicao_expressa($ttabela, 'textowhats2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textowhats3']['visualizar'] && $site['textowhats3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textowhats3`', $exibiu); ?><strong>TextoWhats3</strong> <?php echo edicao_expressa($ttabela, 'textowhats3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar']['visualizar'] && $site['textoauxiliar']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textoauxiliar`', $exibiu); ?><strong>TextoAuxiliar</strong> <?php echo edicao_expressa($ttabela, 'textoauxiliar', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar2']['visualizar'] && $site['textoauxiliar2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textoauxiliar2`', $exibiu); ?><strong>TextoAuxiliar2</strong> <?php echo edicao_expressa($ttabela, 'textoauxiliar2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['textoauxiliar3']['visualizar'] && $site['textoauxiliar3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`textoauxiliar3`', $exibiu); ?><strong>TextoAuxiliar3</strong> <?php echo edicao_expressa($ttabela, 'textoauxiliar3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['instagram']['visualizar'] && $site['instagram']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`instagram`', $exibiu); ?><strong>Instagram</strong> <?php echo edicao_expressa($ttabela, 'instagram', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['facebook']['visualizar'] && $site['facebook']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`facebook`', $exibiu); ?><strong>Facebook</strong> <?php echo edicao_expressa($ttabela, 'facebook', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['linkedin']['visualizar'] && $site['linkedin']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`linkedin`', $exibiu); ?><strong>Linkedin</strong> <?php echo edicao_expressa($ttabela, 'linkedin', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['twitter']['visualizar'] && $site['twitter']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`twitter`', $exibiu); ?><strong>Twitter</strong> <?php echo edicao_expressa($ttabela, 'twitter', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['youtube']['visualizar'] && $site['youtube']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`youtube`', $exibiu); ?><strong>YouTube</strong> <?php echo edicao_expressa($ttabela, 'youtube', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['tiktok']['visualizar'] && $site['tiktok']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`tiktok`', $exibiu); ?><strong>TikTok</strong> <?php echo edicao_expressa($ttabela, 'tiktok', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['kwai']['visualizar'] && $site['kwai']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`kwai`', $exibiu); ?><strong>Kwai</strong> <?php echo edicao_expressa($ttabela, 'kwai', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google']['visualizar'] && $site['google']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`google`', $exibiu); ?><strong>Google</strong> <?php echo edicao_expressa($ttabela, 'google', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_plus']['visualizar'] && $site['google_plus']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`google_plus`', $exibiu); ?><strong>Google Plus</strong> <?php echo edicao_expressa($ttabela, 'google_plus', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_maps']['visualizar'] && $site['google_maps']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`google_maps`', $exibiu); ?><strong>Google Maps</strong> <?php echo edicao_expressa($ttabela, 'google_maps', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['google_analitics']['visualizar'] && $site['google_analitics']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`google_analitics`', $exibiu); ?><strong>Google Analítics</strong> <?php echo edicao_expressa($ttabela, 'google_analitics', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['play_store']['visualizar'] && $site['play_store']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`play_store`', $exibiu); ?><strong>Play Store</strong> <?php echo edicao_expressa($ttabela, 'play_store', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['apple_store']['visualizar'] && $site['apple_store']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`apple_store`', $exibiu); ?><strong>Apple Store</strong> <?php echo edicao_expressa($ttabela, 'apple_store', 'url', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['popup']['visualizar'] && $site['popup']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`popup`', $exibiu); ?><strong>PopUp</strong> <?php echo edicao_expressa($ttabela, 'popup', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['aviso_de_cookies']['visualizar'] && $site['aviso_de_cookies']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`aviso_de_cookies`', $exibiu); ?><strong>Aviso de Cookies</strong> <?php echo edicao_expressa($ttabela, 'aviso_de_cookies', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_cookies']['visualizar'] && $site['politica_de_cookies']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`politica_de_cookies`', $exibiu); ?><strong>Politica de Cookies</strong> <?php echo edicao_expressa($ttabela, 'politica_de_cookies', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['politica_de_privacidade']['visualizar'] && $site['politica_de_privacidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`politica_de_privacidade`', $exibiu); ?><strong>Política de Privacidade</strong> <?php echo edicao_expressa($ttabela, 'politica_de_privacidade', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['termos_de_uso']['visualizar'] && $site['termos_de_uso']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`termos_de_uso`', $exibiu); ?><strong>Termos de Uso</strong> <?php echo edicao_expressa($ttabela, 'termos_de_uso', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato']['visualizar'] && $site['contrato']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`contrato`', $exibiu); ?><strong>Contrato</strong> <?php echo edicao_expressa($ttabela, 'contrato', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato2']['visualizar'] && $site['contrato2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`contrato2`', $exibiu); ?><strong>Contrato2</strong> <?php echo edicao_expressa($ttabela, 'contrato2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['contrato3']['visualizar'] && $site['contrato3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`contrato3`', $exibiu); ?><strong>Contrato3</strong> <?php echo edicao_expressa($ttabela, 'contrato3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['obs']['visualizar'] && $site['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor']['visualizar'] && $site['cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cor`', $exibiu); ?><strong>Cor</strong> <?php echo edicao_expressa($ttabela, 'cor', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor2']['visualizar'] && $site['cor2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cor2`', $exibiu); ?><strong>Cor2</strong> <?php echo edicao_expressa($ttabela, 'cor2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor3']['visualizar'] && $site['cor3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cor3`', $exibiu); ?><strong>Cor3</strong> <?php echo edicao_expressa($ttabela, 'cor3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cor4']['visualizar'] && $site['cor4']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cor4`', $exibiu); ?><strong>Cor4</strong> <?php echo edicao_expressa($ttabela, 'cor4', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt']['visualizar'] && $site['cortxt']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cortxt`', $exibiu); ?><strong>CorTxt</strong> <?php echo edicao_expressa($ttabela, 'cortxt', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt2']['visualizar'] && $site['cortxt2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cortxt2`', $exibiu); ?><strong>CorTxt2</strong> <?php echo edicao_expressa($ttabela, 'cortxt2', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt3']['visualizar'] && $site['cortxt3']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cortxt3`', $exibiu); ?><strong>CorTxt3</strong> <?php echo edicao_expressa($ttabela, 'cortxt3', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['cortxt4']['visualizar'] && $site['cortxt4']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`cortxt4`', $exibiu); ?><strong>CorTxt4</strong> <?php echo edicao_expressa($ttabela, 'cortxt4', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['container']['visualizar'] && $site['container']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`container`', $exibiu); ?><strong>Container</strong> <?php echo edicao_expressa($ttabela, 'container', 'sim-nao', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda']['visualizar'] && $site['borda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`borda`', $exibiu); ?><strong>Borda</strong> <?php echo edicao_expressa($ttabela, 'borda', 'sim-nao', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_cor']['visualizar'] && $site['borda_cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`borda_cor`', $exibiu); ?><strong>Borda Cor</strong> <?php echo edicao_expressa($ttabela, 'borda_cor', 'texto', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['borda_sombra']['visualizar'] && $site['borda_sombra']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`borda_sombra`', $exibiu); ?><strong>Borda Sombra</strong> <?php echo edicao_expressa($ttabela, 'borda_sombra', 'sim-nao', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['arredondado']['visualizar'] && $site['arredondado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`arredondado`', $exibiu); ?><strong>Arredondado</strong> <?php echo edicao_expressa($ttabela, 'arredondado', 'sim-nao', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['documentos']['visualizar'] && $site['documentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`documentos`', $exibiu); ?><strong>Documentos</strong> <?php echo $site['documentos'] ?></div>
<?php
if(is_file('site/documentos/'.$site['id'].'.'.$site['documentos'])){
if(strtolower($site['documentos']) == 'jpg' || strtolower($site['documentos']) == 'jpeg' || strtolower($site['documentos']) == 'gif' || strtolower($site['documentos']) == 'png' || strtolower($site['documentos']) == 'bmp'){
?>
<div class="linha"><a href="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" target="_blank"><img src="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?>" target="_blank">site/documentos/<?php echo $site['id'] ?>.<?php echo $site['documentos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['site']['historico']['visualizar'] && $site['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $site); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['site']['data_cadastro']['visualizar'] && $site['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $site); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Site: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['site']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=site-cadastrar.php"> 
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