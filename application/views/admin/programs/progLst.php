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
			  	<div class="panel-heading">Datos Grupo</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($prog as $key): ?>
						<tr>
							<th>Nombre</th>
							<td><?php echo $key->prog_nombre; ?></td>
						</tr>
						<tr>
							<th>Código</th>
							<td><?php echo $key->prog_codigo; ?></td>
						</tr>						
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($key->prog_idestado == 1) {
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
				<a href="<?php echo base_url(); ?>admin/programas/" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
		</div>
	</div>
</div>