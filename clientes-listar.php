<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Clientes'; $ttabela = 'clientes'; $aarquivo = 'clientes';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Clientes" cadastrados(as)';
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
<h1>Clientes</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['clientes']['excluir']){
if(filhos($a, $base, 'clientes', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Clientes', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `clientes` WHERE'.sql_subordinacao($a, 'clientes').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Clientes&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `clientes` WHERE (cpf = \''.ai($a, $_POST['cpf']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$clientes = mysqli_fetch_array($res);
if($clientes['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Clientes&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['documentos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['clientes']['cadastrar']){
for($x=0;$x<count($_FILES['documentos']['tmp_name']);$x++){
$sql = 'INSERT INTO `clientes` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`retorno` = \''.ai($a, $_POST['retorno']).'\', 
`cpf` = \''.ai($a, $_POST['cpf']).'\', 
`empresa` = \''.ai($a, $_POST['empresa']).'\', 
`cnpj` = \''.ai($a, $_POST['cnpj']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`senha` = \''.ai($a, md5($_POST['senha'])).'\', 
`e_mail_2` = \''.ai($a, $_POST['e_mail_2']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`telefone_2` = \''.ai($a, $_POST['telefone_2']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`pix` = \''.ai($a, $_POST['pix']).'\', 
`banco` = \''.ai($a, $_POST['banco']).'\', 
`agencia` = \''.ai($a, $_POST['agencia']).'\', 
`conta` = \''.ai($a, $_POST['conta']).'\', 
`tipo_de_conta` = \''.ai($a, $_POST['tipo_de_conta']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['foto']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'clientes/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Clientes cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['clientes']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `clientes` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`data_expira` = \''.ai($a, $_POST['data_expira']).'\', 
`retorno` = \''.ai($a, $_POST['retorno']).'\', 
`cpf` = \''.ai($a, $_POST['cpf']).'\', 
`empresa` = \''.ai($a, $_POST['empresa']).'\', 
`cnpj` = \''.ai($a, $_POST['cnpj']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`senha` = \''.ai($a, md5($_POST['senha'])).'\', 
`e_mail_2` = \''.ai($a, $_POST['e_mail_2']).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`telefone_2` = \''.ai($a, $_POST['telefone_2']).'\', 
`cep` = \''.ai($a, $_POST['cep']).'\', 
`endereco` = \''.ai($a, $_POST['endereco']).'\', 
`numero` = \''.ai($a, $_POST['numero']).'\', 
`complemento` = \''.ai($a, $_POST['complemento']).'\', 
`bairro` = \''.ai($a, $_POST['bairro']).'\', 
`cidade` = \''.ai($a, $_POST['cidade']).'\', 
`estado` = \''.ai($a, $_POST['estado']).'\', 
`pix` = \''.ai($a, $_POST['pix']).'\', 
`banco` = \''.ai($a, $_POST['banco']).'\', 
`agencia` = \''.ai($a, $_POST['agencia']).'\', 
`conta` = \''.ai($a, $_POST['conta']).'\', 
`tipo_de_conta` = \''.ai($a, $_POST['tipo_de_conta']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`documentos` = \''.ai($a, extensao_arquivo($_FILES['documentos']['name'][$x], $_POST['arquivo_documentos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['foto']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'clientes/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Clientes alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'clientes';
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
<form id="form1" name="form1" method="get" action="clientes-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'site'; $propriedade = 'site';
include('inc.filtro.php');
//
$filtrar = 'status_cadastro'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'Data Expira';
include('inc.filtro-data-hora.php');
//
$filtrar = 'Retorno';
include('inc.filtro-data-hora.php');
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
$_SESSION['tabela'] = 'clientes';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `clientes`.`id` DESC';
}
$sql = 'SELECT 
`clientes`.`id`, 
`site`.`site` AS `site`, 
`clientes`.`nome`, 
`clientes`.`foto`, 
`status_cadastro`.`nome` AS `status`, 
`status_cadastro`.`label` AS `label_status`, 
`clientes`.`data_expira`, 
`clientes`.`retorno`, 
`clientes`.`cpf`, 
`clientes`.`empresa`, 
`clientes`.`cnpj`, 
`clientes`.`e_mail`, 
`clientes`.`senha`, 
`clientes`.`e_mail_2`, 
`clientes`.`telefone`, 
`clientes`.`telefone_2`, 
`clientes`.`cep`, 
`clientes`.`endereco`, 
`clientes`.`numero`, 
`clientes`.`complemento`, 
`clientes`.`bairro`, 
`clientes`.`cidade`, 
`clientes`.`estado`, 
`clientes`.`pix`, 
`clientes`.`banco`, 
`clientes`.`agencia`, 
`clientes`.`conta`, 
`clientes`.`tipo_de_conta`, 
`clientes`.`obs`, 
`clientes`.`documentos`, 
`clientes`.`historico`, 
`clientes`.`data_cadastro` 
FROM `clientes` 
LEFT JOIN `site` ON `site`.`id` = `clientes`.`id_site`
LEFT JOIN `status_cadastro` ON `status_cadastro`.`id` = `clientes`.`id_status_cadastro` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Clientes';
?>
<h2 style="margin:15px;">&quot;Clientes&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'clientes-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($clientes = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $clientes[primeiro_campo_nativo($a, 'clientes')]).'\',
url: \'clientes-cadastrar.php?editar='.$clientes['id'].'\',
start: \''.$clientes[primeiro_campo_data($a, 'clientes')].'\',
end: \''.$clientes[primeiro_campo_data($a, 'clientes')].'\',
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
<?php if($_SESSION['permissao']['clientes']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['foto']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`foto`'); ?><strong>Foto</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['clientes']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php ordenar($url, '`status_cadastro`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['retorno']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`retorno`'); ?><strong>Retorno</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['cpf']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`cpf`'); ?><strong>CPF</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['empresa']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`empresa`'); ?><strong>Empresa</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cnpj']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`cnpj`'); ?><strong>CNPJ</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['senha']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`senha`'); ?><strong>Senha</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail_2']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`e_mail_2`'); ?><strong>E-mail 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone_2']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`telefone_2`'); ?><strong>Telefone 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['pix']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`pix`'); ?><strong>PIX</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['banco']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`banco`'); ?><strong>Banco</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['agencia']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`agencia`'); ?><strong>Agência</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['conta']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`conta`'); ?><strong>Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['tipo_de_conta']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`tipo_de_conta`'); ?><strong>Tipo de Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['documentos']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`documentos`'); ?><strong>Documentos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['clientes']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`clientes`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($clientes = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['clientes']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $clientes, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['foto']['visualizar']){ ?>
<td><?php echo $clientes['foto'] ?></td>
<?php
if(strtolower($clientes['foto']) == 'jpg' || strtolower($clientes['foto']) == 'jpeg' || strtolower($clientes['foto']) == 'gif' || strtolower($clientes['foto']) == 'png' || strtolower($clientes['foto']) == 'bmp'){
?>
<td><?php if(is_file('clientes/foto/'.$clientes['id'].'.'.$clientes['foto'])){ ?><a href="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" target="_blank"><img src="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('clientes/foto/'.$clientes['id'].'.'.$clientes['foto'])){ ?><a href="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" target="_blank">clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['clientes']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $clientes, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $clientes); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['retorno']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $clientes); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['cpf']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cpf', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['empresa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'empresa', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cnpj']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['senha']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'senha', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['pix']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pix', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['banco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'banco', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['agencia']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'agencia', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'conta', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['tipo_de_conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $clientes); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $clientes, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['documentos']['visualizar']){ ?>
<td><?php echo $clientes['documentos'] ?></td>
<?php
if(strtolower($clientes['documentos']) == 'jpg' || strtolower($clientes['documentos']) == 'jpeg' || strtolower($clientes['documentos']) == 'gif' || strtolower($clientes['documentos']) == 'png' || strtolower($clientes['documentos']) == 'bmp'){
?>
<td><?php if(is_file('clientes/documentos/'.$clientes['id'].'.'.$clientes['documentos'])){ ?><a href="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" target="_blank"><img src="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('clientes/documentos/'.$clientes['id'].'.'.$clientes['documentos'])){ ?><a href="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" target="_blank">clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['clientes']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $clientes, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $clientes); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Clientes: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['clientes']['imprimir']){ ?><a href="imprimir-registro.php?tabela=clientes&id=<?php echo $clientes['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['duplicar']){ ?><a href="clientes-listar.php?duplicar=<?php echo $clientes['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['editar']){ ?><a href="clientes-cadastrar.php?editar=<?php echo $clientes['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['excluir']){ ?><a href="clientes-listar.php?excluir=<?php echo $clientes['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($clientes = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['clientes']['imprimir']){ ?><a href="imprimir-registro.php?tabela=clientes&id=<?php echo $clientes['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['duplicar']){ ?><a href="clientes-listar.php?duplicar=<?php echo $clientes['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['editar']){ ?><a href="clientes-cadastrar.php?editar=<?php echo $clientes['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['clientes']['excluir']){ ?><a href="clientes-listar.php?excluir=<?php echo $clientes['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['clientes']['id_site']['visualizar'] && $clientes['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $clientes, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['nome']['visualizar'] && $clientes['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['foto']['visualizar'] && $clientes['foto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`foto`', $exibiu); ?><strong>Foto</strong> <?php echo $clientes['foto'] ?></div>
<?php
if(is_file('clientes/foto/'.$clientes['id'].'.'.$clientes['foto'])){
if(strtolower($clientes['foto']) == 'jpg' || strtolower($clientes['foto']) == 'jpeg' || strtolower($clientes['foto']) == 'gif' || strtolower($clientes['foto']) == 'png' || strtolower($clientes['foto']) == 'bmp'){
?>
<div class="linha"><a href="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" target="_blank"><img src="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?>" target="_blank">clientes/foto/<?php echo $clientes['id'] ?>.<?php echo $clientes['foto'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['clientes']['id_status_cadastro']['visualizar'] && $clientes['status']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_cadastro`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $clientes, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_expira']['visualizar'] && $clientes['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $clientes); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['retorno']['visualizar'] && $clientes['retorno'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`retorno`', $exibiu); ?><strong>Retorno</strong> <?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $clientes); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['clientes']['cpf']['visualizar'] && $clientes['cpf']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`cpf`', $exibiu); ?><strong>CPF</strong> <?php echo edicao_expressa($ttabela, 'cpf', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['empresa']['visualizar'] && $clientes['empresa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`empresa`', $exibiu); ?><strong>Empresa</strong> <?php echo edicao_expressa($ttabela, 'empresa', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cnpj']['visualizar'] && $clientes['cnpj']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`cnpj`', $exibiu); ?><strong>CNPJ</strong> <?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail']['visualizar'] && $clientes['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['senha']['visualizar'] && $clientes['senha']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`senha`', $exibiu); ?><strong>Senha</strong> <?php echo edicao_expressa($ttabela, 'senha', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['e_mail_2']['visualizar'] && $clientes['e_mail_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`e_mail_2`', $exibiu); ?><strong>E-mail 2</strong> <?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone']['visualizar'] && $clientes['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['telefone_2']['visualizar'] && $clientes['telefone_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`telefone_2`', $exibiu); ?><strong>Telefone 2</strong> <?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cep']['visualizar'] && $clientes['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['endereco']['visualizar'] && $clientes['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $clientes); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['numero']['visualizar'] && $clientes['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['complemento']['visualizar'] && $clientes['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['bairro']['visualizar'] && $clientes['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['cidade']['visualizar'] && $clientes['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['estado']['visualizar'] && $clientes['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['pix']['visualizar'] && $clientes['pix']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`pix`', $exibiu); ?><strong>PIX</strong> <?php echo edicao_expressa($ttabela, 'pix', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['banco']['visualizar'] && $clientes['banco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`banco`', $exibiu); ?><strong>Banco</strong> <?php echo edicao_expressa($ttabela, 'banco', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['agencia']['visualizar'] && $clientes['agencia']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`agencia`', $exibiu); ?><strong>Agência</strong> <?php echo edicao_expressa($ttabela, 'agencia', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['conta']['visualizar'] && $clientes['conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`conta`', $exibiu); ?><strong>Conta</strong> <?php echo edicao_expressa($ttabela, 'conta', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['tipo_de_conta']['visualizar'] && $clientes['tipo_de_conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`tipo_de_conta`', $exibiu); ?><strong>Tipo de Conta</strong> <?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['obs']['visualizar'] && $clientes['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['documentos']['visualizar'] && $clientes['documentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`documentos`', $exibiu); ?><strong>Documentos</strong> <?php echo $clientes['documentos'] ?></div>
<?php
if(is_file('clientes/documentos/'.$clientes['id'].'.'.$clientes['documentos'])){
if(strtolower($clientes['documentos']) == 'jpg' || strtolower($clientes['documentos']) == 'jpeg' || strtolower($clientes['documentos']) == 'gif' || strtolower($clientes['documentos']) == 'png' || strtolower($clientes['documentos']) == 'bmp'){
?>
<div class="linha"><a href="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" target="_blank"><img src="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?>" target="_blank">clientes/documentos/<?php echo $clientes['id'] ?>.<?php echo $clientes['documentos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['clientes']['historico']['visualizar'] && $clientes['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $clientes); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['clientes']['data_cadastro']['visualizar'] && $clientes['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`clientes`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $clientes); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Clientes: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['clientes']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=clientes-cadastrar.php"> 
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