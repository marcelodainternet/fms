<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Proprietários'; $ttabela = 'proprietarios'; $aarquivo = 'proprietarios';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Proprietários" cadastrados(as)';
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
<h1>Proprietários</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['proprietarios']['excluir']){
if(filhos($a, $base, 'proprietarios', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Proprietários', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `proprietarios` WHERE'.sql_subordinacao($a, 'proprietarios').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Proprietários&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `proprietarios` WHERE (cpf = \''.ai($a, $_POST['cpf']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$proprietarios = mysqli_fetch_array($res);
if($proprietarios['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Proprietários&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['enexos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['proprietarios']['cadastrar']){
for($x=0;$x<count($_FILES['enexos']['tmp_name']);$x++){
$sql = 'INSERT INTO `proprietarios` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`ocupacao` = \''.ai($a, $_POST['ocupacao']).'\', 
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
`enexos` = \''.ai($a, extensao_arquivo($_FILES['enexos']['name'][$x], $_POST['arquivo_enexos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'';
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
if(is_uploaded_file($_FILES['foto']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'proprietarios/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_enexos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Proprietários cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['proprietarios']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `proprietarios` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`ocupacao` = \''.ai($a, $_POST['ocupacao']).'\', 
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
`enexos` = \''.ai($a, extensao_arquivo($_FILES['enexos']['name'][$x], $_POST['arquivo_enexos'])).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
if(is_uploaded_file($_FILES['foto']['tmp_name'])){
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'proprietarios/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_enexos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Proprietários alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'proprietarios';
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
<form id="form1" name="form1" method="get" action="proprietarios-listar.php">
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
$_SESSION['tabela'] = 'proprietarios';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `proprietarios`.`id` DESC';
}
$sql = 'SELECT 
`proprietarios`.`id`, 
`site`.`site` AS `site`, 
`proprietarios`.`nome`, 
`proprietarios`.`foto`, 
`status_cadastro`.`nome` AS `status`, 
`status_cadastro`.`label` AS `label_status`, 
`proprietarios`.`ocupacao`, 
`proprietarios`.`data_expira`, 
`proprietarios`.`retorno`, 
`proprietarios`.`cpf`, 
`proprietarios`.`empresa`, 
`proprietarios`.`cnpj`, 
`proprietarios`.`e_mail`, 
`proprietarios`.`senha`, 
`proprietarios`.`e_mail_2`, 
`proprietarios`.`telefone`, 
`proprietarios`.`telefone_2`, 
`proprietarios`.`cep`, 
`proprietarios`.`endereco`, 
`proprietarios`.`numero`, 
`proprietarios`.`complemento`, 
`proprietarios`.`bairro`, 
`proprietarios`.`cidade`, 
`proprietarios`.`estado`, 
`proprietarios`.`pix`, 
`proprietarios`.`banco`, 
`proprietarios`.`agencia`, 
`proprietarios`.`conta`, 
`proprietarios`.`tipo_de_conta`, 
`proprietarios`.`obs`, 
`proprietarios`.`enexos`, 
`proprietarios`.`historico`, 
`proprietarios`.`data_cadastro` 
FROM `proprietarios` 
LEFT JOIN `site` ON `site`.`id` = `proprietarios`.`id_site`
LEFT JOIN `status_cadastro` ON `status_cadastro`.`id` = `proprietarios`.`id_status_cadastro` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Proprietários';
?>
<h2 style="margin:15px;">&quot;Proprietários&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'proprietarios-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($proprietarios = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $proprietarios[primeiro_campo_nativo($a, 'proprietarios')]).'\',
url: \'proprietarios-cadastrar.php?editar='.$proprietarios['id'].'\',
start: \''.$proprietarios[primeiro_campo_data($a, 'proprietarios')].'\',
end: \''.$proprietarios[primeiro_campo_data($a, 'proprietarios')].'\',
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
<?php if($_SESSION['permissao']['proprietarios']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['foto']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`foto`'); ?><strong>Foto</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['proprietarios']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php ordenar($url, '`status_cadastro`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['ocupacao']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`ocupacao`'); ?><strong>Ocupação</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['retorno']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`retorno`'); ?><strong>Retorno</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['cpf']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`cpf`'); ?><strong>CPF</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['empresa']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`empresa`'); ?><strong>Empresa</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cnpj']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`cnpj`'); ?><strong>CNPJ</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['senha']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`senha`'); ?><strong>Senha</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail_2']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`e_mail_2`'); ?><strong>E-mail 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone_2']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`telefone_2`'); ?><strong>Telefone 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['pix']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`pix`'); ?><strong>PIX</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['banco']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`banco`'); ?><strong>Banco</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['agencia']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`agencia`'); ?><strong>Agência</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['conta']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`conta`'); ?><strong>Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['tipo_de_conta']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`tipo_de_conta`'); ?><strong>Tipo de Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['enexos']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`enexos`'); ?><strong>Enexo(s)</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['proprietarios']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`proprietarios`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($proprietarios = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['proprietarios']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $proprietarios, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['foto']['visualizar']){ ?>
<td><?php echo $proprietarios['foto'] ?></td>
<?php
if(strtolower($proprietarios['foto']) == 'jpg' || strtolower($proprietarios['foto']) == 'jpeg' || strtolower($proprietarios['foto']) == 'gif' || strtolower($proprietarios['foto']) == 'png' || strtolower($proprietarios['foto']) == 'bmp'){
?>
<td><?php if(is_file('proprietarios/foto/'.$proprietarios['id'].'.'.$proprietarios['foto'])){ ?><a href="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" target="_blank"><img src="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('proprietarios/foto/'.$proprietarios['id'].'.'.$proprietarios['foto'])){ ?><a href="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" target="_blank">proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['proprietarios']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $proprietarios, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['ocupacao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'ocupacao', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $proprietarios); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['retorno']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $proprietarios); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['cpf']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cpf', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['empresa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'empresa', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cnpj']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['senha']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'senha', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['pix']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pix', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['banco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'banco', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['agencia']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'agencia', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'conta', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['tipo_de_conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $proprietarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $proprietarios, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['enexos']['visualizar']){ ?>
<td><?php echo $proprietarios['enexos'] ?></td>
<?php
if(strtolower($proprietarios['enexos']) == 'jpg' || strtolower($proprietarios['enexos']) == 'jpeg' || strtolower($proprietarios['enexos']) == 'gif' || strtolower($proprietarios['enexos']) == 'png' || strtolower($proprietarios['enexos']) == 'bmp'){
?>
<td><?php if(is_file('proprietarios/enexos/'.$proprietarios['id'].'.'.$proprietarios['enexos'])){ ?><a href="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" target="_blank"><img src="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('proprietarios/enexos/'.$proprietarios['id'].'.'.$proprietarios['enexos'])){ ?><a href="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" target="_blank">proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['proprietarios']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $proprietarios, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $proprietarios); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Proprietários: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['proprietarios']['imprimir']){ ?><a href="imprimir-registro.php?tabela=proprietarios&id=<?php echo $proprietarios['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['duplicar']){ ?><a href="proprietarios-listar.php?duplicar=<?php echo $proprietarios['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['editar']){ ?><a href="proprietarios-cadastrar.php?editar=<?php echo $proprietarios['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['excluir']){ ?><a href="proprietarios-listar.php?excluir=<?php echo $proprietarios['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($proprietarios = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['proprietarios']['imprimir']){ ?><a href="imprimir-registro.php?tabela=proprietarios&id=<?php echo $proprietarios['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['duplicar']){ ?><a href="proprietarios-listar.php?duplicar=<?php echo $proprietarios['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['editar']){ ?><a href="proprietarios-cadastrar.php?editar=<?php echo $proprietarios['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['excluir']){ ?><a href="proprietarios-listar.php?excluir=<?php echo $proprietarios['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['proprietarios']['id_site']['visualizar'] && $proprietarios['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $proprietarios, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['nome']['visualizar'] && $proprietarios['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['foto']['visualizar'] && $proprietarios['foto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`foto`', $exibiu); ?><strong>Foto</strong> <?php echo $proprietarios['foto'] ?></div>
<?php
if(is_file('proprietarios/foto/'.$proprietarios['id'].'.'.$proprietarios['foto'])){
if(strtolower($proprietarios['foto']) == 'jpg' || strtolower($proprietarios['foto']) == 'jpeg' || strtolower($proprietarios['foto']) == 'gif' || strtolower($proprietarios['foto']) == 'png' || strtolower($proprietarios['foto']) == 'bmp'){
?>
<div class="linha"><a href="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" target="_blank"><img src="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?>" target="_blank">proprietarios/foto/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['foto'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['proprietarios']['id_status_cadastro']['visualizar'] && $proprietarios['status']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_cadastro`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $proprietarios, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['ocupacao']['visualizar'] && $proprietarios['ocupacao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`ocupacao`', $exibiu); ?><strong>Ocupação</strong> <?php echo edicao_expressa($ttabela, 'ocupacao', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_expira']['visualizar'] && $proprietarios['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $proprietarios); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['retorno']['visualizar'] && $proprietarios['retorno'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`retorno`', $exibiu); ?><strong>Retorno</strong> <?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $proprietarios); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['proprietarios']['cpf']['visualizar'] && $proprietarios['cpf']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`cpf`', $exibiu); ?><strong>CPF</strong> <?php echo edicao_expressa($ttabela, 'cpf', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['empresa']['visualizar'] && $proprietarios['empresa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`empresa`', $exibiu); ?><strong>Empresa</strong> <?php echo edicao_expressa($ttabela, 'empresa', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cnpj']['visualizar'] && $proprietarios['cnpj']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`cnpj`', $exibiu); ?><strong>CNPJ</strong> <?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail']['visualizar'] && $proprietarios['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['senha']['visualizar'] && $proprietarios['senha']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`senha`', $exibiu); ?><strong>Senha</strong> <?php echo edicao_expressa($ttabela, 'senha', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['e_mail_2']['visualizar'] && $proprietarios['e_mail_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`e_mail_2`', $exibiu); ?><strong>E-mail 2</strong> <?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone']['visualizar'] && $proprietarios['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['telefone_2']['visualizar'] && $proprietarios['telefone_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`telefone_2`', $exibiu); ?><strong>Telefone 2</strong> <?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cep']['visualizar'] && $proprietarios['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['endereco']['visualizar'] && $proprietarios['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $proprietarios); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['numero']['visualizar'] && $proprietarios['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['complemento']['visualizar'] && $proprietarios['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['bairro']['visualizar'] && $proprietarios['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['cidade']['visualizar'] && $proprietarios['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['estado']['visualizar'] && $proprietarios['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['pix']['visualizar'] && $proprietarios['pix']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`pix`', $exibiu); ?><strong>PIX</strong> <?php echo edicao_expressa($ttabela, 'pix', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['banco']['visualizar'] && $proprietarios['banco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`banco`', $exibiu); ?><strong>Banco</strong> <?php echo edicao_expressa($ttabela, 'banco', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['agencia']['visualizar'] && $proprietarios['agencia']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`agencia`', $exibiu); ?><strong>Agência</strong> <?php echo edicao_expressa($ttabela, 'agencia', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['conta']['visualizar'] && $proprietarios['conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`conta`', $exibiu); ?><strong>Conta</strong> <?php echo edicao_expressa($ttabela, 'conta', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['tipo_de_conta']['visualizar'] && $proprietarios['tipo_de_conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`tipo_de_conta`', $exibiu); ?><strong>Tipo de Conta</strong> <?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['obs']['visualizar'] && $proprietarios['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['enexos']['visualizar'] && $proprietarios['enexos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`enexos`', $exibiu); ?><strong>Enexo(s)</strong> <?php echo $proprietarios['enexos'] ?></div>
<?php
if(is_file('proprietarios/enexos/'.$proprietarios['id'].'.'.$proprietarios['enexos'])){
if(strtolower($proprietarios['enexos']) == 'jpg' || strtolower($proprietarios['enexos']) == 'jpeg' || strtolower($proprietarios['enexos']) == 'gif' || strtolower($proprietarios['enexos']) == 'png' || strtolower($proprietarios['enexos']) == 'bmp'){
?>
<div class="linha"><a href="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" target="_blank"><img src="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?>" target="_blank">proprietarios/enexos/<?php echo $proprietarios['id'] ?>.<?php echo $proprietarios['enexos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['proprietarios']['historico']['visualizar'] && $proprietarios['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $proprietarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['proprietarios']['data_cadastro']['visualizar'] && $proprietarios['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`proprietarios`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $proprietarios); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Proprietários: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['proprietarios']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=proprietarios-cadastrar.php"> 
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