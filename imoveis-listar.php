<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Imóveis'; $ttabela = 'imoveis'; $aarquivo = 'imoveis';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Imóveis" cadastrados(as)';
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
<h1>Imóveis</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['imoveis']['excluir']){
if(filhos($a, $base, 'imoveis', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Imóveis', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `imoveis` WHERE'.sql_subordinacao($a, 'imoveis').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Imóveis&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `imoveis` WHERE (codigo = \''.ai($a, $_POST['codigo']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$imoveis = mysqli_fetch_array($res);
if($imoveis['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Imóveis&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['imagens']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['imoveis']['cadastrar']){
for($x=0;$x<count($_FILES['imagens']['tmp_name']);$x++){
$sql = 'INSERT INTO `imoveis` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_imovel` = \''.ai($a, $_POST['id_status_imovel']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_imovel` = \''.ai($a, $_POST['id_etiquetas_imovel']).'\', 
`id_status_negociacao` = \''.ai($a, $_POST['id_status_negociacao']).'\', 
`id_tipos_imovel` = \''.ai($a, $_POST['id_tipos_imovel']).'\', 
`exclusivo` = \''.ai($a, $_POST['exclusivo']).'\', 
`escriturado` = \''.ai($a, $_POST['escriturado']).'\', 
`id_corretores` = \''.ai($a, $_POST['id_corretores']).'\', 
`id_proprietarios` = \''.ai($a, $_POST['id_proprietarios']).'\', 
`area_total` = \''.ai($a, $_POST['area_total']).'\', 
`area_construida` = \''.ai($a, $_POST['area_construida']).'\', 
`valor_venda` = \''.ai($a, moeda_mysql($_POST['valor_venda'])).'\', 
`valor_aluguel` = \''.ai($a, moeda_mysql($_POST['valor_aluguel'])).'\', 
`valor_condominio` = \''.ai($a, moeda_mysql($_POST['valor_condominio'])).'\', 
`valor_caucao` = \''.ai($a, $_POST['valor_caucao']).'\', 
`outros_valores` = \''.ai($a, $_POST['outros_valores']).'\', 
`comissao` = \''.ai($a, $_POST['comissao']).'\', 
`imagens` = \''.ai($a, extensao_arquivo($_FILES['imagens']['name'][$x], $_POST['arquivo_imagens'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhes` = \''.ai($a, $_POST['detalhes'], true).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'imoveis/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagens']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Imóveis cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['imoveis']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `imoveis` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_imovel` = \''.ai($a, $_POST['id_status_imovel']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_imovel` = \''.ai($a, $_POST['id_etiquetas_imovel']).'\', 
`id_status_negociacao` = \''.ai($a, $_POST['id_status_negociacao']).'\', 
`id_tipos_imovel` = \''.ai($a, $_POST['id_tipos_imovel']).'\', 
`exclusivo` = \''.ai($a, $_POST['exclusivo']).'\', 
`escriturado` = \''.ai($a, $_POST['escriturado']).'\', 
`id_corretores` = \''.ai($a, $_POST['id_corretores']).'\', 
`id_proprietarios` = \''.ai($a, $_POST['id_proprietarios']).'\', 
`area_total` = \''.ai($a, $_POST['area_total']).'\', 
`area_construida` = \''.ai($a, $_POST['area_construida']).'\', 
`valor_venda` = \''.ai($a, moeda_mysql($_POST['valor_venda'])).'\', 
`valor_aluguel` = \''.ai($a, moeda_mysql($_POST['valor_aluguel'])).'\', 
`valor_condominio` = \''.ai($a, moeda_mysql($_POST['valor_condominio'])).'\', 
`valor_caucao` = \''.ai($a, $_POST['valor_caucao']).'\', 
`outros_valores` = \''.ai($a, $_POST['outros_valores']).'\', 
`comissao` = \''.ai($a, $_POST['comissao']).'\', 
`imagens` = \''.ai($a, extensao_arquivo($_FILES['imagens']['name'][$x], $_POST['arquivo_imagens'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhes` = \''.ai($a, $_POST['detalhes'], true).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'imoveis/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagens']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Imóveis alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'imoveis';
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
<form id="form1" name="form1" method="get" action="imoveis-listar.php">
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
$filtrar = 'status_imovel'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'destaque';
include('inc.filtro-sn.php');
//
$filtrar = 'etiquetas_imovel'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'status_negociacao'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'tipos_imovel'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'exclusivo';
include('inc.filtro-sn.php');
//
$filtrar = 'escriturado';
include('inc.filtro-sn.php');
//
$filtrar = 'corretores'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'proprietarios'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'imoveis';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `imoveis`.`id` DESC';
}
$sql = 'SELECT 
`imoveis`.`id`, 
`secoes`.`nome` AS `secao`, 
`categorias`.`nome` AS `categoria`, 
`subcategorias`.`nome` AS `subcategoria`, 
`imoveis`.`nome`, 
`imoveis`.`imagem`, 
`status_imovel`.`nome` AS `status`, 
`status_imovel`.`label` AS `label_status`, 
`imoveis`.`codigo`, 
`imoveis`.`data_expira`, 
`imoveis`.`destaque`, 
`etiquetas_imovel`.`nome` AS `etiqueta`, 
`etiquetas_imovel`.`label` AS `label_etiqueta`, 
`status_negociacao`.`nome` AS `negociacao`, 
`status_negociacao`.`label` AS `label_negociacao`, 
`tipos_imovel`.`nome` AS `tipo`, 
`imoveis`.`exclusivo`, 
`imoveis`.`escriturado`, 
`corretores`.`nome` AS `corretor`, 
`proprietarios`.`nome` AS `proprietario`, 
`imoveis`.`area_total`, 
`imoveis`.`area_construida`, 
`imoveis`.`valor_venda`, 
`imoveis`.`valor_aluguel`, 
`imoveis`.`valor_condominio`, 
`imoveis`.`valor_caucao`, 
`imoveis`.`outros_valores`, 
`imoveis`.`comissao`, 
`imoveis`.`imagens`, 
`imoveis`.`video`, 
`imoveis`.`titulo`, 
`imoveis`.`detalhes`, 
`imoveis`.`descricao`, 
`imoveis`.`obs`, 
`imoveis`.`documentos`, 
`imoveis`.`historico`, 
`imoveis`.`data_cadastro` 
FROM `imoveis` 
LEFT JOIN `secoes` ON `secoes`.`id` = `imoveis`.`id_secoes`
LEFT JOIN `categorias` ON `categorias`.`id` = `imoveis`.`id_categorias`
LEFT JOIN `subcategorias` ON `subcategorias`.`id` = `imoveis`.`id_subcategorias`
LEFT JOIN `status_imovel` ON `status_imovel`.`id` = `imoveis`.`id_status_imovel`
LEFT JOIN `etiquetas_imovel` ON `etiquetas_imovel`.`id` = `imoveis`.`id_etiquetas_imovel`
LEFT JOIN `status_negociacao` ON `status_negociacao`.`id` = `imoveis`.`id_status_negociacao`
LEFT JOIN `tipos_imovel` ON `tipos_imovel`.`id` = `imoveis`.`id_tipos_imovel`
LEFT JOIN `corretores` ON `corretores`.`id` = `imoveis`.`id_corretores`
LEFT JOIN `proprietarios` ON `proprietarios`.`id` = `imoveis`.`id_proprietarios` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Imóveis';
?>
<h2 style="margin:15px;">&quot;Imóveis&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'imoveis-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($imoveis = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $imoveis[primeiro_campo_nativo($a, 'imoveis')]).'\',
url: \'imoveis-cadastrar.php?editar='.$imoveis['id'].'\',
start: \''.$imoveis[primeiro_campo_data($a, 'imoveis')].'\',
end: \''.$imoveis[primeiro_campo_data($a, 'imoveis')].'\',
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
<?php if($_SESSION['permissao']['imoveis']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php ordenar($url, '`secoes`.`nome`'); ?><strong>Seção</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php ordenar($url, '`categorias`.`nome`'); ?><strong>Categoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php ordenar($url, '`subcategorias`.`nome`'); ?><strong>Subcategoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['imoveis']['id_status_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_imovel_usuarios']){ ?>
<td><?php ordenar($url, '`status_imovel`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['codigo']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`codigo`'); ?><strong>Código</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['destaque']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`destaque`'); ?><strong>Destaque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_etiquetas_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_imovel_usuarios']){ ?>
<td><?php ordenar($url, '`etiquetas_imovel`.`nome`'); ?><strong>Etiqueta</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_status_negociacao']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_negociacao_usuarios']){ ?>
<td><?php ordenar($url, '`status_negociacao`.`nome`'); ?><strong>Negociação</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_tipos_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_tipos_imovel_usuarios']){ ?>
<td><?php ordenar($url, '`tipos_imovel`.`nome`'); ?><strong>Tipo</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['exclusivo']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`exclusivo`'); ?><strong>Exclusivo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['escriturado']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`escriturado`'); ?><strong>Escriturado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_corretores']['visualizar']){ ?>
<?php if(!$_SESSION['id_corretores_usuarios']){ ?>
<td><?php ordenar($url, '`corretores`.`nome`'); ?><strong>Corretor</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_proprietarios']['visualizar']){ ?>
<?php if(!$_SESSION['id_proprietarios_usuarios']){ ?>
<td><?php ordenar($url, '`proprietarios`.`nome`'); ?><strong>Proprietário</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_total']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`area_total`'); ?><strong>Área Total</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_construida']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`area_construida`'); ?><strong>Área Construída</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_venda']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`valor_venda`'); ?><strong>Valor Venda</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_aluguel']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`valor_aluguel`'); ?><strong>Valor Aluguel</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_condominio']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`valor_condominio`'); ?><strong>Valor Condomínio</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_caucao']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`valor_caucao`'); ?><strong>Valor Caução</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['outros_valores']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`outros_valores`'); ?><strong>Outros Valores</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['comissao']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`comissao`'); ?><strong>Comissão</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagens']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`imagens`'); ?><strong>Imagens</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['imoveis']['video']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`video`'); ?><strong>Vídeo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['detalhes']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`detalhes`'); ?><strong>Detalhes</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['documentos']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`documentos`'); ?><strong>Documentos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['imoveis']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`imoveis`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($imoveis = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['imoveis']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $imoveis, 'secao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $imoveis, 'categoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $imoveis, 'subcategoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagem']['visualizar']){ ?>
<td><?php echo $imoveis['imagem'] ?></td>
<?php
if(strtolower($imoveis['imagem']) == 'jpg' || strtolower($imoveis['imagem']) == 'jpeg' || strtolower($imoveis['imagem']) == 'gif' || strtolower($imoveis['imagem']) == 'png' || strtolower($imoveis['imagem']) == 'bmp'){
?>
<td><?php if(is_file('imoveis/imagem/'.$imoveis['id'].'.'.$imoveis['imagem'])){ ?><a href="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" target="_blank"><img src="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('imoveis/imagem/'.$imoveis['id'].'.'.$imoveis['imagem'])){ ?><a href="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" target="_blank">imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['id_status_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_imovel_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_imovel', 'selecao', $imoveis, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['codigo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'codigo', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $imoveis); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['destaque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_etiquetas_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_imovel_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'etiquetas_imovel', 'selecao', $imoveis, 'etiqueta', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_status_negociacao']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_negociacao_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_negociacao', 'selecao', $imoveis, 'negociacao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_tipos_imovel']['visualizar']){ ?>
<?php if(!$_SESSION['id_tipos_imovel_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'tipos_imovel', 'selecao', $imoveis, 'tipo', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['exclusivo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'exclusivo', 'sim-nao', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['escriturado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'escriturado', 'sim-nao', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_corretores']['visualizar']){ ?>
<?php if(!$_SESSION['id_corretores_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'corretores', 'selecao', $imoveis, 'corretor', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_proprietarios']['visualizar']){ ?>
<?php if(!$_SESSION['id_proprietarios_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'proprietarios', 'selecao', $imoveis, 'proprietario', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_total']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'area_total', 'numero-inteiro', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_construida']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'area_construida', 'numero-inteiro', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_venda']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_venda', 'moeda', $imoveis); $totais[] = 'valor_venda'; $total['valor_venda'] += $imoveis['valor_venda']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_aluguel']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_aluguel', 'moeda', $imoveis); $totais[] = 'valor_aluguel'; $total['valor_aluguel'] += $imoveis['valor_aluguel']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_condominio']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_condominio', 'moeda', $imoveis); $totais[] = 'valor_condominio'; $total['valor_condominio'] += $imoveis['valor_condominio']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_caucao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_caucao', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['outros_valores']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'outros_valores', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['comissao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'comissao', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagens']['visualizar']){ ?>
<td><?php echo $imoveis['imagens'] ?></td>
<?php
if(strtolower($imoveis['imagens']) == 'jpg' || strtolower($imoveis['imagens']) == 'jpeg' || strtolower($imoveis['imagens']) == 'gif' || strtolower($imoveis['imagens']) == 'png' || strtolower($imoveis['imagens']) == 'bmp'){
?>
<td><?php if(is_file('imoveis/imagens/'.$imoveis['id'].'.'.$imoveis['imagens'])){ ?><a href="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" target="_blank"><img src="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('imoveis/imagens/'.$imoveis['id'].'.'.$imoveis['imagens'])){ ?><a href="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" target="_blank">imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['video']['visualizar']){ ?>
<td><?php $codigo_youtube = codigo_youtube($imoveis['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $imoveis); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['detalhes']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'detalhes', 'html', $imoveis, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $imoveis, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $imoveis, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['documentos']['visualizar']){ ?>
<td><?php echo $imoveis['documentos'] ?></td>
<?php
if(strtolower($imoveis['documentos']) == 'jpg' || strtolower($imoveis['documentos']) == 'jpeg' || strtolower($imoveis['documentos']) == 'gif' || strtolower($imoveis['documentos']) == 'png' || strtolower($imoveis['documentos']) == 'bmp'){
?>
<td><?php if(is_file('imoveis/documentos/'.$imoveis['id'].'.'.$imoveis['documentos'])){ ?><a href="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" target="_blank"><img src="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('imoveis/documentos/'.$imoveis['id'].'.'.$imoveis['documentos'])){ ?><a href="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" target="_blank">imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $imoveis, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $imoveis); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Imóveis: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['imoveis']['imprimir']){ ?><a href="imprimir-registro.php?tabela=imoveis&id=<?php echo $imoveis['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['duplicar']){ ?><a href="imoveis-listar.php?duplicar=<?php echo $imoveis['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['editar']){ ?><a href="imoveis-cadastrar.php?editar=<?php echo $imoveis['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['excluir']){ ?><a href="imoveis-listar.php?excluir=<?php echo $imoveis['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($imoveis = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['imoveis']['imprimir']){ ?><a href="imprimir-registro.php?tabela=imoveis&id=<?php echo $imoveis['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['duplicar']){ ?><a href="imoveis-listar.php?duplicar=<?php echo $imoveis['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['editar']){ ?><a href="imoveis-cadastrar.php?editar=<?php echo $imoveis['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['excluir']){ ?><a href="imoveis-listar.php?excluir=<?php echo $imoveis['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['imoveis']['id_secoes']['visualizar'] && $imoveis['secao']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`nome`', $exibiu); ?><strong>Seção</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $imoveis, 'secao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_categorias']['visualizar'] && $imoveis['categoria']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`nome`', $exibiu); ?><strong>Categoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $imoveis, 'categoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_subcategorias']['visualizar'] && $imoveis['subcategoria']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`nome`', $exibiu); ?><strong>Subcategoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $imoveis, 'subcategoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['nome']['visualizar'] && $imoveis['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagem']['visualizar'] && $imoveis['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $imoveis['imagem'] ?></div>
<?php
if(is_file('imoveis/imagem/'.$imoveis['id'].'.'.$imoveis['imagem'])){
if(strtolower($imoveis['imagem']) == 'jpg' || strtolower($imoveis['imagem']) == 'jpeg' || strtolower($imoveis['imagem']) == 'gif' || strtolower($imoveis['imagem']) == 'png' || strtolower($imoveis['imagem']) == 'bmp'){
?>
<div class="linha"><a href="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" target="_blank"><img src="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?>" target="_blank">imoveis/imagem/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['id_status_imovel']['visualizar'] && $imoveis['status']){ ?>
<?php if(!$_SESSION['id_status_imovel_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_imovel`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_imovel', 'selecao', $imoveis, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['codigo']['visualizar'] && $imoveis['codigo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`codigo`', $exibiu); ?><strong>Código</strong> <?php echo edicao_expressa($ttabela, 'codigo', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_expira']['visualizar'] && $imoveis['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $imoveis); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['imoveis']['destaque']['visualizar'] && $imoveis['destaque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`destaque`', $exibiu); ?><strong>Destaque</strong> <?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_etiquetas_imovel']['visualizar'] && $imoveis['etiqueta']){ ?>
<?php if(!$_SESSION['id_etiquetas_imovel_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_imovel`.`nome`', $exibiu); ?><strong>Etiqueta</strong> <?php echo edicao_expressa_label($ttabela, 'etiquetas_imovel', 'selecao', $imoveis, 'etiqueta', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_status_negociacao']['visualizar'] && $imoveis['negociacao']){ ?>
<?php if(!$_SESSION['id_status_negociacao_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_negociacao`.`nome`', $exibiu); ?><strong>Negociação</strong> <?php echo edicao_expressa_label($ttabela, 'status_negociacao', 'selecao', $imoveis, 'negociacao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_tipos_imovel']['visualizar'] && $imoveis['tipo']){ ?>
<?php if(!$_SESSION['id_tipos_imovel_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tipos_imovel`.`nome`', $exibiu); ?><strong>Tipo</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'tipos_imovel', 'selecao', $imoveis, 'tipo', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['exclusivo']['visualizar'] && $imoveis['exclusivo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`exclusivo`', $exibiu); ?><strong>Exclusivo</strong> <?php echo edicao_expressa($ttabela, 'exclusivo', 'sim-nao', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['escriturado']['visualizar'] && $imoveis['escriturado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`escriturado`', $exibiu); ?><strong>Escriturado</strong> <?php echo edicao_expressa($ttabela, 'escriturado', 'sim-nao', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_corretores']['visualizar'] && $imoveis['corretor']){ ?>
<?php if(!$_SESSION['id_corretores_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`nome`', $exibiu); ?><strong>Corretor</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'corretores', 'selecao', $imoveis, 'corretor', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['id_proprietarios']['visualizar'] && $imoveis['proprietario']){ ?>
<?php if(!$_SESSION['id_proprietarios_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`nome`', $exibiu); ?><strong>Proprietário</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'proprietarios', 'selecao', $imoveis, 'proprietario', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_total']['visualizar'] && $imoveis['area_total']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`area_total`', $exibiu); ?><strong>Área Total</strong> <?php echo edicao_expressa($ttabela, 'area_total', 'numero-inteiro', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['area_construida']['visualizar'] && $imoveis['area_construida']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`area_construida`', $exibiu); ?><strong>Área Construída</strong> <?php echo edicao_expressa($ttabela, 'area_construida', 'numero-inteiro', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_venda']['visualizar'] && $imoveis['valor_venda']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`valor_venda`', $exibiu); ?><strong>Valor Venda</strong> <?php echo edicao_expressa($ttabela, 'valor_venda', 'moeda', $imoveis); $totais[] = 'valor_venda'; $total['valor_venda'] += $imoveis['valor_venda']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_aluguel']['visualizar'] && $imoveis['valor_aluguel']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`valor_aluguel`', $exibiu); ?><strong>Valor Aluguel</strong> <?php echo edicao_expressa($ttabela, 'valor_aluguel', 'moeda', $imoveis); $totais[] = 'valor_aluguel'; $total['valor_aluguel'] += $imoveis['valor_aluguel']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_condominio']['visualizar'] && $imoveis['valor_condominio']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`valor_condominio`', $exibiu); ?><strong>Valor Condomínio</strong> <?php echo edicao_expressa($ttabela, 'valor_condominio', 'moeda', $imoveis); $totais[] = 'valor_condominio'; $total['valor_condominio'] += $imoveis['valor_condominio']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['valor_caucao']['visualizar'] && $imoveis['valor_caucao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`valor_caucao`', $exibiu); ?><strong>Valor Caução</strong> <?php echo edicao_expressa($ttabela, 'valor_caucao', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['outros_valores']['visualizar'] && $imoveis['outros_valores']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`outros_valores`', $exibiu); ?><strong>Outros Valores</strong> <?php echo edicao_expressa($ttabela, 'outros_valores', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['comissao']['visualizar'] && $imoveis['comissao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`comissao`', $exibiu); ?><strong>Comissão</strong> <?php echo edicao_expressa($ttabela, 'comissao', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['imagens']['visualizar'] && $imoveis['imagens']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`imagens`', $exibiu); ?><strong>Imagens</strong> <?php echo $imoveis['imagens'] ?></div>
<?php
if(is_file('imoveis/imagens/'.$imoveis['id'].'.'.$imoveis['imagens'])){
if(strtolower($imoveis['imagens']) == 'jpg' || strtolower($imoveis['imagens']) == 'jpeg' || strtolower($imoveis['imagens']) == 'gif' || strtolower($imoveis['imagens']) == 'png' || strtolower($imoveis['imagens']) == 'bmp'){
?>
<div class="linha"><a href="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" target="_blank"><img src="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?>" target="_blank">imoveis/imagens/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['imagens'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['video']['visualizar'] && $imoveis['video']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`video`', $exibiu); ?><strong>Vídeo</strong><br>
<?php $codigo_youtube = codigo_youtube($imoveis['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a>
</div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['titulo']['visualizar'] && $imoveis['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['detalhes']['visualizar'] && $imoveis['detalhes']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`detalhes`', $exibiu); ?><strong>Detalhes</strong> <?php echo edicao_expressa($ttabela, 'detalhes', 'html', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['descricao']['visualizar'] && $imoveis['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['obs']['visualizar'] && $imoveis['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['documentos']['visualizar'] && $imoveis['documentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`documentos`', $exibiu); ?><strong>Documentos</strong> <?php echo $imoveis['documentos'] ?></div>
<?php
if(is_file('imoveis/documentos/'.$imoveis['id'].'.'.$imoveis['documentos'])){
if(strtolower($imoveis['documentos']) == 'jpg' || strtolower($imoveis['documentos']) == 'jpeg' || strtolower($imoveis['documentos']) == 'gif' || strtolower($imoveis['documentos']) == 'png' || strtolower($imoveis['documentos']) == 'bmp'){
?>
<div class="linha"><a href="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" target="_blank"><img src="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?>" target="_blank">imoveis/documentos/<?php echo $imoveis['id'] ?>.<?php echo $imoveis['documentos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['imoveis']['historico']['visualizar'] && $imoveis['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $imoveis); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['imoveis']['data_cadastro']['visualizar'] && $imoveis['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`imoveis`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $imoveis); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Imóveis: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['imoveis']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=imoveis-cadastrar.php"> 
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