<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Parceiros'; $ttabela = 'parceiros'; $aarquivo = 'parceiros';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Parceiros" cadastrados(as)';
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
<h1>Parceiros</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['parceiros']['excluir']){
if(filhos($a, $base, 'parceiros', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Parceiros', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `parceiros` WHERE'.sql_subordinacao($a, 'parceiros').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Parceiros&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `parceiros` WHERE (cpf = \''.ai($a, $_POST['cpf']).'\') AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$parceiros = mysqli_fetch_array($res);
if($parceiros['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Parceiros&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if((count($_FILES['enexos']['tmp_name']) >= 1 && !$_POST['editar']) && $_SESSION['permissao']['parceiros']['cadastrar']){
for($x=0;$x<count($_FILES['enexos']['tmp_name']);$x++){
$sql = 'INSERT INTO `parceiros` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`funcao` = \''.ai($a, $_POST['funcao']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'parceiros/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_enexos']), 1920);
log_arquivos($a, 'PUT');
}

}
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Parceiros cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['parceiros']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `parceiros` SET 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`foto` = \''.ai($a, extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_foto'])).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`funcao` = \''.ai($a, $_POST['funcao']).'\', 
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
grava_e_redimensiona_arquivo($_FILES['foto']['tmp_name'], 'parceiros/foto/'.$id.'.'.extensao_arquivo($_FILES['foto']['name'], $_POST['arquivo_enexos']), 1920);
log_arquivos($a, 'PUT');
}

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Parceiros alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'parceiros';
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
<form id="form1" name="form1" method="get" action="parceiros-listar.php">
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
$_SESSION['tabela'] = 'parceiros';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `parceiros`.`id` DESC';
}
$sql = 'SELECT 
`parceiros`.`id`, 
`site`.`site` AS `site`, 
`parceiros`.`nome`, 
`parceiros`.`foto`, 
`status_cadastro`.`nome` AS `status`, 
`status_cadastro`.`label` AS `label_status`, 
`parceiros`.`funcao`, 
`parceiros`.`data_expira`, 
`parceiros`.`retorno`, 
`parceiros`.`cpf`, 
`parceiros`.`empresa`, 
`parceiros`.`cnpj`, 
`parceiros`.`e_mail`, 
`parceiros`.`senha`, 
`parceiros`.`e_mail_2`, 
`parceiros`.`telefone`, 
`parceiros`.`telefone_2`, 
`parceiros`.`cep`, 
`parceiros`.`endereco`, 
`parceiros`.`numero`, 
`parceiros`.`complemento`, 
`parceiros`.`bairro`, 
`parceiros`.`cidade`, 
`parceiros`.`estado`, 
`parceiros`.`pix`, 
`parceiros`.`banco`, 
`parceiros`.`agencia`, 
`parceiros`.`conta`, 
`parceiros`.`tipo_de_conta`, 
`parceiros`.`obs`, 
`parceiros`.`enexos`, 
`parceiros`.`historico`, 
`parceiros`.`data_cadastro` 
FROM `parceiros` 
LEFT JOIN `site` ON `site`.`id` = `parceiros`.`id_site`
LEFT JOIN `status_cadastro` ON `status_cadastro`.`id` = `parceiros`.`id_status_cadastro` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Parceiros';
?>
<h2 style="margin:15px;">&quot;Parceiros&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'parceiros-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($parceiros = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $parceiros[primeiro_campo_nativo($a, 'parceiros')]).'\',
url: \'parceiros-cadastrar.php?editar='.$parceiros['id'].'\',
start: \''.$parceiros[primeiro_campo_data($a, 'parceiros')].'\',
end: \''.$parceiros[primeiro_campo_data($a, 'parceiros')].'\',
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
<?php if($_SESSION['permissao']['parceiros']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['foto']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`foto`'); ?><strong>Foto</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['parceiros']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php ordenar($url, '`status_cadastro`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['funcao']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`funcao`'); ?><strong>Função</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_expira']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`data_expira`'); ?><strong>Data Expira</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['retorno']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`retorno`'); ?><strong>Retorno</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['cpf']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`cpf`'); ?><strong>CPF</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['empresa']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`empresa`'); ?><strong>Empresa</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cnpj']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`cnpj`'); ?><strong>CNPJ</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['senha']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`senha`'); ?><strong>Senha</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail_2']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`e_mail_2`'); ?><strong>E-mail 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone_2']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`telefone_2`'); ?><strong>Telefone 2</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cep']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`cep`'); ?><strong>CEP</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['endereco']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`endereco`'); ?><strong>Endereço</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['numero']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`numero`'); ?><strong>Número</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['complemento']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`complemento`'); ?><strong>Complemento</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['bairro']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`bairro`'); ?><strong>Bairro</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cidade']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`cidade`'); ?><strong>Cidade</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['estado']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`estado`'); ?><strong>Estado</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['pix']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`pix`'); ?><strong>PIX</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['banco']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`banco`'); ?><strong>Banco</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['agencia']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`agencia`'); ?><strong>Agência</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['conta']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`conta`'); ?><strong>Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['tipo_de_conta']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`tipo_de_conta`'); ?><strong>Tipo de Conta</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['enexos']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`enexos`'); ?><strong>Enexo(s)</strong></td>
<td></td>
<?php
}
?>
<?php if($_SESSION['permissao']['parceiros']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`parceiros`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 

<td></td>
<td></td>
</tr>
<?php
while($parceiros = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['parceiros']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $parceiros, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['foto']['visualizar']){ ?>
<td><?php echo $parceiros['foto'] ?></td>
<?php
if(strtolower($parceiros['foto']) == 'jpg' || strtolower($parceiros['foto']) == 'jpeg' || strtolower($parceiros['foto']) == 'gif' || strtolower($parceiros['foto']) == 'png' || strtolower($parceiros['foto']) == 'bmp'){
?>
<td><?php if(is_file('parceiros/foto/'.$parceiros['id'].'.'.$parceiros['foto'])){ ?><a href="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" target="_blank"><img src="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('parceiros/foto/'.$parceiros['id'].'.'.$parceiros['foto'])){ ?><a href="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" target="_blank">parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['parceiros']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $parceiros, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['funcao']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'funcao', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_expira']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $parceiros); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['retorno']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $parceiros); ?></td>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['cpf']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cpf', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['empresa']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'empresa', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cnpj']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['senha']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'senha', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone_2']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cep']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cep', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['endereco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'endereco', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['numero']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'numero', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['complemento']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'complemento', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['bairro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'bairro', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cidade']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'cidade', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['estado']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'estado', 'estado', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['pix']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'pix', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['banco']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'banco', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['agencia']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'agencia', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'conta', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['tipo_de_conta']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $parceiros); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $parceiros, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['enexos']['visualizar']){ ?>
<td><?php echo $parceiros['enexos'] ?></td>
<?php
if(strtolower($parceiros['enexos']) == 'jpg' || strtolower($parceiros['enexos']) == 'jpeg' || strtolower($parceiros['enexos']) == 'gif' || strtolower($parceiros['enexos']) == 'png' || strtolower($parceiros['enexos']) == 'bmp'){
?>
<td><?php if(is_file('parceiros/enexos/'.$parceiros['id'].'.'.$parceiros['enexos'])){ ?><a href="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" target="_blank"><img src="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" style="max-height:100px; max-width:100px;"/></a><?php } ?></td>
<?php
}
else {
?>
<td><?php if(is_file('parceiros/enexos/'.$parceiros['id'].'.'.$parceiros['enexos'])){ ?><a href="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" target="_blank">parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?></a><?php } ?></td>
<?php
}
}
?>
<?php if($_SESSION['permissao']['parceiros']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $parceiros, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $parceiros); ?></td>
<?php } ?> 

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Parceiros: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['parceiros']['imprimir']){ ?><a href="imprimir-registro.php?tabela=parceiros&id=<?php echo $parceiros['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['duplicar']){ ?><a href="parceiros-listar.php?duplicar=<?php echo $parceiros['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['editar']){ ?><a href="parceiros-cadastrar.php?editar=<?php echo $parceiros['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['excluir']){ ?><a href="parceiros-listar.php?excluir=<?php echo $parceiros['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($parceiros = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['parceiros']['imprimir']){ ?><a href="imprimir-registro.php?tabela=parceiros&id=<?php echo $parceiros['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['duplicar']){ ?><a href="parceiros-listar.php?duplicar=<?php echo $parceiros['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['editar']){ ?><a href="parceiros-cadastrar.php?editar=<?php echo $parceiros['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['excluir']){ ?><a href="parceiros-listar.php?excluir=<?php echo $parceiros['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['parceiros']['id_site']['visualizar'] && $parceiros['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $parceiros, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['nome']['visualizar'] && $parceiros['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['foto']['visualizar'] && $parceiros['foto']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`foto`', $exibiu); ?><strong>Foto</strong> <?php echo $parceiros['foto'] ?></div>
<?php
if(is_file('parceiros/foto/'.$parceiros['id'].'.'.$parceiros['foto'])){
if(strtolower($parceiros['foto']) == 'jpg' || strtolower($parceiros['foto']) == 'jpeg' || strtolower($parceiros['foto']) == 'gif' || strtolower($parceiros['foto']) == 'png' || strtolower($parceiros['foto']) == 'bmp'){
?>
<div class="linha"><a href="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" target="_blank"><img src="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?>" target="_blank">parceiros/foto/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['foto'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['parceiros']['id_status_cadastro']['visualizar'] && $parceiros['status']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_cadastro`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $parceiros, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['funcao']['visualizar'] && $parceiros['funcao']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`funcao`', $exibiu); ?><strong>Função</strong> <?php echo edicao_expressa($ttabela, 'funcao', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_expira']['visualizar'] && $parceiros['data_expira'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`data_expira`', $exibiu); ?><strong>Data Expira</strong> <?php echo edicao_expressa($ttabela, 'data_expira', 'data-hora', $parceiros); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['retorno']['visualizar'] && $parceiros['retorno'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`retorno`', $exibiu); ?><strong>Retorno</strong> <?php echo edicao_expressa($ttabela, 'retorno', 'data-hora', $parceiros); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['parceiros']['cpf']['visualizar'] && $parceiros['cpf']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`cpf`', $exibiu); ?><strong>CPF</strong> <?php echo edicao_expressa($ttabela, 'cpf', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['empresa']['visualizar'] && $parceiros['empresa']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`empresa`', $exibiu); ?><strong>Empresa</strong> <?php echo edicao_expressa($ttabela, 'empresa', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cnpj']['visualizar'] && $parceiros['cnpj']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`cnpj`', $exibiu); ?><strong>CNPJ</strong> <?php echo edicao_expressa($ttabela, 'cnpj', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail']['visualizar'] && $parceiros['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['senha']['visualizar'] && $parceiros['senha']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`senha`', $exibiu); ?><strong>Senha</strong> <?php echo edicao_expressa($ttabela, 'senha', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['e_mail_2']['visualizar'] && $parceiros['e_mail_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`e_mail_2`', $exibiu); ?><strong>E-mail 2</strong> <?php echo edicao_expressa($ttabela, 'e_mail_2', 'e-mail', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone']['visualizar'] && $parceiros['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['telefone_2']['visualizar'] && $parceiros['telefone_2']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`telefone_2`', $exibiu); ?><strong>Telefone 2</strong> <?php echo edicao_expressa($ttabela, 'telefone_2', 'telefone', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cep']['visualizar'] && $parceiros['cep']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`cep`', $exibiu); ?><strong>CEP</strong> <?php echo edicao_expressa($ttabela, 'cep', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['endereco']['visualizar'] && $parceiros['endereco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`endereco`', $exibiu); ?><strong>Endereço</strong> <?php echo edicao_expressa($ttabela, 'endereco', 'texto', $parceiros); ?> <a href="https://www.google.com.br/maps/place/<?php echo urlencode(${$ttabela}['endereco'].' '.${$ttabela}['numero'].' '.${$ttabela}['complemento'].' '.${$ttabela}['bairro'].' '.${$ttabela}['cidade'].' '.${$ttabela}['estado'].' '.${$ttabela}['cep']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['numero']['visualizar'] && $parceiros['numero']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`numero`', $exibiu); ?><strong>Número</strong> <?php echo edicao_expressa($ttabela, 'numero', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['complemento']['visualizar'] && $parceiros['complemento']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`complemento`', $exibiu); ?><strong>Complemento</strong> <?php echo edicao_expressa($ttabela, 'complemento', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['bairro']['visualizar'] && $parceiros['bairro']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`bairro`', $exibiu); ?><strong>Bairro</strong> <?php echo edicao_expressa($ttabela, 'bairro', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['cidade']['visualizar'] && $parceiros['cidade']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`cidade`', $exibiu); ?><strong>Cidade</strong> <?php echo edicao_expressa($ttabela, 'cidade', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['estado']['visualizar'] && $parceiros['estado']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`estado`', $exibiu); ?><strong>Estado</strong> <?php echo edicao_expressa($ttabela, 'estado', 'estado', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['pix']['visualizar'] && $parceiros['pix']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`pix`', $exibiu); ?><strong>PIX</strong> <?php echo edicao_expressa($ttabela, 'pix', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['banco']['visualizar'] && $parceiros['banco']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`banco`', $exibiu); ?><strong>Banco</strong> <?php echo edicao_expressa($ttabela, 'banco', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['agencia']['visualizar'] && $parceiros['agencia']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`agencia`', $exibiu); ?><strong>Agência</strong> <?php echo edicao_expressa($ttabela, 'agencia', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['conta']['visualizar'] && $parceiros['conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`conta`', $exibiu); ?><strong>Conta</strong> <?php echo edicao_expressa($ttabela, 'conta', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['tipo_de_conta']['visualizar'] && $parceiros['tipo_de_conta']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`tipo_de_conta`', $exibiu); ?><strong>Tipo de Conta</strong> <?php echo edicao_expressa($ttabela, 'tipo_de_conta', 'texto', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['obs']['visualizar'] && $parceiros['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['enexos']['visualizar'] && $parceiros['enexos']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`enexos`', $exibiu); ?><strong>Enexo(s)</strong> <?php echo $parceiros['enexos'] ?></div>
<?php
if(is_file('parceiros/enexos/'.$parceiros['id'].'.'.$parceiros['enexos'])){
if(strtolower($parceiros['enexos']) == 'jpg' || strtolower($parceiros['enexos']) == 'jpeg' || strtolower($parceiros['enexos']) == 'gif' || strtolower($parceiros['enexos']) == 'png' || strtolower($parceiros['enexos']) == 'bmp'){
?>
<div class="linha"><a href="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" target="_blank"><img src="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" style="max-height:100px; max-width:100px;"/></a></div>
<?php
}
else {
?>
<div class="linha"><a href="parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?>" target="_blank">parceiros/enexos/<?php echo $parceiros['id'] ?>.<?php echo $parceiros['enexos'] ?></a></div>
<?php
}
}
}
?>
<?php if($_SESSION['permissao']['parceiros']['historico']['visualizar'] && $parceiros['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $parceiros); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['parceiros']['data_cadastro']['visualizar'] && $parceiros['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`parceiros`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $parceiros); ?></div>
<?php } ?> 

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Parceiros: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['parceiros']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=parceiros-cadastrar.php"> 
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