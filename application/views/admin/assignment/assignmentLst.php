<?php $data['seccion'] = 7; ?>  
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
			  	<div class="panel-heading">Datos de la asignación</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($asigLst as $key): ?>
						<tr>
							<th>Programa Académico</th>							
							<td>
								<?php
									foreach ($pg as $prog) {
										if ($key->asig_idprog == $prog->prog_id) {
											echo $prog->prog_nombre;
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Grupo</th>
							<td><?php echo $key->grupo_nombre; ?></td>
						</tr>
						<tr>
							<th>Materia</th>
							<td><?php echo $key->mate_nombre; ?></td>
						</tr>
						<tr>
							<th>Instructor</th>
							<td><?php echo $key->usua_pnombre." ".$key->usua_papellido; ?></td>
						</tr>
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($key->asig_idestado == 1) {
										echo "Activo";
									} 
									else {
										echo "Inactivo";
									}
								?>
							</td>
						</tr> 
					<?php endforeach ?>	 					        
					</table>
			  	</div>	
			</div> 
			<?php foreach ($program as $row): ?>
			<a href="<?php echo base_url(); ?>admin/asignaciones/<?php echo $row->prog_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php endforeach ?>   
		</div>
	</div>
</div>