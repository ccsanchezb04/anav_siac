<?php 
	foreach ($row as $key) {
		$total = $key->total;
	} 

	if ($total == "0"):
?> 
<div class="alert alert-success" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-ok"></span>&nbsp;Esta materia no esta asignada a este grupo.
</div>
<?php else: ?>
<div class="alert alert-danger" id="datos_info" role="alert">
    <span class="glyphicon glyphicon-alert"></span>&nbsp;Esta materia esta asignada a este grupo.
</div>
<?php endif ?>