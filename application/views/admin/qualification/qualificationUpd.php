<?php $data['seccion'] = 8; ?>  
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
                                            <?php foreach ($calif as $key): ?>                                            
                                                <table class="table table-bordered" id="">
                                                    <tr>
                                                        <th colspan="2">Estudiante:</th>
                                                        <td colspan="3"><?php echo $key->usua_pnombre." ".$key->usua_papellido; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Materia</th>
                                                        <th>Nota 1</th>
                                                        <th>Nota 2</th>
                                                        <th>Nota 3</th>
                                                        <th>Nota Final</th>
                                                    </tr>
                                                    <tr>                                        
                                                        <td>
                                                            <?php echo $key->mate_nombre; ?>                                                            
                                                        </td>
                                                        <td>
                                                            <input type="number" max="5" min="0" step="0.01" class="form-control calif" onblur="calcularPromedio(<?php echo $cont; ?>)" name="calif_nota1_<?php echo $cont; ?>" id="calif_nota1_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota1)) {echo $key->calif_nota1;}else{echo 0;} ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" max="5" min="0" step="0.01" class="form-control calif" onblur="calcularPromedio(<?php echo $cont; ?>)" name="calif_nota2_<?php echo $cont; ?>" id="calif_nota2_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota2)) {echo $key->calif_nota2;}else{echo 0;} ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" max="5" min="0" step="0.01" class="form-control calif" onblur="calcularPromedio(<?php echo $cont; ?>)" name="calif_nota3_<?php echo $cont; ?>" id="calif_nota3_<?php echo $cont; ?>" value="<?php if (isset($key->calif_nota3)) {echo $key->calif_nota3;}else{echo 0;} ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" readonly="" id="calif_notaf_<?php echo $cont; ?>" class="valor calif_notaf" name="calif_notaf_<?php echo $cont; ?>" value="<?php if (isset($key->calif_notaf)) echo $key->calif_notaf; ?>">
                                                            <input type="hidden" id="calif_id" name="calif_id_<?php echo $cont; ?>" value="<?php echo $key->calif_id; ?>">
                                                            <input type="hidden" id="calif_idestu" name="calif_idestu_<?php echo $cont; ?>" value="<?php echo $key->calif_idestu; ?>">
                                                            <input type="hidden" id="calif_idmate" name="calif_idmate_<?php echo $cont; ?>" value="<?php echo $key->calif_idmate; ?>">
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $calif1 = $key->calif_nota1;
                                                        $calif2 = $key->calif_nota2;
                                                        $calif3 = $key->calif_nota3;
                                                    ?>
                                                </table>
                                                <?php $cont++; ?>                 
                                            <?php endforeach ?>
                                                <?php
                                                   /* if (isset($calif1) || isset($calif2) || isset($calif3)) 
                                                    {
                                                        echo '<input type="hidden" name="estado" value="true">';
                                                    }*/
                                                ?>
                                                <input type="hidden" name="contador" value="<?php echo $cont-1; ?>">
                                            
                                                <div class="form-group">                                                
                                                    <div class="col-sm-6">
                                                    <?php foreach ($grupo as $g): ?>
                                                        <a href="<?php echo base_url(); ?>admin/calificaciones/<?php echo $g->grupo_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                    <?php endforeach ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-cog"></span>&nbsp;Modificar Calificación</button> 
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