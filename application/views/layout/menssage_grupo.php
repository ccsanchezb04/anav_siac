<?php 
	foreach ($row as $key) {
		$total = $key->total;
	} 

	if ($total == "0"):
?> 
<div class="alert alert-success" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-ok"></span>&nbsp;El codigo de este grupo se puede utilizar.
</div>
<?php else: ?>
<div class="alert alert-danger" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-alert"></span>&nbsp;El codigo para este grupo ya existe.
</div>
<?php endif ?>