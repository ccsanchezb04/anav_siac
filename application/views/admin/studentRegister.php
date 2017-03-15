<?php $data['seccion'] = 3; ?>
<div class="row">
	<div class="col-md-3">
		<div class="contenedor-menu">
			<?php $this->load->view('layout/navs', $data); ?>
		</div>
			
	</div>
	<div class="col-md-9">
		<div class="contenedor-principal">							
			<div class="top-bar">
				<div class="row">
					<div class="col-md-3">
					<?php foreach ($program as $prog): ?>
						<a href="<?php echo base_url(); ?>student/addStud/<?php echo $prog->prog_codigo; ?>" class="btn btn-block btn-primary">
							<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Agregar
						</a>
					<?php endforeach ?>
					</div>
					<div class="col-md-6" id="titulo_prog">
						<?php foreach ($program as $prog): ?>
							Programa:&nbsp;<b class="page" id="inscritos_<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_nombre." (".$prog->prog_codigo.")"; ?></b>
						<?php endforeach ?>
					</div>
					<div class="col-md-3">
					  	<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#search_student">	
					  		<span class="glyphicon glyphicon-search"></span> Buscar Estudiante
					  	</a>							
					</div>			
				</div>
			</div>
			
		  	<div id="tla">
		  		<?php if (count($stuReg) > 0): ?>
		  		<table class="table table-striped">
					<tr>
						<th>N° de documento</th>
						<th>Nombre Completo</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($stuReg as $key): ?>
					<tr>
						<td><?php echo $key->usua_doc; ?></td>
						<td><?php echo $key->usua_papellido." ".$key->usua_sapellido." ".$key->usua_pnombre." ".$key->usua_snombre; ?></td>
						<td><?php echo $key->usua_email; ?></td>
						<td>					
							<a href="<?php echo base_url(); ?>student/lstStud/<?php echo $key->usua_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
								<span class='glyphicon glyphicon-eye-open'></span>
							</a>
							<a href="<?php echo base_url(); ?>student/updStud/<?php echo $key->usua_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
								<span class='glyphicon glyphicon-cog'></span>
							</a>
							<?php if ($key->estu_idestaacad == 1): ?>
							<a href="<?php echo base_url(); ?>student/enrollment/<?php echo $key->usua_id."/".$key->estu_idprog."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-warning' data-toggle="tooltip" data-placement="bottom" title="ESTA: <?php echo $key->estaacad_nombre; ?>">
								<span class='glyphicon glyphicon-education'></span>
							</a>						
							<?php endif ?>
							<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->usua_id; ?>" data-rol="estu" data-grupo="<?php echo $key->prog_codigo; ?>" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
								<span class='glyphicon glyphicon-remove-sign'></span>
							</a>					
						</td>
					</tr>
					<?php endforeach ?>
				</table>
		  		<?php else: ?>	
		  		<div class="alert alert-danger" id="datos_info" role="alert">
				    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun estudiante registrado
				</div>	
		  		<?php endif ?>		
		  	</div>	  						 	
		</div>
	</div>
		
</div>