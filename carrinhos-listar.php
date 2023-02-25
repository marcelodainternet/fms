<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Carrinhos'; $ttabela = 'carrinhos'; $aarquivo = 'carrinhos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Carrinhos" cadastrados(as)';
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
<h1>Carrinhos</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['carrinhos']['excluir']){
if(filhos($a, $base, 'carrinhos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Carrinhos', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `carrinhos` WHERE'.sql_subordinacao($a, 'carrinhos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Carrinhos&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `carrinhos` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$carrinhos = mysqli_fetch_array($res);
if($carrinhos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Carrinhos&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['carrinhos']['cadastrar']){
$sql = permissao_campos('INSERT INTO `carrinhos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`carrinho` = \''.ai($a, $_POST['carrinho']).'\', 
`operacao` = \''.ai($a, $_POST['operacao']).'\', 
`id_produtos` = \''.ai($a, $_POST['id_produtos']).'\', 
`quantidade` = \''.ai($a, $_POST['quantidade']).'\', 
`obs_do_pedido` = \''.ai($a, $_POST['obs_do_pedido']).'\', 
`taxa_de_entrega` = \''.ai($a, moeda_mysql($_POST['taxa_de_entrega'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Carrinhos cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['carrinhos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `carrinhos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`carrinho` = \''.ai($a, $_POST['carrinho']).'\', 
`operacao` = \''.ai($a, $_POST['operacao']).'\', 
`id_produtos` = \''.ai($a, $_POST['id_produtos']).'\', 
`quantidade` = \''.ai($a, $_POST['quantidade']).'\', 
`obs_do_pedido` = \''.ai($a, $_POST['obs_do_pedido']).'\', 
`taxa_de_entrega` = \''.ai($a, moeda_mysql($_POST['taxa_de_entrega'])).'\', 
`desconto` = \''.ai($a, moeda_mysql($_POST['desconto'])).'\', 
`cupom_de_desconto` = \''.ai($a, $_POST['cupom_de_desconto']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Carrinhos alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'carrinhos';
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
<form id="form1" name="form1" method="get" action="carrinhos-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'produtos'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'carrinhos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `carrinhos`.`id` DESC';
}
$sql = 'SELECT 
`carrinhos`.`id`, 
`site`.`site` AS `site`, 
`carrinhos`.`carrinho`, 
`carrinhos`.`operacao`, 
`produtos`.`nome` AS `produto`, 
`carrinhos`.`quantidade`, 
`carrinhos`.`obs_do_pedido`, 
`carrinhos`.`taxa_de_entrega`, 
`carrinhos`.`desconto`, 
`carrinhos`.`cupom_de_desconto`, 
`carrinhos`.`historico`, 
`carrinhos`.`data_cadastro` 
FROM `carrinhos` 
LEFT JOIN `site` ON `site`.`id` = `carrinhos`.`id_site`
LEFT JOIN `produtos` ON `produtos`.`id` = `carrinhos`.`id_produtos` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Carrinhos';
?>
<h2 style="margin:15px;">&quot;Carrinhos&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'carrinhos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($carrinhos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $carrinhos[primeiro_campo_nativo($a, 'carrinhos')]).'\',
url: \'carrinhos-cadastrar.php?editar='.$carrinhos['id'].'\',
start: \''.$carrinhos[primeiro_campo_data($a, 'carrinhos')].'\',
end: \''.$carrinhos[primeiro_campo_data($a, 'carrinhos')].'\',
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
<?php if($_SESSION['permissao']['carrinhos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['carrinho']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`carrinho`'); ?><strong>Carrinho</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['operacao']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`operacao`'); ?><strong>Operação</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['id_produtos']['visualizar']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<td><?php ordenar($url, '`produtos`.`nome`'); ?><strong>Produto</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['quantidade']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`quantidade`'); ?><strong>Quantidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['obs_do_pedido']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`obs_do_pedido`'); ?><strong>Obs do Pedido</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['taxa_de_entrega']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`taxa_de_entrega`'); ?><strong>Taxa de Entrega</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`desconto`'); ?><strong>Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`cupom_de_desconto`'); ?><strong>Cupom de Desconto</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`carrinhos`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($carrinhos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['carrinhos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $carrinhos, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['carrinho']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'carrinho', 'texto', $carrinhos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['operacao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'operacao', 'texto', $carrinhos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['id_produtos']['visualizar']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'produtos', 'selecao', $carrinhos, 'produto', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['quantidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'quantidade', 'numero-inteiro', $carrinhos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['obs_do_pedido']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs_do_pedido', 'texto-grande', $carrinhos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['taxa_de_entrega']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'taxa_de_entrega', 'moeda', $carrinhos); $totais[] = 'taxa_de_entrega'; $total['taxa_de_entrega'] += $carrinhos['taxa_de_entrega']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $carrinhos); $totais[] = 'desconto'; $total['desconto'] += $carrinhos['desconto']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['cupom_de_desconto']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $carrinhos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $carrinhos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $carrinhos); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Carrinhos: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['carrinhos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=carrinhos&id=<?php echo $carrinhos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['duplicar']){ ?><a href="carrinhos-listar.php?duplicar=<?php echo $carrinhos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['editar']){ ?><a href="carrinhos-cadastrar.php?editar=<?php echo $carrinhos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['excluir']){ ?><a href="carrinhos-listar.php?excluir=<?php echo $carrinhos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($carrinhos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['carrinhos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=carrinhos&id=<?php echo $carrinhos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['duplicar']){ ?><a href="carrinhos-listar.php?duplicar=<?php echo $carrinhos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['editar']){ ?><a href="carrinhos-cadastrar.php?editar=<?php echo $carrinhos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['carrinhos']['excluir']){ ?><a href="carrinhos-listar.php?excluir=<?php echo $carrinhos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['carrinhos']['id_site']['visualizar'] && $carrinhos['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $carrinhos, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['carrinho']['visualizar'] && $carrinhos['carrinho']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`carrinho`', $exibiu); ?><strong>Carrinho</strong> <?php echo edicao_expressa($ttabela, 'carrinho', 'texto', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['operacao']['visualizar'] && $carrinhos['operacao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`operacao`', $exibiu); ?><strong>Operação</strong> <?php echo edicao_expressa($ttabela, 'operacao', 'texto', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['id_produtos']['visualizar'] && $carrinhos['produto']){ ?>
<?php if(!$_SESSION['id_produtos_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`produtos`.`nome`', $exibiu); ?><strong>Produto</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'produtos', 'selecao', $carrinhos, 'produto', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['quantidade']['visualizar'] && $carrinhos['quantidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`quantidade`', $exibiu); ?><strong>Quantidade</strong> <?php echo edicao_expressa($ttabela, 'quantidade', 'numero-inteiro', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['obs_do_pedido']['visualizar'] && $carrinhos['obs_do_pedido']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`obs_do_pedido`', $exibiu); ?><strong>Obs do Pedido</strong> <?php echo edicao_expressa($ttabela, 'obs_do_pedido', 'texto-grande', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['taxa_de_entrega']['visualizar'] && $carrinhos['taxa_de_entrega']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`taxa_de_entrega`', $exibiu); ?><strong>Taxa de Entrega</strong> <?php echo edicao_expressa($ttabela, 'taxa_de_entrega', 'moeda', $carrinhos); $totais[] = 'taxa_de_entrega'; $total['taxa_de_entrega'] += $carrinhos['taxa_de_entrega']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['desconto']['visualizar'] && $carrinhos['desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`desconto`', $exibiu); ?><strong>Desconto</strong> <?php echo edicao_expressa($ttabela, 'desconto', 'moeda', $carrinhos); $totais[] = 'desconto'; $total['desconto'] += $carrinhos['desconto']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['cupom_de_desconto']['visualizar'] && $carrinhos['cupom_de_desconto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`cupom_de_desconto`', $exibiu); ?><strong>Cupom de Desconto</strong> <?php echo edicao_expressa($ttabela, 'cupom_de_desconto', 'texto', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['historico']['visualizar'] && $carrinhos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $carrinhos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['carrinhos']['data_cadastro']['visualizar'] && $carrinhos['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`carrinhos`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $carrinhos); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Carrinhos: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['carrinhos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=carrinhos-cadastrar.php"> 
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