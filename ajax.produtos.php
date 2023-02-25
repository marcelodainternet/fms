<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$aambiente = 'cadastrar';
$cclasse = 'Produtos'; $ttabela = 'produtos'; $aarquivo = 'produtos';

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
$llabel = 'Seção'; $cclasse = 'secoes'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Categoria'; $cclasse = 'categorias'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Subcategoria'; $cclasse = 'subcategorias'; $ppropriedade = 'nome';
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
$llabel = 'Status'; $cclasse = 'status_produto'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Código';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Data Expira';
include('inc.componente-data-hora.php');
?>
<?php
$llabel = 'Destaque';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-sim-nao.php');
?>
<?php
$llabel = 'Etiqueta'; $cclasse = 'etiquetas_produto'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Estoque';
include('inc.componente-numero-inteiro.php');
?>
<?php
$llabel = 'Fornecedor'; $cclasse = 'parceiros'; $ppropriedade = 'nome';
$pparametros[] = 'onchange="carrega_campos(\''.$aarquivo.'\');"';
include('inc.componente-selecao.php');
?>
<?php
$llabel = 'Imagens';
include('inc.componente-arquivo-upload-multiplo.php');
?>
<?php
$llabel = 'Vídeo';
include('inc.componente-incorporar-youtube.php');
?>
<?php
$llabel = 'Custo';
include('inc.componente-moeda.php');
?>
<?php
$llabel = 'Preço';
include('inc.componente-moeda.php');
?>
<?php
$llabel = 'Preço 2';
include('inc.componente-moeda.php');
?>
<?php
$llabel = 'Oferta';
include('inc.componente-moeda.php');
?>
<?php
$llabel = 'Desconto';
include('inc.componente-moeda.php');
?>
<?php
$llabel = 'Cupom de Desconto';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Marca';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Modelo';
include('inc.componente-texto.php');
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
$llabel = 'Detalhe';
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
$llabel = 'Link';
include('inc.componente-url.php');
?>
<?php
$llabel = 'Material';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Cor';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Peso';
include('inc.componente-numero-decimal-0.01.php');
?>
<?php
$llabel = 'Volumes';
include('inc.componente-numero-inteiro.php');
?>
<?php
$llabel = 'Tamanho';
include('inc.componente-texto.php');
?>
<?php
$llabel = 'Largura';
include('inc.componente-numero-inteiro.php');
?>
<?php
$llabel = 'Altura';
include('inc.componente-numero-inteiro.php');
?>
<?php
$llabel = 'Profundidade';
include('inc.componente-numero-decimal-0.01.php');
?>
<?php
$llabel = 'Views';
include('inc.componente-numero-inteiro-sequencial-automatico.php');
?>
<?php
$llabel = 'Liks';
include('inc.componente-numero-inteiro-sequencial-sugerido.php');
?>
<?php
$llabel = 'Pontos';
include('inc.componente-numero-inteiro.php');
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

