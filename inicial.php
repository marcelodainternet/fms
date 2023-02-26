<?php
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
<html lang="pt-br">
<head>
<?php
$ttitulo = 'Inicial';
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $ttitulo ?></title>
<meta name="author" content="Marcelo Silveira (48) 99977-5791 WhatsApp">
<meta name="Reply-to" content="marcelodainternet@gmail.com">

<meta name="theme-color" content="#fff">
<meta name="msapplication-TitleColor" content="#fff">
<meta name="apple-mobile-web-app-status-bar-style" content="#fff">

<link rel="shortcut icon" type="image/x-icon" href="imgs/logo1.fw.png">
<meta name="msapplication-TitleImage" content="imgs/logo.fw.png">
<link rel="apple-touch-icon" sizes="152x152" href="imgs/logo1.fw.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="imgs/logo1.fw.png">

<link rel="manifest" href="manifest.json">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="With Manifest">

<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="css/base.css" rel="stylesheet" type="text/css">
<script src="js/funcoes.js"></script>

<meta http-equiv="refresh" content="3;URL=recados-listar.php">
</head>
<body style="overflow-x: hidden;" >
<div class="container">
<div class="row">
<div align="center" class="col-md-12">
<br><br><br><br><br><br><br><br><?php include('inc.logotipo.php'); ?>
<h2> Seja Bem Vindo(a)!</h2><br>
<img src="imgs/loading8.gif" width="80" >
<br><br><br><br><br><br>
</div>
</div>
</div>

<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/morris-data.js"></script>
<script src="js/sb-admin-2.js"></script>
</body>
</html>