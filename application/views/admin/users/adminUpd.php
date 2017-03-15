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
                        <h3 class="panel-title">Actualizar Usuario</h3>
                    </div>
                    <div class="panel-body" id="form-upd">
                        <form class="form-horizontal" id="upd-form" method="post" data-toggle="validator" role="form">                                                 
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
                                        <?php foreach ($updUs as $key): ?>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_doc" name="usua_doc" placeholder="Documento de Identidad" required="required" value="<?php echo $key->usua_doc; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_pnombre" name="usua_pnombre" placeholder="Primer Nombre" required="required" value="<?php echo $key->usua_pnombre; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> 
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_snombre" name="usua_snombre" placeholder="Segundo Nombre" value="<?php echo $key->usua_snombre; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_papellido" name="usua_papellido" placeholder="Primer Apellido" required="required" value="<?php echo $key->usua_papellido; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>  
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="usua_sapellido" name="usua_sapellido" placeholder="Segundo Apellido" value="<?php echo $key->usua_sapellido; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="email" class="form-control" id="usua_email" name="usua_email" placeholder="Email" required="required" value="<?php echo $key->usua_email; ?>">
                                                    <div class="help-block with-errors"></div>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="password" class="form-control" id="usua_password_new" name="usua_password_new" placeholder="Contraseña">
                                                    <input type="hidden" id="usua_password_old" name="usua_password_old" value="<?php echo $key->usua_password; ?>">
                                                    <input type="hidden" name="usua_tipo" id="tipo_usuario" value="<?php echo $key->usua_tipo; ?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default" id="col2">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Datos Administrador
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="admin_tel" name="admin_tel" placeholder="N° de telefono" required="required" value="<?php echo $key->admin_telefono; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <input type="text" class="form-control" id="admin_dire" name="admin_direccion" placeholder="Direccion de residencia" required="required" value="<?php echo $key->admin_direccion; ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                            
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <select class="form-control" id="admin_genero" name="admin_genero" required="required">
                                                        <option value="M" <?php if ($key->admin_genero=="M") { echo "selected='selected'"; } ?>>MASCULINO</option>
                                                        <option value="F" <?php if ($key->admin_genero=="F") { echo "selected='selected'"; } ?>>FEMENINO</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-offset-2 col-sm-8">                                           
                                                    <input type="text" class="form-control fecha" name="fnacimiento" placeholder="Fecha de nacimiento" required="required" value="<?php echo $key->admin_fnacimiento; ?>">

                                                    <div class="help-block with-errors"></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">                                                                                
                                                <div class="col-sm-offset-2 col-sm-4">
                                                    <select class="form-control" name="admin_rh" id="" required="required">
                                                        <option value="A+" <?php if ($key->admin_rh=="A+") { echo "selected='selected'"; } ?>>A+</option>
                                                        <option value="B+" <?php if ($key->admin_rh=="B+") { echo "selected='selected'"; } ?>>B+</option>
                                                        <option value="AB+" <?php if ($key->admin_rh=="AB+") { echo "selected='selected'"; } ?>>AB+</option>
                                                        <option value="O+" <?php if ($key->admin_rh=="O+") { echo "selected='selected'"; } ?>>O+</option>
                                                        <option value="A-" <?php if ($key->admin_rh=="A-") { echo "selected='selected'"; } ?>>A-</option>
                                                        <option value="B-" <?php if ($key->admin_rh=="B-") { echo "selected='selected'"; } ?>>B-</option>
                                                        <option value="AB-" <?php if ($key->admin_rh=="AB-") { echo "selected='selected'"; } ?>>AB-</option>
                                                        <option value="O-" <?php if ($key->admin_rh=="O-") { echo "selected='selected'"; } ?>>O-</option>
                                                    </select>                  
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select class="form-control" name="admin_idestado" id="admin_idestado">
                                                      <option value="1" <?php if ($key->admin_idestado==1) { echo "selected='selected'"; } ?>>ACTIVO</option>
                                                      <option value="2" <?php if ($key->admin_idestado==2) { echo "selected='selected'"; } ?>>INACTIVO</option>
                                                    </select>                                           
                                                    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $key->admin_id; ?>">                                                    
                                                    <input type="hidden" name="usua_id" id="usua_id" value="<?php echo $key->admin_idusua; ?>">                                                
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                            <div class="form-group">                                                
                                                <div class="col-sm-6">
                                                    <a href="<?php echo base_url(); ?>/admin/" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Volver</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-primary pull-left"><span class="glyphicon glyphicon-cog"></span>&nbsp;Modificar Usuario</button> 
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