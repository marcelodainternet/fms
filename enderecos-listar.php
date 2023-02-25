<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Endereços'; $ttabela = 'enderecos'; $aarquivo = 'enderecos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Endereços" cadastrados(as)';
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
<h1>Endereços</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['enderecos']['excluir']){
if(filhos($a, $base, 'enderecos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Endereços', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `enderecos` WHERE'.sql_subordinacao($a, 'enderecos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Endereços&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `enderecos` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$enderecos = mysqli_fetch_array($res);
if($enderecos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Endereços&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['enderecos']['cadastrar']){
$sql = permissao_campos('INSERT INTO `enderecos` SET 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`cpf` = \''.ai($a, $_POST['cpf']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Endereços cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['enderecos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `enderecos` SET 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`cpf` = \''.ai($a, $_POST['cpf']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Endereços alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'enderecos';
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
<form id="form1" name="form1" method="get" action="enderecos-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'clientes'; $propriedade = 'nome';
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
$_SESSION['tabela'] = 'enderecos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `enderecos`.`id` DESC';
}
$sql = 'SELECT 
`enderecos`.`id`, 
`clientes`.`nome` AS `cliente`, 
`enderecos`.`nome`, 
`enderecos`.`cpf`, 
`enderecos`.`telefone`, 
`enderecos`.`cep`, 
`enderecos`.`endereco`, 
`enderecos`.`numero`, 
`enderecos`.`complemento`, 
`enderecos`.`bairro`, 
`enderecos`.`cidade`, 
`enderecos`.`estado`, 
`enderecos`.`obs`, 
`enderecos`.`historico`, 
`enderecos`.`data_cadastro` 
FROM `enderecos` 
LEFT JOIN `clientes` ON `clientes`.`id` = `enderecos`.`id_clientes` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Endereços';
?>
<h2 style="margin:15px;">&quot;Endereços&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'enderecos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($enderecos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $enderecos[primeiro_campo_nativo($a, 'enderecos')]).'\',
url: \'enderecos-cadastrar.php?editar='.$enderecos['id'].'\',
start: \''.$enderecos[primeiro_campo_data($a, 'enderecos')].'\',
end: \''.$enderecos[primeiro_campo_data($a, 'enderecos')].'\',
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
<?php if($_SESSION['permissao']['enderecos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php ordenar($url, '`clientes`.`nome`'); ?><strong>Cliente</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cpf']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`cpf`'); ?><strong>CPF</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`enderecos`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($enderecos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['enderecos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $enderecos, 'cliente', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cpf']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cpf', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $enderecos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $enderecos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $enderecos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $enderecos); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Endereços: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['enderecos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=enderecos&id=<?php echo $enderecos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['duplicar']){ ?><a href="enderecos-listar.php?duplicar=<?php echo $enderecos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['editar']){ ?><a href="enderecos-cadastrar.php?editar=<?php echo $enderecos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['excluir']){ ?><a href="enderecos-listar.php?excluir=<?php echo $enderecos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($enderecos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['enderecos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=enderecos&id=<?php echo $enderecos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['duplicar']){ ?><a href="enderecos-listar.php?duplicar=<?php echo $enderecos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['editar']){ ?><a href="enderecos-cadastrar.php?editar=<?php echo $enderecos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['enderecos']['excluir']){ ?><a href="enderecos-listar.php?excluir=<?php echo $enderecos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['enderecos']['id_clientes']['visualizar'] && $enderecos['cliente']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`nome`', $exibiu); ?><strong>Cliente</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $enderecos, 'cliente', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['nome']['visualizar'] && $enderecos['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cpf']['visualizar'] && $enderecos['cpf']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`cpf`', $exibiu); ?><strong>CPF</strong> <?php echo edicao_expressa($ttabela, 'cpf', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['telefone']['visualizar'] && $enderecos['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cep']['visualizar'] && $enderecos['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['endereco']['visualizar'] && $enderecos['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $enderecos); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['numero']['visualizar'] && $enderecos['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['complemento']['visualizar'] && $enderecos['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['bairro']['visualizar'] && $enderecos['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['cidade']['visualizar'] && $enderecos['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['estado']['visualizar'] && $enderecos['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['obs']['visualizar'] && $enderecos['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['historico']['visualizar'] && $enderecos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $enderecos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['enderecos']['data_cadastro']['visualizar'] && $enderecos['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`enderecos`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $enderecos); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Endereços: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['enderecos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=enderecos-cadastrar.php"> 
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