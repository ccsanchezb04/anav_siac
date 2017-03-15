<?php 
	if ($this->session->userdata('userRole') == "ADMIN") {
		$data['seccion'] = 5; 
	}
	elseif ($this->session->userdata('userRole') == "INST") {
		$data['seccion'] = 1; 
	}
?>  
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
			  	<div class="panel-heading">Datos Grupo</div>
			  	<div class="panel-body">
					<table class="table table-bordered" id="">
					<?php foreach ($grupo as $key): ?>
						<tr>
							<th>Nombre</th>
							<td><?php echo $key->grupo_nombre; ?></td>
						</tr>
						<tr>
							<th>Código</th>
							<td><?php echo $key->grupo_codigo; ?></td>
						</tr>
						<tr>
							<th>Año/Período</th>
							<td><?php echo $key->grupo_anio; ?></td>
						</tr>
						<tr>
							<th>Programa Académico</th>
							<td>
								<?php
									foreach ($pg as $prog) {
										if ($key->grupo_idprog == $prog->prog_id) {
											echo $prog->prog_nombre;
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Estado</th>
							<td>

								<?php
									if ($key->grupo_idestado == 1) {
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
			<?php if ($this->session->userdata('userRole') == "ADMIN"): ?>
				<?php foreach ($program as $row): ?>
                    <a href="<?php echo base_url(); ?>admin/grupos/<?php echo $row->prog_codigo; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                <?php endforeach ?>
			<?php elseif ($this->session->userdata('userRole') == "INST"): ?>
				<a href="<?php echo base_url(); ?>instructor/" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
			<?php endif ?>
		</div>
	</div>
</div>