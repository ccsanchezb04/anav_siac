<?php $data['seccion'] = 6; ?>  
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
                        <h3 class="panel-title">Modificar Materia</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-upd" method="post" data-toggle="validator" role="form">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos de la materia
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body"> 
                                        <?php foreach ($materia as $key): ?>
                                           <?php 
                                                $nombre_o = $key->mate_nombre;
                                                $nombres = explode("_", $nombre_o);

                                                foreach($nombres as $nom=>$values){
                                                    echo "<input type='hidden' id='dato".$nom."' value='".$values."'>";
                                                }                                              
                                           ?>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la materia" value="">
                                                    <!-- <div class="help-block with-errors"></div> -->
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control materia" id="mate_idprog" name="mate_idprog" required="required">
                                                        <?php foreach ($pg as $prog): ?>
                                                        <option value="<?php echo $prog->prog_id; ?>" <?php if ($key->mate_idprog == $prog->prog_id) { echo "selected='selected'"; } ?>><?php echo $prog->prog_nombre; ?></option>
                                                        <?php endforeach ?>
                                                    </select> 
                                                    <div class="help-block with-errors"></div>  
                                                </div>
                                            </div>
                                            <div class="form-group">                                   
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control materia" id="semestre" name="semestre" required="required">
                                                        <option value="">SELECCIONE UN SEMESTRE</option>
                                                        <option value="I">1</option>
                                                        <option value="II">2</option>
                                                        <option value="III" class="dpa">3</option>
                                                        <option value="IV" class="dpa asa">4</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="mate_horas" name="mate_horas" placeholder="Intensidad Horaria" required="required" value="<?php echo $key->mate_horas; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>  
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="nombre-materia" name="nombre" placeholder="Nombre de la materia" disabled="disabled" value="<?php echo $key->mate_nombre; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo de la materia" disabled="disabled" value="<?php echo $key->mate_codigo; ?>">        
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control materia" id="mate_idestado" name="mate_idestado" required="required">                                                      
                                                        <option value="1" <?php if ($key->mate_idestado == 1) { echo "selected='selected'"; } ?>>Activo</option>
                                                        <option value="2" <?php if ($key->mate_idestado == 2) { echo "selected='selected'"; } ?>>Inactivo</option>
                                                    </select>
                                                     <input type="hidden" name="mate_id" value='<?php echo $key->mate_id; ?>'>
                                                    <input type="hidden" name="mate_nombre" id="mate_nombre" value="<?php echo $key->mate_nombre; ?>">
                                                    <input type="hidden" name="mate_codigo" id="mate_codigo" value="<?php echo $key->mate_codigo; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                        <?php endforeach ?>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                <?php foreach ($program as $row): ?>
                                                    <a href="<?php echo base_url(); ?>admin/materias/<?php echo $row->prog_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                    <?php endforeach ?>   
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-cog"></span>&nbsp;Modificar Materia</button> 
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