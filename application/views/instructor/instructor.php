<?php 
	$data['seccion'] = 1; 
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

					  	<div id="admins">
					  		<table class="table table-striped">
								<tr>
									<th>Grupo</th>
									<th>Materia</th>
									<th>Acciones</th>
								</tr>
								<?php foreach ($inst as $key): ?>
								<tr>
									<td><?php echo $key->grupo_nombre; ?></td>
									<td><?php echo $key->mate_nombre; ?></td>
									<td>
										<a href="<?php echo base_url(); ?>group/lstGroup/<?php echo $key->grupo_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="DATOS DEL GRUPO">
											<span class='glyphicon glyphicon-eye-open'></span>
										</a>					
										<a href="<?php echo base_url(); ?>student/lista_estudiantes/<?php echo $key->grupo_codigo; ?>" type='button' class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="bottom" title="LISTADO GRUPO">
											<span class='glyphicon glyphicon-list-alt'></span>
										</a>										
										<a href="<?php echo base_url(); ?>qualification/calificacion/<?php echo $key->grupo_codigo."/".$key->mate_id."/".$key->asig_id; ?>" type='button' class='btn btn-sm btn-warning' data-toggle="tooltip" data-placement="bottom" title="MODIFICAR CALIFICACIÓN">
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