<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'pPerfis'; $ttabela = 'pperfis'; $aarquivo = 'pperfis';
include('inc.subordinacao.php');
if($_GET['atualizar']){
function atualizar($a, $base){
$sql = 'SELECT ppermissoes.id_pperfis, ttabelas.nome AS tabela, ccampos.nome AS campo, ppermissoes.id_aacoes, ppermissoes.permissao FROM ppermissoes LEFT JOIN ttabelas ON ttabelas.id = ppermissoes.id_ttabelas LEFT JOIN ccampos ON ccampos.id = ppermissoes.id_ccampos';
$res = mysqli_query_erro($a, $sql);
while($ppermissoes = mysqli_fetch_array($res)){
$permissoes_atuais[$ppermissoes['id_pperfis']][$ppermissoes['tabela']][$ppermissoes['campo']][$ppermissoes['id_aacoes']] = $ppermissoes['permissao'];
}
$sql = 'TRUNCATE TABLE ttabelas';
$res = log_mysqli_query($a, $sql);
$sql = 'TRUNCATE TABLE ccampos';
$res = log_mysqli_query($a, $sql);
$sql = 'TRUNCATE TABLE ppermissoes';
$res = log_mysqli_query($a, $sql);
$sql = 'SHOW TABLES';
$res = mysqli_query_erro($a, $sql);
while($tabelas = mysqli_fetch_array($res)){
$tabela = $tabelas['Tables_in_'.$base];
$sql2 = 'INSERT INTO ttabelas SET 
nome = \''.ai($a, $tabela).'\'';
$res2 = mysqli_query_erro($a, $sql2);
$id_ttabelas = mysqli_insert_id($a);
$sql2 = 'SHOW COLUMNS FROM `'.$tabela.'` WHERE Field <> \'id\'';
$res2 = mysqli_query_erro($a, $sql2);
while($campos = mysqli_fetch_array($res2)){
$campo = $campos['Field'];
$sql3 = 'INSERT INTO ccampos SET 
id_ttabelas = \''.ai($a, $id_ttabelas).'\', 
nome = \''.ai($a, $campo).'\'';
$res3 = mysqli_query_erro($a, $sql3);
}
}
$sql = 'SELECT id FROM pperfis';
$res = mysqli_query_erro($a, $sql);
while($pperfis = mysqli_fetch_array($res)){
$sql2 = 'SELECT id, nome FROM ttabelas';
$res2 = mysqli_query_erro($a, $sql2);
while($ttabelas = mysqli_fetch_array($res2)){
$sql3 = 'SELECT id FROM aacoes';
$res3 = mysqli_query_erro($a, $sql3);
while($aacoes = mysqli_fetch_array($res3)){
$permissao = 'Não';
if($permissoes_atuais[$pperfis['id']][$ttabelas['nome']][''][$aacoes['id']]){
$permissao = $permissoes_atuais[$pperfis['id']][$ttabelas['nome']][''][$aacoes['id']];
}
if($pperfis['id'] == 1){ if($aacoes['id'] == 5 || $aacoes['id'] == 12){ $permissao = 'Não'; } else { $permissao = 'Sim'; } }
$array_permissoes[] = '(\'\', '.ai($a, $pperfis['id']).', '.ai($a, $ttabelas['id']).', \'\', '.ai($a, $aacoes['id']).', \''.ai($a, $permissao).'\')';
}
$sql3 = 'SELECT id, nome FROM ccampos WHERE id_ttabelas = \''.ai($a, $ttabelas['id']).'\'';
$res3 = mysqli_query_erro($a, $sql3);
while($ccampos = mysqli_fetch_array($res3)){
$sql4 = 'SELECT id FROM aacoes';
$res4 = mysqli_query_erro($a, $sql4);
while($aacoes = mysqli_fetch_array($res4)){
$permissao = 'Não';
if($permissoes_atuais[$pperfis['id']][$ttabelas['nome']][$ccampos['nome']][$aacoes['id']]){
$permissao = $permissoes_atuais[$pperfis['id']][$ttabelas['nome']][$ccampos['nome']][$aacoes['id']];
}
if($pperfis['id'] == 1){ if($aacoes['id'] == 5 || $aacoes['id'] == 12){ $permissao = 'Não'; } else { $permissao = 'Sim'; } }
$array_permissoes[] = '(\'\', '.ai($a, $pperfis['id']).', '.ai($a, $ttabelas['id']).', '.ai($a, $ccampos['id']).', '.ai($a, $aacoes['id']).', \''.ai($a, $permissao).'\')';
}
}
}
}
$sql = 'SELECT id, nome FROM ttabelas';
$res = mysqli_query_erro($a, $sql);
while($ttabelas = mysqli_fetch_array($res)){
unset($rrelacionamentos);
$sql2 = 'SHOW TABLES WHERE Tables_in_'.ai($a, $base).' NOT LIKE\'view_%\'';
$res2 = mysqli_query($a, $sql2);
while($t = mysqli_fetch_array($res2)){
$sql3 = 'SHOW COLUMNS FROM `'.ai($a, $t['Tables_in_'.$base]).'`';
$res3 = mysqli_query($a, $sql3);
while($colunas = mysqli_fetch_array($res3)){
if($colunas['Field'] == 'id_'.$ttabelas['nome']){
$sql4 = 'SHOW TABLE STATUS WHERE Name = \''.ai($a, $t['Tables_in_'.$base]).'\'';
$res4 = mysqli_query($a, $sql4);
$nome_tabela = mysqli_fetch_array($res4);
if($nome_tabela['Comment']){
$rrelacionamentos[] = $nome_tabela['Comment'];
}
}
}
}
if(is_array($rrelacionamentos)){
$sql2 = 'UPDATE ttabelas SET relacionamentos = \''.ai($a, implode(', ', $rrelacionamentos)).'\' WHERE id = \''.ai($a, $ttabelas['id']).'\'';
$res2 = mysqli_query_erro($a, $sql2);
}
}
if(is_array($array_permissoes)){
$sql = 'INSERT INTO `ppermissoes` (`id`, `id_pperfis`, `id_ttabelas`, `id_ccampos`, `id_aacoes`, `permissao`) VALUES
'.implode(', ', $array_permissoes);
$res = mysqli_query_erro($a, $sql);
}
unset($id_ppermissoes);
unset($array_permissoes);
}
atualizar($a, $base);
}
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"pPerfis" cadastrados(as)';
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
<h1>pPerfis</h1>
<p><a href="pperfis-listar.php?atualizar=true" style="margin-left:10px;"><i class="fas fa-redo-alt"></i> Atualizar Permissões</a></p>
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
if($_GET['excluir'] && $_SESSION['permissao']['pperfis']['excluir']){
if(filhos($a, $base, 'pperfis', $_GET['excluir'])){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este registro possui cadastro(s) relacionado(s)!</div>
<?php
}
else {
apaga_arquivos($a, 'pPerfis', $_GET['excluir']);
$sql = 'DELETE FROM `pperfis` WHERE'.sql_subordinacao($a, 'pperfis').' `id` = \''.ai($a, $_GET['excluir']).'\'';
$res = log_mysqli_query($a, $sql);
log_arquivos($a, 'DELETE');
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> &quot;pPerfis&quot; excluído(a) com sucesso!</div>
<?php
}
}
if($_POST){
$sql = 'SELECT `id` FROM `pperfis` WHERE 1=0 AND `id` <> \''.ai($a, $_POST['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
$pperfis = mysqli_fetch_array($res);
if($pperfis['id']){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Este(a) &quot;pPerfis&quot; já estava cadastrado(a)!</div>
<?php
}
else {
if(!$_POST['editar'] && $_SESSION['permissao']['pperfis']['cadastrar']){
$sql = permissao_campos('INSERT INTO `pperfis` SET 
`nome` = \''.ai($a, $_POST['nome']).'\'');
$res = log_mysqli_query($a, $sql);
$id = mysqli_insert_id($a);
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> pPerfis cadastrado(a) com sucesso!</div>
<?php
}
else if($_POST['editar'] && $_SESSION['permissao']['pperfis']['editar']){
$x = 0;
$sql = permissao_campos('UPDATE `pperfis` SET 
`nome` = \''.ai($a, $_POST['nome']).'\' 
WHERE `id` = \''.ai($a, $_POST['editar']).'\'');
$res = log_mysqli_query($a, $sql);
$id = $_POST['editar'];
$_GET['propriedade'][] = 'id'; $_GET['de'][] = $id; $_GET['ate'][] = $id;
?>
<div class="alert alert-success" role="alert"><strong>Ok!</strong> pPerfis alterado(a) com sucesso!</div>
<?php
}
}
}
$_GET['tabela'] = 'pperfis';
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
<form id="form1" name="form1" method="get" action="pperfis-listar.php">
<input type="hidden" name="exibir" value="<?php echo strip_tags($_GET['exibir']); ?>">
<?php
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
$_SESSION['tabela'] = 'pperfis';
include('inc.sql-filtro.php');
if($_GET['order'] && $_GET['by']){
$sql_order_by = 'ORDER BY '.ai($a, $_GET['by']).' '.ai($a, $_GET['order']);
}
else {
$sql_order_by = 'ORDER BY `pperfis`.`id` DESC';
}
$sql = 'SELECT 
`pperfis`.`id`, 
`pperfis`.`nome` 
FROM `pperfis`  
WHERE'.$sql_filtro.' 1=1 
'.$sql_order_by;
$_SESSION['sql'] = $sql;
$_SESSION['titulo'] = 'pPerfis';
?>
<h2 style="margin:15px;">&quot;pPerfis&quot; cadastrados(as)</h2>
<?php
include('inc.url-paginacao.php');
$url = 'pperfis-listar.php?'.$url;
include('inc.pre-paginacao.php');
include('inc.paginacao.php');
if($_GET['exibir'] == 'agenda'){
?>
<div id="calendar" style="margin: 15px; min-height: 800px;"></div>
<?php
while($pperfis = mysqli_fetch_array($res)) {
$fullcalendar[] = '{
title: \''.str_replace('\'', ' ', $pperfis[primeiro_campo_nativo($a, 'pperfis')]).'\',
url: \'pperfis-cadastrar.php?editar='.$pperfis['id'].'\',
start: \''.$pperfis[primeiro_campo_data($a, 'pperfis')].'\',
end: \''.$pperfis[primeiro_campo_data($a, 'pperfis')].'\',
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
<?php if($_SESSION['permissao']['pperfis']['nome']['visualizar']){ ?>
<td><?php ordenar($url, '`pperfis`.`nome`'); ?><strong>Nome</strong></td>
<?php } ?>
<td></td>
<td></td>
</tr>
<?php
while($pperfis = mysqli_fetch_array($res)) {
?>
<tr>
<?php if($_SESSION['permissao']['pperfis']['nome']['visualizar']){ ?>
<td><?php echo edicao_expressa($ttabela, 'nome', 'texto', $pperfis); ?></td>
<?php } ?>
<td>
<?php
$rrelacionamentos = array(); $pprefixo = 'pPerfis: ';
include('inc.relacionamentos.php');
?>
</td>
<td>
<?php if($_SESSION['permissao']['pperfis']['imprimir']){ ?><a href="imprimir-registro.php?tabela=pperfis&id=<?php echo $pperfis['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['duplicar']){ ?><a href="pperfis-listar.php?duplicar=<?php echo $pperfis['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['editar']){ ?><a href="pperfis-cadastrar.php?editar=<?php echo $pperfis['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['excluir']){ ?><a href="pperfis-listar.php?excluir=<?php echo $pperfis['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
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
while($pperfis = mysqli_fetch_array($res)) {
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="well">
<div style="text-align:right; margin-bottom: 5px;">
<?php if($_SESSION['permissao']['pperfis']['imprimir']){ ?><a href="imprimir-registro.php?tabela=pperfis&id=<?php echo $pperfis['id'] ?>" target="_blank" title="Imprimir registro" class="btn btn-default btn-xs"><i class="fas fa-print"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['duplicar']){ ?><a href="pperfis-listar.php?duplicar=<?php echo $pperfis['id'] ?>" title="Duplicar" class="btn btn-default btn-xs"><i class="far fa-clone"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['editar']){ ?><a href="pperfis-cadastrar.php?editar=<?php echo $pperfis['id'] ?>" title="Editar" class="btn btn-default btn-xs"><i class="fas fa-pencil-alt"></i></a><?php } ?> 
<?php if($_SESSION['permissao']['pperfis']['excluir']){ ?><a href="pperfis-listar.php?excluir=<?php echo $pperfis['id'] ?>" title="Excluir" onclick="return confirm('Deseja realmente excluir este item?')" class="btn btn-default btn-xs"><i class="far fa-trash-alt"></i></a><?php } ?> 
</div>
<?php if($_SESSION['permissao']['pperfis']['nome']['visualizar'] && $pperfis['nome']){ ?>
<div class="linha <?php echo linha_alternada(); ?>"><?php ordenar($url, '`pperfis`.`nome`', $exibiu); ?><strong>Nome</strong> <?php echo edicao_expressa($ttabela, 'nome', 'texto', $pperfis); ?></div>
<?php } ?>
<div class="linha" style="margin-top: 5px;">
<?php
$rrelacionamentos = array(); $pprefixo = 'pPerfis: ';
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
if(!$tr>0 && !isset($_GET['busca']) && $_SESSION['permissao']['pperfis']['cadastrar']){
?>
<meta http-equiv="refresh" content="1;URL=pperfis-cadastrar.php"> 
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