<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...

if(!count($rrelacionamentos)){
$rrelacionamentos = sql($a, 'SELECT relacionamentos AS valor FROM ttabelas WHERE nome = \''.ai($a, $ttabela).'\'');
$rrelacionamentos = explode(', ', $rrelacionamentos);
}

for($x=0;$x<count($rrelacionamentos);$x++){
$rrelacionamento_tabela = prepara_nome($rrelacionamentos[$x], '_');
if($_SESSION['permissao'][$rrelacionamento_tabela]['visualizar']){
$rrelacionamento_arquivo = prepara_nome($rrelacionamentos[$x], '-');
if(!$primeiro_campo_nativo){$primeiro_campo_nativo = primeiro_campo_nativo($a, $ttabela);}
?><a href="<?php echo $rrelacionamento_arquivo ?>-listar.php?pai=<?php echo $ttabela ?>&id_<?php echo $ttabela ?>=<?php echo ${$ttabela}['id'] ?>&nome_<?php echo $ttabela ?>=<?php echo urlencode($pprefixo.${$ttabela}[$primeiro_campo_nativo]); ?>" class="btn btn-default btn-xs" style="margin: 2px;"><i class="fas fa-th-list"></i> <?php echo $rrelacionamentos[$x] ?> <span class="badge"><?php echo sql($a, 'SELECT COUNT(*) AS valor FROM '.ai($a, $rrelacionamento_tabela).' WHERE'.sql_subordinacao($a, $rrelacionamento_tabela).' id_'.ai($a, $ttabela).' = \''.ai($a, ${$ttabela}['id']).'\''); ?></span></a><?php
}
}
unset($primeiro_campo_nativo);
?>