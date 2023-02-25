<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if($_GET['id_usuarios'] && $_SESSION['permissao']['usuarios']['visualizar']){
for($x=0;$x<conta($_SESSION['subordinacoes']);$x++){
if(in_array('usuarios.'.$_SESSION['subordinacoes'][$x], campos_tabela($a, 'usuarios'))){
$sql_filtro .= ' usuarios.'.$_SESSION['subordinacoes'][$x].' = \''.ai($a, $_SESSION[$_SESSION['subordinacoes'][$x].'_usuarios']).'\' AND';
}
}
$sql = 'SELECT * FROM usuarios WHERE'.$sql_filtro.' id = \''.ai($a, $_GET['id_usuarios']).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
session_destroy();
session_start();
$_SESSION['id_usuarios'] = $usuarios['id'];
$_SESSION['nome_usuarios'] = $usuarios['nome'];
$_SESSION['id_pperfis'] = $usuarios['id_pperfis'];
$sql = 'SHOW COLUMNS FROM usuarios WHERE Field <> \'id_pperfis\'';
$res = mysqli_query_erro($a, $sql);
while($campos = mysqli_fetch_array($res)){
if(strpos('_'.$campos['Field'], 'id_') && $usuarios[$campos['Field']]){
$_SESSION['subordinacoes'][] = $campos['Field'];
$_SESSION[$campos['Field'].'_usuarios'] = $usuarios[$campos['Field']];
}
}
$sql = 'SELECT ppermissoes.id_ccampos, ttabelas.nome AS tabela, ccampos.nome AS campo, aacoes.nome AS acao, ppermissoes.permissao FROM ppermissoes LEFT JOIN ttabelas ON ttabelas.id = ppermissoes.id_ttabelas LEFT JOIN ccampos ON ccampos.id = ppermissoes.id_ccampos LEFT JOIN aacoes ON aacoes.id = ppermissoes.id_aacoes WHERE ppermissoes.id_pperfis = \''.ai($a, $usuarios['id_pperfis']).'\'';
$res = mysqli_query_erro($a, $sql);
while($ppermissoes = mysqli_fetch_array($res)){
if($ppermissoes['id_ccampos'] == 0){ // tabela
@$_SESSION['permissao'][$ppermissoes['tabela']][prepara_nome($ppermissoes['acao'],'')] = escolha($ppermissoes['permissao'], 'Sim,Não', '1,0');
}
else {
@$_SESSION['permissao'][$ppermissoes['tabela']][$ppermissoes['campo']][prepara_nome($ppermissoes['acao'],'')] = escolha($ppermissoes['permissao'], 'Sim,Não', '1,0');
}
}
$_SESSION['permissao']['usuarios']['senha']['visualizar'] = 0;
header('Location: inicial.php');
exit;
}
?>
<!doctype html>
<html>
<head>
<?php
$ttitulo = 'Inicial';
include('inc.head.php');
?>
<link href="css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
<?php
include('inc.menu.php');
?>
<div class="jumbotron">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<h1>Inicial</h1>
<p>Seja Bem Vindo(a)!</p>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
<?php include('inc.logotipo.php'); ?>
</div>
</div>
</div>
</div>
<div class="container">
<ol class="breadcrumb">
<li class="active">Inicial</li>
</ol>
<div class="row">
<form id="form1" name="form1" method="get" action="inicial.php" style="margin-bottom: 15px;">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloco">
<div class="input-group">
<input autocomplete="<?php echo rand(); ?>" type="text" name="busca" class="form-control" placeholder="Busca" value="<?php echo $_GET['busca'] ?>">
<span class="input-group-btn">
<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
</span>
</div>
</div>
<div style="clear:both"></div>
</form>
<?php
if($_GET['busca']){
?>
<div style="margin-bottom: 15px;">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px;">
<?php
$sql = 'SELECT * FROM `ttabelas` WHERE nome <> \'llogs\' ORDER BY nome';
$res = mysqli_query_erro($a, $sql);
while($ttabelas = mysqli_fetch_array($res)){
if($_SESSION['permissao'][$ttabelas['nome']]['visualizar']){
unset($sql_campos);
$sql2 = 'SELECT * FROM `ccampos` WHERE id_ttabelas = \''.ai($a, $ttabelas['id']).'\' ORDER BY nome';
$res2 = mysqli_query_erro($a, $sql2);
while($ccampos = mysqli_fetch_array($res2)){
$sql_campos[] = '`'.$ccampos['nome'].'` LIKE\'%'.ai($a, $_GET['busca']).'%\'';
}
$resultados = sql($a, 'SELECT COUNT(*) AS valor FROM '.$ttabelas['nome'].' WHERE'.sql_subordinacao($a, $ttabelas['nome']).' 1=1 AND ('.implode(' OR ', $sql_campos).')');
if($resultados){
$encontrados++;
?>
<div style="margin-bottom: 5px;">
<a href="<?php echo str_replace('_', '-', $ttabelas['nome']); ?>-listar.php?busca=<?php echo urlencode(strip_tags($_GET['busca'])); ?>"><strong><?php echo $resultados ?></strong> resultado(s) com o termo <strong>"<?php echo strip_tags($_GET['busca']); ?>"</strong> em <strong>"<?php echo $ttabelas['nome'] ?>"</strong></a>
</div>
<?php
}
}
}
if(!$encontrados){
?>
<div style="margin-bottom: 5px;">
<strong>Nenhum</strong> resultado com o termo <strong>"<?php echo strip_tags($_GET['busca']); ?>"</strong>
</div>
<?php
}
?>
</div>
</div>
</div>
<?php } ?>
<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-comments fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge">26</div>
<div>New Comments!</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-tasks fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge">12</div>
<div>New Tasks!</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-shopping-cart fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge">124</div>
<div>New Orders!</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fas fa-life-ring fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge">13</div>
<div>Support Tickets!</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8">
<div class="panel panel-default">
<div class="panel-heading">
<i class="fas fa-chart-bar"></i> Area Chart Example
<div class="pull-right">
<div class="btn-group">
<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
Actions
<span class="caret"></span>
</button>
<ul class="dropdown-menu pull-right" role="menu">
<li><a href="#">Action</a>
</li>
<li><a href="#">Another action</a>
</li>
<li><a href="#">Something else here</a>
</li>
<li class="divider"></li>
<li><a href="#">Separated link</a>
</li>
</ul>
</div>
</div>
</div>
<div class="panel-body">
<div id="morris-area-chart"></div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="fas fa-chart-bar"></i> Bar Chart Example
<div class="pull-right">
<div class="btn-group">
<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
Actions
<span class="caret"></span>
</button>
<ul class="dropdown-menu pull-right" role="menu">
<li><a href="#">Action</a>
</li>
<li><a href="#">Another action</a>
</li>
<li><a href="#">Something else here</a>
</li>
<li class="divider"></li>
<li><a href="#">Separated link</a>
</li>
</ul>
</div>
</div>
</div>
<div class="panel-body">
<div class="row">
<div class="col-lg-4">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>#</th>
<th>Date</th>
<th>Time</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>3326</td>
<td>10/21/2013</td>
<td>3:29 PM</td>
<td>$321.33</td>
</tr>
<tr>
<td>3325</td>
<td>10/21/2013</td>
<td>3:20 PM</td>
<td>$234.34</td>
</tr>
<tr>
<td>3324</td>
<td>10/21/2013</td>
<td>3:03 PM</td>
<td>$724.17</td>
</tr>
<tr>
<td>3323</td>
<td>10/21/2013</td>
<td>3:00 PM</td>
<td>$23.71</td>
</tr>
<tr>
<td>3322</td>
<td>10/21/2013</td>
<td>2:49 PM</td>
<td>$8345.23</td>
</tr>
<tr>
<td>3321</td>
<td>10/21/2013</td>
<td>2:23 PM</td>
<td>$245.12</td>
</tr>
<tr>
<td>3320</td>
<td>10/21/2013</td>
<td>2:15 PM</td>
<td>$5663.54</td>
</tr>
<tr>
<td>3319</td>
<td>10/21/2013</td>
<td>2:13 PM</td>
<td>$943.45</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-lg-8">
<div id="morris-bar-chart"></div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-bell fa-fw"></i> Notifications Panel
</div>
<div class="panel-body">
<div class="list-group">
<a href="#" class="list-group-item">
<i class="fa fa-comment fa-fw"></i> New Comment
<span class="pull-right text-muted small"><em>4 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fab fa-twitter"></i> 3 New Followers
<span class="pull-right text-muted small"><em>12 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-envelope fa-fw"></i> Message Sent
<span class="pull-right text-muted small"><em>27 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-tasks fa-fw"></i> New Task
<span class="pull-right text-muted small"><em>43 minutes ago</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-upload fa-fw"></i> Server Rebooted
<span class="pull-right text-muted small"><em>11:32 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-bolt fa-fw"></i> Server Crashed!
<span class="pull-right text-muted small"><em>11:13 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fas fa-exclamation-triangle"></i> Server Not Responding
<span class="pull-right text-muted small"><em>10:57 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
<span class="pull-right text-muted small"><em>9:49 AM</em>
</span>
</a>
<a href="#" class="list-group-item">
<i class="fas fa-money-bill-alt"></i> Payment Received
<span class="pull-right text-muted small"><em>Yesterday</em>
</span>
</a>
</div>
<a href="#" class="btn btn-default btn-block">View All Alerts</a>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<i class="fas fa-chart-bar"></i> Donut Chart Example
</div>
<div class="panel-body">
<div id="morris-donut-chart"></div>
<a href="#" class="btn btn-default btn-block">View Details</a>
</div>
</div>
</div>
</div>
<?php include('inc.rodape.php'); ?>
<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/morris-data.js"></script>
<script src="js/sb-admin-2.js"></script>
</body>
</html>