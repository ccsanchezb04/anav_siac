<?php 
	$data['seccion'] = 2; 
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
									<a href="<?php echo base_url(); ?>program/addProg" class="btn btn-block btn-primary">
										<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Agregar
									</a>
								</div>
								<div class="col-md-6"></div>
								<div class="col-md-3">						
								</div>			
							</div>
						</div>
					  	<div id="admins">
					  		<table class="table table-striped">
								<tr>
									<th>Nombre Programa</th>
									<th>Codigo</th>
									<th>Acciones</th>
								</tr>
								<?php foreach ($prog as $key): ?>
								<tr>
									<td><?php echo $key->prog_nombre; ?></td>
									<td><?php echo $key->prog_codigo; ?></td>									
									<td>					
										<a href="<?php echo base_url(); ?>program/lstProg/<?php echo $key->prog_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
											<span class='glyphicon glyphicon-eye-open'></span>
										</a>
										<a href="<?php echo base_url(); ?>program/updprog/<?php echo $key->prog_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
											<span class='glyphicon glyphicon-cog'></span>
										</a>
										<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->prog_id; ?>" data-rol="prog"  data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
											<span class='glyphicon glyphicon-remove-sign'></span>
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