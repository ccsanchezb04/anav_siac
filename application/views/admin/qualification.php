<?php 
	$data['seccion'] = 8; 
?>
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
								</div>
								<div class="col-md-6" id="titulo_prog">
								<?php foreach ($group as $grupo): ?>
									Grupo:&nbsp;<b class="page" id="calificaciones_<?php echo $grupo->grupo_codigo; ?>"><?php echo $grupo->grupo_nombre." - ".$grupo->grupo_codigo; ?></b>
								<?php endforeach ?>
								</div>
								<div class="col-md-3">								  								
								</div>			
							</div>
						</div>
					  	<div id="admins">
					  		<table class="table table-striped">
								<tr>
									<th>N° de documento</th>
									<th>Nombre Completo</th>
									<th>Acciones</th>
								</tr>
								<?php foreach ($calif as $key): ?>
								<tr>
									<td><?php echo $key->usua_doc; ?></td>
									<td><?php echo $key->usua_pnombre." ".$key->usua_snombre." ".$key->usua_papellido." ".$key->usua_sapellido; ?></td>
									<td>					
										<a href="<?php echo base_url(); ?>qualification/lstCalif/<?php echo $key->estu_id."/".$key->grupo_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR CALIFICACIÓN">
											<span class='glyphicon glyphicon-eye-open'></span>
										</a>
										<a href="<?php echo base_url(); ?>qualification/updCalif/<?php echo $key->estu_id."/".$key->grupo_codigo; ?>" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR CALIFICACIÓN">
											<span class='glyphicon glyphicon-th-list'></span>
										</a>																											
									</td>
								</tr>
								<?php endforeach ?>
							</table>						  						 	
						</div>						
					</div>
					<!-- =================================================== -->
					<!-- =================================================== -->
				</div>
			</div>
		</div>
		
	</div>