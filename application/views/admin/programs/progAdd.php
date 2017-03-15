<?php $data['seccion'] = 2; ?>  
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
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form" action="<?php echo base_url(); ?>program/addProg">
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
                                                    <input type="text" class="form-control" id="prog_nombre" name="prog_nombre" placeholder="Nombre del grupo">
                                                </div>
                                            </div>  
                                           <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="prog_codigo" name="prog_codigo" placeholder="Codigo del grupo">
                                                    <input type="hidden" name="prog_id" value=''>                                                                                                        
                                                    <input type="hidden" name="prog_idestado" value='1'>
                                                </div>
                                            </div>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                    <a href="<?php echo base_url(); ?>admin/programas" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Agregar Programa</button> 
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