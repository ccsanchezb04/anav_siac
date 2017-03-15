<?php $data['seccion'] = 1; ?>  
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
						<tr>
							<th>Nombre Completo</th>
							<th>Documento de Identidad</th>							
							<th>Código</th>
							<th>Email</th>
							<th>Telefono</th>
						</tr>
					<?php foreach ($stud as $key): ?>
						<tr>
							<td><?php echo $key->usua_papellido." ".$key->usua_pnombre; ?></td>
							<td><?php echo $key->usua_doc; ?></td>
							<td><?php echo $key->estu_codigo; ?></td>
							<td><?php echo $key->usua_email; ?></td>
							<td><?php echo $key->estu_telefono; ?></td>
						</tr>						
					<?php endforeach ?>	 					        
					</table>
			  	</div>	
			</div> 
				<a href="<?php echo base_url(); ?>instructor/" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
		</div>
	</div>
</div>