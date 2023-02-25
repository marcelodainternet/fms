<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if($_SESSION['permissao'][$_GET['tabela']][$_GET['campo']]['edicaoexpressa']){
if($_GET['salvar']){
if($_GET['componente'] == 'moeda'){
$_GET['valor'] = moeda_mysql($_GET['valor']);
}
echo formata($_GET['valor'], $_GET['componente'], $_GET['exibir']);
if($_GET['componente'] == 'html'){
$valor = ai($a, $_GET['valor'], true);
}
else {
$valor = ai($a, $_GET['valor']);
}
$sql = permissao_campos('UPDATE `'.ai($a, $_GET['tabela']).'` SET `'.ai($a, $_GET['campo']).'` = \''.$valor.'\' WHERE `id` = \''.ai($a, $_GET['id']).'\'');
$res = log_mysqli_query($a, $sql);
}
else {
$ttabela = strip_tags($_GET['tabela']);
${$ttabela}[$_GET['campo']] = sql($a, 'SELECT '.ai($a, $_GET['campo']).' AS valor FROM '.ai($a, $_GET['tabela']).' WHERE id = \''.ai($a, $_GET['id']).'\'');
$ppropriedade = strip_tags($_GET['campo']);
$pparametros[] = 'onblur="salva_edicao_expressa(\''.strip_tags($_GET['tabela']).'\',\''.strip_tags($_GET['campo']).'\',\''.strip_tags($_GET['componente']).'\','.strip_tags($_GET['id']).',this.value,\''.strip_tags($_GET['exibir']).'\');"';
include('inc.componente-edicao-expressa-'.strip_tags($_GET['componente']).'.php');
?>
<script type="text/javascript">document.getElementById('<?php echo strip_tags($ppropriedade.$_GET['id']); ?>').focus();</script>
<?php
}
}
else {
$ttabela = strip_tags($_GET['tabela']);
${$ttabela}[$_GET['campo']] = sql($a, 'SELECT '.ai($a, $_GET['campo']).' AS valor FROM '.ai($a, $_GET['tabela']).' WHERE id = \''.ai($a, $_GET['id']).'\'');
echo formata(${$ttabela}[$_GET['campo']], $_GET['componente'], $_GET['exibir']);
}
?>