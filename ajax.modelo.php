<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = '?'; $ttabela = '?'; $aarquivo = '?';
$v = array_keys($_GET);
for($x=0;$x<conta($v);$x++){
${$ttabela}[$v[$x]] = $_GET[$v[$x]];
}
?>

<?php
/*
$llabel = '?'; $cclasse = '?'; $ppropriedade = '?';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
*/
?>

<!-- conteúdo da tag form -->


<script type="text/javascript">
$('.with-ajax').selectpicker().ajaxSelectPicker({ ajax: { type: 'POST', dataType: 'json', data: { q: '{{{q}}}' } }, minLength: 0, preprocessData: function (data) { var i, l = data.length, array = []; if (l) { for (i = 0; i < l; i++) { array.push($.extend(true, data[i], { text : data[i].text, value: data[i].value })); } } return array; } });
$('.selectpicker').selectpicker({
noneSelectedText : 'Selecione'
});
</script>
