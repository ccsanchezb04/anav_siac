<?php $data['seccion'] = 5; ?>  
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
                        <h3 class="panel-title">Adicionar Grupo</h3>
                    </div>
                    <div class="panel-body">
                    <?php foreach ($program as $row): ?>
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form" action="<?php echo base_url(); ?>group/addGroup/<?php echo $row->prog_codigo; ?>">
                    <?php endforeach ?>   
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
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="grupo_idprog" name="grupo_idprog" required="required">
                                                        <option value="">SELECCIONE UN PROGRAMA</option>
                                                        <?php foreach ($pg as $prog): ?>
                                                        <option value="<?php echo $prog->prog_id; ?>" data-name="<?php echo $prog->prog_codigo; ?>"><?php echo $prog->prog_nombre; ?></option>
                                                        <?php endforeach ?>
                                                    </select>   
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control grupo" id="semestre" name="semestre" required="required">
                                                        <option value="">SELECCIONE UN SEMESTRE</option>
                                                        <option value="I">1</option>
                                                        <option value="II">2</option>
                                                        <option value="III" class="dpa">3</option>
                                                        <option value="IV" class="dpa asa">4</option>
                                                    </select>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="number" class="form-control grupo" id="grupo_anio" name="grupo_anio" placeholder="Año/Periodo" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>                                                                                 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="nombre" name="grupo_nombre" placeholder="Nombre del grupo" disabled="disabled">
                                                </div>
                                            </div>  
                                           <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="codigo" name="grupo_codigo" placeholder="Codigo del grupo" disabled="disabled">
                                                    <div id="menssage"></div>
                                                    <input type="hidden" name="grupo_id" value=''>
                                                    <input type="hidden" name="grupo_nombre" id="grupo_nombre">
                                                    <input type="hidden" name="grupo_codigo" id="grupo_codigo">
                                                    <input type="hidden" name="grupo_idestado" value='1'>
                                                </div>
                                            </div>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                <?php foreach ($program as $row): ?>
                                                    <a href="<?php echo base_url(); ?>admin/grupos/<?php echo $row->prog_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                <?php endforeach ?>                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Agregar Grupo</button> 
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