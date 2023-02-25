<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Corretores'; $ttabela = 'corretores'; $aarquivo = 'corretores';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Corretores" cadastrados(as)';
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
<h1>Corretores</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['corretores']['excluir']){
if(filhos($a, $base, 'corretores', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Corretores', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `corretores` WHERE'.sql_subordinacao($a, 'corretores').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Corretores&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `corretores` WHERE (cpf = \''.ai($a, $_POST['cpf']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$corretores = mysqli_fetch_array($res);
if($corretores['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Corretores&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['documentos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['corretores']['cadastrar']){
for($x=0;$x<count($_FILES['documentos']['tmp_name']);$x++){
$sql = 'INSERT INTO `corretores` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`creci` = \''.ai($a, $_POST['creci']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'corretores/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Corretores cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['corretores']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `corretores` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`creci` = \''.ai($a, $_POST['creci']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'corretores/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_documentos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Corretores alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'corretores';
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
<form id="form1" name="form1" method="get" action="corretores-listar.php">
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
$_SESSION['tabela'] = 'corretores';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `corretores`.`id` DESC';
}
$sql = 'SELECT 
`corretores`.`id`, 
`site`.`site` AS `site`, 
`corretores`.`nome`, 
`corretores`.`foto`, 
`status_cadastro`.`nome` AS `status`, 
`status_cadastro`.`label` AS `label_status`, 
`corretores`.`creci`, 
`corretores`.`data_expira`, 
`corretores`.`retorno`, 
`corretores`.`cpf`, 
`corretores`.`empresa`, 
`corretores`.`cnpj`, 
`corretores`.`e_mail`, 
`corretores`.`senha`, 
`corretores`.`e_mail_2`, 
`corretores`.`telefone`, 
`corretores`.`telefone_2`, 
`corretores`.`cep`, 
`corretores`.`endereco`, 
`corretores`.`numero`, 
`corretores`.`complemento`, 
`corretores`.`bairro`, 
`corretores`.`cidade`, 
`corretores`.`estado`, 
`corretores`.`pix`, 
`corretores`.`banco`, 
`corretores`.`agencia`, 
`corretores`.`conta`, 
`corretores`.`tipo_de_conta`, 
`corretores`.`obs`, 
`corretores`.`documentos`, 
`corretores`.`historico`, 
`corretores`.`data_cadastro` 
FROM `corretores` 
LEFT JOIN `site` ON `site`.`id` = `corretores`.`id_site`
LEFT JOIN `status_cadastro` ON `status_cadastro`.`id` = `corretores`.`id_status_cadastro` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Corretores';
?>
<h2 style="margin:15px;">&quot;Corretores&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'corretores-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($corretores = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $corretores[primeiro_campo_nativo($a, 'corretores')]).'\',
url: \'corretores-cadastrar.php?editar='.$corretores['id'].'\',
start: \''.$corretores[primeiro_campo_data($a, 'corretores')].'\',
end: \''.$corretores[primeiro_campo_data($a, 'corretores')].'\',
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
<?php if($_SESSION['permissao']['corretores']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['foto']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`foto`'); ?><strong>Foto</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['corretores']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php ordenar($url, '`status_cadastro`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['creci']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`creci`'); ?><strong>CRECI</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['retorno']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`retorno`'); ?><strong>Retorno</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['cpf']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`cpf`'); ?><strong>CPF</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['empresa']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`empresa`'); ?><strong>Empresa</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cnpj']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`cnpj`'); ?><strong>CNPJ</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['senha']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`senha`'); ?><strong>Senha</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail_2']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`e_mail_2`'); ?><strong>E-mail 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone_2']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`telefone_2`'); ?><strong>Telefone 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['pix']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`pix`'); ?><strong>PIX</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['banco']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`banco`'); ?><strong>Banco</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['agencia']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`agencia`'); ?><strong>Agência</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['conta']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`conta`'); ?><strong>Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['tipo_de_conta']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`tipo_de_conta`'); ?><strong>Tipo de Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['documentos']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`documentos`'); ?><strong>Documentos</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['corretores']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`corretores`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($corretores = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['corretores']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $corretores, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['foto']['visualizar']){ ?>
<td><?php echo $corretores['foto'] ?></td>
<?php
if(strtolower($corretores['foto']) == 'jpg' || strtolower($corretores['foto']) == 'jpeg' || strtolower($corretores['foto']) == 'gif' || strtolower($corretores['foto']) == 'png' || strtolower($corretores['foto']) == 'bmp'){
?>
<td><?php if(is_file('corretores/foto/'.$corretores['id'].'.'.$corretores['foto'])){ ?><a href="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" target="_blank"><img src="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('corretores/foto/'.$corretores['id'].'.'.$corretores['foto'])){ ?><a href="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" target="_blank">corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['corretores']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $corretores, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['creci']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'creci', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $corretores); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['retorno']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $corretores); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['cpf']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cpf', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['empresa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'empresa', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cnpj']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['senha']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'senha', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['pix']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pix', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['banco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'banco', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['agencia']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'agencia', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'conta', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['tipo_de_conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $corretores); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $corretores, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['documentos']['visualizar']){ ?>
<td><?php echo $corretores['documentos'] ?></td>
<?php
if(strtolower($corretores['documentos']) == 'jpg' || strtolower($corretores['documentos']) == 'jpeg' || strtolower($corretores['documentos']) == 'gif' || strtolower($corretores['documentos']) == 'png' || strtolower($corretores['documentos']) == 'bmp'){
?>
<td><?php if(is_file('corretores/documentos/'.$corretores['id'].'.'.$corretores['documentos'])){ ?><a href="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" target="_blank"><img src="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('corretores/documentos/'.$corretores['id'].'.'.$corretores['documentos'])){ ?><a href="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" target="_blank">corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['corretores']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $corretores, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $corretores); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Corretores: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['corretores']['imprimir']){ ?><a href="imprimir-registro.php?tabela=corretores&id=<?php echo $corretores['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['duplicar']){ ?><a href="corretores-listar.php?duplicar=<?php echo $corretores['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['editar']){ ?><a href="corretores-cadastrar.php?editar=<?php echo $corretores['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['excluir']){ ?><a href="corretores-listar.php?excluir=<?php echo $corretores['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($corretores = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['corretores']['imprimir']){ ?><a href="imprimir-registro.php?tabela=corretores&id=<?php echo $corretores['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['duplicar']){ ?><a href="corretores-listar.php?duplicar=<?php echo $corretores['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['editar']){ ?><a href="corretores-cadastrar.php?editar=<?php echo $corretores['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['corretores']['excluir']){ ?><a href="corretores-listar.php?excluir=<?php echo $corretores['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['corretores']['id_site']['visualizar'] && $corretores['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $corretores, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['nome']['visualizar'] && $corretores['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['foto']['visualizar'] && $corretores['foto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`foto`', $exibiu); ?><strong>Foto</strong> <?php echo $corretores['foto'] ?></div>
<?php
if(is_file('corretores/foto/'.$corretores['id'].'.'.$corretores['foto'])){
if(strtolower($corretores['foto']) == 'jpg' || strtolower($corretores['foto']) == 'jpeg' || strtolower($corretores['foto']) == 'gif' || strtolower($corretores['foto']) == 'png' || strtolower($corretores['foto']) == 'bmp'){
?>
<div class="linha"><a href="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" target="_blank"><img src="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?>" target="_blank">corretores/foto/<?php echo $corretores['id'] ?>.<?php echo $corretores['foto'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['corretores']['id_status_cadastro']['visualizar'] && $corretores['status']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_cadastro`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $corretores, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['creci']['visualizar'] && $corretores['creci']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`creci`', $exibiu); ?><strong>CRECI</strong> <?php echo edicao_expressa($ttabela, 'creci', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_expira']['visualizar'] && $corretores['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $corretores); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['retorno']['visualizar'] && $corretores['retorno'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`retorno`', $exibiu); ?><strong>Retorno</strong> <?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $corretores); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['corretores']['cpf']['visualizar'] && $corretores['cpf']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`cpf`', $exibiu); ?><strong>CPF</strong> <?php echo edicao_expressa($ttabela, 'cpf', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['empresa']['visualizar'] && $corretores['empresa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`empresa`', $exibiu); ?><strong>Empresa</strong> <?php echo edicao_expressa($ttabela, 'empresa', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cnpj']['visualizar'] && $corretores['cnpj']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`cnpj`', $exibiu); ?><strong>CNPJ</strong> <?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail']['visualizar'] && $corretores['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['senha']['visualizar'] && $corretores['senha']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`senha`', $exibiu); ?><strong>Senha</strong> <?php echo edicao_expressa($ttabela, 'senha', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['e_mail_2']['visualizar'] && $corretores['e_mail_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`e_mail_2`', $exibiu); ?><strong>E-mail 2</strong> <?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone']['visualizar'] && $corretores['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['telefone_2']['visualizar'] && $corretores['telefone_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`telefone_2`', $exibiu); ?><strong>Telefone 2</strong> <?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cep']['visualizar'] && $corretores['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['endereco']['visualizar'] && $corretores['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $corretores); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['numero']['visualizar'] && $corretores['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['complemento']['visualizar'] && $corretores['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['bairro']['visualizar'] && $corretores['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['cidade']['visualizar'] && $corretores['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['estado']['visualizar'] && $corretores['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['pix']['visualizar'] && $corretores['pix']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`pix`', $exibiu); ?><strong>PIX</strong> <?php echo edicao_expressa($ttabela, 'pix', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['banco']['visualizar'] && $corretores['banco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`banco`', $exibiu); ?><strong>Banco</strong> <?php echo edicao_expressa($ttabela, 'banco', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['agencia']['visualizar'] && $corretores['agencia']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`agencia`', $exibiu); ?><strong>Agência</strong> <?php echo edicao_expressa($ttabela, 'agencia', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['conta']['visualizar'] && $corretores['conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`conta`', $exibiu); ?><strong>Conta</strong> <?php echo edicao_expressa($ttabela, 'conta', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['tipo_de_conta']['visualizar'] && $corretores['tipo_de_conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`tipo_de_conta`', $exibiu); ?><strong>Tipo de Conta</strong> <?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['obs']['visualizar'] && $corretores['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['documentos']['visualizar'] && $corretores['documentos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`documentos`', $exibiu); ?><strong>Documentos</strong> <?php echo $corretores['documentos'] ?></div>
<?php
if(is_file('corretores/documentos/'.$corretores['id'].'.'.$corretores['documentos'])){
if(strtolower($corretores['documentos']) == 'jpg' || strtolower($corretores['documentos']) == 'jpeg' || strtolower($corretores['documentos']) == 'gif' || strtolower($corretores['documentos']) == 'png' || strtolower($corretores['documentos']) == 'bmp'){
?>
<div class="linha"><a href="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" target="_blank"><img src="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?>" target="_blank">corretores/documentos/<?php echo $corretores['id'] ?>.<?php echo $corretores['documentos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['corretores']['historico']['visualizar'] && $corretores['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $corretores); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['corretores']['data_cadastro']['visualizar'] && $corretores['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`corretores`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $corretores); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Corretores: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['corretores']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=corretores-cadastrar.php"> 
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