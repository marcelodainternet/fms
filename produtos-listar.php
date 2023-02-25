<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Produtos'; $ttabela = 'produtos'; $aarquivo = 'produtos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Produtos" cadastrados(as)';
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
<h1>Produtos</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['produtos']['excluir']){
if(filhos($a, $base, 'produtos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Produtos', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `produtos` WHERE'.sql_subordinacao($a, 'produtos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Produtos&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `produtos` WHERE (codigo = \''.ai($a, $_POST['codigo']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$produtos = mysqli_fetch_array($res);
if($produtos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Produtos&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['imagens']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['produtos']['cadastrar']){
for($x=0;$x<count($_FILES['imagens']['tmp_name']);$x++){
$sql = 'INSERT INTO `produtos` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_produto` = \''.ai($a, $_POST['id_status_produto']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_produto` = \''.ai($a, $_POST['id_etiquetas_produto']).'\', 
`estoque` = \''.ai($a, $_POST['estoque']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`imagens` = \''.ai($a, extensao_arquivo($_FILES['imagens']['name'][$x], $_POST['arquivo_imagens'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`custo` = \''.ai($a, moeda_mysql($_POST['custo'])).'\', 
`preco` = \''.ai($a, moeda_mysql($_POST['preco'])).'\', 
`preco_2` = \''.ai($a, moeda_mysql($_POST['preco_2'])).'\', 
`oferta` = \''.ai($a, moeda_mysql($_POST['oferta'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`marca` = \''.ai($a, $_POST['marca']).'\', 
`modelo` = \''.ai($a, $_POST['modelo']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`link` = \''.ai($a, $_POST['link']).'\', 
`material` = \''.ai($a, $_POST['material']).'\', 
`cor` = \''.ai($a, $_POST['cor']).'\', 
`peso` = \''.ai($a, $_POST['peso']).'\', 
`volumes` = \''.ai($a, $_POST['volumes']).'\', 
`tamanho` = \''.ai($a, $_POST['tamanho']).'\', 
`largura` = \''.ai($a, $_POST['largura']).'\', 
`altura` = \''.ai($a, $_POST['altura']).'\', 
`profundidade` = \''.ai($a, $_POST['profundidade']).'\', 
`views` = \''.ai($a, $_POST['views']).'\', 
`liks` = \''.ai($a, $_POST['liks']).'\', 
`pontos` = \''.ai($a, $_POST['pontos']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'produtos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagens']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Produtos cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['produtos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `produtos` SET 
`id_secoes` = \''.ai($a, $_POST['id_secoes']).'\', 
`id_categorias` = \''.ai($a, $_POST['id_categorias']).'\', 
`id_subcategorias` = \''.ai($a, $_POST['id_subcategorias']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_produto` = \''.ai($a, $_POST['id_status_produto']).'\', 
`codigo` = \''.ai($a, $_POST['codigo']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`id_etiquetas_produto` = \''.ai($a, $_POST['id_etiquetas_produto']).'\', 
`estoque` = \''.ai($a, $_POST['estoque']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`imagens` = \''.ai($a, extensao_arquivo($_FILES['imagens']['name'][$x], $_POST['arquivo_imagens'])).'\', 
`video` = \''.ai($a, $_POST['video'], true).'\', 
`custo` = \''.ai($a, moeda_mysql($_POST['custo'])).'\', 
`preco` = \''.ai($a, moeda_mysql($_POST['preco'])).'\', 
`preco_2` = \''.ai($a, moeda_mysql($_POST['preco_2'])).'\', 
`oferta` = \''.ai($a, moeda_mysql($_POST['oferta'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`marca` = \''.ai($a, $_POST['marca']).'\', 
`modelo` = \''.ai($a, $_POST['modelo']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`subtitulo` = \''.ai($a, $_POST['subtitulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`link` = \''.ai($a, $_POST['link']).'\', 
`material` = \''.ai($a, $_POST['material']).'\', 
`cor` = \''.ai($a, $_POST['cor']).'\', 
`peso` = \''.ai($a, $_POST['peso']).'\', 
`volumes` = \''.ai($a, $_POST['volumes']).'\', 
`tamanho` = \''.ai($a, $_POST['tamanho']).'\', 
`largura` = \''.ai($a, $_POST['largura']).'\', 
`altura` = \''.ai($a, $_POST['altura']).'\', 
`profundidade` = \''.ai($a, $_POST['profundidade']).'\', 
`views` = \''.ai($a, $_POST['views']).'\', 
`liks` = \''.ai($a, $_POST['liks']).'\', 
`pontos` = \''.ai($a, $_POST['pontos']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'produtos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagens']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Produtos alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'produtos';
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
<form id="form1" name="form1" method="get" action="produtos-listar.php">
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
$filtrar = 'status_produto'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'destaque';
include('inc.filtro-sn.php');
//
$filtrar = 'etiquetas_produto'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'parceiros'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'produtos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `produtos`.`id` DESC';
}
$sql = 'SELECT 
`produtos`.`id`, 
`secoes`.`nome` AS `secao`, 
`categorias`.`nome` AS `categoria`, 
`subcategorias`.`nome` AS `subcategoria`, 
`produtos`.`nome`, 
`produtos`.`imagem`, 
`status_produto`.`nome` AS `status`, 
`status_produto`.`label` AS `label_status`, 
`produtos`.`codigo`, 
`produtos`.`data_expira`, 
`produtos`.`destaque`, 
`etiquetas_produto`.`nome` AS `etiqueta`, 
`etiquetas_produto`.`label` AS `label_etiqueta`, 
`produtos`.`estoque`, 
`parceiros`.`nome` AS `fornecedor`, 
`produtos`.`imagens`, 
`produtos`.`video`, 
`produtos`.`custo`, 
`produtos`.`preco`, 
`produtos`.`preco_2`, 
`produtos`.`oferta`, 
`produtos`.`desconto`, 
`produtos`.`cupom_de_desconto`, 
`produtos`.`marca`, 
`produtos`.`modelo`, 
`produtos`.`titulo`, 
`produtos`.`subtitulo`, 
`produtos`.`detalhe`, 
`produtos`.`descricao`, 
`produtos`.`obs`, 
`produtos`.`link`, 
`produtos`.`material`, 
`produtos`.`cor`, 
`produtos`.`peso`, 
`produtos`.`volumes`, 
`produtos`.`tamanho`, 
`produtos`.`largura`, 
`produtos`.`altura`, 
`produtos`.`profundidade`, 
`produtos`.`views`, 
`produtos`.`liks`, 
`produtos`.`pontos`, 
`produtos`.`historico`, 
`produtos`.`data_cadastro` 
FROM `produtos` 
LEFT JOIN `secoes` ON `secoes`.`id` = `produtos`.`id_secoes`
LEFT JOIN `categorias` ON `categorias`.`id` = `produtos`.`id_categorias`
LEFT JOIN `subcategorias` ON `subcategorias`.`id` = `produtos`.`id_subcategorias`
LEFT JOIN `status_produto` ON `status_produto`.`id` = `produtos`.`id_status_produto`
LEFT JOIN `etiquetas_produto` ON `etiquetas_produto`.`id` = `produtos`.`id_etiquetas_produto`
LEFT JOIN `parceiros` ON `parceiros`.`id` = `produtos`.`id_parceiros` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Produtos';
?>
<h2 style="margin:15px;">&quot;Produtos&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'produtos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($produtos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $produtos[primeiro_campo_nativo($a, 'produtos')]).'\',
url: \'produtos-cadastrar.php?editar='.$produtos['id'].'\',
start: \''.$produtos[primeiro_campo_data($a, 'produtos')].'\',
end: \''.$produtos[primeiro_campo_data($a, 'produtos')].'\',
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
<?php if($_SESSION['permissao']['produtos']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php ordenar($url, '`secoes`.`nome`'); ?><strong>Seção</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php ordenar($url, '`categorias`.`nome`'); ?><strong>Categoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php ordenar($url, '`subcategorias`.`nome`'); ?><strong>Subcategoria</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['produtos']['id_status_produto']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_produto_usuarios']){ ?>
<td><?php ordenar($url, '`status_produto`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['codigo']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`codigo`'); ?><strong>Código</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['produtos']['destaque']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`destaque`'); ?><strong>Destaque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_etiquetas_produto']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_produto_usuarios']){ ?>
<td><?php ordenar($url, '`etiquetas_produto`.`nome`'); ?><strong>Etiqueta</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['estoque']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`estoque`'); ?><strong>Estoque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php ordenar($url, '`parceiros`.`nome`'); ?><strong>Fornecedor</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagens']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`imagens`'); ?><strong>Imagens</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['produtos']['video']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`video`'); ?><strong>Vídeo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['custo']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`custo`'); ?><strong>Custo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`preco`'); ?><strong>Preço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco_2']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`preco_2`'); ?><strong>Preço 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['oferta']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`oferta`'); ?><strong>Oferta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`desconto`'); ?><strong>Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`cupom_de_desconto`'); ?><strong>Cupom de Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['marca']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`marca`'); ?><strong>Marca</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['modelo']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`modelo`'); ?><strong>Modelo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['subtitulo']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`subtitulo`'); ?><strong>Subtítulo</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['detalhe']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`detalhe`'); ?><strong>Detalhe</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['link']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`link`'); ?><strong>Link</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['material']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`material`'); ?><strong>Material</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cor']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`cor`'); ?><strong>Cor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['peso']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`peso`'); ?><strong>Peso</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['volumes']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`volumes`'); ?><strong>Volumes</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['tamanho']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`tamanho`'); ?><strong>Tamanho</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['largura']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`largura`'); ?><strong>Largura</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['altura']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`altura`'); ?><strong>Altura</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['profundidade']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`profundidade`'); ?><strong>Profundidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['views']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`views`'); ?><strong>Views</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['liks']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`liks`'); ?><strong>Liks</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['pontos']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`pontos`'); ?><strong>Pontos</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`produtos`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($produtos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['produtos']['id_secoes']['visualizar']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $produtos, 'secao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_categorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $produtos, 'categoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_subcategorias']['visualizar']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $produtos, 'subcategoria', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagem']['visualizar']){ ?>
<td><?php echo $produtos['imagem'] ?></td>
<?php
if(strtolower($produtos['imagem']) == 'jpg' || strtolower($produtos['imagem']) == 'jpeg' || strtolower($produtos['imagem']) == 'gif' || strtolower($produtos['imagem']) == 'png' || strtolower($produtos['imagem']) == 'bmp'){
?>
<td><?php if(is_file('produtos/imagem/'.$produtos['id'].'.'.$produtos['imagem'])){ ?><a href="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" target="_blank"><img src="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('produtos/imagem/'.$produtos['id'].'.'.$produtos['imagem'])){ ?><a href="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" target="_blank">produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['produtos']['id_status_produto']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_produto_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_produto', 'selecao', $produtos, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['codigo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'codigo', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $produtos); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['produtos']['destaque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_etiquetas_produto']['visualizar']){ ?>
<?php if(!$_SESSION['id_etiquetas_produto_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'etiquetas_produto', 'selecao', $produtos, 'etiqueta', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['estoque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estoque', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $produtos, 'fornecedor', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagens']['visualizar']){ ?>
<td><?php echo $produtos['imagens'] ?></td>
<?php
if(strtolower($produtos['imagens']) == 'jpg' || strtolower($produtos['imagens']) == 'jpeg' || strtolower($produtos['imagens']) == 'gif' || strtolower($produtos['imagens']) == 'png' || strtolower($produtos['imagens']) == 'bmp'){
?>
<td><?php if(is_file('produtos/imagens/'.$produtos['id'].'.'.$produtos['imagens'])){ ?><a href="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" target="_blank"><img src="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('produtos/imagens/'.$produtos['id'].'.'.$produtos['imagens'])){ ?><a href="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" target="_blank">produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['produtos']['video']['visualizar']){ ?>
<td><?php $codigo_youtube = codigo_youtube($produtos['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['custo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'custo', 'moeda', $produtos); $totais[] = 'custo'; $total['custo'] += $produtos['custo']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'preco', 'moeda', $produtos); $totais[] = 'preco'; $total['preco'] += $produtos['preco']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'preco_2', 'moeda', $produtos); $totais[] = 'preco_2'; $total['preco_2'] += $produtos['preco_2']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['oferta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'oferta', 'moeda', $produtos); $totais[] = 'oferta'; $total['oferta'] += $produtos['oferta']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $produtos); $totais[] = 'desconto'; $total['desconto'] += $produtos['desconto']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['marca']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'marca', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['modelo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'modelo', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['subtitulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['detalhe']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $produtos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $produtos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['link']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'link', 'url', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['material']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'material', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cor', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['peso']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'peso', 'numero-decimal-0.01', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['volumes']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'volumes', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['tamanho']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tamanho', 'texto', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['largura']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'largura', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['altura']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'altura', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['profundidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'profundidade', 'numero-decimal-0.01', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['views']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'views', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['liks']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'liks', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['pontos']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pontos', 'numero-inteiro', $produtos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $produtos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $produtos); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Produtos: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['produtos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=produtos&id=<?php echo $produtos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['duplicar']){ ?><a href="produtos-listar.php?duplicar=<?php echo $produtos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['editar']){ ?><a href="produtos-cadastrar.php?editar=<?php echo $produtos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['excluir']){ ?><a href="produtos-listar.php?excluir=<?php echo $produtos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($produtos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['produtos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=produtos&id=<?php echo $produtos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['duplicar']){ ?><a href="produtos-listar.php?duplicar=<?php echo $produtos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['editar']){ ?><a href="produtos-cadastrar.php?editar=<?php echo $produtos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['produtos']['excluir']){ ?><a href="produtos-listar.php?excluir=<?php echo $produtos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['produtos']['id_secoes']['visualizar'] && $produtos['secao']){ ?>
<?php if(!$_SESSION['id_secoes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`secoes`.`nome`', $exibiu); ?><strong>Seção</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'secoes', 'selecao', $produtos, 'secao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_categorias']['visualizar'] && $produtos['categoria']){ ?>
<?php if(!$_SESSION['id_categorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`categorias`.`nome`', $exibiu); ?><strong>Categoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'categorias', 'selecao', $produtos, 'categoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_subcategorias']['visualizar'] && $produtos['subcategoria']){ ?>
<?php if(!$_SESSION['id_subcategorias_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`subcategorias`.`nome`', $exibiu); ?><strong>Subcategoria</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'subcategorias', 'selecao', $produtos, 'subcategoria', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['nome']['visualizar'] && $produtos['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagem']['visualizar'] && $produtos['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $produtos['imagem'] ?></div>
<?php
if(is_file('produtos/imagem/'.$produtos['id'].'.'.$produtos['imagem'])){
if(strtolower($produtos['imagem']) == 'jpg' || strtolower($produtos['imagem']) == 'jpeg' || strtolower($produtos['imagem']) == 'gif' || strtolower($produtos['imagem']) == 'png' || strtolower($produtos['imagem']) == 'bmp'){
?>
<div class="linha"><a href="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" target="_blank"><img src="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?>" target="_blank">produtos/imagem/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['produtos']['id_status_produto']['visualizar'] && $produtos['status']){ ?>
<?php if(!$_SESSION['id_status_produto_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_produto`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_produto', 'selecao', $produtos, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['codigo']['visualizar'] && $produtos['codigo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`codigo`', $exibiu); ?><strong>Código</strong> <?php echo edicao_expressa($ttabela, 'codigo', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_expira']['visualizar'] && $produtos['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $produtos); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['produtos']['destaque']['visualizar'] && $produtos['destaque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`destaque`', $exibiu); ?><strong>Destaque</strong> <?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_etiquetas_produto']['visualizar'] && $produtos['etiqueta']){ ?>
<?php if(!$_SESSION['id_etiquetas_produto_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`etiquetas_produto`.`nome`', $exibiu); ?><strong>Etiqueta</strong> <?php echo edicao_expressa_label($ttabela, 'etiquetas_produto', 'selecao', $produtos, 'etiqueta', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['estoque']['visualizar'] && $produtos['estoque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`estoque`', $exibiu); ?><strong>Estoque</strong> <?php echo edicao_expressa($ttabela, 'estoque', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['id_parceiros']['visualizar'] && $produtos['fornecedor']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`nome`', $exibiu); ?><strong>Fornecedor</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $produtos, 'fornecedor', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['imagens']['visualizar'] && $produtos['imagens']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`imagens`', $exibiu); ?><strong>Imagens</strong> <?php echo $produtos['imagens'] ?></div>
<?php
if(is_file('produtos/imagens/'.$produtos['id'].'.'.$produtos['imagens'])){
if(strtolower($produtos['imagens']) == 'jpg' || strtolower($produtos['imagens']) == 'jpeg' || strtolower($produtos['imagens']) == 'gif' || strtolower($produtos['imagens']) == 'png' || strtolower($produtos['imagens']) == 'bmp'){
?>
<div class="linha"><a href="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" target="_blank"><img src="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?>" target="_blank">produtos/imagens/<?php echo $produtos['id'] ?>.<?php echo $produtos['imagens'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['produtos']['video']['visualizar'] && $produtos['video']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`video`', $exibiu); ?><strong>Vídeo</strong><br>
<?php $codigo_youtube = codigo_youtube($produtos['video']); ?>
<a href="https://www.youtube.com/watch?v=<?php echo $codigo_youtube ?>" target="_blank"><img src="https://i.ytimg.com/vi/<?php echo $codigo_youtube ?>/hqdefault.jpg?custom=true&w=168&h=94&stc=true&jpg444=true&jpgq=90&sp=68&sigh=<?php echo $codigo_youtube ?>" style="max-height:100px; max-width:100px;"/></a>
</div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['custo']['visualizar'] && $produtos['custo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`custo`', $exibiu); ?><strong>Custo</strong> <?php echo edicao_expressa($ttabela, 'custo', 'moeda', $produtos); $totais[] = 'custo'; $total['custo'] += $produtos['custo']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco']['visualizar'] && $produtos['preco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`preco`', $exibiu); ?><strong>Preço</strong> <?php echo edicao_expressa($ttabela, 'preco', 'moeda', $produtos); $totais[] = 'preco'; $total['preco'] += $produtos['preco']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['preco_2']['visualizar'] && $produtos['preco_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`preco_2`', $exibiu); ?><strong>Preço 2</strong> <?php echo edicao_expressa($ttabela, 'preco_2', 'moeda', $produtos); $totais[] = 'preco_2'; $total['preco_2'] += $produtos['preco_2']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['oferta']['visualizar'] && $produtos['oferta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`oferta`', $exibiu); ?><strong>Oferta</strong> <?php echo edicao_expressa($ttabela, 'oferta', 'moeda', $produtos); $totais[] = 'oferta'; $total['oferta'] += $produtos['oferta']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['desconto']['visualizar'] && $produtos['desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`desconto`', $exibiu); ?><strong>Desconto</strong> <?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $produtos); $totais[] = 'desconto'; $total['desconto'] += $produtos['desconto']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cupom_de_desconto']['visualizar'] && $produtos['cupom_de_desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`cupom_de_desconto`', $exibiu); ?><strong>Cupom de Desconto</strong> <?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['marca']['visualizar'] && $produtos['marca']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`marca`', $exibiu); ?><strong>Marca</strong> <?php echo edicao_expressa($ttabela, 'marca', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['modelo']['visualizar'] && $produtos['modelo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`modelo`', $exibiu); ?><strong>Modelo</strong> <?php echo edicao_expressa($ttabela, 'modelo', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['titulo']['visualizar'] && $produtos['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['subtitulo']['visualizar'] && $produtos['subtitulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`subtitulo`', $exibiu); ?><strong>Subtítulo</strong> <?php echo edicao_expressa($ttabela, 'subtitulo', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['detalhe']['visualizar'] && $produtos['detalhe']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`detalhe`', $exibiu); ?><strong>Detalhe</strong> <?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['descricao']['visualizar'] && $produtos['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['obs']['visualizar'] && $produtos['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['link']['visualizar'] && $produtos['link']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`link`', $exibiu); ?><strong>Link</strong> <?php echo edicao_expressa($ttabela, 'link', 'url', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['material']['visualizar'] && $produtos['material']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`material`', $exibiu); ?><strong>Material</strong> <?php echo edicao_expressa($ttabela, 'material', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['cor']['visualizar'] && $produtos['cor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`cor`', $exibiu); ?><strong>Cor</strong> <?php echo edicao_expressa($ttabela, 'cor', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['peso']['visualizar'] && $produtos['peso']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`peso`', $exibiu); ?><strong>Peso</strong> <?php echo edicao_expressa($ttabela, 'peso', 'numero-decimal-0.01', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['volumes']['visualizar'] && $produtos['volumes']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`volumes`', $exibiu); ?><strong>Volumes</strong> <?php echo edicao_expressa($ttabela, 'volumes', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['tamanho']['visualizar'] && $produtos['tamanho']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`tamanho`', $exibiu); ?><strong>Tamanho</strong> <?php echo edicao_expressa($ttabela, 'tamanho', 'texto', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['largura']['visualizar'] && $produtos['largura']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`largura`', $exibiu); ?><strong>Largura</strong> <?php echo edicao_expressa($ttabela, 'largura', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['altura']['visualizar'] && $produtos['altura']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`altura`', $exibiu); ?><strong>Altura</strong> <?php echo edicao_expressa($ttabela, 'altura', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['profundidade']['visualizar'] && $produtos['profundidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`profundidade`', $exibiu); ?><strong>Profundidade</strong> <?php echo edicao_expressa($ttabela, 'profundidade', 'numero-decimal-0.01', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['views']['visualizar'] && $produtos['views']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`views`', $exibiu); ?><strong>Views</strong> <?php echo edicao_expressa($ttabela, 'views', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['liks']['visualizar'] && $produtos['liks']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`liks`', $exibiu); ?><strong>Liks</strong> <?php echo edicao_expressa($ttabela, 'liks', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['pontos']['visualizar'] && $produtos['pontos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`pontos`', $exibiu); ?><strong>Pontos</strong> <?php echo edicao_expressa($ttabela, 'pontos', 'numero-inteiro', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['historico']['visualizar'] && $produtos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $produtos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['produtos']['data_cadastro']['visualizar'] && $produtos['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $produtos); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Produtos: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['produtos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=produtos-cadastrar.php"> 
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