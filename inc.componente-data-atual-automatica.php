<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
?>
<input type="hidden" name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" value="<?php if(!$_GET['editar']){ ${$ttabela}[$ppropriedade] = date('Y-m-d'); } echo ${$ttabela}[$ppropriedade]; ?>" />
<?php
}
unset($ppropriedade);
?>