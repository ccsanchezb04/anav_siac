<?php $data['seccion'] = 1 ?>  
<div class="row">
	<div class="col-md-3">
		<div class="contenedor-menu">
			<?php $this->load->view('layout/navs', $data); ?>
		</div>
	</div>
	<div class="col-md-9" id="#table-list">
	 	<div class="contenedor-principal">
			<div class="panel panel-primary" id="lst-table">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Calificación</div>			  			  	
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
						<tr>
							<th>Grupo</th>
							<?php foreach ($grupo as $grup): ?>
							<td><?php echo $grup->grupo_nombre." - ".$grup->grupo_codigo; ?></td>
							<?php endforeach ?>	
						</tr>
						<tr>
							<th>Estudinate</th>
							<?php foreach ($calif as $estu): ?>
							<td><?php echo $estu->usua_pnombre." ".$estu->usua_papellido; ?></td>
							<?php endforeach ?>	
						</tr>
						<tr>
							<th colspan="2"></th>
						</tr>
						<tr>
							<th>Nombre Materia</th>							
							<th>Nota Final</th>
						</tr>						
					<?php if (count($calif) <= 0): ?>
						<tr>
							<td colspan="2">
								<div>
									<div class="alert alert-danger" role="alert">
									    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay Calificaciones asociadas al estudiante
									</div>
								</div>
							</td>
						</tr>
					<?php else: ?>
						<?php foreach ($calif as $cal): ?>
						<tr>
							<td><?php echo $cal->mate_nombre; ?></td>							
							<td class="calif_notaf_estu <?php if ($cal->calif_notaf <= 3.75) {echo "text-danger";}else{echo "text-success";} ?>"><?php echo $cal->calif_notaf; ?></td>
						</tr>					
						<?php endforeach ?>
					<?php endif ?>	 					        
					</table>
			  	</div>	
			</div> 
		</div>
	</div>
</div>