<?php $data['seccion'] = 1; ?>
<div class="row">
		<div class="col-md-3">
			<div class="contenedor-menu">
				<?php $this->load->view('layout/navs', $data); ?>
			</div>
				
		</div>
		<div class="col-md-9">
			<div class="contenedor-principal">							

				<!-- Tab panels -->
				<div class="tab-content">
					<!-- =================================================== -->
					<!-- ===================== Usuario ===================== -->
					<div class="tab-pane active" id="usuario">

						<div class="top-bar">
							<div class="row">
								<div class="col-md-3">
									<a href="<?php echo base_url(); ?>user/addUser" class="btn btn-block btn-primary">
										<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Agregar
									</a>
								</div>
								<div class="col-md-6"></div>
								<div class="col-md-3">
								  	<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#search_users">	
								  		<span class="glyphicon glyphicon-search"></span> Buscar Usuario
								  	</a>							
								</div>			
							</div>
						</div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-users">
						  	<li class="active"><a href="#admins" data-toggle="tab">Administradores</a></li>
						  	<li><a href="#instrcutors" data-toggle="tab">Instructores</a></li>						  
						  	<li><a href="#managers" data-toggle="tab">Directivos</a></li>						  
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						  	<div class="tab-pane active" id="admins">
						  		<?php if ($adn < 0): ?>
						  		<div class="alert alert-danger" id="datos_info" role="alert">
								    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun administrador registrado
								</div>
						  		<?php else: ?>	
						  		<table class="table table-striped">
									<tr>
										<th>N° de documento</th>
										<th>Nombre Completo</th>
										<th>Correo</th>
										<th>Acciones</th>
									</tr>
									<?php foreach ($adn as $key): ?>
									<tr>
										<td><?php echo $key->usua_doc; ?></td>
										<td><?php echo $key->usua_pnombre." ".$key->usua_snombre." ".$key->usua_papellido." ".$key->usua_sapellido; ?></td>
										<td><?php echo $key->usua_email; ?></td>
										<td>					
											<a href="<?php echo base_url(); ?>user/lstUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
												<span class='glyphicon glyphicon-eye-open'></span>
											</a>
											<a href="<?php echo base_url(); ?>user/updUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
												<span class='glyphicon glyphicon-cog'></span>
											</a>
											<?php if ($key->admin_idestado == 1): ?>
											<a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/admin" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-remove '></span>
											</a>
											<?php else: ?>
											<a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/admin" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-ok'></span>
											</a>
											<?php endif ?>
											<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->usua_id; ?>" data-rol="admin"  data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
												<span class='glyphicon glyphicon-remove-sign'></span>
											</a>					
										</td>
									</tr>
									<?php endforeach ?>
								</table>	
						  		<?php endif ?>
						  	</div>
						 	<div class="tab-pane" id="instrcutors">
						 		<?php if ($inst < 0): ?>						 			
						 		<div class="alert alert-danger" id="datos_info" role="alert">
								    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun instructor registrado
								</div>
						 		<?php else: ?>
						 		<table class="table table-striped">
									<tr>
										<th>N° de documento</th>
										<th>Nombre Completo</th>
										<th>Correo</th>
										<th>Acciones</th>
									</tr>
									<?php foreach ($inst as $key): ?>
									<tr>
										<td><?php echo $key->usua_doc; ?></td>
										<td><?php echo $key->usua_pnombre." ".$key->usua_snombre." ".$key->usua_papellido." ".$key->usua_sapellido; ?></td>					
										<td><?php echo $key->usua_email; ?></td>
										<td>					
											<a href="<?php echo base_url(); ?>user/lstUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
												<span class='glyphicon glyphicon-eye-open'></span>
											</a>
											<a href="<?php echo base_url(); ?>user/updUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
												<span class='glyphicon glyphicon-cog'></span>
											</a>
											<?php if ($key->inst_idestado == 1): ?>
											<a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/inst" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-remove'></span>
											</a>
											<?php else: ?>
											<a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/inst" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-ok'></span>
											</a>
											<?php endif ?>
											<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->usua_id; ?>" data-rol="inst" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
												<span class='glyphicon glyphicon-remove-sign'></span>
											</a>					
										</td>
									</tr>
									<?php endforeach ?>			
								</table>	
						 		<?php endif ?>
						 	</div>
						 	<div class="tab-pane" id="managers">
						 		<?php if ($dir < 0): ?>						 			
						 		<div class="alert alert-danger" id="datos_info" role="alert">
								    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun instructor registrado
								</div>
						 		<?php else: ?>
						 		<table class="table table-striped">
									<tr>
										<th>N° de documento</th>
										<th>Nombre Completo</th>
										<th>Correo</th>
										<th>Acciones</th>
									</tr>
									<?php foreach ($dir as $key): ?>
									<tr>
										<td><?php echo $key->usua_doc; ?></td>
										<td><?php echo $key->usua_pnombre." ".$key->usua_snombre." ".$key->usua_papellido." ".$key->usua_sapellido; ?></td>					
										<td><?php echo $key->usua_email; ?></td>
										<td>					
											<a href="<?php echo base_url(); ?>user/lstUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
												<span class='glyphicon glyphicon-eye-open'></span>
											</a>
											<a href="<?php echo base_url(); ?>user/updUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
												<span class='glyphicon glyphicon-cog'></span>
											</a>
											<?php if ($key->direc_idestado == 1): ?>
											<a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/direc" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-remove'></span>
											</a>
											<?php else: ?>
											<a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/direc" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_nombre; ?>">
												<span class='glyphicon glyphicon-ok'></span>
											</a>
											<?php endif ?>
											<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->usua_id; ?>" data-rol="direc" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
												<span class='glyphicon glyphicon-remove-sign'></span>
											</a>					
										</td>
									</tr>
									<?php endforeach ?>			
								</table>	
						 		<?php endif ?>
						 	</div>							 	
						</div>						
					</div>
					<!-- =================================================== -->
					<!-- =================================================== -->
				</div>
			</div>
		</div>
		
	</div>