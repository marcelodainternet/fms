<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Parceiros'; $ttabela = 'parceiros'; $aarquivo = 'parceiros';

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
$llabel = 'Foto';
include('inc.componente-arquivo.php');
?>
<?php
$llabel = 'Status'; $cclasse = 'status_cadastro'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Função';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Data Expira';
include('inc.componente-data-hora.php');
?>
<?php
$llabel = 'Retorno';
include('inc.componente-data-hora.php');
?>
<?php
$llabel = 'CPF';
include('inc.componente-cpf.php');
?>
<?php
$llabel = 'Empresa';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CNPJ';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-cnpj.php');
?>
<?php
$llabel = 'E-mail';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'Senha';
include('inc.componente-senha.php');
?>
<?php
$llabel = 'E-mail 2';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'Telefone';
include('inc.componente-telefone.php');
?>
<?php
$llabel = 'Telefone 2';
include('inc.componente-telefone.php');
?>
<?php
$llabel = 'CEP';
include('inc.componente-cep.php');
?>
<?php
$llabel = 'Endereço';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Número';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Complemento';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Bairro';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cidade';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Estado';
include('inc.componente-estado.php');
?>
<?php
$llabel = 'PIX';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Banco';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Agência';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Conta';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Tipo de Conta';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Obs';
include('inc.componente-texto-grande.php');
?>
<?php
$llabel = 'Enexo(s)';
include('inc.componente-arquivo-upload-multiplo.php');
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

