<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'listar';
$cclasse = 'pPermissões'; $ttabela = 'ppermissoes'; $aarquivo = 'ppermissoes';
include('inc.subordinacao.php');
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = '"pPermissões" cadastrados(as)';
include('inc.head.php');
?>
</head>
<body>
<?php
include('inc.menu.php');
?>
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<h1>pPermissões</h1>
<p><a href="ppermissoes-listar.php?todos=true"><i class="fas fa-eraser"></i> Limpar Filtros</a></p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
<?php include('inc.logotipo.php'); ?>
</div>
</div>
</div>
</div>
<div class="container">
<ol class="breadcrumb">
<li><a href="inicial.php">Inicial</a></li>
<li class="active">"pPermissões" cadastrados(as)</li>
</ol>
<?php
$_GET['tabela'] = 'ppermissoes';
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
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
<div class="row">
<form id="form1" name="form1" method="get" action="ppermissoes-listar.php">
<?php
$filtrar = 'pperfis'; $propriedade = 'nome';
$limite = 100;
include('inc.filtro.php');
//
$filtrar = 'ttabelas'; $propriedade = 'nome';
$limite = 1000;
include('inc.filtro.php');
//
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<select name="id_ccampos[]" class="form-control selectpicker" data-live-search="true" multiple size="1" style="opacity: 0.1">
<option value="" selected="selected">Filtrar por ccampos</option>
<?php
$sql = 'SELECT id, nome FROM ttabelas ORDER BY nome';
$res = mysqli_query_erro($a, $sql);
while($ttabelas = mysqli_fetch_array($res)){
?>
<optgroup label="<?php echo $ttabelas['nome'] ?>">
<?php
$sql2 = 'SELECT * FROM ccampos WHERE id_ttabelas = \''.ai($a, $ttabelas['id']).'\'';
$res2 = mysqli_query_erro($a, $sql2);
while($ccampos = mysqli_fetch_array($res2)){
?>
<option value="<?php echo $ccampos['id'] ?>" <?php if(is_array($_GET['id_ccampos'])){ if(in_array($ccampos['id'], $_GET['id_ccampos'])){ ?>selected<?php } } ?>><?php echo $ccampos['nome'] ?></option>
<?php
}
?>
</optgroup>
<?php
}
?>
</select>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<button class="btn btn-default" type="submit"><i class="fas fa-filter"></i> Filtrar</button>
</div>
<div style="clear:both"></div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
if(is_array($_GET['id_pperfis'])){
$_GET['id_pperfis'] = array_filter($_GET['id_pperfis'], 'strlen');
}
if(is_array($_GET['id_ttabelas'])){
$_GET['id_ttabelas'] = array_filter($_GET['id_ttabelas'], 'strlen');
}
if(is_array($_GET['id_ccampos'])){
$_GET['id_ccampos'] = array_filter($_GET['id_ccampos'], 'strlen');
}
if($_GET['id_pperfis'] || $_GET['id_ttabelas'] || $_GET['id_ccampos']){ ?>
<div class="row">
<h2 style="margin:15px;">Selecione as permissões desejadas</h2>
<?php
if($_GET['id_pperfis']){
$sql = 'SELECT * FROM pperfis WHERE id IN('.implode_if_is_array(', ', $_GET['id_pperfis']).') ORDER BY id DESC';	
}
else {
$sql = 'SELECT * FROM pperfis ORDER BY id DESC';	
}
$res = mysqli_query_erro($a, $sql);
while($pperfis = mysqli_fetch_array($res)){
$sql2 = 'SELECT * FROM ppermissoes WHERE id_pperfis = \''.ai($a, $pperfis['id']).'\'';
$res2 = mysqli_query_erro($a, $sql2);
while($ppermissoes = mysqli_fetch_array($res2)){
$id_ppermissoes[$ppermissoes['id_pperfis']][$ppermissoes['id_ttabelas']][$ppermissoes['id_ccampos']][$ppermissoes['id_aacoes']] = $ppermissoes['id'];
$permissao_ppermissoes[$ppermissoes['id']] = $ppermissoes['permissao'];
}
?>
<div class="container" style="margin-bottom: 20px;">
<div class="panel-group" role="tablist" style="margin: 0px; margin-top: 5px;">
<div class="panel panel-default">
<div class="panel-heading" role="tab" style="background-color: #aaa">
<h4 class="panel-title">
<i class="fa fa-users"></i> Perfil "<?php echo $pperfis['nome'] ?>"
</h4>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body" id="total<?php echo $pperfis['id'] ?>">
<?php
if(!$_GET['id_ttabelas'] && !$_GET['id_ccampos']){
$sql2 = 'SELECT * FROM aacoes ORDER BY id';
$res2 = mysqli_query_erro($a, $sql2);
while($aacoes = mysqli_fetch_array($res2)){
?>
<span style="margin-right: 5px"><input autocomplete="<?php echo rand(); ?>" type="checkbox" id="perfil_<?php echo $pperfis['id'] ?>acao_<?php echo $aacoes['id'] ?>" <?php if($_SESSION['permissao_total'][$_GET['id_pperfis']][$aacoes['id']] == 'Sim'){ ?>value="Não" checked <?php } else { ?>value="Sim" <?php } ?>onChange="permissao_total(<?php echo $pperfis['id'] ?>,<?php echo $aacoes['id'] ?>,this.value);"> <label for="perfil_<?php echo $pperfis['id'] ?>acao_<?php echo $aacoes['id'] ?>" style="font-weight:normal"><?php echo $aacoes['nome'] ?></label></span>
<?php
}
}
?>
<div class="panel-group" role="tablist" style="margin: 0px; margin-top: 5px;">
<?php
if($_GET['id_ttabelas']){
$sql2 = 'SELECT * FROM ttabelas WHERE id IN('.implode_if_is_array(', ', $_GET['id_ttabelas']).') ORDER BY nome';	
}
else if($_GET['id_ccampos']){
$sql2 = 'SELECT * FROM ttabelas WHERE id IN(SELECT id_ttabelas FROM ccampos WHERE id IN('.implode_if_is_array(', ', $_GET['id_ccampos']).')) ORDER BY nome';
}
else {
$sql2 = 'SELECT * FROM ttabelas ORDER BY nome';	
}
$res2 = mysqli_query_erro($a, $sql2);
while($ttabelas = mysqli_fetch_array($res2)){
?>
<div class="panel panel-default">
<div class="panel-heading" role="tab" style="background-color: #ccc">
<h4 class="panel-title">
<i class="fa fa-th-large"></i> <?php echo $ttabelas['nome'] ?>
</h4>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="h2_<?php echo $ttabelas['id'] ?>">
<div class="panel-body" id="p<?php echo $pperfis['id'] ?>tabela<?php echo $ttabelas['id'] ?>"> 
<?php
if(!$_GET['id_ccampos']){
$sql3 = 'SELECT * FROM aacoes ORDER BY id';
$res3 = mysqli_query_erro($a, $sql3);
while($aacoes = mysqli_fetch_array($res3)){
$id = $id_ppermissoes[$pperfis['id']][$ttabelas['id']][0][$aacoes['id']];
?>
<span style="margin-right: 5px"><input autocomplete="<?php echo rand(); ?>" type="checkbox" id="perfil_<?php echo $pperfis['id'] ?>campo_<?php echo $id ?>" <?php if($permissao_ppermissoes[$id] == 'Sim'){ ?>value="Não" checked <?php } else { ?>value="Sim" <?php } ?>onChange="permissao_tabela(<?php echo $pperfis['id'] ?>,<?php echo $ttabelas['id'] ?>,<?php echo $aacoes['id'] ?>,this.value);"> <label for="perfil_<?php echo $pperfis['id'] ?>campo_<?php echo $id ?>" style="font-weight:normal"><?php echo $aacoes['nome'] ?></label></span>
<?php
}
}
?>
<div class="panel-group" role="tablist" style="margin: 0px; margin-top: 5px;">
<?php
if($_GET['id_ccampos']){
$sql_filtro = ' id IN('.implode_if_is_array(', ', $_GET['id_ccampos']).') AND';
}
$sql3 = 'SELECT * FROM ccampos WHERE'.$sql_filtro.' id_ttabelas = \''.ai($a, $ttabelas['id']).'\'';	
$res3 = mysqli_query_erro($a, $sql3);
while($ccampos = mysqli_fetch_array($res3)){
?>
<div class="panel panel-default">
<div class="panel-heading" role="tab" style="background-color: #eee">
<h4 class="panel-title">
<i class="fa fa-th-list"></i> <?php echo $ccampos['nome'] ?>
</h4>
</div>
<div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="h3_<?php echo $ccampos['id'] ?>">
<div class="panel-body">
<?php
$sql4 = 'SELECT * FROM aacoes ORDER BY id';
$res4 = mysqli_query_erro($a, $sql4);
while($aacoes = mysqli_fetch_array($res4)){
$id = $id_ppermissoes[$pperfis['id']][$ttabelas['id']][$ccampos['id']][$aacoes['id']];
?>
<span id="p<?php echo $pperfis['id'] ?>span<?php echo $id ?>" style="margin-right: 5px"><input autocomplete="<?php echo rand(); ?>" type="checkbox" id="campo_<?php echo $id ?>" <?php if($permissao_ppermissoes[$id] == 'Sim'){ ?>value="Não" checked <?php } else { ?>value="Sim" <?php } ?>onChange="permissao_campo(<?php echo $pperfis['id'] ?>,<?php echo $id ?>,'<?php echo urlencode($aacoes['nome']); ?>',this.value);" <?php if($aacoes['nome'] == 'Excluir' || $aacoes['nome'] == 'Duplicar'){ ?>disabled="disabled"<?php } ?>> <label for="campo_<?php echo $id ?>" style="font-weight:normal;"><?php echo $aacoes['nome'] ?></label></span>
<?php
}
?>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
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