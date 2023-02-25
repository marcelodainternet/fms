<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Seções'; $ttabela = 'secoes'; $aarquivo = 'secoes';

$sql = 'SHOW COLUMNS FROM '.ai($a, $ttabela);
$res = mysqli_query($a, $sql);
while($tabela = mysqli_fetch_array($res)){
if(substr($tabela['Field'], 0, 3) == 'id_'){
$restringir[] = $tabela['Field'];
}
}

$v = array_keys($_GET);
for($x=0;$x<conta($v);$x++){
${$ttabela}[$v[$x]] = $_GET[$v[$x]];
}

${$ttabela}['id'] = $_GET['editar'];

?>

<?php
$llabel = 'Site'; $cclasse = 'site'; $ppropriedade = 'site';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Nome';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Imagem';
include('inc.componente-arquivo.php');
?>
<?php
$llabel = 'Status'; $cclasse = 'status_site'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Data Expira';
include('inc.componente-data-hora.php');
?>
<?php
$llabel = 'Ordem';
include('inc.componente-numero-inteiro.php');
?>
<?php
$llabel = 'Título';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Subtítulo';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Descrição';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Obs';
include('inc.componente-texto-grande.php');
?>
<?php
$llabel = 'Background';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CorTxt';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Container';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Borda';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Borda Cor';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Borda Sombra';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Arredondado';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Parallax';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Data Cadastro';
include('inc.componente-data-hora-atual-automatica.php');
?>

<div style="clear:both"></div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<input type="hidden" name="modal" value="<?php echo strip_tags($_GET['modal']); ?>">
<input type="hidden" name="editar" value="<?php echo strip_tags($_GET['editar']); ?>">

<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Enviar</button>
</div>
<div style="clear:both"></div>

<script type="text/javascript">
$('.with-ajax').selectpicker().ajaxSelectPicker({ ajax: { type: 'POST', dataType: 'json', data : { q: '{{{q}}}' } }, minLength: 0, preprocessData: function (data) { var i, l = data.length, array = []; if (l) { for (i = 0; i < l; i++) { array.push($.extend(true, data[i], { text : data[i].text, value: data[i].value })); } } return array; } });
$('.selectpicker').selectpicker({
noneSelectedText : 'Selecione'
});
</script>

<?php if(is_array($campos_telefone)){ ?>
<script type="text/javascript">

<?php echo implode('
', $campos_telefone); ?>

</script>
<?php } unset($campos_telefone); ?>

