<?php $data['seccion'] = 5; ?>
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
						<a href="<?php echo base_url(); ?>group/addGroup/<?php echo $prog->prog_codigo; ?>" class="btn btn-block btn-primary">
							<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Agregar
						</a>
					<?php endforeach ?>
					</div>
					<div class="col-md-6" id="titulo_prog">
						<?php foreach ($program as $prog): ?>
							Programa:&nbsp;<b class="page" id="grupos_<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_nombre." (".$prog->prog_codigo.")"; ?></b>
						<?php endforeach ?>
					</div>
					<div class="col-md-3">						
					</div>			
				</div>
			</div>

		  	<div id="tla">
		  		<?php if (count($group) > 0): ?>
		  		<table class="table table-striped">
					<tr>
						<th>Nombre Grupo</th>
						<th>Código Grupo</th>
						<th>Año/Periodo</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($group as $key): ?>
					<tr>
						<td><?php echo $key->grupo_nombre; ?></td>
						<td><?php echo $key->grupo_codigo; ?></td>
						<td><?php echo $key->grupo_anio; ?></td>
						<td>					
							<a href="<?php echo base_url(); ?>group/lstGroup/<?php echo $key->grupo_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
								<span class='glyphicon glyphicon-eye-open'></span>
							</a>
							<a href="<?php echo base_url(); ?>group/updGroup/<?php echo $key->grupo_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
								<span class='glyphicon glyphicon-cog'></span>
							</a>
							<a href="<?php echo base_url(); ?>" type='button' class='btn btn-sm btn-danger btn-delete' data-id="<?php echo $key->grupo_id; ?>" data-rol="group" data-grupo="<?php echo $key->prog_codigo; ?>" data-toggle="tooltip" data-placement="bottom" title="ELIMINAR">
								<span class='glyphicon glyphicon-remove-sign'></span>
							</a>					
						</td>
					</tr>
					<?php endforeach ?>
				</table>
		  		<?php else: ?>	
		  		<div class="alert alert-danger" id="datos_info" role="alert">
				    <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay ningun grupo registrado.
				</div>	
		  		<?php endif ?>		
		  	</div>
	  						 	
		</div>
	</div>
		
</div>