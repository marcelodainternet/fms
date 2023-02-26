<hr>
<footer class="row" style="background-color:#00468C; padding-top:20px;">
<div align="center" class="col-12"> 
<p style="font-size:15px; color:#fff;"><?php echo date('Y'); ?>&copy; <a href="https://api.whatsapp.com/send?phone=5548998141630&text=Olá Marilete, venho do sistema EducAdmin, você pode me atender?" target="_blanc" style="color:#fff;">EducAdmin</a> Todos os direitos reservados.</p>
<p style="font-size:12px; color:#fff;">
<?php
list($usec, $sec) = explode(' ', microtime());
$script_end = (float) $sec + (float) $usec;
$tempo = round($script_end - $script_start, 5);
$memoria = round(((memory_get_peak_usage(true) / 1024) / 1024), 2);
?>
Execução: <?php echo $tempo ?> segundos. - 
Memória: <?php echo $memoria ?>MB - 
PHP: <?php echo phpversion(); ?> - 
MySQL: <?php echo sql($a, 'SELECT VERSION() as valor'); ?> - 
<?php echo date('d/m/Y H:i:s'); ?>
</p>
<p style="font-size:14px; color:#fff;">Desenvolvido por: <a href="https://api.whatsapp.com/send?phone=5548999775791&text=Olá Marcelo, venho do sistema EducAdmin, você pode me atender?" target="_blanc" style="color:#fff;">Marcelo Silveira</a></p>

</div>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="js/ajax-bootstrap-select.min.js"></script>
<script type="text/javascript"> $('.with-ajax').selectpicker().ajaxSelectPicker({ ajax: { type: 'POST', dataType: 'json', data: { q: '{{{q}}}' } }, minLength: 0, preprocessData: function (data) { var i, l = data.length, array = []; if (l) { for (i = 0; i < l; i++) { array.push($.extend(true, data[i], { text : data[i].text, value: data[i].value })); } } return array; } }); </script>

<script src="https://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="https://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script type="text/javascript">webshim.setOptions("forms-ext",{"date":{"calculateWidth":false,"openOnFocus":true}});webshim.polyfill("forms forms-ext");</script>

<?php if(is_array($campos_telefone)){ ?>
<script type="text/javascript">
window.onload = function(){
<?php echo implode('
', $campos_telefone); ?>
}
</script>
<?php } ?>


<?php mysqli_close($a); ?>