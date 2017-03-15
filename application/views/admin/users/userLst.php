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
			  	<div class="panel-heading">Datos Personales</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($lstUs as $key): ?>
						<tr>
							<th colspan="2">N° de documento</th>
							<td colspan="2"><?php echo $key->usua_doc; ?></td>
						</tr>
						<tr>
							<th>Primer Nombre</th>
							<th>Segundo Nombre</th>
							<th>Primer Apellido</th>
							<th>Segundo Apellido</th>
						</tr> 
						<tr>
							<td><?php echo $key->usua_pnombre; ?></td>
							<td><?php echo $key->usua_snombre; ?></td>
							<td><?php echo $key->usua_papellido; ?></td>
							<td><?php echo $key->usua_sapellido; ?></td>
						</tr>
						<tr>
							<th colspan="2">Correo Electronico</th>
							<td colspan="2"><?php echo $key->usua_email; ?></td>
						</tr>  
						<tr>
							<th colspan="2">Tipo de usuario</th>
							<td colspan="2">
								<?php 
									if ($key->usua_tipo == 'ADMIN') {
										echo "Administrador(a)";
									} 
									elseif ($key->usua_tipo == 'INST') 
									{
										echo "Instructor(a)";
									}
									elseif ($key->usua_tipo == 'DIREC') 
									{
										echo "Directivo(a)";
									}
								?>
							</td>
						</tr> 
					<?php endforeach ?>	 					        
					</table>
			  	</div>	
			</div> 
			<?php if ($key->usua_tipo == 'ADMIN'): ?>
			<div class="panel panel-primary">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Datos Adicionales</div>
			  	<div class="panel-body">
					<table class="table table-bordered">
					<?php foreach ($lstAd as $adn): ?>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $adn->admin_telefono; ?></td>
						</tr>
						<tr>
							<th>Direccion</th>
							<td><?php echo $adn->admin_direccion; ?></td>
						</tr> 
						<tr>
							<th>Genero</th>
							<td><?php echo $adn->admin_genero; ?></td>
						</tr>
						<tr>
							<th>Fecha de nacimiento</th>
							<td><?php echo date($adn->admin_fnacimiento); ?></td>
						</tr>    
						<tr>
							<th>Grupo Sanguineo</th>
							<td><?php echo $adn->admin_rh; ?></td>
						</tr>    
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($adn->admin_idestado == 1) {
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
			<?php elseif ($key->usua_tipo == 'INST'): ?>
			<div class="panel panel-primary">
			  	<!-- Default panel contents -->
			  	<div class="panel-heading">Datos Personales</div>
			  	<div class="panel-body">
					<table class="table table-bordered">
					<?php foreach ($lstIn as $ins): ?>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $ins->inst_codigo; ?></td>
						</tr>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $ins->inst_nlicencia; ?></td>
						</tr>
						<tr>
							<th>N° de teléfono</th>
							<td><?php echo $ins->inst_telefono; ?></td>
						</tr>
						<tr>
							<th>Direccion</th>
							<td><?php echo $ins->inst_direccion; ?></td>
						</tr> 
						<tr>
							<th>Genero</th>
							<td><?php echo $ins->inst_genero; ?></td>
						</tr>
						<tr>
							<th>Fecha de nacimiento</th>
							<td><?php echo date($ins->inst_fnacimiento); ?></td>
						</tr>    
						<tr>
							<th>Grupo Sanguineo</th>
							<td><?php echo $ins->inst_rh; ?></td>
						</tr>    
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($ins->inst_idestado == 1) {
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
			<?php elseif ($key->usua_tipo == 'DIREC') : ?>
			<div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Datos Adicionales</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                    <?php foreach ($lstDr as $dir): ?>
                        <tr>
                            <th>N° de teléfono</th>
                            <td><?php echo $dir->direc_telefono; ?></td>
                        </tr>
                        <tr>
                            <th>Direccion</th>
                            <td><?php echo $dir->direc_direccion; ?></td>
                        </tr> 
                        <tr>
                            <th>Genero</th>
                            <td><?php echo $dir->direc_genero; ?></td>
                        </tr>
                        <tr>
                            <th>Fecha de nacimiento</th>
                            <td><?php echo date($dir->direc_fnacimiento); ?></td>
                        </tr>    
                        <tr>
                            <th>Grupo Sanguineo</th>
                            <td><?php echo $dir->direc_rh; ?></td>
                        </tr>    
                        <tr>
                            <th>Estado</th>
                            <td>

                                <?php
                                    if ($dir->direc_idestado == 1) {
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
			<?php endif ?>
			<?php if ($this->session->userdata('userRole') == "ADMIN"): ?>
				<a href="<?php echo base_url(); ?>admin/" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php elseif ($this->session->userdata('userRole') == "DIREC"): ?>
				<a href="<?php echo base_url(); ?>directivo/" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php endif ?>
		</div>
	</div>
</div>