<?php $data['seccion'] = 4; ?>  
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
                        <h3 class="panel-title">Adicionar matricula de estudnate</h3>
                    </div>
                    <?php 
                        foreach ($stud as $key) {
                            $estudiante = $key->usua_id;
                        }
                        foreach ($group as $grupo) {
                            $prog = $grupo->grupo_codigo;
                        }
                    ?>
                    <div class="panel-body">
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form" action="<?php echo base_url(); ?>enrollment/addEnroll/<?php echo $estudiante."/".$prog; ?>">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos de la matricula
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                        <?php foreach ($stud as $e): ?>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" name="documento" id="documento" disabled="disabled" value="<?php echo $e->usua_doc; ?>">  
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" name="nombre" id="nombre" disabled="disabled" value="<?php echo $e->usua_papellido." ".$e->usua_pnombre; ?>">
                                                    <input type="hidden" name="estugrupos_idestu" value='<?php echo $e->estu_id; ?>'>
                                                </div>
                                            </div> 
                                        <?php endforeach ?>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estugrupos_idgrupo" name="estugrupos_idgrupo" required="required">
                                                        <option value="">SELECCIONE UN GRUPO</option>
                                                        <?php foreach ($group as $g): ?>
                                                        <option value="<?php echo $g->grupo_id; ?>"><?php echo $g->grupo_nombre." - ".$g->grupo_codigo; ?></option>
                                                        <?php endforeach ?>
                                                    </select> 
                                                    <input type="hidden" id="estugrupos_id" name="estugrupos_id" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                <?php foreach ($program as $row): ?>
                                                    <a href="<?php echo base_url(); ?>admin/estudiantes_inscritos/<?php echo $row->prog_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                <?php endforeach ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Agregar Matricula</button> 
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