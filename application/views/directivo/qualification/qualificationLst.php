<?php $data['seccion'] = 2; ?>  
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
							<th colspan="3">Estudinate</th>
							<th colspan="2">Grupo</th>
						</tr>
							<?php foreach ($calif as $estu): ?>
							<td colspan="3"><?php echo $estu->usua_pnombre." ".$estu->usua_papellido; ?></td>
							<?php endforeach ?>	
							<?php foreach ($grupo as $grup): ?>
							<td colspan="2"><?php echo $grup->grupo_nombre." - ".$grup->grupo_codigo; ?></td>
							<?php endforeach ?>	
						<tr>
							<th>Nombre Materia</th>
							<th>Nota 1</th>
							<th>Nota 2</th>
							<th>Nota 3</th>
							<th>Nota Final</th>
						</tr>
					<?php if (count($calif) <= 0): ?>
						<tr>
							<td colspan="5">
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
							<td><?php echo $cal->calif_nota1; ?></td>
							<td><?php echo $cal->calif_nota2; ?></td>
							<td><?php echo $cal->calif_nota3; ?></td>
							<td><?php echo $cal->calif_notaf; ?></td>
						</tr>					
						<?php endforeach ?>
					<?php endif ?>	 					        
					</table>
			  	</div>	
			</div> 
		<?php foreach ($grupo as $g): ?>
			<a href="<?php echo base_url(); ?>directivo/estudiantes/<?php echo $g->grupo_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
		<?php endforeach ?>
		</div>
	</div>
</div>