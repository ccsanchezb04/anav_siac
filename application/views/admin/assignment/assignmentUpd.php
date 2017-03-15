<?php $data['seccion'] = 7; ?>  
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
                        <h3 class="panel-title">Adicionar Asignacion</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-upd" method="post" data-toggle="validator" role="form">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos del grupo
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                        <?php foreach ($asigUpd as $key): ?>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="asig_idprog" name="asig_idprog" required="required">                                                    
                                                        <?php foreach ($pg as $prog): ?>
                                                        <option <?php if ($prog->prog_id == $key->asig_idprog) { echo "selected='selected'"; } ?> value="<?php echo $prog->prog_id; ?>"><?php echo $prog->prog_nombre; ?></option>
                                                        <?php endforeach ?>
                                                    </select> 
                                                    <div class="help-block with-errors"></div> 
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="asig_idgrupo" name="asig_idgrupo" required="required">
                                                        <?php foreach ($group as $g): ?>
                                                        <option <?php if ($g->grupo_id == $key->asig_idgrupo) { echo "selected='selected'"; } ?> value="<?php echo $g->grupo_id; ?>"><?php echo $g->grupo_nombre." - ".$g->grupo_codigo; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="asig_idmate" name="asig_idmate" required="required">                                                    
                                                        <?php foreach ($subj as $m): ?>
                                                        <option <?php if ($m->mate_id == $key->asig_idmate) { echo "selected='selected'"; } ?> value="<?php echo $m->mate_id; ?>"><?php echo $m->mate_nombre; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="asig_idinst" name="asig_idinst" required="required">                                                    
                                                        <?php foreach ($inst as $i): ?>
                                                        <option <?php if ($i->inst_id == $key->asig_idinst) { echo "selected='selected'"; } ?> value="<?php echo $i->inst_id; ?>"><?php echo $i->usua_pnombre." ".$i->usua_papellido; ?></option>
                                                        <?php endforeach ?>
                                                    </select>                                               
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="asig_idestado" name="asig_idestado" required="required"> 
                                                        <option <?php if ($key->asig_idestado == 1) { echo "selected='selected'"; } ?> value="1">Activo</option>
                                                        <option <?php if ($key->asig_idestado == 2) { echo "selected='selected'"; } ?> value="2">Inactivo</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                    <input type="hidden" name="asig_id" id="asig_id" value="<?php echo $key->asig_id; ?>">
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                <?php foreach ($program as $row): ?>
                                                    <a href="<?php echo base_url(); ?>admin/asignaciones/<?php echo $row->prog_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                <?php endforeach ?>   
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-cog"></span>&nbsp;Modificar Asignación</button> 
                                                </div>
                                            </div>
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