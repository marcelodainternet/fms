<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
?>
<input type="hidden" name="<?php echo $ppropriedade ?>" value="<?php if(!${$ttabela}[$ppropriedade]){ echo ((int)sql($a, 'SELECT MAX('.ai($a, $ppropriedade).') AS valor FROM '.ai($a, $ttabela).' WHERE'.sql_subordinacao($a, $ttabela).' 1=1')+1); } else{ echo ${$ttabela}[$ppropriedade]; } ?>" <?php echo implode_if_is_array(' ', $pparametros); unset($pparametros); ?>/>
<?php
}
unset($ppropriedade);
?>