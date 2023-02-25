<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Site'; $ttabela = 'site'; $aarquivo = 'site';

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
$llabel = 'Site';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Nome';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Status'; $cclasse = 'status_site'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Logo';
include('inc.componente-arquivo.php');
?>
<?php
$llabel = 'Responsável';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cargo';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Fone';
include('inc.componente-telefone.php');
?>
<?php
$llabel = 'Email';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'Aberto';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
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
$llabel = 'Palavras Chaves';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Descrição';
include('inc.componente-texto-grande.php');
?>
<?php
$llabel = 'Logo2';
include('inc.componente-arquivo.php');
?>
<?php
$llabel = 'Logo3';
include('inc.componente-arquivo.php');
?>
<?php
$llabel = 'E-mail';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'E-mail2';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'E-mail3';
include('inc.componente-e-mail.php');
?>
<?php
$llabel = 'Telefone';
include('inc.componente-telefone.php');
?>
<?php
$llabel = 'Telefone2';
include('inc.componente-telefone.php');
?>
<?php
$llabel = 'Telefone3';
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
$llabel = 'Endereço2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Endereço3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Horário';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Horário2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Horário3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoWhats';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoWhats2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoWhats3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoAuxiliar';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoAuxiliar2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'TextoAuxiliar3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Instagram';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Facebook';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Linkedin';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Twitter';
include('inc.componente-url.php');
?>
<?php
$llabel = 'YouTube';
include('inc.componente-url.php');
?>
<?php
$llabel = 'TikTok';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Kwai';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Google';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Google Plus';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Google Maps';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Google Analítics';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Play Store';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Apple Store';
include('inc.componente-url.php');
?>
<?php
$llabel = 'PopUp';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Aviso de Cookies';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Politica de Cookies';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Política de Privacidade';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Termos de Uso';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Contrato';
include('inc.componente-texto-grande-ckeditor.php');
?>
<?php
$llabel = 'Contrato2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Contrato3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Obs';
include('inc.componente-texto-grande.php');
?>
<?php
$llabel = 'Cor';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cor2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cor3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cor4';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CorTxt';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CorTxt2';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CorTxt3';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'CorTxt4';
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
$llabel = 'Documentos';
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

