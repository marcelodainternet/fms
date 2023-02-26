<?php
if(!$_GET['instalado'] && is_dir('instalar/')){
header('Location: instalar/');
exit;
}
session_start();
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if($_GET['sair']){
session_destroy();
header('Location: ./');
exit;
}
if($_POST){
$tentativas = sql($a, 'SELECT COUNT(*) AS valor FROM llogs WHERE sql_executado LIKE \'%Tentativa de login com e-mail ou senha inválidos: '.ai($a, $_POST['e_mail']).'%\' AND data_hora > \''.date('Y-m-d H:i:s', mktime(date('H')-1,date('i'),date('s'),date('n'),date('j'),date('Y'))).'\'');
if($tentativas > 3){
header('Location: esqueci-minha-senha.php');
exit;
}
$sql = 'SELECT * FROM usuarios WHERE e_mail = \''.ai($a, $_POST['e_mail']).'\' AND senha = \''.ai($a, md5($_POST['senha'])).'\'';
$res = mysqli_query_erro($a, $sql);
$usuarios = mysqli_fetch_array($res);
if(!$usuarios['id']){
$e_mail_ou_senha_invalidos = true;
$id_usuarios = sql($a, 'SELECT id AS valor FROM usuarios WHERE e_mail = \''.ai($a, $_POST['e_mail']).'\'');
$parametros = '$_GET: '.serialize($_GET).PHP_EOL;
$parametros .= '$_POST: '.serialize($_POST).PHP_EOL;
$session = $_SESSION; unset($session['swp_permissao']); unset($session['permissao']);
$parametros .= '$_SESSION: '.serialize($session).PHP_EOL;
$parametros .= '$_COOKIE: '.serialize($_COOKIE).PHP_EOL;
$parametros .= '$_FILES: '.serialize($_FILES).PHP_EOL;
$sql = 'INSERT INTO llogs SET id_usuarios = \''.ai($a, $id_usuarios).'\', ip = \''.ai($a, $_SERVER['REMOTE_ADDR']).'\', url = \''.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'\', arquivos = \'\', data_hora = \''.date('Y-m-d H:i:s').'\', sql_executado = \'Tentativa de login com e-mail ou senha inválidos: '.ai($a, $_POST['e_mail'].' '.$_POST['senha']).'\', parametros = \''.ai($a, $parametros, true).'\'';
$res = mysqli_query_erro($a, $sql);
}
else {
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
if($ppermissoes['id_ccampos'] == 0){
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
}
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php
$ttitulo = 'SISTEMA FMS';
include('inc.head.php');
?>
</head>
<body style="overflow-x: hidden;" >
<div class="container">
<div class="row">
<div align="center" class="col-md-12">
<br><?php include('inc.logotipo.php'); ?>
<h3><i class="fas fa-lock"></i> Acesso restrito aos usuários!</h3>
<p>Entre com seu e-mail e senha de cadastro.</p>
</div>
</div>
</div>
<div class="container" style="margin-top:15px;">
<?php if($e_mail_ou_senha_invalidos){ ?>
<div align="center" class="alert alert-danger" role="alert"><strong>Erro!</strong> E-mail ou senha inválidos! </div><?php } ?>
<?php
if($_GET['instalado']){
if(is_dir('instalar/')){ rmrdir('instalar/'); }
?>
<div align="center" class="alert alert-success" role="alert"><strong>Ok!</strong> sistema instalado com sucesso! Faça o seu primeiro login com o e-mail: <strong>admin@admin.com.br</strong> senha: <strong>admin</strong> e altere seu e-mail e senha.</div>
<?php
}
?>
<div class="row">
<form id="form1" name="form1" method="post" action="./">

<div class="hidden-xs col-sm-2 col-md-3 col-lg-3"></div>
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="well">
<label for="e_mail">E-mail <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="far fa-envelope"></i></span>
<input type="email" required="required" name="e_mail" id="e_mail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="well">
<label for="senha">Senha <i class="fas fa-asterisk"></i></label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-lock"></i></span>
<input type="password" required="required" name="senha" id="senha" class="form-control">
<span toggle="#senha" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
</div>
</div>
<div class="hidden-xs col-sm-2 col-md-3 col-lg-3"></div>

<div style="clear:both"></div>
<div align="center" class="col-12">
<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Entrar</button>
</div>
<div style="clear:both"></div>
<div align="center" class="col-12" style="margin-top:20px;">
<a href="esqueci-minha-senha.php"><i class="fas fa-life-ring"></i> Esqueci minha senha</a> 
</div>
<div style="clear:both"></div>
</form>
</div>


<hr>
<footer class="row" padding-top:20px;">
<div align="center" class="col-12"> 
<p style="font-size:15px;"><?php echo date('Y'); ?>&copy; <a href="https://api.whatsapp.com/send?phone=5548998327848&text=Olá Marcelo, venho do SISTEMA FMS, você pode me atender?" target="_blanc">EducAdmin</a> Todos os direitos reservados.</p>
<p style="font-size:12px;">
<?php
list($usec, $sec) = explode(' ', microtime());
$script_end = (float) $sec + (float) $usec;
$tempo = round($script_end - $script_start, 5);
$memoria = round(((memory_get_peak_usage(true) / 1024) / 1024), 2);
?>
Execução: <?php echo $tempo ?> segundos. - 
Memória: <?php echo $memoria ?>MB - 
PHP: <?php echo phpversion(); ?> - 
MySQL: <?php echo sql($a, 'SELECT VERSION() as valor'); ?> - 
<?php echo date('d/m/Y H:i:s'); ?>
</p>
<p style="font-size:14px;">Desenvolvido por: <a href="https://api.whatsapp.com/send?phone=5548998327848&text=Olá Marcelo, venho do SISTEMA FMS, você pode me atender?" target="_blanc">Marcelo Silveira</a></p>

</div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="js/ajax-bootstrap-select.min.js"></script>
<script type="text/javascript"> $('.with-ajax').selectpicker().ajaxSelectPicker({ ajax: { type: 'POST', dataType: 'json', data: { q: '{{{q}}}' } }, minLength: 0, preprocessData: function (data) { var i, l = data.length, array = []; if (l) { for (i = 0; i < l; i++) { array.push($.extend(true, data[i], { text : data[i].text, value: data[i].value })); } } return array; } }); </script>

<script src="https://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="https://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script type="text/javascript">webshim.setOptions("forms-ext",{"date":{"calculateWidth":false,"openOnFocus":true}});webshim.polyfill("forms forms-ext");</script>

<?php if(is_array($campos_telefone)){ ?>
<script type="text/javascript">
window.onload = function(){
<?php echo implode('
', $campos_telefone); ?>
}
</script>
<?php } ?>


<?php mysqli_close($a); ?>


</div>
<script type="text/javascript">
$(".toggle-password").click(function() {
$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
input.attr("type", "text");
} else {
input.attr("type", "password");
}
});
</script>
<style type="text/css">
.field-icon {
float: right;
margin-right: 10px;
margin-top: -23px;
position: relative;
z-index: 2;
}
</style>
</body>
</html>