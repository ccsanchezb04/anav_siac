<table class="table table-striped" id="datos_info"> 
    <tr>
        <th>N° de identificación</th>
        <th>Nombre Completo</th>   
        
        <th>Acciones</th>
    </tr>
<?php if (count($row) == 0): ?> 
    <tr>    
        <td colspan="3">
            <div class="alert alert-danger" id="datos_info" role="alert">No hay datos relacionados</div>
        </td> 
    </tr>   
<?php else: ?>   
    <?php foreach ($row as $key): ?>    
    <tr>
        <td><?php echo $key->usua_doc ?></td>
        <td><?php echo $key->usua_pnombre." ".$key->usua_papellido ?></td>
    <?php if ($this->session->userdata('userRole') == "ADMIN"): ?>        
        <?php if ($key->usua_tipo != 'EST'): ?>
        <td>                    
            <a href="<?php echo base_url(); ?>user/lstUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
                <span class='glyphicon glyphicon-eye-open'></span>
            </a>
            <a href="<?php echo base_url(); ?>user/updUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
                <span class='glyphicon glyphicon-cog'></span>
            </a>
            <?php if ($key->usua_tipo == 'ADMIN'): ?>
                <?php if ($key->admin_idestado == 1): ?>
                <a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/admin" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_admin; ?>">
                    <span class='glyphicon glyphicon-remove '></span>
                </a>
                <?php else: ?>
                <a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/admin" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_admin; ?>">
                    <span class='glyphicon glyphicon-ok'></span>
                </a>
                <?php endif ?>
            <?php elseif ($key->usua_tipo == 'INST'): ?>
                <?php if ($key->inst_idestado == 1): ?>
                <a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/inst" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_inst; ?>">
                    <span class='glyphicon glyphicon-remove '></span>
                </a>
                <?php else: ?>
                <a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/inst" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_inst; ?>">
                    <span class='glyphicon glyphicon-ok'></span>
                </a>
                <?php endif ?> 
            <?php elseif ($key->usua_tipo == 'DIREC'): ?>
                <?php if ($key->inst_idestado == 1): ?>
                <a href="<?php echo base_url(); ?>user/inaUser/<?php echo $key->usua_id; ?>/direc" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_direc; ?>">
                    <span class='glyphicon glyphicon-remove '></span>
                </a>
                <?php else: ?>
                <a href="<?php echo base_url(); ?>user/actUser/<?php echo $key->usua_id; ?>/direc" type='button' class='btn btn-sm btn-warning'  data-toggle="tooltip" data-placement="bottom" title="ESTADO: <?php echo $key->esta_direc; ?>">
                    <span class='glyphicon glyphicon-ok'></span>
                </a>
                <?php endif ?>           
            <?php endif ?>                               
        </td>
        <?php else: ?>
        <td>                    
           <a href="<?php echo base_url(); ?>student/lstStud/<?php echo $key->usua_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
                <span class='glyphicon glyphicon-eye-open'></span>
            </a>
            <a href="<?php echo base_url(); ?>student/updStud/<?php echo $key->usua_id."/".$key->prog_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="MODIFICAR">
                <span class='glyphicon glyphicon-cog'></span>
            </a>
            <?php if ($key->estu_idestaacad == 1): ?>
            <a href="<?php echo base_url(); ?>student/enrollment/<?php echo $key->usua_id."/".$key->estu_idprog; ?>" type='button' class='btn btn-sm btn-warning' data-toggle="tooltip" data-placement="bottom" title="ESTA: <?php echo $key->estaacad_nombre; ?>">
                <span class='glyphicon glyphicon-education'></span>
            </a>            
            <?php endif ?>                              
        </td>
        <?php endif ?> 
    <?php elseif ($this->session->userdata('userRole') == "DIREC"): ?>
        <?php if ($key->usua_tipo != 'EST'): ?>
        <td>                    
            <a href="<?php echo base_url(); ?>user/lstUser/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR">
                <span class='glyphicon glyphicon-eye-open'></span>
            </a>                                                                
        </td>
        <?php else: ?>
            <?php if ($key->estu_idestaacad == 2): ?>
            <td>                    
                <a href="<?php echo base_url(); ?>directivo/lstCalif/<?php echo $key->estu_id."/".$key->grupo_codigo; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR CALIFICACIÓN">
                    <span class='glyphicon glyphicon-th-list'></span>
                </a>
                <a href="<?php echo base_url(); ?>enrollment/lstEnroll/<?php echo $key->usua_id; ?>" type='button' class='btn btn-sm btn-primary'  data-toggle="tooltip" data-placement="bottom" title="CONSULTAR ESTUDIANTE">
                    <span class='glyphicon glyphicon-eye-open'></span>
                </a>                                                                                                            
            </td> 
            <?php else: ?>
            <td>
                INSCRITO
            </td>  
            <?php endif ?>
        <?php endif ?> 
    <?php endif ?> 
    </tr> 
    <?php endforeach ?> 
<?php endif ?>
            
</table>