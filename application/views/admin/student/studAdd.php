<?php $data['seccion'] = 3; ?>  
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
                        <h3 class="panel-title">Adicionar Estudiante</h3>
                    </div>
                    <div class="panel-body">
                    <?php foreach ($program as $row): ?>
                        <form class="form-horizontal" id="form-add" method="post" data-toggle="validator" role="form" action="<?php echo base_url(); ?>student/addStud/<?php echo $row->prog_codigo; ?>">
                    <?php endforeach ?>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default" id="col1">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Personales
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_doc" name="usua_doc" placeholder="Documento de Identidad" required="required">
                                                    <div class="help-block with-errors"></div>
                                                    <div id="menssage"></div>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_pnombre" name="usua_pnombre" placeholder="Primer Nombre" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_snombre" name="usua_snombre" placeholder="Segundo Nombre">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_papellido" name="usua_papellido" placeholder="Primer Apellido" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>  
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_sapellido" name="usua_sapellido" placeholder="Segundo Apellido">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="email" class="form-control" id="usua_email" name="usua_email" placeholder="Email" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="password" class="form-control" id="usua_pass" name="usua_password" placeholder="Contraseña" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Datos Estudiante
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_codigo" name="estu_codigo" placeholder="Código" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-8">                                           
                                                    <input type="text" class="form-control fecha" name="fingreso" placeholder="Fecha de ingreso" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_idprog" name="estu_idprog" required="required">
                                                        <option value="">SELECCIONE PROGRAMA</option>
                                                    <?php foreach ($prog as $key): ?>
                                                        <option value="<?php echo $key->prog_id; ?>"><?php echo $key->prog_nombre; ?></option>
                                                    <?php endforeach ?>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_tel" name="estu_tel" placeholder="N° de teléfono" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="estu_dire" name="estu_direccion" placeholder="Dirección de residencia" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="estu_genero" name="estu_genero" required="required">
                                                        <option value="">SELECCIONE GENERO</option>
                                                        <option value="M">MASCULINO</option>
                                                        <option value="F">FEMENINO</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-8">                                           
                                                    <input type="text" class="form-control fecha" name="fnacimiento" placeholder="Fecha de nacimiento" required="required">
                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">                                                                                
                                                <div class="col-sm-offset-2 col-sm-4">
                                                    <select class="form-control" name="grupo-san" id="" required="required">
                                                        <option value="">SELECCIONE UN GRUPO SANGUINEO</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="AB">AB</option>
                                                        <option value="O">O</option>
                                                    </select>                  
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="rh" id="" required="required">
                                                        <option value="">SELECCIONE UN RH</option>
                                                        <option value="+">+</option>
                                                        <option value="-">-</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>                                           
                                                    <input type="hidden" name="estu_id" id="estu_id" value="">
                                                    <input type="hidden" name="usua_id" id="usua_id" value="">
                                                    <input type="hidden" name="usua_tipo" id="usua_tipo" value="EST">
                                                    <input type="hidden" name="estu_idestado" id="estu_idestado" value="1">
                                                    <input type="hidden" name="estu_idestaacad" id="estu_idestaacad" value="1">
                                                </div>
                                            </div>
                                           <div class="form-group">                                                
                                                <div class="col-sm-6">                                                    
                                                <?php foreach ($program as $row): ?>
                                                    <a href="<?php echo base_url(); ?>admin/estudiantes_inscritos/<?php echo $row->prog_codigo; ?>" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                <?php endforeach ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Agregar Usuario</button> 
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