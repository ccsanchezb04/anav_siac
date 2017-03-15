<?php $data['seccion'] = 1; ?>  
<div class="row">
        <div class="col-md-3">
            <div class="contenedor-menu">
                <?php $this->load->view('layout/navs', $data); ?>
            </div>                
        </div>
        <div class="col-md-9">
            <div class="contenedor-principal">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modificar Calificación</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Calificación
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <?php $cont = 1; ?>
                                        <div class="panel-body"> 
                                            <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form">
                                            <table class="table table-bordered" id="calificaciones">
                                                <tr>
                                                    <th colspan="2">Grupo:</th>
                                                    <th colspan="3">Materia:</th>
                                                </tr>                                               
                                                <tr>
                                            <?php foreach ($asig as $a ): ?>
                                                    <td colspan="2"><?php echo $a->grupo_nombre." - ".$a->grupo_codigo; ?></td>                                                    
                                                    <td colspan="3"><?php echo $a->mate_nombre." - ".$a->mate_codigo; ?></td>
                                                    <?php $materia = $a->asig_idmate; ?>
                                             <?php endforeach ?>                                          
                                                </tr>
                                                <tr>
                                                    <th>Nombre Estudiante</th>
                                                    <th>Nota 1</th>
                                                    <th>Nota 2</th>
                                                    <th>Nota 3</th>
                                                    <th>Nota Final</th>
                                                </tr>
                                            <?php if (count($calif) > 0): ?>                        
                                                <?php foreach ($calif as $key): ?>
                                                <tr>                                        
                                                    <td id="<?php echo $cont; ?>">
                                                        <?php echo $key->usua_papellido." ".$key->usua_pnombre; ?>
                                                    </td>
                                                    <td>
                                                        <input type="number" max="5" min="0" step="0.01" onblur="calcularPromedio(<?php echo $cont; ?>)" class="form-control calif_<?php echo $cont; ?>" name="calif_nota1_<?php echo $cont; ?>" id="calif_nota1_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota1)) {echo $key->calif_nota1;}else{echo 0;} ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" max="5" min="0" step="0.01" onblur="calcularPromedio(<?php echo $cont; ?>)" class="form-control calif_<?php echo $cont; ?>" name="calif_nota2_<?php echo $cont; ?>" id="calif_nota2_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota2)) {echo $key->calif_nota2;}else{echo 0;} ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" max="5" min="0" step="0.01" onblur="calcularPromedio(<?php echo $cont; ?>)" class="form-control calif_<?php echo $cont; ?>" name="calif_nota3_<?php echo $cont; ?>" id="calif_nota3_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota3)) {echo $key->calif_nota3;}else{echo 0;} ?>">
                                                    </td>
                                                    <td id="<?php echo $cont; ?>">
                                                        <input type="text" readonly="" id="calif_notaf_<?php echo $cont; ?>" class="valor calif_notaf" name="calif_notaf_<?php echo $cont; ?>" value="<?php if (isset($key->calif_notaf)) echo $key->calif_notaf; ?>">
                                                        <input type="hidden" id="calif_id" name="calif_id_<?php echo $cont; ?>" value="<?php echo $key->calif_id; ?>">
                                                        <input type="hidden" id="calif_idestu" name="calif_idestu_<?php echo $cont; ?>" value="<?php if (isset($key->calif_idestu)) {echo $key->calif_idestu;} else{echo $key->estu_id;} ?>">
                                                        <input type="hidden" name="estado_<?php echo $cont; ?>" value="<?php if (isset($key->calif_id)) {echo "true";} else{echo "false";} ?>">
                                                    </td>
                                                </tr>                    
                                            <?php $cont++; ?>                                                                 
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert alert-danger" id="datos_info" role="alert">
                                                        <span class="glyphicon glyphicon-alert"></span>&nbsp;No hay estudiantes asociados al grupo seleccionado.
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                            
                                            </table> 
                                                <input type="hidden" id="calif_idmate" name="calif_idmate" value="<?php echo $materia; ?>">
                                                                                                
                                                <input type="hidden" name="contador" id="contador" value="<?php echo $cont-1; ?>">
                                            
                                                <div class="form-group">                                                
                                                    <div class="col-sm-6">
                                                        <a href="<?php echo base_url(); ?>instructor/" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-ok"></span>&nbsp;Modificar Calificación</button> 
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>              
            </div>
        </div>        
    </div>