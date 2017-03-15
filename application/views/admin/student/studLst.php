<?php $data['seccion'] = 3; ?>  
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
			  	<div class="panel-heading">Datos Personales</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($lstUs as $key): ?>
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
					<?php endforeach ?>	 					        
					</table>
			  	</div>	
			</div> 
			<div class="panel panel-primary">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Datos Adicionales</div>
			  	<div class="panel-body">
					<table class="table table-bordered">
					<?php foreach ($lstSt as $stu): ?>
						<tr>
							<th>Código</th>
							<td><?php echo $stu->estu_codigo; ?></td>
						</tr>
						<tr>
							<th>Fecha de ingreso</th>
							<td><?php echo $stu->estu_fingreso; ?></td>
						</tr>
						<tr>
							<th>Programa Académico</th>
							<td>
								<?php
									foreach ($prog as $pr) {
										if ($stu->estu_idprog == $pr->prog_id) {
											echo $pr->prog_nombre;
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Estado Académico</th>
							<td>
								<?php
									foreach ($estaacad as $acad) {
										if ($stu->estu_idestaacad == $acad->estaacad_id) {
											echo $acad->estaacad_nombre;
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $stu->estu_telefono; ?></td>
						</tr>
						<tr>
							<th>Dirección</th>
							<td><?php echo $stu->estu_direccion; ?></td>
						</tr> 
						<tr>
							<th>Género</th>
							<td><?php echo $stu->estu_genero; ?></td>
						</tr>
						<tr>
							<th>Fecha de nacimiento</th>
							<td><?php echo date($stu->estu_fnacimiento); ?></td>
						</tr>    
						<tr>
							<th>Grupo Sanguineo</th>
							<td><?php echo $stu->estu_rh; ?></td>
						</tr>    
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($stu->estu_idestado == 1) {
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
                                                    <a href="<?php echo base_url(); ?>admin/estudiantes_inscritos/<?php echo $row->prog_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                <?php endforeach ?>
		</div>
	</div>
</div>