<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Lançamentos'; $ttabela = 'lancamentos'; $aarquivo = 'lancamentos';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Lançamentos" cadastrados(as)';
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
<h1>Lançamentos</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['lancamentos']['excluir']){
if(filhos($a, $base, 'lancamentos', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Lançamentos', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `lancamentos` WHERE'.sql_subordinacao($a, 'lancamentos').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Lançamentos&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `lancamentos` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$lancamentos = mysqli_fetch_array($res);
if($lancamentos['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Lançamentos&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['documentos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['lancamentos']['cadastrar']){
for($x=0;$x<count($_FILES['documentos']['tmp_name']);$x++){
$sql = 'INSERT INTO `lancamentos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_tipos_lancamento` = \''.ai($a, $_POST['id_tipos_lancamento']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_lancamento` = \''.ai($a, $_POST['id_status_lancamento']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`id_pedidos` = \''.ai($a, $_POST['id_pedidos']).'\', 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`terceiro` = \''.ai($a, $_POST['terceiro']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`pagamento` = \''.ai($a, $_POST['pagamento']).'\', 
`parcelas` = \''.ai($a, $_POST['parcelas']).'\', 
`valor` = \''.ai($a, moeda_mysql($_POST['valor'])).'\', 
`valor_total` = \''.ai($a, moeda_mysql($_POST['valor_total'])).'\', 
`valor_recorrente` = \''.ai($a, moeda_mysql($_POST['valor_recorrente'])).'\', 
`proximo_pagamento` = \''.ai($a, $_POST['proximo_pagamento']).'\', 
`ultimo_pagamento` = \''.ai($a, $_POST['ultimo_pagamento']).'\', 
`observacoes` = \''.ai($a, $_POST['observacoes']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'lancamentos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Lançamentos cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['lancamentos']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `lancamentos` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`id_tipos_lancamento` = \''.ai($a, $_POST['id_tipos_lancamento']).'\', 
`imagem` = \''.ai($a, extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_imagem'])).'\', 
`id_status_lancamento` = \''.ai($a, $_POST['id_status_lancamento']).'\', 
`destaque` = \''.ai($a, $_POST['destaque']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`id_pedidos` = \''.ai($a, $_POST['id_pedidos']).'\', 
`id_clientes` = \''.ai($a, $_POST['id_clientes']).'\', 
`id_parceiros` = \''.ai($a, $_POST['id_parceiros']).'\', 
`terceiro` = \''.ai($a, $_POST['terceiro']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`titulo` = \''.ai($a, $_POST['titulo']).'\', 
`detalhe` = \''.ai($a, $_POST['detalhe']).'\', 
`descricao` = \''.ai($a, $_POST['descricao'], true).'\', 
`pagamento` = \''.ai($a, $_POST['pagamento']).'\', 
`parcelas` = \''.ai($a, $_POST['parcelas']).'\', 
`valor` = \''.ai($a, moeda_mysql($_POST['valor'])).'\', 
`valor_total` = \''.ai($a, moeda_mysql($_POST['valor_total'])).'\', 
`valor_recorrente` = \''.ai($a, moeda_mysql($_POST['valor_recorrente'])).'\', 
`proximo_pagamento` = \''.ai($a, $_POST['proximo_pagamento']).'\', 
`ultimo_pagamento` = \''.ai($a, $_POST['ultimo_pagamento']).'\', 
`observacoes` = \''.ai($a, $_POST['observacoes']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['imagem']['tmp_name'], 'lancamentos/imagem/'.$id.'.'.extensao_arquivo($_FILES['imagem']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Lançamentos alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'lancamentos';
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
<form id="form1" name="form1" method="get" action="lancamentos-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'tipos_lancamento'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'status_lancamento'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'destaque';
include('inc.filtro-sn.php');
//
$filtrar = 'pedidos'; $propriedade = 'pedido';
include('inc.filtro.php');
//
$filtrar = 'clientes'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'parceiros'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Próximo Pagamento';
include('inc.filtro-data.php');
//
$filtrar = 'Ultimo Pagamento';
include('inc.filtro-data.php');
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
$_SESSION['tabela'] = 'lancamentos';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `lancamentos`.`id` DESC';
}
$sql = 'SELECT 
`lancamentos`.`id`, 
`site`.`site` AS `site`, 
`tipos_lancamento`.`nome` AS `tipo`, 
`lancamentos`.`imagem`, 
`status_lancamento`.`nome` AS `status`, 
`status_lancamento`.`label` AS `label_status`, 
`lancamentos`.`destaque`, 
`lancamentos`.`documentos`, 
`pedidos`.`pedido` AS `pedido`, 
`clientes`.`nome` AS `cliente`, 
`parceiros`.`nome` AS `parceiro`, 
`lancamentos`.`terceiro`, 
`lancamentos`.`telefone`, 
`lancamentos`.`e_mail`, 
`lancamentos`.`titulo`, 
`lancamentos`.`detalhe`, 
`lancamentos`.`descricao`, 
`lancamentos`.`pagamento`, 
`lancamentos`.`parcelas`, 
`lancamentos`.`valor`, 
`lancamentos`.`valor_total`, 
`lancamentos`.`valor_recorrente`, 
`lancamentos`.`proximo_pagamento`, 
`lancamentos`.`ultimo_pagamento`, 
`lancamentos`.`observacoes`, 
`lancamentos`.`historico`, 
`lancamentos`.`data_cadastro` 
FROM `lancamentos` 
LEFT JOIN `site` ON `site`.`id` = `lancamentos`.`id_site`
LEFT JOIN `tipos_lancamento` ON `tipos_lancamento`.`id` = `lancamentos`.`id_tipos_lancamento`
LEFT JOIN `status_lancamento` ON `status_lancamento`.`id` = `lancamentos`.`id_status_lancamento`
LEFT JOIN `pedidos` ON `pedidos`.`id` = `lancamentos`.`id_pedidos`
LEFT JOIN `clientes` ON `clientes`.`id` = `lancamentos`.`id_clientes`
LEFT JOIN `parceiros` ON `parceiros`.`id` = `lancamentos`.`id_parceiros` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Lançamentos';
?>
<h2 style="margin:15px;">&quot;Lançamentos&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'lancamentos-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($lancamentos = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $lancamentos[primeiro_campo_nativo($a, 'lancamentos')]).'\',
url: \'lancamentos-cadastrar.php?editar='.$lancamentos['id'].'\',
start: \''.$lancamentos[primeiro_campo_data($a, 'lancamentos')].'\',
end: \''.$lancamentos[primeiro_campo_data($a, 'lancamentos')].'\',
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
<?php if($_SESSION['permissao']['lancamentos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_tipos_lancamento']['visualizar']){ ?>
<?php if(!$_SESSION['id_tipos_lancamento_usuarios']){ ?>
<td><?php ordenar($url, '`tipos_lancamento`.`nome`'); ?><strong>Tipo</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['imagem']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`imagem`'); ?><strong>Imagem</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_status_lancamento']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_lancamento_usuarios']){ ?>
<td><?php ordenar($url, '`status_lancamento`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['destaque']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`destaque`'); ?><strong>Destaque</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['documentos']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`documentos`'); ?><strong>Documentos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_pedidos']['visualizar']){ ?>
<?php if(!$_SESSION['id_pedidos_usuarios']){ ?>
<td><?php ordenar($url, '`pedidos`.`pedido`'); ?><strong>Pedido</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php ordenar($url, '`clientes`.`nome`'); ?><strong>Cliente</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php ordenar($url, '`parceiros`.`nome`'); ?><strong>Parceiro</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['terceiro']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`terceiro`'); ?><strong>Terceiro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['titulo']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`titulo`'); ?><strong>Título</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['detalhe']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`detalhe`'); ?><strong>Detalhe</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['descricao']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`descricao`'); ?><strong>Descrição</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['pagamento']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`pagamento`'); ?><strong>Pagamento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['parcelas']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`parcelas`'); ?><strong>Parcelas</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`valor`'); ?><strong>Valor</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_total']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`valor_total`'); ?><strong>Valor Total</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_recorrente']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`valor_recorrente`'); ?><strong>Valor Recorrente</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['proximo_pagamento']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`proximo_pagamento`'); ?><strong>Próximo Pagamento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['ultimo_pagamento']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`ultimo_pagamento`'); ?><strong>Ultimo Pagamento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['observacoes']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`observacoes`'); ?><strong>Observações</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`lancamentos`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($lancamentos = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['lancamentos']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $lancamentos, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_tipos_lancamento']['visualizar']){ ?>
<?php if(!$_SESSION['id_tipos_lancamento_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'tipos_lancamento', 'selecao', $lancamentos, 'tipo', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['imagem']['visualizar']){ ?>
<td><?php echo $lancamentos['imagem'] ?></td>
<?php
if(strtolower($lancamentos['imagem']) == 'jpg' || strtolower($lancamentos['imagem']) == 'jpeg' || strtolower($lancamentos['imagem']) == 'gif' || strtolower($lancamentos['imagem']) == 'png' || strtolower($lancamentos['imagem']) == 'bmp'){
?>
<td><?php if(is_file('lancamentos/imagem/'.$lancamentos['id'].'.'.$lancamentos['imagem'])){ ?><a href="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" target="_blank"><img src="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('lancamentos/imagem/'.$lancamentos['id'].'.'.$lancamentos['imagem'])){ ?><a href="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" target="_blank">lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_status_lancamento']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_lancamento_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_lancamento', 'selecao', $lancamentos, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['destaque']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['documentos']['visualizar']){ ?>
<td><?php echo $lancamentos['documentos'] ?></td>
<?php
if(strtolower($lancamentos['documentos']) == 'jpg' || strtolower($lancamentos['documentos']) == 'jpeg' || strtolower($lancamentos['documentos']) == 'gif' || strtolower($lancamentos['documentos']) == 'png' || strtolower($lancamentos['documentos']) == 'bmp'){
?>
<td><?php if(is_file('lancamentos/documentos/'.$lancamentos['id'].'.'.$lancamentos['documentos'])){ ?><a href="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" target="_blank"><img src="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('lancamentos/documentos/'.$lancamentos['id'].'.'.$lancamentos['documentos'])){ ?><a href="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" target="_blank">lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_pedidos']['visualizar']){ ?>
<?php if(!$_SESSION['id_pedidos_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'pedidos', 'selecao', $lancamentos, 'pedido', 'pedido'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_clientes']['visualizar']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $lancamentos, 'cliente', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_parceiros']['visualizar']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $lancamentos, 'parceiro', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['terceiro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'terceiro', 'texto-grande', $lancamentos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['titulo']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'titulo', 'texto', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['detalhe']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['descricao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'descricao', 'html', $lancamentos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['pagamento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pagamento', 'texto', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['parcelas']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'parcelas', 'numero-inteiro', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor', 'moeda', $lancamentos); $totais[] = 'valor'; $total['valor'] += $lancamentos['valor']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_total']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_total', 'moeda', $lancamentos); $totais[] = 'valor_total'; $total['valor_total'] += $lancamentos['valor_total']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_recorrente']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'valor_recorrente', 'moeda', $lancamentos); $totais[] = 'valor_recorrente'; $total['valor_recorrente'] += $lancamentos['valor_recorrente']; ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['proximo_pagamento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'proximo_pagamento', 'data', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['ultimo_pagamento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'ultimo_pagamento', 'data', $lancamentos); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['observacoes']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'observacoes', 'texto-grande', $lancamentos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $lancamentos, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $lancamentos); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Lançamentos: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['lancamentos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=lancamentos&id=<?php echo $lancamentos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['duplicar']){ ?><a href="lancamentos-listar.php?duplicar=<?php echo $lancamentos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['editar']){ ?><a href="lancamentos-cadastrar.php?editar=<?php echo $lancamentos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['excluir']){ ?><a href="lancamentos-listar.php?excluir=<?php echo $lancamentos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($lancamentos = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['lancamentos']['imprimir']){ ?><a href="imprimir-registro.php?tabela=lancamentos&id=<?php echo $lancamentos['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['duplicar']){ ?><a href="lancamentos-listar.php?duplicar=<?php echo $lancamentos['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['editar']){ ?><a href="lancamentos-cadastrar.php?editar=<?php echo $lancamentos['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['lancamentos']['excluir']){ ?><a href="lancamentos-listar.php?excluir=<?php echo $lancamentos['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['lancamentos']['id_site']['visualizar'] && $lancamentos['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $lancamentos, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_tipos_lancamento']['visualizar'] && $lancamentos['tipo']){ ?>
<?php if(!$_SESSION['id_tipos_lancamento_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`tipos_lancamento`.`nome`', $exibiu); ?><strong>Tipo</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'tipos_lancamento', 'selecao', $lancamentos, 'tipo', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['imagem']['visualizar'] && $lancamentos['imagem']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`imagem`', $exibiu); ?><strong>Imagem</strong> <?php echo $lancamentos['imagem'] ?></div>
<?php
if(is_file('lancamentos/imagem/'.$lancamentos['id'].'.'.$lancamentos['imagem'])){
if(strtolower($lancamentos['imagem']) == 'jpg' || strtolower($lancamentos['imagem']) == 'jpeg' || strtolower($lancamentos['imagem']) == 'gif' || strtolower($lancamentos['imagem']) == 'png' || strtolower($lancamentos['imagem']) == 'bmp'){
?>
<div class="linha"><a href="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" target="_blank"><img src="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?>" target="_blank">lancamentos/imagem/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['imagem'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_status_lancamento']['visualizar'] && $lancamentos['status']){ ?>
<?php if(!$_SESSION['id_status_lancamento_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_lancamento`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_lancamento', 'selecao', $lancamentos, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['destaque']['visualizar'] && $lancamentos['destaque']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`destaque`', $exibiu); ?><strong>Destaque</strong> <?php echo edicao_expressa($ttabela, 'destaque', 'sim-nao', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['documentos']['visualizar'] && $lancamentos['documentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`documentos`', $exibiu); ?><strong>Documentos</strong> <?php echo $lancamentos['documentos'] ?></div>
<?php
if(is_file('lancamentos/documentos/'.$lancamentos['id'].'.'.$lancamentos['documentos'])){
if(strtolower($lancamentos['documentos']) == 'jpg' || strtolower($lancamentos['documentos']) == 'jpeg' || strtolower($lancamentos['documentos']) == 'gif' || strtolower($lancamentos['documentos']) == 'png' || strtolower($lancamentos['documentos']) == 'bmp'){
?>
<div class="linha"><a href="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" target="_blank"><img src="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?>" target="_blank">lancamentos/documentos/<?php echo $lancamentos['id'] ?>.<?php echo $lancamentos['documentos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['lancamentos']['id_pedidos']['visualizar'] && $lancamentos['pedido']){ ?>
<?php if(!$_SESSION['id_pedidos_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pedidos`.`pedido`', $exibiu); ?><strong>Pedido</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'pedidos', 'selecao', $lancamentos, 'pedido', 'pedido'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_clientes']['visualizar'] && $lancamentos['cliente']){ ?>
<?php if(!$_SESSION['id_clientes_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`nome`', $exibiu); ?><strong>Cliente</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'clientes', 'selecao', $lancamentos, 'cliente', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['id_parceiros']['visualizar'] && $lancamentos['parceiro']){ ?>
<?php if(!$_SESSION['id_parceiros_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`nome`', $exibiu); ?><strong>Parceiro</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'parceiros', 'selecao', $lancamentos, 'parceiro', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['terceiro']['visualizar'] && $lancamentos['terceiro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`terceiro`', $exibiu); ?><strong>Terceiro</strong> <?php echo edicao_expressa($ttabela, 'terceiro', 'texto-grande', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['telefone']['visualizar'] && $lancamentos['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['e_mail']['visualizar'] && $lancamentos['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['titulo']['visualizar'] && $lancamentos['titulo']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`titulo`', $exibiu); ?><strong>Título</strong> <?php echo edicao_expressa($ttabela, 'titulo', 'texto', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['detalhe']['visualizar'] && $lancamentos['detalhe']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`detalhe`', $exibiu); ?><strong>Detalhe</strong> <?php echo edicao_expressa($ttabela, 'detalhe', 'texto', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['descricao']['visualizar'] && $lancamentos['descricao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`descricao`', $exibiu); ?><strong>Descrição</strong> <?php echo edicao_expressa($ttabela, 'descricao', 'html', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['pagamento']['visualizar'] && $lancamentos['pagamento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`pagamento`', $exibiu); ?><strong>Pagamento</strong> <?php echo edicao_expressa($ttabela, 'pagamento', 'texto', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['parcelas']['visualizar'] && $lancamentos['parcelas']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`parcelas`', $exibiu); ?><strong>Parcelas</strong> <?php echo edicao_expressa($ttabela, 'parcelas', 'numero-inteiro', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor']['visualizar'] && $lancamentos['valor']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`valor`', $exibiu); ?><strong>Valor</strong> <?php echo edicao_expressa($ttabela, 'valor', 'moeda', $lancamentos); $totais[] = 'valor'; $total['valor'] += $lancamentos['valor']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_total']['visualizar'] && $lancamentos['valor_total']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`valor_total`', $exibiu); ?><strong>Valor Total</strong> <?php echo edicao_expressa($ttabela, 'valor_total', 'moeda', $lancamentos); $totais[] = 'valor_total'; $total['valor_total'] += $lancamentos['valor_total']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['valor_recorrente']['visualizar'] && $lancamentos['valor_recorrente']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`valor_recorrente`', $exibiu); ?><strong>Valor Recorrente</strong> <?php echo edicao_expressa($ttabela, 'valor_recorrente', 'moeda', $lancamentos); $totais[] = 'valor_recorrente'; $total['valor_recorrente'] += $lancamentos['valor_recorrente']; ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['proximo_pagamento']['visualizar'] && $lancamentos['proximo_pagamento'] != '0000-00-00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`proximo_pagamento`', $exibiu); ?><strong>Próximo Pagamento</strong> <?php echo edicao_expressa($ttabela, 'proximo_pagamento', 'data', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['ultimo_pagamento']['visualizar'] && $lancamentos['ultimo_pagamento'] != '0000-00-00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`ultimo_pagamento`', $exibiu); ?><strong>Ultimo Pagamento</strong> <?php echo edicao_expressa($ttabela, 'ultimo_pagamento', 'data', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['observacoes']['visualizar'] && $lancamentos['observacoes']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`observacoes`', $exibiu); ?><strong>Observações</strong> <?php echo edicao_expressa($ttabela, 'observacoes', 'texto-grande', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['historico']['visualizar'] && $lancamentos['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $lancamentos); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['lancamentos']['data_cadastro']['visualizar'] && $lancamentos['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`lancamentos`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $lancamentos); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Lançamentos: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['lancamentos']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=lancamentos-cadastrar.php"> 
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