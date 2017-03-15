<div id="logo-img">
    <img src="<?php echo base_url(); ?>public/images/anav_logo.png" class="img-responsive" alt="Explora Eventos">
	    
</div>
<div class="btn-group dropup btn-block">
   	<button type="button" class="btn btn-sm btn-primary active"><span class="glyphicon glyphicon-user"></button>
	<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  	<span>&nbsp;<?php echo $this->session->userdata('userName'); ?>&nbsp;</span>  
	  	<span class="caret"></span>
	  	<span class="sr-only">Toggle Dropdown</span>
	</button>
    <ul class="dropdown-menu" role="menu">
        <?php if ($this->session->userdata('userRole') == "ADMIN"): ?>
        <li><a href="<?php echo base_url(); ?>admin/updAdmin/<?php echo $this->session->userdata('userId'); ?>">Modificar Perfil</a></li>                                                                                               
        <?php elseif ($this->session->userdata('userRole') == "INST"): ?>
        <li><a href="<?php echo base_url(); ?>instructor/updInst/<?php echo $this->session->userdata('userId'); ?>">Modificar Perfil</a></li>                                                                                                
        <?php elseif ($this->session->userdata('userRole') == "EST"): ?> 
        <li><a href="<?php echo base_url(); ?>estudiante/updEstu/<?php echo $this->session->userdata('userId'); ?>">Modificar Perfil</a></li>
         <?php elseif ($this->session->userdata('userRole') == "DIREC"): ?> 
        <li><a href="<?php echo base_url(); ?>directivo/updDirec/<?php echo $this->session->userdata('userId'); ?>">Modificar Perfil</a></li>                                                                                               
        <?php endif ?>
        <li class="divider"></li>
        <li><a href="<?php echo base_url(); ?>login/close">Cerrar Sesión</a></li>
    </ul>
</div>

<div class="btn-group dropup">
  
  <ul class="dropdown-menu">
    <!-- Dropdown menu links -->
  </ul>
</div>
<ul class="nav nav-pills nav-stacked" id="menu_backend">
    <?php 
        $queryGrupos = $this->db->get('anav_grupos');
        $queryProgra = $this->db->get('anav_programas');
    ?>
	
 <?php if ($this->session->userdata('userRole') == "ADMIN"): ?>
 	<li <?php if ($seccion == 1) { echo "class='active'"; } ?>>
		<a href="<?php echo base_url(); ?>admin/">Usuarios</a>
 	</li>
    <li <?php if ($seccion == 2) { echo "class='active'"; } ?>>
        <a href="<?php echo base_url(); ?>admin/programas">Programas</a>
    </li>
 	<li <?php if ($seccion == 3) { echo "class='active'"; } ?>> 		
        <a href="#" class="cerrado" id="inscritos" onclick="actMenu('inscritos','prog_inscritos')">Estudiantes Inscritos<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="prog_inscritos">
        <?php foreach ($queryProgra->result() as $prog): ?>
            <li class="submenu" id="inscritos_<?php echo $prog->prog_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/estudiantes_inscritos/<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
 	</li>
    <li <?php if ($seccion == 4) { echo "class='active'"; } ?>>        
        <a href="#" class="cerrado" id="matriculas" onclick="actMenu('matriculas','grupo_matriculas')">Estudiantes Matriculados<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="grupo_matriculas">
        <?php foreach ($queryGrupos->result() as $grupo): ?>
            <li class="submenu" id="matriculas_<?php echo $grupo->grupo_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/estudiantes_matriculados/<?php echo $grupo->grupo_codigo; ?>"><?php echo $grupo->grupo_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
    </li>
 	<li <?php if ($seccion == 5) { echo "class='active'"; } ?>> 		
        <a href="#" class="cerrado" id="grupos" onclick="actMenu('grupos','prog_grupos')">Grupos<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="prog_grupos">
        <?php foreach ($queryProgra->result() as $prog): ?>
            <li class="submenu" id="grupos_<?php echo $prog->prog_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/grupos/<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
 	</li>
    <li <?php if ($seccion == 6) { echo "class='active'"; } ?>>        
        <a href="#" class="cerrado" id="materias" onclick="actMenu('materias','prog_materias')">Materias<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="prog_materias">
        <?php foreach ($queryProgra->result() as $prog): ?>
            <li class="submenu" id="materias_<?php echo $prog->prog_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/materias/<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
    </li>
    <li <?php if ($seccion == 7) { echo "class='active'"; } ?>>        
        <a href="#" class="cerrado" id="asignaciones" onclick="actMenu('asignaciones','prog_asig')">Asignaciones<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="prog_asig">
        <?php foreach ($queryProgra->result() as $prog): ?>
            <li class="submenu" id="asig_<?php echo $prog->prog_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/asignaciones/<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
    </li>    
    <li <?php if ($seccion == 8) { echo "class='active'"; } ?>>
        <a href="#" class="cerrado" id="calificaiones" onclick="actMenu('calificaiones','grupo_calificaiones')">Calificaciones<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="grupo_calificaiones">
        <?php foreach ($queryGrupos->result() as $grupo): ?>
            <li class="submenu" id="calificaiones_<?php echo $grupo->grupo_codigo; ?>">
                <a href="<?php echo base_url(); ?>admin/calificaciones/<?php echo $grupo->grupo_codigo; ?>"><?php echo $grupo->grupo_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
    </li>
<?php elseif ($this->session->userdata('userRole') == "INST"): ?>
    <li <?php if ($seccion == 1) { echo "class='active'"; } ?>>
        <a href="<?php echo base_url(); ?>instructor/">Inicio</a>
    </li>  
<?php elseif ($this->session->userdata('userRole') == "EST"): ?>
    <li <?php if ($seccion == 1) { echo "class='active'"; } ?>>
        <a href="<?php echo base_url(); ?>estudiante/">Calificaciones</a>
    </li>
<?php elseif ($this->session->userdata('userRole') == "DIREC"): ?>
    <li <?php if ($seccion == 1) { echo "class='active'"; } ?>>
        <a href="<?php echo base_url(); ?>directivo/">Usuarios</a>
    </li> 
    <li <?php if ($seccion == 2) { echo "class='active'"; } ?>>
        <a href="#" class="cerrado" id="estudiantes" onclick="actMenu('estudiantes','grupo_estudiantes')">Estudiantes<b class="caret"></b></a>
        <ul class="nav nav-pills nav-stacked" id="grupo_estudiantes">
        <?php foreach ($queryGrupos->result() as $grupo): ?>
            <li class="submenu" id="estudiantes_<?php echo $grupo->grupo_codigo; ?>">
                <a href="<?php echo base_url(); ?>directivo/estudiantes/<?php echo $grupo->grupo_codigo; ?>"><?php echo $grupo->grupo_codigo; ?></a>
            </li>
        <?php endforeach ?>            
        </ul>
    </li>   
<?php endif  ?>
</ul>