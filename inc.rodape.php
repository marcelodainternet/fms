<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<hr>
<footer>
<p>&copy; <a href="http://sistema-web-para.com.br" target="_blank">Sistema Web Para</a></p>
<p style="text-align:right; font-size:11px;">
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
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php if(is_array($fullcalendar)){ ?>
<link href='fullcalendar-4.4.0/packages/core/main.min.css' rel='stylesheet' />
<link href='fullcalendar-4.4.0/packages/daygrid/main.min.css' rel='stylesheet' />
<link href='fullcalendar-4.4.0/packages/timegrid/main.min.css' rel='stylesheet' />
<link href='fullcalendar-4.4.0/packages/list/main.min.css' rel='stylesheet' />
<script src='fullcalendar-4.4.0/packages/core/main.min.js'></script>
<script src='fullcalendar-4.4.0/packages/interaction/main.min.js'></script>
<script src='fullcalendar-4.4.0/packages/daygrid/main.min.js'></script>
<script src='fullcalendar-4.4.0/packages/timegrid/main.min.js'></script>
<script src='fullcalendar-4.4.0/packages/list/main.min.js'></script>
<script src='fullcalendar-4.4.0/packages/core/locales/pt-br.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
locale: 'pt-br',
plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
height: 800,
header: {
left: 'prev,next today',
center: 'title',
right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
},
defaultView: 'dayGridMonth',
defaultDate: '<?php echo date('Y-m-d'); ?>',
navLinks: true,
editable: true,
eventLimit: true,
events: [
<?php echo implode(',
', $fullcalendar); ?>
]
});
calendar.render();
});
</script>
<?php } ?>

<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/ajax-bootstrap-select.js"></script>
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