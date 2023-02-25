<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Pedidos'; $ttabela = 'pedidos'; $aarquivo = 'pedidos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Pedidos" cadastrados(as)';
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
<h1>Pedidos</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['pedidos']['excluir']){
if(filhos($a, $base, 'pedidos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Pedidos', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `pedidos` WHERE'.sql_subordinacao($a, 'pedidos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Pedidos&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `pedidos` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$pedidos = mysqli_fetch_array($res);
if($pedidos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Pedidos&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['pedidos']['cadastrar']){
$sql = permissao_campos('INSERT INTO `pedidos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`pedido` = \''.ai($a, $_POST['pedido']).'\', 
`data` = \''.ai($a, $_POST['data']).'\', 
`id_status_pedido` = \''.ai($a, $_POST['id_status_pedido']).'\', 
`id_status_operacao` = \''.ai($a, $_POST['id_status_operacao']).'\', 
`id_produtos` = \''.ai($a, $_POST['id_produtos']).'\', 
`quantidade` = \''.ai($a, $_POST['quantidade']).'\', 
`preco` = \''.ai($a, moeda_mysql($_POST['preco'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`taxa_de_entrega` = \''.ai($a, moeda_mysql($_POST['taxa_de_entrega'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`valor_total` = \''.ai($a, moeda_mysql($_POST['valor_total'])).'\', 
`pagamento` = \''.ai($a, $_POST['pagamento']).'\', 
`txt_pedido` = \''.ai($a, $_POST['txt_pedido'], true).'\', 
`obs_pedido` = \''.ai($a, $_POST['obs_pedido']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\')');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Pedidos cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['pedidos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `pedidos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`pedido` = \''.ai($a, $_POST['pedido']).'\', 
`data` = \''.ai($a, $_POST['data']).'\', 
`id_status_pedido` = \''.ai($a, $_POST['id_status_pedido']).'\', 
`id_status_operacao` = \''.ai($a, $_POST['id_status_operacao']).'\', 
`id_produtos` = \''.ai($a, $_POST['id_produtos']).'\', 
`quantidade` = \''.ai($a, $_POST['quantidade']).'\', 
`preco` = \''.ai($a, moeda_mysql($_POST['preco'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`taxa_de_entrega` = \''.ai($a, moeda_mysql($_POST['taxa_de_entrega'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`valor_total` = \''.ai($a, moeda_mysql($_POST['valor_total'])).'\', 
`pagamento` = \''.ai($a, $_POST['pagamento']).'\', 
`txt_pedido` = \''.ai($a, $_POST['txt_pedido'], true).'\', 
`obs_pedido` = \''.ai($a, $_POST['obs_pedido']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\') 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Pedidos alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'pedidos';
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
<form id="form1" name="form1" method="get" action="pedidos-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'parceiros'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'clientes'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data';
include('inc.filtro-data-hora.php');
//
$filtrar = 'status_pedido'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'status_operacao'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'produtos'; $propriedade = 'nome';
include('inc.filtro.php');
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
$_SESSION['tabela'] = 'pedidos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `pedidos`.`id` DESC';
}
$sql = 'SELECT 
`pedidos`.`id`, 
`site`.`site` AS `site`, 
`parceiros`.`nome` AS `vendedor`, 
`clientes`.`nome` AS `cliente`, 
`pedidos`.`pedido`, 
`pedidos`.`data`, 
`status_pedido`.`nome` AS `status`, 
`status_pedido`.`label` AS `label_status`, 
`status_operacao`.`nome` AS `operacao`, 
`status_operacao`.`label` AS `label_operacao`, 
`produtos`.`nome` AS `produto`, 
`pedidos`.`quantidade`, 
`pedidos`.`preco`, 
`pedidos`.`desconto`, 
`pedidos`.`taxa_de_entrega`, 
`pedidos`.`cupom_de_desconto`, 
`pedidos`.`valor_total`, 
`pedidos`.`pagamento`, 
`pedidos`.`txt_pedido`, 
`pedidos`.`obs_pedido`, 
`pedidos`.`historico` 
FROM `pedidos` 
LEFT JOIN `site` ON `site`.`id` = `pedidos`.`id_site`
LEFT JOIN `parceiros` ON `parceiros`.`id` = `pedidos`.`id_parceiros`
LEFT JOIN `clientes` ON `clientes`.`id` = `pedidos`.`id_clientes`
LEFT JOIN `status_pedido` ON `status_pedido`.`id` = `pedidos`.`id_status_pedido`
LEFT JOIN `status_operacao` ON `status_operacao`.`id` = `pedidos`.`id_status_operacao`
LEFT JOIN `produtos` ON `produtos`.`id` = `pedidos`.`id_produtos` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Pedidos';
?>
<h2 style="margin:15px;">&quot;Pedidos&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'pedidos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($pedidos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $pedidos[primeiro_campo_nativo($a, 'pedidos')]).'\',
url: \'pedidos-cadastrar.php?editar='.$pedidos['id'].'\',
start: \''.$pedidos[primeiro_campo_data($a, 'pedidos')].'\',
end: \''.$pedidos[primeiro_campo_data($a, 'pedidos')].'\',
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
<?php if($_SESSION['permissao']['pedidos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php ordenar($url, '`parceiros`.`nome`'); ?><strong>Vendedor</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php ordenar($url, '`clientes`.`nome`'); ?><strong>Cliente</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pedido']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`pedido`'); ?><strong>Pedido</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['data']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`data`'); ?><strong>Data</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['id_status_pedido']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_pedido_usuarios']){ ?>
<td><?php ordenar($url, '`status_pedido`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_status_operacao']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_operacao_usuarios']){ ?>
<td><?php ordenar($url, '`status_operacao`.`nome`'); ?><strong>Operação</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_produtos']['visualizar']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<td><?php ordenar($url, '`produtos`.`nome`'); ?><strong>Produto</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['quantidade']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`quantidade`'); ?><strong>Quantidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['preco']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`preco`'); ?><strong>Preço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`desconto`'); ?><strong>Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['taxa_de_entrega']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`taxa_de_entrega`'); ?><strong>Taxa de Entrega</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`cupom_de_desconto`'); ?><strong>Cupom de Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['valor_total']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`valor_total`'); ?><strong>Valor Total</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pagamento']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`pagamento`'); ?><strong>Pagamento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['txt_pedido']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`txt_pedido`'); ?><strong>Txt Pedido</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['obs_pedido']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`obs_pedido`'); ?><strong>Obs Pedido</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`pedidos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($pedidos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['pedidos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $pedidos, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $pedidos, 'vendedor', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $pedidos, 'cliente', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pedido']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pedido', 'numero-inteiro', $pedidos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['data']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data', 'data-hora', $pedidos); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['id_status_pedido']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_pedido_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_pedido', 'selecao', $pedidos, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_status_operacao']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_operacao_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_operacao', 'selecao', $pedidos, 'operacao', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_produtos']['visualizar']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'produtos', 'selecao', $pedidos, 'produto', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['quantidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'quantidade', 'numero-inteiro', $pedidos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['preco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'preco', 'moeda', $pedidos); $totais[] = 'preco'; $total['preco'] += $pedidos['preco']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $pedidos); $totais[] = 'desconto'; $total['desconto'] += $pedidos['desconto']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['taxa_de_entrega']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'taxa_de_entrega', 'moeda', $pedidos); $totais[] = 'taxa_de_entrega'; $total['taxa_de_entrega'] += $pedidos['taxa_de_entrega']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $pedidos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['valor_total']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_total', 'moeda', $pedidos); $totais[] = 'valor_total'; $total['valor_total'] += $pedidos['valor_total']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pagamento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pagamento', 'texto', $pedidos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['txt_pedido']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'txt_pedido', 'html', $pedidos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['obs_pedido']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs_pedido', 'texto-grande', $pedidos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $pedidos, 'tabular'); ?></td>
<?php } ?>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Pedidos: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['pedidos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=pedidos&id=<?php echo $pedidos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['duplicar']){ ?><a href="pedidos-listar.php?duplicar=<?php echo $pedidos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['editar']){ ?><a href="pedidos-cadastrar.php?editar=<?php echo $pedidos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['excluir']){ ?><a href="pedidos-listar.php?excluir=<?php echo $pedidos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($pedidos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['pedidos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=pedidos&id=<?php echo $pedidos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['duplicar']){ ?><a href="pedidos-listar.php?duplicar=<?php echo $pedidos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['editar']){ ?><a href="pedidos-cadastrar.php?editar=<?php echo $pedidos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['excluir']){ ?><a href="pedidos-listar.php?excluir=<?php echo $pedidos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['pedidos']['id_site']['visualizar'] && $pedidos['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $pedidos, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_parceiros']['visualizar'] && $pedidos['vendedor']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`nome`', $exibiu); ?><strong>Vendedor</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $pedidos, 'vendedor', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_clientes']['visualizar'] && $pedidos['cliente']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`nome`', $exibiu); ?><strong>Cliente</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $pedidos, 'cliente', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pedido']['visualizar'] && $pedidos['pedido']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`pedido`', $exibiu); ?><strong>Pedido</strong> <?php echo edicao_expressa($ttabela, 'pedido', 'numero-inteiro', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['data']['visualizar'] && $pedidos['data'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`data`', $exibiu); ?><strong>Data</strong> <?php echo edicao_expressa($ttabela, 'data', 'data-hora', $pedidos); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['pedidos']['id_status_pedido']['visualizar'] && $pedidos['status']){ ?>
<?php if(!$_SESSION['id_status_pedido_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_pedido`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_pedido', 'selecao', $pedidos, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_status_operacao']['visualizar'] && $pedidos['operacao']){ ?>
<?php if(!$_SESSION['id_status_operacao_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_operacao`.`nome`', $exibiu); ?><strong>Operação</strong> <?php echo edicao_expressa_label($ttabela, 'status_operacao', 'selecao', $pedidos, 'operacao', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['id_produtos']['visualizar'] && $pedidos['produto']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`nome`', $exibiu); ?><strong>Produto</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'produtos', 'selecao', $pedidos, 'produto', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['quantidade']['visualizar'] && $pedidos['quantidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`quantidade`', $exibiu); ?><strong>Quantidade</strong> <?php echo edicao_expressa($ttabela, 'quantidade', 'numero-inteiro', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['preco']['visualizar'] && $pedidos['preco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`preco`', $exibiu); ?><strong>Preço</strong> <?php echo edicao_expressa($ttabela, 'preco', 'moeda', $pedidos); $totais[] = 'preco'; $total['preco'] += $pedidos['preco']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['desconto']['visualizar'] && $pedidos['desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`desconto`', $exibiu); ?><strong>Desconto</strong> <?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $pedidos); $totais[] = 'desconto'; $total['desconto'] += $pedidos['desconto']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['taxa_de_entrega']['visualizar'] && $pedidos['taxa_de_entrega']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`taxa_de_entrega`', $exibiu); ?><strong>Taxa de Entrega</strong> <?php echo edicao_expressa($ttabela, 'taxa_de_entrega', 'moeda', $pedidos); $totais[] = 'taxa_de_entrega'; $total['taxa_de_entrega'] += $pedidos['taxa_de_entrega']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['cupom_de_desconto']['visualizar'] && $pedidos['cupom_de_desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`cupom_de_desconto`', $exibiu); ?><strong>Cupom de Desconto</strong> <?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['valor_total']['visualizar'] && $pedidos['valor_total']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`valor_total`', $exibiu); ?><strong>Valor Total</strong> <?php echo edicao_expressa($ttabela, 'valor_total', 'moeda', $pedidos); $totais[] = 'valor_total'; $total['valor_total'] += $pedidos['valor_total']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['pagamento']['visualizar'] && $pedidos['pagamento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`pagamento`', $exibiu); ?><strong>Pagamento</strong> <?php echo edicao_expressa($ttabela, 'pagamento', 'texto', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['txt_pedido']['visualizar'] && $pedidos['txt_pedido']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`txt_pedido`', $exibiu); ?><strong>Txt Pedido</strong> <?php echo edicao_expressa($ttabela, 'txt_pedido', 'html', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['obs_pedido']['visualizar'] && $pedidos['obs_pedido']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`obs_pedido`', $exibiu); ?><strong>Obs Pedido</strong> <?php echo edicao_expressa($ttabela, 'obs_pedido', 'texto-grande', $pedidos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['pedidos']['historico']['visualizar'] && $pedidos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $pedidos); ?></div>
<?php } ?>

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Pedidos: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['pedidos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=pedidos-cadastrar.php"> 
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