<?php $data['seccion'] = 4; ?>  
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
			  	<div class="panel-heading">Datos Matricula</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($est as $key): ?>
						<tr>
							<th>Grupo Matriculado</th>
							<td><?php echo $key->grupo_nombre." - ".$key->grupo_codigo; ?></td>
						</tr>
						 
					<?php endforeach ?>	 					        
					</table>
			  	</div>	
			</div> 
			<div class="panel panel-primary" id="lst-table">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Datos Personales</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($est as $key): ?>
						<tr>
							<th colspan="2">N° de documento</th>
							<td colspan="2"><?php echo $key->usua_doc; ?></td>
						</tr>
						<tr>
							<th>Primer Apellido</th>
							<th>Segundo Apellido</th>
							<th>Primer Nombre</th>
							<th>Segundo Nombre</th>							
						</tr> 
						<tr>
							<td><?php echo $key->usua_papellido; ?></td>
							<td><?php echo $key->usua_sapellido; ?></td>
							<td><?php echo $key->usua_pnombre; ?></td>
							<td><?php echo $key->usua_snombre; ?></td>							
						</tr>
						<tr>
							<th colspan="2">Correo Electronico</th>
							<td colspan="2"><?php echo $key->usua_email; ?></td>
						</tr>  					        
					</table>
			  	</div>	
			</div> 
			<div class="panel panel-primary">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Datos Adicionales</div>
			  	<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>Código</th>
							<td><?php echo $key->estu_codigo; ?></td>
						</tr>
						<tr>
							<th>Fecha de ingreso</th>
							<td><?php echo $key->estu_fingreso; ?></td>
						</tr>
						<tr>
							<th>Programa Académico</th>
							<td>
								<?php echo $key->prog_nombre; ?>
							</td>
						</tr>
						<tr>
							<th>Estado Académico</th>
							<td>
								<?php echo $key->estaacad_nombre; ?>
							</td>
						</tr>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $key->estu_telefono; ?></td>
						</tr>
						<tr>
							<th>Dirección</th>
							<td><?php echo $key->estu_direccion; ?></td>
						</tr> 
						<tr>
							<th>Género</th>
							<td><?php echo $key->estu_genero; ?></td>
						</tr>
						<tr>
							<th>Fecha de nacimiento</th>
							<td><?php echo date($key->estu_fnacimiento); ?></td>
						</tr>    
						<tr>
							<th>Grupo Sanguineo</th>
							<td><?php echo $key->estu_rh; ?></td>
						</tr>    
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($key->estu_idestado == 1) {
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
			<?php foreach ($est as $g): ?>
			<?php if ($this->session->userdata('userRole') == "ADMIN"): ?>
				<a href="<?php echo base_url(); ?>admin/estudiantes_matriculados/<?php echo $g->grupo_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php elseif ($this->session->userdata('userRole') == "DIREC"): ?>
				<a href="<?php echo base_url(); ?>directivo/estudiantes/<?php echo $g->grupo_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>