<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if($_SESSION['permissao'][$_GET['tabela']]['id_'.$_GET['campo']]['edicaoexpressa']){
if($_GET['salvar']){
$valor = sql($a, 'SELECT '.ai($a, $_GET['primeiro_campo']).' AS valor FROM '.ai($a, $_GET['campo']).' WHERE id = \''.ai($a, $_GET['valor']).'\'');
echo $valor;
if($_SESSION['permissao'][$_GET['campo']]['visualizar']){
echo ' <a href="'.str_replace('_', '-', strip_tags($_GET['campo'])).'-listar.php?busca='.urlencode($valor).'"><i class="fas fa-external-link-alt"></i></a>';
}
$sql = permissao_campos('UPDATE `'.ai($a, $_GET['tabela']).'` SET `id_'.ai($a, $_GET['campo']).'` = \''.ai($a, $_GET['valor']).'\' WHERE `id` = \''.ai($a, $_GET['id']).'\'');
$res = log_mysqli_query($a, $sql);
}
else {
$ttabela = strip_tags($_GET['tabela']);
${$ttabela}['id_'.$_GET['campo']] = sql($a, 'SELECT id_'.ai($a, $_GET['campo']).' AS valor FROM '.ai($a, $_GET['tabela']).' WHERE id = \''.ai($a, $_GET['id']).'\'');
$ppropriedade = strip_tags($_GET['primeiro_campo']);
$pparametros[] = 'onblur="salva_edicao_expressa_relacionamento(\''.strip_tags($_GET['tabela']).'\',\''.strip_tags($_GET['campo']).'\',\''.strip_tags($_GET['componente']).'\','.strip_tags($_GET['id']).',this.value,\''.strip_tags($_GET['nome']).'\',\''.strip_tags($_GET['primeiro_campo']).'\');"';
include('inc.componente-edicao-expressa-'.strip_tags($_GET['componente']).'.php');
?>
<script type="text/javascript">document.getElementById('<?php echo strip_tags($ppropriedade.$_GET['id']); ?>').focus();</script>
<?php
}
}
?>