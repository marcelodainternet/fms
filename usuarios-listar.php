<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'Usuários'; $ttabela = 'usuarios'; $aarquivo = 'usuarios';
include('inc.subordinacao.php');
$salt = '';
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"Usuários" cadastrados(as)';
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
<h1>Usuários</h1>
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
if($_GET['excluir'] && $_SESSION['permissao']['usuarios']['excluir']){
if(filhos($a, $base, 'usuarios', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'Usuários', $_GET['excluir'], $salt);
$sql = 'DELETE FROM `usuarios` WHERE'.sql_subordinacao($a, 'usuarios').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;Usuários&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `usuarios` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
if($usuarios['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;Usuários&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['usuarios']['cadastrar']){
$sql = permissao_campos('INSERT INTO `usuarios` SET 
`id_pperfis` = \''.ai($a, $_POST['id_pperfis']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`senha` = \''.ai($a, md5($_POST['senha'])).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Usuários cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['usuarios']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `usuarios` SET 
`id_pperfis` = \''.ai($a, $_POST['id_pperfis']).'\', 
`nome` = \''.ai($a, $_POST['nome']).'\', 
`e_mail` = \''.ai($a, $_POST['e_mail']).'\', 
`senha` = \''.ai($a, md5($_POST['senha'])).'\', 
`telefone` = \''.ai($a, $_POST['telefone']).'\', 
`id_status_cadastro` = \''.ai($a, $_POST['id_status_cadastro'].$_SESSION['id_status_cadastro_usuarios']).'\', 
`id_site` = \''.ai($a, $_POST['id_site'].$_SESSION['id_site_usuarios']).'\', 
`obs` = \''.ai($a, $_POST['obs']).'\', 
`historico` = CONCAT(`historico`, \''.ai($a, date('d/m/Y H:i:s').' '.$_SESSION['nome_usuarios']).'\r\n\'), 
`data_cadastro` = \''.ai($a, $_POST['data_cadastro']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;

?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> Usuários alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'usuarios';
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
<form id="form1" name="form1" method="get" action="usuarios-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
$filtrar = 'pperfis'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'status_cadastro'; $propriedade = 'nome';
include('inc.filtro.php');
//
$filtrar = 'site'; $propriedade = 'site';
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
$_SESSION['tabela'] = 'usuarios';
include('inc.sql-filtro.php');
// restringe acesso ao desenvolvedorif($_SESSION['id_usuarios'] > 1){$sql_filtro .= '`usuarios`.`id` > \'1\' AND';}
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `usuarios`.`id` DESC';
}
$sql = 'SELECT 
`usuarios`.`id`, 
`pperfis`.`nome` AS `perfil`, 
`usuarios`.`nome`, 
`usuarios`.`e_mail`, 
`usuarios`.`senha`, 
`usuarios`.`telefone`, 
`status_cadastro`.`nome` AS `status`, 
`status_cadastro`.`label` AS `label_status`, 
`site`.`site` AS `site`, 
`usuarios`.`obs`, 
`usuarios`.`historico`, 
`usuarios`.`data_cadastro` 
FROM `usuarios` 
LEFT JOIN `pperfis` ON `pperfis`.`id` = `usuarios`.`id_pperfis`
LEFT JOIN `status_cadastro` ON `status_cadastro`.`id` = `usuarios`.`id_status_cadastro`
LEFT JOIN `site` ON `site`.`id` = `usuarios`.`id_site` 
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'Usuários';
?>
<h2 style="margin:15px;">&quot;Usuários&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'usuarios-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($usuarios = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $usuarios[primeiro_campo_nativo($a, 'usuarios')]).'\',
url: \'usuarios-cadastrar.php?editar='.$usuarios['id'].'\',
start: \''.$usuarios[primeiro_campo_data($a, 'usuarios')].'\',
end: \''.$usuarios[primeiro_campo_data($a, 'usuarios')].'\',
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
<?php if($_SESSION['permissao']['usuarios']['id_pperfis']['visualizar']){ ?>
<?php if(!$_SESSION['id_pperfis_usuarios']){ ?>
<td><?php ordenar($url, '`pperfis`.`nome`'); ?><strong>Perfil</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['e_mail']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`e_mail`'); ?><strong>E-mail</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['senha']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`senha`'); ?><strong>Senha</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['telefone']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`telefone`'); ?><strong>Telefone</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php ordenar($url, '`status_cadastro`.`nome`'); ?><strong>Status</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php ordenar($url, '`site`.`site`'); ?><strong>Site</strong></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['obs']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`obs`'); ?><strong>Obs</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['historico']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`historico`'); ?><strong>Histórico</strong></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['data_cadastro']['visualizar']){ ?>
<td><?php ordenar($url, '`usuarios`.`data_cadastro`'); ?><strong>Data Cadastro</strong></td>
<?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['visualizar']){ ?>
<td>&nbsp;</td>
<?php } ?>

<td></td>
<td></td>
</tr>
<?php
while($usuarios = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['usuarios']['id_pperfis']['visualizar']){ ?>
<?php if(!$_SESSION['id_pperfis_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'pperfis', 'selecao', $usuarios, 'perfil', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $usuarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['e_mail']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $usuarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['senha']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'senha', 'texto', $usuarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['telefone']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $usuarios); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_status_cadastro']['visualizar']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<td><?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $usuarios, 'status', 'nome'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_site']['visualizar']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<td><?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $usuarios, 'site', 'site'); ?></td>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['obs']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $usuarios, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['historico']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'historico', 'html', $usuarios, 'tabular'); ?></td>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['data_cadastro']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $usuarios); ?></td>
<?php } ?> 
<td>
<?php if($_SESSION['permissao']['usuarios']['visualizar']){ ?>
<a href="inicial.php?id_usuarios=<?php echo $usuarios['id'] ?>" class="btn btn-default btn-xs"><i class="fas fa-sign-in-alt"></i> Login</a>
<?php } ?>
</td>

<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'Usuários: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['usuarios']['imprimir']){ ?><a href="imprimir-registro.php?tabela=usuarios&id=<?php echo $usuarios['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['duplicar']){ ?><a href="usuarios-listar.php?duplicar=<?php echo $usuarios['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['editar']){ ?><a href="usuarios-cadastrar.php?editar=<?php echo $usuarios['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['excluir']){ ?><a href="usuarios-listar.php?excluir=<?php echo $usuarios['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($usuarios = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['usuarios']['imprimir']){ ?><a href="imprimir-registro.php?tabela=usuarios&id=<?php echo $usuarios['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['duplicar']){ ?><a href="usuarios-listar.php?duplicar=<?php echo $usuarios['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['editar']){ ?><a href="usuarios-cadastrar.php?editar=<?php echo $usuarios['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['excluir']){ ?><a href="usuarios-listar.php?excluir=<?php echo $usuarios['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['usuarios']['id_pperfis']['visualizar'] && $usuarios['perfil']){ ?>
<?php if(!$_SESSION['id_pperfis_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pperfis`.`nome`', $exibiu); ?><strong>Perfil</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'pperfis', 'selecao', $usuarios, 'perfil', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['nome']['visualizar'] && $usuarios['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['e_mail']['visualizar'] && $usuarios['e_mail']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`e_mail`', $exibiu); ?><strong>E-mail</strong> <?php echo edicao_expressa($ttabela, 'e_mail', 'e-mail', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['senha']['visualizar'] && $usuarios['senha']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`senha`', $exibiu); ?><strong>Senha</strong> <?php echo edicao_expressa($ttabela, 'senha', 'texto', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['telefone']['visualizar'] && $usuarios['telefone']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`telefone`', $exibiu); ?><strong>Telefone</strong> <?php echo edicao_expressa($ttabela, 'telefone', 'telefone', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_status_cadastro']['visualizar'] && $usuarios['status']){ ?>
<?php if(!$_SESSION['id_status_cadastro_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`status_cadastro`.`nome`', $exibiu); ?><strong>Status</strong> <?php echo edicao_expressa_label($ttabela, 'status_cadastro', 'selecao', $usuarios, 'status', 'nome'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['id_site']['visualizar'] && $usuarios['site']){ ?>
<?php if(!$_SESSION['id_site_usuarios']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`site`.`site`', $exibiu); ?><strong>Site</strong> <?php echo edicao_expressa_relacionamento($ttabela, 'site', 'selecao', $usuarios, 'site', 'site'); ?></div>
<?php } ?>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['obs']['visualizar'] && $usuarios['obs']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`obs`', $exibiu); ?><strong>Obs</strong> <?php echo edicao_expressa($ttabela, 'obs', 'texto-grande', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['historico']['visualizar'] && $usuarios['historico']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`historico`', $exibiu); ?><strong>Histórico</strong> <?php echo edicao_expressa($ttabela, 'historico', 'html', $usuarios); ?></div>
<?php } ?>
<?php if($_SESSION['permissao']['usuarios']['data_cadastro']['visualizar'] && $usuarios['data_cadastro'] != '0000-00-00 00:00:00'){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`usuarios`.`data_cadastro`', $exibiu); ?><strong>Data Cadastro</strong> <?php echo edicao_expressa($ttabela, 'data_cadastro', 'data-hora', $usuarios); ?></div>
<?php } ?> 
<?php if($_SESSION['permissao']['usuarios']['visualizar']){ ?>
<a href="inicial.php?id_usuarios=<?php echo $usuarios['id'] ?>" class="btn btn-default btn-xs" style="margin-top: 10px;"><i class="fas fa-sign-in-alt"></i> Login</a>
<?php } ?>

<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'Usuários: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['usuarios']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=usuarios-cadastrar.php"> 
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