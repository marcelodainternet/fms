<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
error_reporting("E_ALL & ~E_DEPRECATED & ~E_STRICT");
ini_set("display_errors", 1);
list($usec, $sec) = explode(' ', microtime());
$script_start = (float) $sec + (float) $usec;
include('../inc.funcoes.php');
if($_POST){
@$teste = mysqli_connect($_POST['host'], $_POST['usuario'], $_POST['senha'], $_POST['base']);
if($teste){
$fonte = file_get_contents('../inc.iconnect.php');
$fonte = str_replace('$host = \'localhost\';', '$host = \''.strip_tags($_POST['host']).'\';', $fonte);
$fonte = str_replace('$usuario = \'root\';', '$usuario = \''.strip_tags($_POST['usuario']).'\';', $fonte);
$fonte = str_replace('$senha = \'\';', '$senha = \''.strip_tags($_POST['senha']).'\';', $fonte);
$fonte = str_replace('$base = \'base\';', '$base = \''.strip_tags($_POST['base']).'\';', $fonte);
grava_arquivo('../inc.iconnect.php', $fonte);
include('../inc.iconnect.php');
$arquivo_sql = arquivos_em_ordem('../sql/');
$sql_base = file_get_contents('../sql/'.$arquivo_sql[1]);
$sql_base = explode(';', $sql_base);
for($x=0;$x<conta($sql_base);$x++){
$sql = utf8_encode(trim($sql_base[$x]));
if($sql){
$res = mysqli_query_erro($a, $sql);
}
}
header('Location: ../?instalado=true');
exit;
}
else {
$erro = true;
}
}
if(!$_POST['host']){
$_POST['host'] = 'localhost';
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Instale o sistema no seu servidor</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<script src="../js/funcoes.js"></script>
</head>
<body>
<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Sistema Web Para</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="./">Sistema Web Para</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
</div>
</div>
</nav>
<div class="jumbotron">
<div class="container">
<h1>Quase lá...</h1>
<p>Para configurar a conexão com o banco de dados MySQL siga os passo abaixo:</p>
</div>
</div>
<div class="container">
<ol class="breadcrumb">
<li><a href="inicial.php">Inicial</a></li>
<li class="active">Instale o sistema no seu servidor</li>
</ol>
<div class="row">
<ol style="font-size: 18px;">
<li>Acesse o painel de controle do seu servidor</li>
<li>Crie uma nova base de dados MySQL</li>
<li>Crie um novo usuário MySQL</li>
<li>Atribua as permissões do usuário sobre a base de dados</li>
<li>Obs: Não é necessário importar o arquivo SQL! Este assistente fará isso automaticamente.</li>
</ol>
</div>
<?php
if($erro){
?>
<div class="alert alert-danger" role="alert"><strong>Erro!</strong> Não foi possível conectar! Confira os dados e tente novamente.</div>
<?php
}
?>
<div class="row">
<form id="form1" name="form1" method="post" action="./" enctype="multipart/form-data">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloco">
<div class="well">
<label for="host">Host <i class="fas fa-asterisk"></i></label>
<input type="text" maxlength="255" required="required" name="host" id="host" class="form-control" value="<?php echo strip_tags($_POST['host']); ?>" />
<div style="font-style: italic;">Endereço do seu servidor MySQL, pode ser um IP ou um endereço, geralmente funciona com localhost</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloco">
<div class="well">
<label for="base">Base <i class="fas fa-asterisk"></i></label>
<input type="text" maxlength="255" required="required" name="base" id="base" class="form-control" value="<?php echo strip_tags($_POST['base']); ?>" />
<div style="font-style: italic;">Nome da base de dados MySQL que você criou</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloco">
<div class="well">
<label for="usuario">Usuário <i class="fas fa-asterisk"></i></label>
<input type="text" maxlength="255" required="required" name="usuario" id="usuario" class="form-control" value="<?php echo strip_tags($_POST['usuario']); ?>" />
<div style="font-style: italic;">Nome do usuário MySQL que você criou</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloco">
<div class="well">
<label for="senha">Senha</label>
<input type="text" maxlength="255" name="senha" id="senha" class="form-control" value="<?php echo strip_tags($_POST['senha']); ?>" />
<div style="font-style: italic;">Senha do usuário MySQL que você criou</div>
</div>
</div>
<div style="clear:both"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloco">
<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Verificar e Instalar</button>
</div>
<div style="clear:both"></div>
</form>
</div>
<hr>
<footer>
<p>&copy; <a href="http://sistema-web-para.com.br" target="_blank">Sistema Web Para ...</a></p>
<p style="text-align:right; font-size:11px;">...</p>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>