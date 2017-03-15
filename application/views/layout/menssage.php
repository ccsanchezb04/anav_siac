<?php 
	foreach ($row as $key) {
		$total = $key->total;
	} 

	if ($total == "0"):
?> 
<div class="alert alert-success" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-ok"></span>&nbsp;No hay usuarios ingresado con este N° de documento
</div>
<?php else: ?>
<div class="alert alert-danger" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-alert"></span>&nbsp;Si hay un usuario ingresado con este N° de documento
</div>
<?php endif ?>