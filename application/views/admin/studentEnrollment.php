<?php $data['seccion'] = 4; ?>
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
					<?php foreach ($group as $grupo): ?>
						Grupo:&nbsp;<b class="page" id="matriculas_<?php echo $grupo->grupo_codigo; ?>"><?php echo $grupo->grupo_nombre." - ".$grupo->grupo_codigo; ?></b>
					<?php endforeach ?>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-3">
					  	<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#search_student">	
					  		<span class="glyphicon glyphicon-search"></span> Buscar Estudiante
					  	</a>							
					</div>			
				</div>
			</div>
			<div id="admins">
				<?php if (count($stuEnr) < 0): ?>
		  		<div class="alert alert-danger" id="datos_info" role="alert">
				    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun estudiante matriculado
				</div>
		  		<?php else: ?>	
		  		<table class="table table-striped">
					<tr>
						<th>N° de documento</th>
						<th>Nombre Completo</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>		
					<?php foreach ($stuEnr as $key): ?>
					<tr>
						<td><?php echo $key->usua_doc; ?></td>
						<td><?php echo $key->usua_papellido." ".$key->usua_sapellido." ".$key->usua_pnombre." ".$key->usua_snombre; ?></td>
						<td><?php echo $key->usua_email; ?></td>
						<td>					
							<a href="<?php echo base_url(); ?>enrollment/lstEnroll/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
								<span class='glyphicon glyphicon-eye-open'></span>
							</a>
							<a href="<?php echo base_url(); ?>enrollment/updEnroll/<?php echo $key->usua_id."/".$key->grupo_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
								<span class='glyphicon glyphicon-cog'></span>
							</a>													
							<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->estugrupos_id; ?>" data-estu="<?php echo $key->estu_id; ?>" data-grupo="<?php echo $key->grupo_codigo; ?>" data-rol="matricula"  data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
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
		
</div>